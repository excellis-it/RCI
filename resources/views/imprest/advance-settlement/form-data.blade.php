@if ($advance_funds)
    <p>Advance Fund:</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>Employee ID</th>
                <th>Name</th> --}}
                <th>Advance No</th>
                <th>Advance Date</th>
                <th>Advance Amount</th>
                <th>Project</th>
                <th>Cheque No</th>
                <th>Cheque Date</th>
                <th>Variable Type</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- <td>{{ $advance_funds->emp_id ?? 'N/A' }}</td>
                <td>{{ $advance_funds->member->name ?? 'N/A' }}</td> --}}
                <td>{{ $advance_funds->adv_no ?? 'N/A' }}</td>
                <td>{{ $advance_funds->adv_date ?? 'N/A' }}</td>
                <td>{{ $advance_funds->adv_amount ?? 'N/A' }}</td>
                <td>{{ $advance_funds->project->name ?? 'N/A' }}</td>
                <td>{{ $advance_funds->chq_no ?? 'N/A' }}</td>
                <td>{{ $advance_funds->chq_date ?? 'N/A' }}</td>
                <td>{{ isset($advance_funds->variableType) ? $advance_funds->variableType->name : 'N/A' }}</td>

            </tr>
        </tbody>
    </table>


    <p>Advance Settlement History:</p>
    <table class="table table-bordered">
        <thead>
            <tr>


                <th>Advance No</th>
                <th>Advance Date</th>
                {{-- <th>Member Name</th> --}}
                <th>Advance Amount</th>
                <th>Bill Amount</th>
                <th>Balance</th>
                <th>Project</th>
                <th>Cheque No</th>
                <th>Cheque Date</th>
                <th>Variable Type</th>

            </tr>
        </thead>
        <tbody>
            @if (count($advance_settels) > 0)
                @foreach ($advance_settels as $key => $advance_settel)
                    <tr>


                        <td>{{ $advance_settel->adv_no ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->adv_date ?? 'N/A' }}</td>
                        {{-- <td>{{ $advance_settel->member->name ?? 'N/A' }}</td> --}}
                        <td>{{ $advance_settel->adv_amount ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->bill_amount ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->balance ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->project->name ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->chq_no ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->chq_date ?? 'N/A' }}</td>
                        <td>{{ isset($advance_settel->variableType) ? $advance_settel->variableType->name : 'N/A' }}
                        </td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="11" class="text-center">No Advance Settlement Found</td>
                </tr>
            @endif
        </tbody>
    </table>


    @if (count($advance_settels) > 0)
        <center class="outline outlined-primary p-2 text-danger" hidden>Already Settled</center>
    @else
        <form action="{{ route('advance-settlement.store') }}" method="POST" id="advance-settlement-create-form">
            @csrf
            <div class="row">

                <input type="hidden" class="form-control" name="member_id" value="{{ $advance_funds->member_id }}"
                    placeholder="" required>

                <input type="hidden" class="form-control" name="adv_no" value="{{ $advance_funds->adv_no }}"
                    placeholder="" required>

                <input type="hidden" class="form-control" name="adv_date" value="{{ $advance_funds->adv_date }}"
                    placeholder="" required>

                <input type="hidden" class="form-control" name="af_id" value="{{ $advance_funds->id }}"
                    placeholder="" required>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Adv amt</label>
                        </div>
                        <div class="col-md-12">
                            <input type="number" class="form-control" name="adv_amount" id="adv_amount"
                                value="{{ $advance_funds->adv_amount }}" placeholder="" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Project</label>
                        </div>
                        <div class="col-md-12">
                            <select name="project_id" id="project_id" class="form-control" readonly required>
                                <option value="{{ $advance_funds->project->id }}">
                                    {{ $advance_funds->project->name }}
                                </option>

                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Vr No</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="var_no" id="var_no"
                                value="{{ $varNo }}" placeholder="" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Vr Date</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control" name="var_date" id="var_date"
                                value="{{ $advance_funds->adv_date }}" placeholder="" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Vr Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="var_amount" id="var_amount"
                                value="{{ old('var_amount') ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Var Type</label>
                        </div>
                        <div class="col-md-12">
                            <select name="var_type_id" id="var_type_id" class="form-control" readonly>

                                <option
                                    value="{{ isset($advance_funds->variableType) ? $advance_funds->variableType->id : '' }}">
                                    {{ isset($advance_funds->variableType) ? $advance_funds->variableType->name : '' }}
                                </option>

                            </select>

                        </div>
                    </div>
                </div>


                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Chq No</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="chq_no" id="chq_no"
                                value="{{ old('chq_no') ?? '' }}" placeholder="">

                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Chq Date</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control" name="chq_date" id="chq_date"
                                value="{{ date('Y-m-d') }}" placeholder="">

                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Firm</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="firm" id="firm"
                                value="{{ old('firm') ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>


                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Bill Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="number" class="form-control" name="bill_amount" id="bill_amount"
                                value="{{ old('bill_amount') ?? '' }}" placeholder="">
                            <span class="text-danger advamnt_msg"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Balance</label>
                        </div>
                        <div class="col-md-12">
                            <input type="hidden" id="main_amount" class="form-control" name="main_amount"
                                value="{{ $balance }}">
                            <input type="number" class="form-control" name="balance" id="balance"
                                value="{{ $balance }}" placeholder="" required readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>



            </div>






            {{-- save cancel button design in right corner --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="row justify-content-end">
                        <div class="col-md-3">
                            <div class="row">

                                <div class="form-group col-md-6 mb-2">
                                    {{-- <button type="reset" class="listing_exit">Cancel</button> --}}
                                </div>
                                <div class="form-group col-md-6 mb-2">

                                    <button type="submit" class="listing_add" id="save_settle_btn">Save</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    @endif

@endif


<script>
    function checkBalance() {

        var baln = $("#balance").val();
        if (baln <= 0) {
            $("#save_settle_btn").hide();
        } else {
            $("#save_settle_btn").show();
        }
    }

    $(document).ready(function() {
        checkBalance();
        $('#advance-settlement-create-form').submit(function(e) {
            // alert("hello")
            e.preventDefault();
            var formData = $(this).serialize();


            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                success: function(response) {

                    //windows load with toastr message
                    //  window.location.reload();
                    toastr.success('Advance Settlement added successfully');
                    //  window.history.back();
                    // $("#searchAdv-form").submit();
                    //  checkBalance();
                    setTimeout(() => {
                        window.location.reload();
                    }, 800);
                },
                error: function(xhr) {

                    // Handle errors (e.g., display validation errors)
                    //clear any old errors

                    $('.text-danger').html('');
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        // Assuming you have a div with class "text-danger" next to each input
                        $('[name="' + key + '"]').next('.text-danger').html(value[
                            0]);
                    });
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {

        $("#bill_amount").on("keyup", function() {
            let initialBalanceMain = parseFloat($("#main_amount").val());
            let payAmount = parseFloat($("#balance").val()); // Pay amount from response
            let initialBalance = parseFloat($("#balance").val()); // Initial balance from response
            let billAmount = $(this).val(); // Get the bill amount entered

            // Check if the input is empty
            if (billAmount.trim() === "") {
                // Reset balance to the pay amount
                $("#balance").val(initialBalanceMain.toFixed(2));
                return;
            }

            // Convert bill amount to float
            billAmount = parseFloat(billAmount);

            // Validate the bill amount
            if (isNaN(billAmount)) {
                billAmount = 0; // Handle invalid input
            }

            // Check if bill amount exceeds the pay amount
            if (billAmount > initialBalanceMain) {
                // Display error message
                // alert("The bill amount cannot be greater than the pay amount.");
                toastr.error('The bill amount cannot be greater than the balance amount');
                billAmount = initialBalanceMain; // Reset bill amount to the maximum allowable value
                $(this).val(''); // Update the input field with the corrected value
                $("#var_amount").val('');
                $("#balance").val(initialBalanceMain);
            } else {

                // Calculate the new balance
                let newBalance = initialBalanceMain - billAmount;

                // Update the balance field
                $("#balance").val(newBalance.toFixed(2));
                $("#var_amount").val(billAmount);

            }


            var this_adv_amount = parseFloat($(this).val()) || 0;
            var main_cashinhand = parseFloat($("#main_cashinhand_balance").val()) || 0;

            if (this_adv_amount > main_cashinhand) {
                toastr.error('Cash In Hand Balance is Low');
                $("#save_settle_btn").attr('disabled', true);
                $(".advamnt_msg").text('Cash In Hand Balance is Low');
            } else {
                $("#save_settle_btn").removeAttr('disabled');
                $(".advamnt_msg").text('');
            }




        });


        $("#var_amount").on("keyup", function() {
            let initialBalanceMain = parseFloat($("#main_amount").val());
            let payAmount = parseFloat($("#balance").val()); // Pay amount from response
            let initialBalance = parseFloat($("#balance").val()); // Initial balance from response
            let billAmount = $(this).val(); // Get the bill amount entered

            // Check if the input is empty
            if (billAmount.trim() === "") {
                // Reset balance to the pay amount
                $("#balance").val(initialBalanceMain.toFixed(2));
                return;
            }

            // Convert bill amount to float
            billAmount = parseFloat(billAmount);

            // Validate the bill amount
            if (isNaN(billAmount)) {
                billAmount = 0; // Handle invalid input
            }

            // Check if bill amount exceeds the pay amount
            if (billAmount > initialBalanceMain) {
                // Display error message
                // alert("The bill amount cannot be greater than the pay amount.");
                toastr.error('The bill amount cannot be greater than the balance amount');
                billAmount = initialBalanceMain; // Reset bill amount to the maximum allowable value
                $(this).val(''); // Update the input field with the corrected value
                $("#bill_amount").val('');
                $("#balance").val(initialBalanceMain);
            } else {

                // Calculate the new balance
                let newBalance = initialBalanceMain - billAmount;

                // Update the balance field
                $("#balance").val(newBalance.toFixed(2));
                $("#bill_amount").val(billAmount);

            }


            var this_adv_amount = parseFloat($(this).val()) || 0;
            var main_cashinhand = parseFloat($("#main_cashinhand_balance").val()) || 0;

            if (this_adv_amount > main_cashinhand) {
                toastr.error('Cash In Hand Balance is Low');
                $("#save_settle_btn").attr('disabled', true);
                $(".advamnt_msg").text('Cash In Hand Balance is Low');
            } else {
                $("#save_settle_btn").removeAttr('disabled');
                $(".advamnt_msg").text('');
            }




        });



    });
</script>
