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
                <h5>Last Payment - {{ !empty($lastPayment->id) ? $lastPayment->id : '' }}</h5>
            </div>
            <div class="col-md-6 text-end mb-3">
                <h5>Last Payment Date -
                    {{ !empty($lastPayment->created_at) != null ? $lastPayment->created_at->format('Y-m-d') : '' }}</h5>
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
                                            <input type="text" class="form-control search_table" value=""
                                                id="search" placeholder="Search">
                                            <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="receipt_no"
                                                    style="cursor: pointer">RCT No<span id="sr_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="vr_no"
                                                    style="cursor: pointer">Vr No<span id="vr_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="vr_date"
                                                    style="cursor: pointer">Vr Date<span id="vr_date_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="amount"
                                                    style="cursor: pointer">Amount<span id="amount_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="bill_ref"
                                                    style="cursor: pointer">Bill Ref<span id="amount_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="cheq_no"
                                                    style="cursor: pointer">Cheque No.<span id="amount_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>


                                                <th class="sorting" data-sorting_type="desc" data-column_name="cheq_date"
                                                    style="cursor: pointer">Cheque Date<span id="amount_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="created_at"
                                                    style="cursor: pointer">Created On<span id="amount_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('frontend.public-fund.cheque-payment.table')
                                        </tbody>
                                    </table>
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
                        $('tbody').html(data.data);
                    }
                });
            }

            $(document).on('keyup', '#search', function() {
                var query = $('#search').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                fetch_data(page, sort_type, column_name, query);
            });

            $(document).on('click', '.sorting', function() {
                var column_name = $(this).data('column_name');
                var order_type = $(this).data('sorting_type');
                var reverse_order = '';
                if (order_type == 'asc') {
                    $(this).data('sorting_type', 'desc');
                    reverse_order = 'desc';
                    // clear_icon();
                    $('#' + column_name + '_icon').html(
                        '<i class="fa fa-arrow-down"></i>');
                }
                if (order_type == 'desc') {
                    // alert(order_type);
                    $(this).data('sorting_type', 'asc');
                    reverse_order = 'asc';
                    // clear_icon();
                    $('#' + column_name + '_icon').html(
                        '<i class="fa fa-arrow-up"></i>');
                }
                $('#hidden_column_name').val(column_name);
                $('#hidden_sort_type').val(reverse_order);
                var page = $('#hidden_page').val();
                var query = $('#search').val();
                fetch_data(page, reverse_order, column_name, query);
            });

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#search').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query);
            });

        });
    </script>


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
                        "<span class='error-message' style='color: #fa896b;'>VR Number is required.</span>");
                }

                // Validate `vr_date`
                var vr_date = $("#vr_date").val().trim();
                if (!vr_date) {
                    isValid = false;
                    $("#vr_date").after(
                        "<span class='error-message' style='color: #fa896b;'>VR Date is required.</span>");
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
            $('#bill_ref').on('input', validateBillRef);
            $('#cheq_no').on('input', validateChequeNo);
            $('#cheq_date').on('input', validateChequeDate);

            // Validate on form submission
            $('#cheque-payment-create-form').on('submit', function(e) {
                const isValid = validateAmount() & validateBillRef() & validateChequeNo() &
                    validateChequeDate();
                if (!isValid) {
                    e.preventDefault();
                }
            });
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

        function getEditForm(vr_no, date) {
            // Serialize form data for search_receipt_form functionality
            var formData = $('#search_receipt_form').serialize();

            $.ajax({
                url: "{{ route('cheque-payments.get-edit-payment') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    vr_no: vr_no,
                    vr_date: date,

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-cheque').forEach(function(button) {
            button.addEventListener('click', function() {
                const deleteUrl = this.dataset.deleteUrl;

                Swal.fire({
                    title: 'Are you sure want to delete?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to the delete URL
                        window.location.href = deleteUrl;
                    }
                });
            });
        });
    });
</script>
@endpush
