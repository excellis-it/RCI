@extends('frontend.public-fund.layouts.master')
@section('title')
    Cheque Payment List
@endsection

@push('styles')
    <style>
        .swal2-warning.swal2-icon-show .swal2-icon-content {
            font-size: 0.75em !important;
        }
    </style>
@endpush

@php
    use App\Helpers\Helper;
@endphp

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Cheque Payment Listing</h3>
                    <ul class="breadcome-menu mb-0">

                        <li><span class="bread-blod">Listing</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-start mb-3">
                <h5>Last Payment - {{ !empty($lastPayment->vr_no) ? $lastPayment->vr_no : '' }}</h5>
            </div>
            <div class="col-md-6 text-end mb-3">
                <h5>Last Payment Date -
                    {{ !empty($lastPayment->vr_date) != null ? $lastPayment->vr_date : '' }}</h5>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="create_form">
                            @include('frontend.public-fund.cheque-payment.form')
                        </div>

                        <div id="edit_form">

                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row justify-content-end">

                                    <div class="col-md-5 col-lg-3 mb-2 mt-4">
                                        <div class="position-relative">
                                            <input type="text" class="form-control search_table searchval" value=""
                                                id="search" placeholder="Search by Cheque No.">
                                            <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-lg-3 mb-2 mt-4">
                                        <div class="position-relative">
                                            <input type="date" class="form-control search_table searchval" value=""
                                                id="search-date" placeholder="Search by Cheque Date">
                                            <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="rounded-2 listmain">

                                    <div class="allpayments_table">
                                        @include('frontend.public-fund.cheque-payment.table')
                                    </div>

                                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                    <input type="hidden" name="hidden_column_name" id="hidden_column_name"
                                        value="id" />
                                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        //rcpt_no  on chnage
        $(document).on('change', '#rcpt_no', function() {
            var rcpt_no = $(this).val();

            $.ajax({
                url: "{{ route('cheque-payments.get-rct-details') }}",
                type: 'GET',
                data: {
                    rcpt_no: rcpt_no
                },
                success: function(response) {

                    $('.cheque-payment-details').html(response.view);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('cheque-payments.fetch-data') }}",
                    data: {
                        page: page,
                        sortby: sort_by,
                        sorttype: sort_type,
                        query: query
                    },
                    success: function(data) {
                        $('.allpayments_table').html(data.data);
                    }
                });
            }

            $(document).on('keyup', '#search', function() {
                var query = $('#search').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                $('#search-date').val('');
                fetch_data(page, sort_type, column_name, query);
            });

            $(document).on('change', '#search-date', function() {
                var query = $('#search-date').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                $('#search').val('');
                fetch_data(page, sort_type, column_name, query);
            });

            // $(document).on('click', '.sorting', function() {
            //     var column_name = $(this).data('column_name');
            //     var order_type = $(this).data('sorting_type');
            //     var reverse_order = '';
            //     if (order_type == 'asc') {
            //         $(this).data('sorting_type', 'desc');
            //         reverse_order = 'desc';
            //         // clear_icon();
            //         $('#' + column_name + '_icon').html(
            //             '<i class="fa fa-arrow-down"></i>');
            //     }
            //     if (order_type == 'desc') {
            //         // alert(order_type);
            //         $(this).data('sorting_type', 'asc');
            //         reverse_order = 'asc';
            //         // clear_icon();
            //         $('#' + column_name + '_icon').html(
            //             '<i class="fa fa-arrow-up"></i>');
            //     }
            //     $('#hidden_column_name').val(column_name);
            //     $('#hidden_sort_type').val(reverse_order);
            //     var page = $('#hidden_page').val();
            //     var query = $('#search').val();
            //     fetch_data(page, reverse_order, column_name, query);
            // });

            // $(document).on('click', '.pagination a', function(event) {
            //     event.preventDefault();
            //     var page = $(this).attr('href').split('page=')[1];
            //     $('#hidden_page').val(page);
            //     var column_name = $('#hidden_column_name').val();
            //     var sort_type = $('#hidden_sort_type').val();

            //     var query = $('#search').val();

            //     $('li').removeClass('active');
            //     $(this).parent().addClass('active');
            //     fetch_data(page, sort_type, column_name, query);
            // });

        });
    </script>





    {{-- <script>
        // $(document).ready(function() {
        //     $(document).on('click', '.edit-route', function() {
        //         var route = $(this).data('route');
        //         $('#loading').addClass('loading');
        //         $('#loading-content').addClass('loading-content');
        //         $.ajax({
        //             url: route,
        //             type: 'GET',
        //             success: function(response) {
        //                 $('#form').html(response.view);
        //                 $('#loading').removeClass('loading');
        //                 $('#loading-content').removeClass('loading-content');
        //                 $('#offcanvasEdit').offcanvas('show');
        //             },
        //             error: function(xhr) {
        //                 // Handle errors
        //                 $('#loading').removeClass('loading');
        //                 $('#loading-content').removeClass('loading-content');
        //                 console.log(xhr);
        //             }
        //         });
        //     });

        //     // Handle the form submission
        //     $(document).on('submit', '#cheque-payment-edit-form', function(e) {
        //         e.preventDefault();
        //         var formData = $(this).serialize();
        //         $.ajax({
        //             url: $(this).attr('action'),
        //             type: $(this).attr('method'),
        //             data: formData,
        //             success: function(response) {
        //                 window.location.reload();
        //             },
        //             error: function(xhr) {
        //                 // Handle errors (e.g., display validation errors)
        //                 $('.text-danger').html('');
        //                 var errors = xhr.responseJSON.errors;
        //                 $.each(errors, function(key, value) {
        //                     // Assuming you have a div with class "text-danger" next to each input
        //                     $('[name="' + key + '"]').next('.text-danger').html(value[
        //                         0]);
        //                 });
        //             }
        //         });
        //     });
        // });
    </script> --}}



    <script>
        //    function getEditForm(id) {
        //     $.ajax({
        //         url: "{{ route('cheque-payments.get-edit-payment') }}",
        //         type: 'post',
        //         data: {
        //             _token: "{{ csrf_token() }}",
        //             vr_no: id,
        //         },
        //         dataType: 'json',
        //         success: function(response) {
        //             $("#create_form").hide();
        //             $("#edit_form").show();
        //             $("#edit_form").html(response.view); // Inject the view in the edit form

        //             $("#receipt_data").html(response.view);
        //             $("#create_receipt_no").val(response.receipt_data.receipt_no);
        //             $("#create_vr_no").val(response.receipt_data.vr_no);
        //             $("#create_vr_date").val(response.receipt_data.vr_date);
        //             $("#pay_amount").val(response.receipt_data.amount);
        //         },
        //         error: function(xhr) {
        //             var errors = xhr.responseJSON.errors;
        //             $.each(errors, function(key, value) {
        //                 $('[name="' + key + '"]').next('.text-danger').html(value[0]);
        //             });
        //         }
        //     });
        // }

        function getEditForm(vr_no, date, id) {
            // Serialize form data for search_receipt_form functionality
            var formData = $('#search_receipt_form').serialize();

            $.ajax({
                url: "{{ route('cheque-payments.get-edit-payment') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    vr_no: vr_no,
                    vr_date: date,
                    id: id,

                },
                dataType: 'json',
                success: function(response) {



                    if (response.view) {
                        // Populate the edit form
                        $("#create_form").hide();
                        $("#edit_form").show();
                        $("#edit_form").html(response.view); // Inject the view into the edit form


                    } else {

                    }

                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $('[name="' + key + '"]').next('.text-danger').html(value[0]);
                    });
                }
            });
        }
    </script>


    <script>
        $(document).on('click', '#delete', function() {
            //swal alert then call ajax
            var route = $(this).data('route');

            swal({
                    title: "Are you sure?",
                    text: "To delete this Cheque Payment!",
                    type: "warning",
                    confirmButtonText: "Yes",
                    showCancelButton: true
                })
                .then((result) => {
                    if (result.value) {
                        window.location = $(this).data('route');
                    } else if (result.dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            'Your stay here :)',
                            'error'
                        )
                    }
                })
        });
    </script>







    {{-- //////// --}}


    <script>
        $(document).ready(function() {


            $(document).on('submit', '#search_receipt_form', function(e) {

                e.preventDefault();

                $(".error-message").remove();




                var isValid = true; // Flag to check form validity

                // Validate `vr_no`
                var vr_no = $("#vr_no").val();
                if (!vr_no) {
                    isValid = false;
                    $("#vr_no").after(
                        "<span class='error-message' style='color: #fa896b;'>VR Number is required.</span>"
                    );
                }

                // Validate `vr_date`
                var vr_date = $("#vr_date").val();
                if (!vr_date) {
                    isValid = false;
                    $("#vr_date").after(
                        "<span class='error-message' style='color: #fa896b;'>VR Date is required.</span>"
                    );
                }

                // If validation fails, stop further processing
                if (!isValid && !vForm()) {
                    toastr.error('Please fill required fields');
                    return;
                }




                var formData = $(this).serialize();

                var vr_no = $("#vr_no").val();
                var vr_date = $("#vr_date").val();

                var cheq_no = $("#cheq_no").val();
                var cheq_date = $("#cheq_date").val();




                $.ajax({
                    type: "POST",
                    url: "{{ route('cheque-payments.get-receipt') }}",
                    data: formData,
                    dataType: "json",
                    success: function(response) {

                        if (response.view) {

                            $('.emsg').hide();

                            var data_id = response.rct_id; // Example ID
                            var elementId = 'rcpt_div_' + data_id;

                            // Check if an element with the specific ID exists within the class container
                            if (!$('.fnd_receipts[id="' + elementId + '"]').length) {

                                $(".cheq_pay_add").show();

                                toastr.success('Receipt Found!');
                                // If it doesn't exist, append the response view
                                $("#receipt_data").append(response.view);

                                $("#cheq_no_" + data_id).val(cheq_no);
                                $("#cheq_date_" + data_id).val(cheq_date);

                                //  $("#receipt_data").append(response.view);
                                $("#receipt_id_" + data_id).val(data_id);
                                // $("#category_id_" + data_id).val(response.receipt_data
                                //     .category_id_);
                                $("#create_receipt_no_" + data_id).val(response.receipt_data
                                    .receipt_no);
                                $("#create_vr_no_" + data_id).val(response.receipt_data.vr_no);
                                $("#create_vr_date_" + data_id).val(response.receipt_data
                                    .vr_date);
                                $("#pay_amount_" + data_id).val(response.receipt_data.amount);

                                //  $("#pay_amount2_" + data_id).text(response.receipt_data.amount);

                                //    $("#pay_amount_"+data_id).val(response.receipt_data.amount);


                                $("#main_amount_" + data_id).val(response.balance);


                                $("#bill_amount_" + data_id).val(response.balance);

                                $("#balance_" + data_id).val(0);

                                if (response.paydone == 1) {
                                    // $('.cheq_pay_add').prop('disabled', true)
                                    //     .text('Paid')
                                    //     .addClass('btn-danger')
                                    //     .removeClass(
                                    //         'btn-primary'
                                    //     ); // If you want to remove the previous class, e.g., 'btn-primary'
                                    // $("#rct_input_div_" + data_id).hide();
                                    $("#rct_input_div_" + data_id).html(
                                        '<center> <p class="text-danger">PAID</p></center>');
                                    $("#create_ispaid_" + data_id).val(response.paydone);
                                } else {
                                    // $('.cheq_pay_add').prop('disabled', false)
                                    //     .text('Save')
                                    //     .removeClass('btn-danger')
                                    //     .addClass(
                                    //         'btn-primary'
                                    //     ); // Optional, add back another class (like 'btn-primary')
                                    $("#create_ispaid_" + data_id).val(response.paydone);
                                }


                                /////

                                $("#bill_amount_" + data_id).on("keyup load", function() {
                                    let initialBalanceMain = parseFloat($(
                                        "#main_amount_" + data_id).val());
                                    let payAmount = parseFloat($("#balance_" + data_id)
                                        .val()); // Pay amount from response
                                    let initialBalance = parseFloat($("#balance_" +
                                            data_id)
                                        .val()); // Initial balance from response
                                    let billAmount = $(this)
                                        .val(); // Get the bill amount entered

                                    // Check if the input is empty
                                    if (billAmount.trim() === "") {
                                        // Reset balance to the pay amount
                                        $("#balance_" + data_id).val(initialBalanceMain
                                            .toFixed(
                                                2));
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
                                        toastr.error(
                                            'The bill amount cannot be greater than the balance amount'
                                        );
                                        billAmount =
                                            initialBalanceMain; // Reset bill amount to the maximum allowable value
                                        $(this).val(
                                            ''
                                        ); // Update the input field with the corrected value
                                        $("#balance_" + data_id).val(
                                            initialBalanceMain);
                                    } else {

                                        // Calculate the new balance
                                        let newBalance = initialBalanceMain -
                                            billAmount;

                                        // Update the balance field
                                        $("#balance_" + data_id).val(newBalance.toFixed(
                                            2));

                                    }


                                });


                                ////

                                $("#vr_no").val('');
                                $("#vr_date").val('');

                                $(document).on('keyup', '.rct-chqno', function() {
                                    let value = $(this)
                                        .val(); // Get the value of the input
                                    $('.rct-chqno-in').val(
                                        value
                                    ); // Set the value to all target-class inputs
                                });

                                $(document).on('change', '.rct-chqdt', function() {
                                    let value = $(this)
                                        .val(); // Get the value of the input
                                    $('.rct-chqdt-in').val(
                                        value
                                    ); // Set the value to all target-class inputs
                                });

                                $('.bill-amount').on('keyup', function() {
                                    calculateBillAmountSum();
                                    getTotalBillAmount();
                                });



                                // $('.receipt_member_data_form').each(function() {
                                //     let $table = $(this);

                                //     // Listen for changes in bill amount inputs
                                //     $table.on('input', '.bill-amount', function() {
                                //         let $billAmountInput = $(this);
                                //         let $row = $billAmountInput.closest(
                                //             'tr');
                                //         let $mainpayAmountInput = $row.find(
                                //             'input[name="main_pay_amount['+data_id+'][]"]'
                                //         );
                                //         let $payAmountInput = $row.find(
                                //             'input[name="rc_amount['+data_id+'][]"]');
                                //         let $balanceInput = $row.find(
                                //             'input[name="balance['+data_id+'][]"]');
                                //         let $errorSpan = $billAmountInput
                                //             .siblings('.text-danger');
                                //         let $upperBillAmount = $table.find(
                                //             '.upper-bill-amount');

                                //         // Get values
                                //         let payAmount = parseFloat(
                                //             $mainpayAmountInput.val()) || 0;
                                //         let billAmount = parseFloat(
                                //             $billAmountInput.val()) || 0;

                                //         // Check if bill amount is greater than pay amount
                                //         if (billAmount > payAmount) {
                                //             // Show error message
                                //             $errorSpan.text(
                                //                 'Bill amount cannot exceed pay amount.'
                                //             );
                                //             $balanceInput.val(payAmount);
                                //             $billAmountInput.val('');
                                //         } else {
                                //             // Clear error message and update balance
                                //             $errorSpan.text('');
                                //             let balance = payAmount -
                                //                 billAmount;
                                //             $balanceInput.val(balance.toFixed(
                                //                 2));
                                //         }

                                //         // Calculate total bill amount for the table
                                //         let totalBillAmount = 0;
                                //         $table.find('.bill-amount-lower').each(
                                //             function() {
                                //                 let value = parseFloat($(
                                //                     this).val()) || 0;
                                //                 totalBillAmount += value;
                                //             });

                                //         console.log(totalBillAmount);

                                //         // Update the upper-bill-amount value
                                //         $upperBillAmount.val(totalBillAmount
                                //             .toFixed(2));
                                //     });
                                // });

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
                                        let $rctba = $table.find(
                                            '.rctba');

                                        // Get numeric values
                                        let mainPayAmount = parseFloat(
                                            $mainPayAmountInput.val()) || 0;
                                        let billAmount = parseFloat(
                                            $billAmountInput.val()) || 0;

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

                                        $rctba.text(
                                            totalBillAmount.toFixed(2));

                                    });
                                });

                                setTimeout(() => {
                                    getTotalBillAmount();
                                }, 1200);





                            } else {
                                console.log('Element with ID "' + elementId +
                                    '" already exists in the class. Skipping append.');
                                toastr.success('Receipt Already Added!');
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
        // $(document).ready(function() {
        // Common validation function
        function validateField(field, errorMessage, condition) {
            const errorSpan = field.siblings('.text-danger');
            errorSpan.text(condition() ? errorMessage : '');
            return !condition();
        }

        // Dynamic validations based on classes
        function validateRow(row) {


            const billAmountValid = validateField(
                row.find('.bill-amount'),
                'Bill Amount is required',
                () => !row.find('.bill-amount').val() || isNaN(row.find('.bill-amount').val()) || Number(row
                    .find('.bill-amount').val()) <= 0
            );

            const chequeNoValid = validateField(
                $('.rct-chqno'),
                'Cheque No. is required',
                () => $('.rct-chqno').val()
            );

            const chequeDateValid = validateField(
                $('.rct-chqdt'),
                'Cheque Date is required',
                () => $('.rct-chqdt').val()
            );

            return billAmountValid && chequeNoValid && chequeDateValid;
        }

        // Attach validation to dynamically added rows
        $('.fnd_receipts').on('input', '.bill-amount, .rct-chqno, .rct-chqdt',
            function() {
                const row = $(this).closest('.fnd_receipts');
                validateRow(row);
            });


        //  });
    </script>

    <script>
        function vForm() {
            let isValid = true;

            // Validate inputs with the class "validate-input"
            $('.vinput').each(function() {
                const inputVal = $(this).val().trim();
                const errorSpan = $(this).next('.emsg');

                if (inputVal === '') {
                    errorSpan.text('This field is required').show(); // Show error message
                    isValid = false;
                } else {
                    errorSpan.hide(); // Clear error message
                }
            });

            return isValid;
        }
        $(document).ready(function() {

            $('#cheque-payment-create-form').submit(function(e) {
                e.preventDefault();

                let allValid = true;

                $('.fnd_receipts').each(function() {
                    if (!validateRow($(this))) {
                        allValid = false;
                    }
                });

                if (!allValid) {
                    //  toastr.error('Please fill required fields');
                    // return; // Exit the function, prevent submission.
                }

                if (!vForm()) {
                    toastr.error('Please fill required fields');
                    return;
                }

                let difference = calculateBillAmountSum();

                // If the difference is not zero, prevent form submission
                if (difference !== 0) {
                    //   e.preventDefault(); // Prevent form submission
                    toastr.error('Cheque amount is different');
                    console.log('diff balance');
                    return;
                } else {
                    console.log('same balance');

                }

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        //windows load with toastr message
                        $('.emsg').hide();
                        $('.text-danger').hide();

                        toastr.success('Payment Added');

                        setTimeout(() => {
                            window.location.reload();
                        }, 800);
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

    <script>
        // Function to calculate the sum of all bill amounts
        function calculateBillAmountSum() {
            let totalAmount = 0;

            // Loop through each bill amount input field and sum the values
            // $('.upper-bill-amount').each(function() {
            //     let billAmount = parseFloat($(this).val()) || 0; // Get value and default to 0 if not a valid number
            //     totalAmount += billAmount;
            // });

            $('.bill-amount-lower').each(function() {
                let billAmount = parseFloat($(this).val()) || 0; // Get value and default to 0 if not a valid number
                totalAmount += billAmount;
            });



            // Get main amount value
            let mainAmount = parseFloat($('#main_cheq_amount').val()) || 0;
            let difference = mainAmount - totalAmount; // Calculate the difference

            // Optionally, you can display the sum and difference in a specific element
            $('#total_amount').text('Total Bill Amount: ' + totalAmount);
            $('#difference_amount').text('Difference: ' + difference);
            // alert('mainAmount: ' + mainAmount);
            // alert('Total Bill Amount: ' + totalAmount);
            // alert('Difference: ' + difference);

            return difference; // Return the difference
        }

        // Trigger the calculation whenever a bill amount input changes
        $('.upper-bill-amount').on('input', function() {
            calculateBillAmountSum();
        });

        function getTotalBillAmount() {
            // Initialize total amount to 0
            let totalAmount = 0;

            // Iterate over each element with the class 'bill-amount-lower'
            $('.bill-amount-lower').each(function() {
                // Parse the text or value as a float and add it to the total amount
                let amount = parseFloat($(this).val()) || 0;
                totalAmount += amount;
            });

            // Log or use the total amount
            console.log('Total Amount:', totalAmount);
            $("#setTotalBillAmount").text(totalAmount.toFixed(2));

        }
    </script>

    <script>
        // $(document).ready(function() {
        //     var groupedRows = {};

        //     // Loop through each row in the table body
        //     $('table tbody tr').each(function() {
        //         var chequeNo = $(this).find('td:eq(5)').text().trim(); // Get the Cheque No. (6th column)

        //         // If this Cheque No. is already in the groupedRows object
        //         if (groupedRows[chequeNo]) {
        //             // Append the necessary columns from this row into the grouped row
        //             var newData = $(this).find('td:eq(3), td:eq(4), td:eq(6), td:eq(7)').html();
        //             groupedRows[chequeNo].find('td:eq(3)').append('<br>' +
        //                 newData); // Append to the Amount, Bill Ref, Cheque Date, and Created On columns
        //             $(this).remove(); // Remove the current row from the table
        //         } else {
        //             // If this is the first row with this Cheque No., store the entire row
        //             groupedRows[chequeNo] = $(this);
        //         }
        //     });

        //     // After processing, append all the grouped rows back to the table
        //     for (var chequeNo in groupedRows) {
        //         $('table tbody').append(groupedRows[chequeNo]);
        //     }
        // });
    </script>

    <script>
        $(document).ready(function() {
            // Attach event handler to all .receipt_member_data_form tables

        });
    </script>

    <script>
        $(document).ready(function() {
            $("#cheq_date").change(function(e) {
                e.preventDefault();
                var chqdate = $(this).val();
                $("#search_receipt_form").show();
                $("#vr_date").val(chqdate);
                $("#vr_date").attr("max", chqdate);

            });
        });
    </script>
@endpush
