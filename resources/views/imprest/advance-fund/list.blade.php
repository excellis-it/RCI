@extends('imprest.layouts.master')
@section('title')
    Advance Fund List
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

        span.text-danger {
            font-size: 13px !important;
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
                    <h3>Provide Advance Fund To Employee</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Advance Fund Listing</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            {{-- <div class="col-md-6 text-start mb-3">
                <h5>Cash In Bank - {{ Helper::bankPayments() }}</h5>
            </div>
            <div class="col-md-6 text-end mb-3">
                <h5> Cash In hand - {{ Helper::cashPayments() }}</h5>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">


                            <div id="create_form">
                                @include('imprest.advance-fund.form')
                            </div>

                            <div id="edit_form">

                            </div>




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
                                                {{-- <th class="sorting" data-sorting_type="desc" data-column_name="emp_id"
                                                    style="cursor: pointer">EMP ID.<span id="adv_eid_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="name"
                                                    style="cursor: pointer">Name<span id="adv_ename_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th> --}}
                                                <th class="sorting" data-sorting_type="desc" data-column_name="adv_no"
                                                    style="cursor: pointer">ADV NO.<span id="adv_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="adv_date"
                                                    style="cursor: pointer">ADV DATE.<span id="adv_date_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="adv_amount"
                                                    style="cursor: pointer">ADV AMT<span id="adv_amount_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name=""
                                                    style="cursor: pointer">PROJECT </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="chq_no"
                                                    style="cursor: pointer">CHQ NO. <span id="chq_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="chq_date"
                                                    style="cursor: pointer">CHQ DATE <span id="chq_date_icon"><i
                                                            class="fa fa-arrow-down"></i></span></th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name=""
                                                    style="cursor: pointer">VARIABLE TYPE </th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll allfunds">
                                            @include('imprest.advance-fund.table')
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
    <script src="{{ asset('web_assets/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            $('#member_id').change(function() {
                var member_id = $(this).val();

                if (member_id != '') {
                    // $('.cheque-member-name').show();
                    // $('.cheque-member-desig').show();
                    // $('.cheque-bank-acc').show();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('change', '.member_id', function() {
                var member_id = $(this).val();
                // alert(member_id);
                var row = $(this).closest('.member-section'); // Target the specific row
                var mode = $('#mode').val(); // If mode is needed, you can handle it dynamically

                if (!isNaN(member_id) && member_id !== '') {
                    // Call AJAX
                    $.ajax({
                        url: "{{ route('advance-funds.get-member-details') }}",
                        type: 'GET',
                        data: {
                            member_id: member_id
                        },
                        success: function(response) {
                            // Update fields within the specific row
                            // row.find('.member_name').val(response.data.name);
                            // row.find('.bank_acc').val(response.data.bank_account.bank_acc_no);
                            // row.find('.member_id').val(response.data.member_data.id);
                            row.find('.emp_id').val(response.data.member_data.emp_id);
                            row.find('.member_name').val(response.data.name);
                            row.find('.pers_no').val(response.data.member_data.pers_no);
                            row.find('.desig').val(response.data.member_data.desigs
                                .designation);
                            row.find('.basic').val(response.data.member_data.basic);
                            row.find('.groups').val(response.data.groups.value);
                            row.find('.divisions').val(response.data.divisions.value);


                            $.ajax({
                                type: "get",
                                url: "{{ route('advance-funds.get-member-details-funds') }}",
                                data: {
                                    member_id: member_id
                                },
                                dataType: "json",
                                success: function(response) {
                                    $("#memeber-funds-table").html(response
                                        .view);
                                }
                            });


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
        $(document).ready(function() {
            $('#advance-funds-create-form').submit(function(e) {

                e.preventDefault();
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
                            $('[name="' + key + '"]').next('.text-danger').html(value[
                                0]);
                        });
                    }
                });
            });
        });
    </script>

    <script>
        // $(document).ready(function() {
        //     $('#emp_id').change(function() {
        //         var memb_id = $(this).val();
        //         if (memb_id != '') {
        //             $.ajax({
        //                 url: "{{ route('advance-funds.fetch-employee') }}",
        //                 type: "GET",
        //                 data: {
        //                     memb_id: memb_id
        //                 },
        //                 success: function(response) {
        //                     $('#mem_name').val(response.data.name);
        //                     $('#mem_desig').val(response.data.designation);
        //                     $('#mem_group').val(response.data.group);
        //                     $('#mem_division').val(response.data.division);
        //                 }
        //             });
        //         }
        //     });
        // });
    </script>

    <script>
        $(document).on('click', '#delete-advance-funds', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this Advance Fund!",
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

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('advance-funds.fetch-data') }}",
                    data: {
                        page: page,
                        sortby: sort_by,
                        sorttype: sort_type,
                        query: query
                    },
                    success: function(data) {
                        $('.allfunds').html(data.data);
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
            $(document).on('click', '.edit-route', function() {
                var route = $(this).data('route');

                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#create_form').hide();
                        $('#edit_form').show();
                        $('#edit_form').html(response.view);
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        // $('#offcanvasEdit').offcanvas('show');
                    },
                    error: function(xhr) {
                        // Handle errors
                        $('#create_form').show();
                        $('#edit_form').hide();
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        console.log(xhr);
                    }
                });
            });

            // Handle the form submission
            $(document).on('submit', '#advance-funds-edit-form', function(e) {
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
        $(document).ready(function() {
            $("#adv_amount").keyup(function(e) {
                var this_adv_amount = parseFloat($(this).val()) || 0; // Ensure it's a number
                var main_cashinhand = parseFloat($("#main_cashinhand_balance").val()) || 0;

                if (this_adv_amount > main_cashinhand) {
                    toastr.error('Cash In Hand Balance is Low');
                    $("#advfund_save_btn").attr('disabled', true);
                    $(".advamnt_msg").text('Cash In Hand Balance is Low');
                } else {
                    $("#advfund_save_btn").removeAttr('disabled');
                    $(".advamnt_msg").text('');
                }
            });
        });
    </script>
@endpush
