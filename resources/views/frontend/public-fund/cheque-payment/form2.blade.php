<div class="border shadow p-3 pay_form">


    <form id="search_receipt_form" method="POST">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">

                        @csrf
                        <div class="form-group col-md-4">
                            <label for="">Vr. No</label>
                            <input type="number" class="form-control" name="vr_no" id="vr_no">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Vr. Date</label>
                            <input type="date" class="form-control" name="vr_date" id="vr_date">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">&nbsp;</label>
                            <button type="submit" class="btn btn-primary" id="search_vr">
                                Search
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <div id="receipt_data">

    </div>

    <form action="{{ route('cheque-payments.store') }}" method="POST" id="cheque-payment-create-form">
        @csrf

        <div class="row">
            <div class="col-12">
                <div class="form-group mb-2">
                    <div class="row align-items-center">

                        @csrf

                        <input type="hidden" value="" name="receipt_no" id="create_receipt_no">
                        <input type="hidden" value="" name="vr_no" id="create_vr_no">
                        <input type="hidden" value="" name="vr_date" id="create_vr_date">
                        <div class="form-group col-md-3">
                            <label for="">Amount</label>
                            <input type="number" id="pay_amount" class="form-control" name="rc_amount" required
                                readonly>
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Bill Amount</label>
                            <input type="number" id="bill_amount" class="form-control" name="amount">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Balance</label>
                            <input type="hidden" id="main_amount" class="form-control" name="main_amount" required>
                            <input type="number" id="balance" class="form-control" name="balance" required readonly>
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Bill Ref</label>
                            <input type="text" class="form-control" name="bill_ref" id="bill_ref">
                            <span class="text-danger"></span>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Cheque No.</label>
                            <input type="number" class="form-control" name="cheq_no" id="cheq_no">
                            <span class="text-danger"></span>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Cheque Date</label>
                            <input type="date" class="form-control" name="cheq_date" id="cheq_date">
                            <span class="text-danger"></span>
                        </div>


                    </div>
                </div>
            </div>
        </div>


        <br>
        <div class="row">
            <div class="col-md-2 ml-auto">
                <div class="mb-1">
                    <button type="submit" class="listing_add cheq_pay_add">Save</button>
                </div>
                {{-- <div class="mb-1">
                <a href="" class="listing_exit">Back</a>
            </div> --}}
            </div>
        </div>
    </form>

    <button type="button" class="btn btn-primary" id="add_form_btn">
        Add Form
    </button>


</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#search_receipt_form', function(e) {
                e.preventDefault();

                $(".error-message").remove();

                var isValid = true; // Flag to check form validity

                // Validate `vr_no`
                var vr_no = $("#vr_no").val().trim();
                if (!vr_no) {
                    isValid = false;
                    $("#vr_no").after(
                        "<span class='error-message' style='color: #fa896b;'>VR Number is required.</span>"
                    );
                }

                // Validate `vr_date`
                var vr_date = $("#vr_date").val().trim();
                if (!vr_date) {
                    isValid = false;
                    $("#vr_date").after(
                        "<span class='error-message' style='color: #fa896b;'>VR Date is required.</span>"
                    );
                }

                // If validation fails, stop further processing
                if (!isValid) {
                    return;
                }

                var formData = $(this).serialize();

                var vr_no = $("#vr_no").val();
                var vr_date = $("#vr_date").val();




                $.ajax({
                    type: "POST",
                    url: "{{ route('cheque-payments.get-receipt') }}",
                    data: formData,
                    dataType: "json",
                    success: function(response) {

                        if (response.view) {

                            toastr.success('Receipt Found!');

                            $("#receipt_data").html(response.view);
                            $("#create_receipt_no").val(response.receipt_data.receipt_no);
                            $("#create_vr_no").val(response.receipt_data.vr_no);
                            $("#create_vr_date").val(response.receipt_data.vr_date);
                            $("#pay_amount").val(response.receipt_data.amount);

                            $("#pay_amount").val(response.receipt_data.amount);

                            $("#balance").val(response.balance);
                            $("#main_amount").val(response.balance);

                            if (response.paydone == 1) {
                                $('.cheq_pay_add').prop('disabled', true)
                                    .text('Paid')
                                    .addClass('btn-danger')
                                    .removeClass(
                                        'btn-primary'
                                    ); // If you want to remove the previous class, e.g., 'btn-primary'
                            } else {
                                $('.cheq_pay_add').prop('disabled', false)
                                    .text('Add')
                                    .removeClass('btn-danger')
                                    .addClass(
                                        'btn-primary'
                                    ); // Optional, add back another class (like 'btn-primary')
                            }

                        } else {
                            toastr.error('Receipt Not Found!');
                        }


                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        if (xhr.status === 500) {
                            const response = JSON.parse(xhr.responseText);
                            alert(response.error || 'An error occurred');
                        } else {
                            alert(`Unexpected Error: ${status}`);
                        }
                        console.error('Error Details:', xhr, status, error);
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
                    $("#balance").val(initialBalanceMain);
                } else {

                    // Calculate the new balance
                    let newBalance = initialBalanceMain - billAmount;

                    // Update the balance field
                    $("#balance").val(newBalance.toFixed(2));

                }


            });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Validate Amount
            function validateAmount() {
                const amountField = $('#pay_amount');
                const errorSpan = amountField.next('.text-danger');
                if (!amountField.val() || isNaN(amountField.val()) || Number(amountField.val()) <= 0) {
                    errorSpan.text('Amount is required');
                    return false;
                } else {
                    errorSpan.text('');
                    return true;
                }
            }

            function validatebillAmount() {
                const amountBillField = $('#bill_amount');
                const errorSpan = amountBillField.next('.text-danger');
                if (!amountBillField.val() || isNaN(amountBillField.val()) || Number(amountBillField.val()) <= 0) {
                    errorSpan.text('Bill Amount is required');
                    return false;
                } else {
                    errorSpan.text('');
                    return true;
                }
            }

            // Validate Bill Ref
            function validateBillRef() {
                const billRefField = $('#bill_ref');
                const errorSpan = billRefField.next('.text-danger');
                if (!billRefField.val().trim()) {
                    errorSpan.text('Bill Reference is required');
                    return false;
                } else {
                    errorSpan.text('');
                    return true;
                }
            }

            // Validate Cheque No.
            function validateChequeNo() {
                const amountField = $('#cheq_no');
                const errorSpan = amountField.next('.text-danger');
                if (!amountField.val() || isNaN(amountField.val()) || Number(amountField.val()) <= 0) {
                    errorSpan.text('Cheque No. is required');
                    return false;
                } else {
                    errorSpan.text('');
                    return true;
                }
            }

            // Validate Cheque Date
            function validateChequeDate() {
                const chequeDateField = $('#cheq_date');
                const errorSpan = chequeDateField.next('.text-danger');
                if (!chequeDateField.val()) {
                    errorSpan.text('Cheque Date is required');
                    return false;
                } else {
                    errorSpan.text('');
                    return true;
                }
            }

            // Attach validation on input events for real-time feedback
            $('#pay_amount').on('input', validateAmount);
            $('#bill_amount').on('input', validatebillAmount);
            $('#bill_ref').on('input', validateBillRef);
            $('#cheq_no').on('input', validateChequeNo);
            $('#cheq_date').on('input', validateChequeDate);

            // Validate on form submission
            $('#cheque-payment-create-form').on('submit', function(e) {
                const isValid = validateAmount() & validateBillRef() & validateChequeNo() &
                    validateChequeDate() & validatebillAmount();
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#cheque-payment-create-form').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        //windows load with toastr message
                        $('.text-danger').html('');
                        window.location.reload();
                    },
                    error: function(xhr) {

                        // Handle errors (e.g., display validation errors)
                        //clear any old errors

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
@endpush
