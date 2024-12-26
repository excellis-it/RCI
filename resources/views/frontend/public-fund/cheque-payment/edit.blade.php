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
                                $members->firstWhere('id', $member->member_id)->designation->designation_type ?? 'N/A';
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



<form action="{{ route('cheque-payments.update') }}" method="POST" id="edit-form">
    @csrf
    @method('post')
    <div class="row">
        <div class="col-12">
            <div class="form-group mb-2">
                <div class="row align-items-center">

                    @csrf
                    <input type="hidden" value="{{ $chequePayment->id }}" name="chid">

                    <div class="col-md-3">
                        <label for="">Bill Amount</label>
                        <input type="number" class="form-control" value="{{ $chequePayment->amount }}" required
                            readonly>
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
                        <input type="number" class="form-control" name="cheq_no"
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
    </div>

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
                    $memberDesign =
                        $members->firstWhere('id', $member->member_id)->designation->designation_type ?? 'N/A';
                    $bankAccountNo = $memberCoreInfo ? $memberCoreInfo->bank_acc_no : 'N/A';
                @endphp
                <tr>
                    <td>{{ $member->serial_no }}</td>
                    <td>{{ $memberName }}</td>
                    <td>{{ $memberDesign }}</td>
                    <td>
                        <input type="hidden" id="member_id_{{ $chequePayment->id }}" class="form-control"
                            name="member_id[{{ $chequePayment->id }}][]" required readonly
                            value="{{ $member->member_id }}">


                        <input type="number" id="pay_amount_{{ $chequePayment->id }}" class="form-control"
                            name="rc_amount[{{ $chequePayment->id }}][]" value="{{ $member->amount }}" required
                            readonly>
                    </td>
                    <td><input type="number" id="bill_amount_{{ $chequePayment->id }}"
                            class="form-control bill-amount bill-amount-lower"
                            name="amount[{{ $chequePayment->id }}][]">

                        <span class="text-danger"></span>
                    </td>
                    <td>
                        <input type="hidden" id="main_pay_amount_{{ $chequePayment->id }}" class="form-control"
                            name="main_pay_amount[{{ $chequePayment->id }}][]" required
                            value="{{ Helper::getCheqpaymentMemberBalance($chequePayment->id, $member->member_id) }}">
                        <input type="number" id="balance_{{ $chequePayment->id }}" class="form-control"
                            name="balance[{{ $chequePayment->id }}][]"
                            value="{{ Helper::getCheqpaymentMemberBalance($chequePayment->id, $member->member_id) }}"
                            required readonly>
                    </td>
                    <td><input type="text" class="form-control" name="bill_ref[{{ $chequePayment->id }}][]"
                            id="bill_ref_{{ $chequePayment->id }}" value="{{ $member->bill_ref }}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <br>
    <div class="row">
        <div class="col-md-2 ml-auto">
            <div class="mb-1">
                <button type="submit" class="listing_add">Update</button>
            </div>
            {{-- <div class="mb-1">
                <a href="" class="listing_exit">Back</a>
            </div> --}}
        </div>
    </div>
</form>
