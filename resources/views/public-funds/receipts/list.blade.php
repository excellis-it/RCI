@extends('frontend.public-fund.layouts.master')
@section('title')
    Receipts List
@endsection

@push('styles')
    <link href="{{ asset('web_assets/css/select2.min.css') }}" rel="stylesheet" />


    <style>
        .select2-container--default .select2-selection--single {
            width: 100%;
            height: 36px;
            padding: 6px 10px;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.5;
            color: #1e1e1e;
            background-color: #EDF4FA;
            background-clip: padding-box;
            border: 1px solid #C4C4C4;
            appearance: none;
            border-radius: 7px;
            box-shadow: unset;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 20px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 32px;
            width: 28px;
        }

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
                    <h3> Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Receipts </span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- <div class="col-md-6 text-start mb-3">
                <h5>Cash In Bank - {{ Helper::bankPayments() }}</h5>
            </div>
            <div class="col-md-6 text-end mb-3">
                <h5> Cash In hand - {{ Helper::cashPayments() }}</h5>
            </div> --}}
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            @include('public-funds.receipts.form')
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row justify-content-end">

                                    <div class="col-md-5 col-lg-3 mb-2 mt-4">
                                        <div class="position-relative">
                                            <input type="text" class="form-control search_table" value=""
                                                id="search" placeholder="Search by DV No.">
                                            <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>




                                </div>
                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="vr_no">Vr No.
                                                </th>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="dv_no">DV No.
                                                </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="category_id">
                                                    Category </th>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="vr_no">Vr
                                                    Date.</th>

                                                <th>Member</th>
                                                <th>Designation</th>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="amount">
                                                    Amount </th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('public-funds.receipts.table')
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
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('receipts.fetch-data') }}",
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
    <script>
        $(document).ready(function() {


            $("#saveDraftReceipt").click(function(e) {
                e.preventDefault();
                $("#form_type").val(1);
                $("#receipts-create-form").submit();
            });

            $("#saveReceipt").click(function(e) {
                e.preventDefault();
                $("#form_type").val(0);
                $("#receipts-create-form").submit();
            });


            $('#receipts-create-form').submit(function(e) {
                e.preventDefault();


                let hasErrors = false;

                $('.form-group').each(function() {
                    const $input = $(this).find('input, textarea'); // Include inputs and textareas
                    const $radioGroup = $(this).find(
                        'input[type="radio"]'); // Find radio buttons in the group
                    const $errorSpan = $(this).find(
                        '.text-danger'); // Find the corresponding error span

                    // Check if the group contains text inputs or textareas
                    if ($input.length > 0 && !$radioGroup.length) {
                        // Validate text inputs and textareas
                        if ($input.val().trim() === '') {
                            $errorSpan.show(); // Show the error if empty
                            hasErrors = true; // Set the error flag
                            //  return false;
                        } else {
                            $errorSpan.hide(); // Hide the error if not empty
                        }
                    }

                    // Check if the group contains radio buttons
                    if ($radioGroup.length > 0) {
                        // Validate radio button selection
                        if ($radioGroup.filter(':checked').length === 0) {
                            $errorSpan.show(); // Show the error if no radio is selected
                            //   return false;
                            hasErrors = true; // Set the error flag
                        } else {
                            $errorSpan.hide(); // Hide the error if one is selected
                        }
                    }
                });


                // if (hasErrors) {
                //     return; // Exit the function and do not submit AJAX
                // }


                if (validateDynamicFields()) {

                    var formData = $(this).serialize();


                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: formData,
                        success: function(response) {
                            //windows load with toastr message
                            window.location.reload();
                        },
                        error: function(xhr) {

                            // Handle errors (e.g., display validation errors)
                            //clear any old errors
                            $('.text-danger').html('');

                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                // Assuming you have a div with class "text-danger" next to each input
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[
                                        0]);
                            });
                        }
                    });

                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // $(document).on('click', '.edit-route', function() {
            //     var route = $(this).data('route');
            //     $('#loading').addClass('loading');
            //     $('#loading-content').addClass('loading-content');
            //     $.ajax({
            //         url: route,
            //         type: 'GET',
            //         success: function(response) {
            //             $('#form').html(response.view);
            //             $('#loading').removeClass('loading');
            //             $('#loading-content').removeClass('loading-content');
            //             $('#offcanvasEdit').offcanvas('show');
            //         },
            //         error: function(xhr) {
            //             // Handle errors
            //             $('#loading').removeClass('loading');
            //             $('#loading-content').removeClass('loading-content');
            //             console.log(xhr);
            //         }
            //     });
            // });

            // Handle the form submission
            $(document).on('submit', '#public-member-edit-form', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // Handle errors (e.g., display validation errors)
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Assuming you have a span with class "text-danger" next to each input
                            $('#' + key + '-error').html(value[0]);
                        });
                    }
                });
            });
        });
    </script>

    <script>
        // $('#mode').change(function() {
        //     if ($(this).val() == 'cheque') {
        //         $('.cash-form').hide();
        //         $('.cash-details').hide();
        //         $('.cheque-sr-no').show();
        //         $('.cheque-member-desig').show();
        //         $('.cheque-bill-ref').show();
        //         $('.cheque-bank-acc').show();
        //         $('.cheque-dv-no').show();
        //         $('.cheque-chq-no').show();
        //         $('.cheque-date-no').show();
        //         $('.cheque-narration').show();
        //     } else if ($(this).val() == 'cash') {
        //         $('.cash-form').show();
        //         $('.cash-details').show();
        //         $('.cheque-sr-no').hide();
        //         $('.cheque-member-desig').hide();
        //         $('.cheque-bill-ref').hide();
        //         $('.cheque-bank-acc').hide();
        //         $('.cheque-dv-no').hide();
        //         $('.cheque-chq-no').hide();
        //         $('.cheque-date-no').hide();
        //         $('.cheque-narration').hide();
        //     } else {
        //         $('.cash-form').hide();
        //         $('.cash-details').hide();
        //         $('.cheque-sr-no').hide();
        //         $('.cheque-member-desig').hide();
        //         $('.cheque-bill-ref').hide();
        //         $('.cheque-bank-acc').hide();
        //         $('.cheque-dv-no').hide();
        //         $('.cheque-chq-no').hide();
        //         $('.cheque-date-no').hide();
        //         $('.cheque-narration').hide();
        //     }
        // });
    </script>


    <script src="{{ asset('web_assets/js/select2.min.js') }}"></script>

    <script>
        function validateDynamicFields() {
            let hasErrors = false; // Flag to track validation errors

            // Validate all inputs and textareas
            $('#create_form input, textarea').each(function() {
                const $input = $(this);
                const $errorSpan = $input.closest('.form-group').find('.text-danger');
                const inputName = $input.attr('name'); // Get the input field name

                if ($input.attr('type') === 'date' && inputName === 'vr_date') {
                    if ($input.val().trim() === '') {
                        $errorSpan.html('VR Date is required').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }
                } else if ($input.attr('type') === 'text' && inputName === 'dv_no') {
                    if ($input.val().trim() === '') {
                        $errorSpan.html('DV No is required').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }
                } else if ($input.attr('type') === 'text' && inputName === 'member_name') {
                    if ($input.val().trim() === '') {
                        $errorSpan.html('Member Name is required').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }
                } else if ($input.attr('type') === 'text' && inputName === 'desig') {
                    if ($input.val().trim() === '') {
                        $errorSpan.html('Desig is required').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }
                } else if ($input.attr('type') === 'number' && inputName === 'amount') {
                    if ($input.val().trim() === '') {
                        $errorSpan.html('Amount is required').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }
                }
                // else if ($input.attr('type') === 'text' && inputName === 'narration') {
                //     if ($input.val().trim() === '') {
                //         $errorSpan.html('Narration is required').show();
                //         hasErrors = true;
                //     } else {
                //         $errorSpan.hide();
                //     }
                // }
            });

            // Validate dynamic fields
            $('#dynamic-fields .form-group').each(function() {
                const $input = $(this);
                const $errorSpan = $input.closest('.form-group').find('.text-danger');
                const inputName = $input.attr('name'); // Get the input field name

                if ($input.attr('type') === 'date' && inputName === 'vr_date') {
                    if ($input.val().trim() === '') {
                        $errorSpan.html('VR Date is required').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }
                } else if ($input.attr('type') === 'text' && inputName === 'dv_no') {
                    if ($input.val().trim() === '') {
                        $errorSpan.html('DV No is required').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }
                } else if ($input.attr('type') === 'text' && inputName === 'member_name') {
                    if ($input.val().trim() === '') {
                        $errorSpan.html('Member Name is required').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }
                } else if ($input.attr('type') === 'text' && inputName === 'desig') {
                    if ($input.val().trim() === '') {
                        $errorSpan.html('Desig is required').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }

                } else if ($input.attr('type') === 'number' && inputName === 'amount') {
                    if ($input.val().trim() === '') {
                        $errorSpan.html('Amount is required').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }
                }
                // else if ($input.attr('type') === 'text' && inputName === 'narration') {
                //     if ($input.val().trim() === '') {
                //         $errorSpan.html('Narration is required').show();
                //         hasErrors = true;
                //     } else {
                //         $errorSpan.hide();
                //     }
                // }
            });




            //validate for textarea group

            /*   $('#create_form .form-group').each(function() {
                   const $textarea = $(this).find('textarea');
                   const $errorSpan = $(this).find('.text-danger');

                   if ($textarea.length > 0) {
                       if ($textarea.val().trim() === '') {
                           $errorSpan.text('Narration is required').show();
                           hasErrors = true;
                       } else {
                           $errorSpan.hide();
                       }
                   }
               });*/


            // Validate radio button groups
            $('#create_form .form-group').each(function() {
                const $radioGroup = $(this).find('input[type="radio"]');
                const $errorSpan = $(this).find('.text-danger');

                if ($radioGroup.length > 0) {
                    if ($radioGroup.filter(':checked').length === 0) {
                        $errorSpan.text('Please select a category').show();
                        hasErrors = true;
                    } else {
                        $errorSpan.hide();
                    }
                }
            });

            return !hasErrors; // Return true if no errors
        }

        // Use event delegation for dynamic fields
        $('#dynamic-fields').on('blur', 'input, textarea', function() {
            validateDynamicFields();
        });


        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            $('#member_id').change(function() {
                var member_id = $(this).val();

                if (member_id != '') {
                    $('.cheque-member-name').show();
                    $('.cheque-member-desig').show();
                    $('.cheque-bank-acc').show();
                }


                // if(member_id == 'Other')
                // {
                //     $('.cheque-member-desig').show();
                // }else{
                //     $('.cheque-member-desig').hide();
                // }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Add new section
            $('#add-section').on('click', function() {
                const nextSrNo = $('.dynamic-section').length + 1;
                let newSection = `
           <div class="dynamic-section dynamic-fields">
                                <div class="row mb-3">
                <div class="col-md-2">
                    <label>Sr No.</label>
                    <input type="text" class="form-control sr-no" name="sr_no[]" readonly value="${nextSrNo}">
                </div>

                <div class="form-group col-md-2 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Member</label>
                        </div>
                        <div class="col-md-12">
                            <select class="js-example-basic-single form-control member_id" name="member_id[]">
                                <option value="">Select</option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                                // <option value="Other">Other</option>
                            </select>
                            <span class="text-danger"  style="display:none;"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2 cheque-member-name">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Member Name</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control member_name" readonly>
                            <span class="text-danger"  style="display:none;">Member name is required</span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2 cheque-member-desig">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Desig.</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control desig" readonly>
                            <span class="text-danger"  style="display:none;">Desig is required</span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2 cheque-bank-acc">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Bank Acc</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control bank_acc" readonly>

                        </div>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label>Amount</label>
                    <input type="number" step="any" class="form-control" name="member_amount[]">
                    <span class="text-danger"  style="display:none;">Amount is required</span>
                </div>
                <div class="form-group col-md-2">
                    <label>Bill reference</label>
                    <input type="text" class="form-control" name="bill_ref[]">

                </div>
                <div class="form-group col-md-2">
                    <label>Cheque No.</label>
                    <input type="text" class="form-control" name="cheq_no[]">

                </div>
                <div class="form-group col-md-2">
                    <label>Cheque Date</label>
                    <input type="date" class="form-control" name="cheq_date[]">.

                </div>
                    <button type="button" class="btn btn-danger remove-section remove_trash"><i
                                    class="ti ti-trash"></i></button>

             </div>
            </div>
            `;
                $('#dynamic-fields').append(newSection);
                updateSerialNumbers();
                updateRemoveButtonVisibility();
                $('.js-example-basic-single').select2();
            });



            // Remove last section only
            $(document).on('click', '.remove-section', function() {
                $(this).closest('.dynamic-section').remove();
                updateSerialNumbers();
                updateRemoveButtonVisibility();
            });

            // Update Sr No
            function updateSerialNumbers() {
                $('.sr-no').each(function(index) {
                    $(this).val(index + 1);
                });
            }

            // Update Remove Button Visibility
            function updateRemoveButtonVisibility() {
                $('.remove-section').hide(); // Hide all remove buttons
                $('.dynamic-section').last().find('.remove-section').show(); // Show only for the last section
            }

            //     $('.form-group').each(function () {
            //     const $input = $(this).find('input'); // Find the input in the current group
            //     const $errorSpan = $(this).find('.text-danger'); // Find the corresponding error span

            //     // Only perform validation if the input exists
            //     if ($input.length > 0) {
            //         if ($input.val().trim() == '') {
            //             $errorSpan.show(); // Show the error if input is empty
            //         } else {
            //             $errorSpan.hide(); // Hide the error if input is not empty
            //         }
            //     }
            // });
            // Initial setup
            updateRemoveButtonVisibility();

            //   bindDynamicValidation();

        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('change', '.member_id', function() {
                var member_id = $(this).val();
                // alert(member_id);
                var row = $(this).closest('.dynamic-section'); // Target the specific row
                var mode = $('#mode').val(); // If mode is needed, you can handle it dynamically

                if (!isNaN(member_id) && member_id !== '') {
                    // Call AJAX
                    $.ajax({
                        url: "{{ route('receipts.get-member-desig') }}",
                        type: 'GET',
                        data: {
                            member_id: member_id
                        },
                        success: function(response) {
                            // Update fields within the specific row
                            row.find('.member_name').val(response.data.name);
                            row.find('.desig').val(response.data.desig);
                            row.find('.bank_acc').val(response.data.bank_account.bank_acc_no);
                        },
                        error: function(xhr) {
                            // Handle errors
                            console.log(xhr);
                        }
                    });
                } else {
                    // Clear fields within the specific row
                    row.find('.member-name').val('');
                    row.find('.desig').val('');
                }
            });
        });
    </script>

    <script>
        function getEditForm(id) {
            $.ajax({
                url: "{{ route('receipts.get-edit-receipt') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    receipt_id: id,
                },
                dataType: 'json',
                success: function(response) {
                    // window.location.reload();
                    $("#create_form").hide();
                    $("#edit_form").show();
                    $("#edit_form").html(response.view);
                },
                error: function(xhr) {
                    // Handle errors (e.g., display validation errors)
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        // Assuming you have a div with class "text-danger" next to each input
                        $('[name="' + key + '"]').next('.text-danger').html(value[
                            0]);
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
                    text: "To delete this Receipt!",
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

    <script>
        $(document).ready(function() {
            // Event handler for vr_date change
            $('#vr_date').change(function() {
                const vrDate = $(this).val();

                if (vrDate) {
                    // Show loading indicator if desired
                    // $('#vr_no').addClass('loading');

                    // Make AJAX request to get last VR No.
                    $.ajax({
                        url: "{{ route('receipts.get-last-vr-no') }}",
                        type: 'GET',
                        data: {
                            vr_date: vrDate
                        },
                        success: function(response) {
                            if (response.success) {
                                // Update VR No. field with the new value
                                $('#vr_no').val(response.vr_no);
                            }
                        },
                        error: function(xhr) {
                            console.error('Error fetching VR No:', xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
