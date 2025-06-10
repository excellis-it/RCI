@php
    use App\Helpers\Helper;
@endphp
@if ($receipt_data2)
    <div class=" mt-2">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Receipt No</th>
                    <th>VR. No</th>
                    <th>VR. Date</th>
                    <th>DV No.</th>
                    <th>Category</th>
                    <th>Narration</th>

                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $receipt_data2->receipt_no ?? 'N/A' }}</td>
                    <td>{{ $receipt_data2->vr_no ?? 'N/A' }}</td>
                    <td>{{ $receipt_data2->vr_date ?? 'N/A' }}</td>

                    <td>{{ $receipt_data2->dv_no ?? 'N/A' }}</td>
                    <td>{{ $receipt_data2->category->name ?? 'N/A' }}</td>
                    <td>{{ $receipt_data2->narration ?? 'N/A' }}</td>

                    <td><button id="toggle-table2" class="btn btn-primary mb-3 btn-sm">Show Details</button></td>
                </tr>
            </tbody>
        </table>
        <br>


        <div id="dynamic-fields-members2" style="display: none">
            <p>Receipt Details:</p>
            <table class="table table-responsive">

                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Member</th>
                        <th>Designation</th>
                        <th>Bank Account</th>
                        <th>Amount</th>
                        <th>Bill Reference</th>
                        <th>Cheque No.</th>
                        <th>Cheque Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receipt_data2->receiptMembers as $index => $member)
                        @php
                            $memberCoreInfo = \App\Models\MemberCoreInfo::where('member_id', $member->member_id)
                                ->orderBy('id', 'desc')
                                ->first();
                            $memberName = $members->firstWhere('id', $member->member_id)->name ?? 'N/A';
                            $memberDesign =
                                $members->firstWhere('id', $member->member_id)->desigs->designation ?? 'N/A';
                            $bankAccountNo = $memberCoreInfo ? $memberCoreInfo->bank_acc_no : 'N/A';
                        @endphp
                        <tr>
                            <td>{{ $member->serial_no }}</td>
                            <td>{{ $memberName }}</td>
                            <td>{{ $memberDesign }}</td>
                            <td>{{ $bankAccountNo }}</td>
                            <td>{{ $member->amount }}</td>
                            <td>{{ $member->bill_ref }}</td>
                            <td>{{ $member->cheq_no }}</td>
                            <td>{{ $member->cheq_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </table>
    </div>

    <br>
@else
    <tr>
        <td colspan="5" class="text-center">No Receipt No Found</td>
    </tr>
@endif

<script>
    $(document).ready(function() {
        $('#toggle-table2').click(function() {
            // Toggle visibility of the table
            $('#dynamic-fields-members2').toggle();

            // Toggle button text between 'Show Details' and 'Hide'
            if ($('#dynamic-fields-members2').is(':visible')) {
                $('#toggle-table2').text('Hide');
            } else {
                $('#toggle-table2').text('Show Details');
            }
        });
    });
</script>



<form action="{{ route('cheque-payments.update') }}" method="POST" id="edit-form"
    class="receipt_member_data_form chqeditform">
    @csrf
    @method('post')
    <input type="hidden" value="{{ $chequePayment->id }}" name="chid">
    {{-- <div class="row">
        <div class="col-12">
            <div class="form-group mb-2">
                <div class="row align-items-center">

                    @csrf
                    <input type="hidden" value="{{ $chequePayment->id }}" name="chid">

                    <div class="col-md-3">
                        <label for="">Bill Amount</label>
                        <input type="number" step="any" class="form-control upper-bill-amount"
                            value="{{ $chequePayment->amount }}" required readonly>
                        <span class="text-danger"></span>
                    </div>
                    <div class="col-md-3">
                        <label for="">Bill Ref<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="bill_ref"
                            value="{{ $chequePayment->bill_ref ?? '' }}">
                        <span class="text-danger"></span>
                    </div>

                    <div class="col-md-3">
                        <label for="">Cheque No.<span class="text-danger">*</span></label>
                        <input type="number" step="any" class="form-control" name="cheq_no"
                            value="{{ $chequePayment->cheq_no ?? '' }}" required>
                        <span class="text-danger"></span>
                    </div>

                    <div class="col-md-3">
                        <label for="">Cheque Date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="cheq_date"
                            value="{{ $chequePayment->cheq_date ?? '' }}" required>
                        <span class="text-danger"></span>
                    </div>


                </div>
            </div>
        </div>
    </div> --}}


    <table class="table table-responsive mt-0 pt-0" hidden>
        <thead>
            <tr>
                <th>Amount</th>
                <th>Bill Amount<span class="text-danger">*</span></th>
                <th>Balance</th>
                <th>Bill Ref</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="hidden" id="receipt_id_{{ $receipt_data2->id }}" class="form-control"
                        name="receipt_id[]" required readonly value="{{ $receipt_data2->id }}">

                    <input type="hidden" value="{{ $receipt_data2->category_id }}"
                        id="category_id_{{ $receipt_data2->id }}" class="form-control" name="category_id[]" required
                        readonly>

                    <input type="number" step="any" id="pay_amount_{{ $receipt_data2->id }}" class="form-control"
                        name="rc_amount1[]" required readonly value="{{ $receipt_data2->amount }}">
                </td>
                <td><input type="number" step="any" id="bill_amount_{{ $chequePayment->id }}"
                        class="form-control bill-amount upper-bill-amount" name="amount1[]"
                        value="{{ $chequePayment->amount }}">

                    <span class="text-danger"></span>
                </td>
                <td>
                    <input type="hidden" id="main_amount_{{ $receipt_data2->id }}" class="form-control"
                        name="main_amount1[]" required>
                    <input type="number" step="any" id="balance_{{ $receipt_data2->id }}" class="form-control"
                        name="balance1[]" required readonly>
                </td>
                <td><input type="text" class="form-control" name="bill_ref1[]"
                        id="bill_ref_{{ $receipt_data2->id }}" value=""></td>
            </tr>
        </tbody>
    </table>


    <table class="table table-responsive mt-0 pt-0 ">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Member</th>
                <th>Designation</th>
                <th>Amount</th>
                <th>Bill Amount<span class="text-danger">*</span></th>
                <th>Balance</th>
                <th>Bill Ref</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chequePayment->chequePaymentMembers as $index => $member)
                @php
                    $memberCoreInfo = \App\Models\MemberCoreInfo::where('member_id', $member->member_id)
                        ->orderBy('id', 'desc')
                        ->first();
                    $memberName = $members->firstWhere('id', $member->member_id)->name ?? 'N/A';
                    $memberDesign = $members->firstWhere('id', $member->member_id)->desigs->designation ?? 'N/A';
                    $bankAccountNo = $memberCoreInfo ? $memberCoreInfo->bank_acc_no : 'N/A';
                @endphp
                <tr>
                    <td>{{ $member->serial_no }}</td>
                    <td>{{ $memberName }}</td>
                    <td>{{ $memberDesign }}</td>
                    <td>
                        <input type="hidden" id="member_serial_{{ $chequePayment->id }}" class="form-control"
                            name="member_serial[{{ $chequePayment->id }}][]" required readonly
                            value="{{ $member->serial_no }}">
                        <input type="hidden" id="member_id_{{ $chequePayment->id }}" class="form-control"
                            name="member_id[{{ $chequePayment->id }}][]" required readonly
                            value="{{ $member->member_id }}">


                        <input type="number" step="any" id="pay_amount_{{ $chequePayment->id }}"
                            class="form-control" name="rc_amount[{{ $chequePayment->id }}][]"
                            value="{{ Helper::getCheqpaymentMemberRCamount($receipt_data2->id, $member->member_id, $member->serial_no) }}"
                            required readonly>
                    </td>
                    <td><input type="number" step="any" id="bill_amount_{{ $chequePayment->id }}"
                            class="form-control bill-amount bill-amount-lower"
                            name="amount[{{ $chequePayment->id }}][]" value="{{ $member->amount }}">

                        <span class="text-danger"></span>
                    </td>
                    <td>
                        <input type="hidden" id="main_pay_amount_{{ $chequePayment->id }}" class="form-control"
                            name="main_pay_amount[{{ $chequePayment->id }}][]" required
                            value="{{ Helper::getCheqpaymentMemberRCamountNew($receipt_data2->id, $member->member_id, $member->id, $member->serial_no) }}">
                        <input type="number" step="any" id="balance_{{ $chequePayment->id }}" class="form-control"
                            name="balance[{{ $chequePayment->id }}][]"
                            value="{{ Helper::getCheqpaymentMemberBalance($receipt_data2->id, $member->member_id, $member->serial_no) }}"
                            required readonly>
                    </td>
                    <td><input type="text" class="form-control" name="bill_ref[{{ $chequePayment->id }}][]"
                            id="bill_ref_{{ $chequePayment->id }}" value="{{ $member->bill_ref }}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <br>
    {{-- <div class="row">
        <div class="col-md-2 ml-auto">
            <div class="mb-1">
                <button type="submit" class="listing_add">Update</button>
            </div>

        </div>
    </div> --}}

    <div class="row justify-content-between mt-3">

        <div class="col-md-2 mb-2">
            <a href="" class="listing_exit">Back</a>
        </div>

        <div class="col-md-2 text-end mb-2">
            <button type="submit" class="listing_add">Update</button>
        </div>
    </div>
</form>

<script>
    $(document).on("keyup", ".bill-amount", function() {
        let row = $(this).closest("tr"); // Get the current row
        let dataId = $(this).attr("id").split("_").pop(); // Extract ID from the field
        let initialBalanceMain = parseFloat(row.find("#main_pay_amount_" + dataId).val()); // Main balance
        let payAmount = parseFloat(row.find("#pay_amount_" + dataId).val()); // Pay amount
        let initialBalance = parseFloat(row.find("#balance_" + dataId).val()); // Current balance
        let billAmount = $(this).val().trim(); // Bill amount entered

        // Check if the input is empty
        if (billAmount === "") {
            // Reset balance to the main amount
            row.find("#balance_" + dataId).val(initialBalanceMain.toFixed(2));
            return;
        }

        // Convert bill amount to float
        billAmount = parseFloat(billAmount);

        // Validate the bill amount
        if (isNaN(billAmount)) {
            toastr.error('Invalid input. Please enter a numeric value.');
            $(this).val("");
            row.find("#balance_" + dataId).val(initialBalanceMain.toFixed(2));
            return;
        }

        // Check if the bill amount exceeds the main balance
        if (billAmount > initialBalanceMain) {
            toastr.error('The bill amount cannot be greater than the balance amount.');
            $(this).val("");
            row.find("#balance_" + dataId).val(initialBalanceMain.toFixed(2));
            return;
        }

        // Calculate the new balance
        let newBalance = initialBalanceMain - billAmount;

        // Update the balance field
        row.find("#balance_" + dataId).val(newBalance.toFixed(2));





    });


    $('.receipt_member_data_form').each(function() {
        let $table = $(this);

        // Listen for changes in bill amount inputs
        $table.on('input', '.bill-amount', function() {
            let $billAmountInput = $(this);
            let $row = $billAmountInput.closest(
                'tr');

            // Get inputs and error message container in the current row
            let $mainPayAmountInput = $row.find(
                'input[name^="main_pay_amount["]'
            );
            let $payAmountInput = $row.find(
                'input[name^="rc_amount["]');
            let $balanceInput = $row.find(
                'input[name^="balance["]');
            let $errorSpan = $billAmountInput
                .siblings('.text-danger');
            let $upperBillAmount = $table.find(
                '.upper-bill-amount');

            // Get numeric values
            let mainPayAmount = parseFloat(
                $mainPayAmountInput.val()) || 0;
            let billAmount = parseFloat(
                $billAmountInput.val()) || 0;
            // alert(billAmount);
            // alert(mainPayAmount);
            // Validation: Bill amount cannot exceed the main pay amount
            if (billAmount > mainPayAmount) {
                // Show error message and reset bill amount
                $errorSpan.text(
                    'Bill amount cannot exceed pay amount.'
                );
                $balanceInput.val(mainPayAmount);
                $billAmountInput.val('');
            } else {
                // Clear error message and calculate the balance
                $errorSpan.text('');
                let balance = mainPayAmount -
                    billAmount;
                $balanceInput.val(balance.toFixed(
                    2));
            }

            // Calculate the total bill amount for the table
            let totalBillAmount = 0;
            $table.find('.bill-amount-lower').each(
                function() {
                    totalBillAmount +=
                        parseFloat($(this)
                            .val()) || 0;
                });

            // Update the upper-bill-amount value
            $upperBillAmount.val(totalBillAmount
                .toFixed(2));
        });
    });

    $("#chqeditform").submit(function(e) {
        toastr.success('Cheque Payment updated successfully');

    });
</script>
