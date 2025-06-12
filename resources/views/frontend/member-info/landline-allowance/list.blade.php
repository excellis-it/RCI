@extends('frontend.layouts.master')
@section('title')
    Landline/Mobile/Broad-Band Allowance
@endsection

@push('styles')
@endpush

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Landline/Mobile/Broad-Band Allowance Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Landline/Mobile/Broad-Band Allowance</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            @include('frontend.member-info.landline-allowance.form')
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
                                                <th class="sorting" data-sorting_type="asc" data-column_name="id"
                                                    style="cursor: pointer">ID <span id="id_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc" data-column_name="member_name"
                                                    style="cursor: pointer">Member Name <span id="member_name_icon"></span>
                                                </th>
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name="landline_amount" style="cursor: pointer">Landline
                                                    <span id="landline_amount_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc" data-column_name="mobile_amount"
                                                    style="cursor: pointer">Mobile <span id="mobile_amount_icon"></span>
                                                </th>
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name="broadband_amount" style="cursor: pointer">Broadband
                                                    <span id="broadband_amount_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc"
                                                    data-column_name="entitle_amount" style="cursor: pointer">Entitled <span
                                                        id="entitle_amount_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc" data-column_name="month"
                                                    style="cursor: pointer">Month <span id="month_icon"></span></th>
                                                <th class="sorting" data-sorting_type="asc" data-column_name="year"
                                                    style="cursor: pointer">Year <span id="year_icon"></span></th>
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('frontend.member-info.landline-allowance.table')
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
        $(document).on('click', '#delete', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this family details!",
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
                    url: "{{ route('member-mobile-allowance.fetch-data') }}",
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
            $('#member-landline-create-form').submit(function(e) {
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
        $(document).ready(function() {
            $(document).on('click', '.edit-route', function() {
                var route = $(this).data('route');
                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#form').html(response.view);
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        $('#offcanvasEdit').offcanvas('show');
                    },
                    error: function(xhr) {
                        // Handle errors
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        console.log(xhr);
                    }
                });
            });

            // Handle the form submission
            $(document).on('submit', '#member-landline-edit-form', function(e) {
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
            $(document).on('change', '#member_id', function() {
                let memberId = $(this).val();

                // Update hidden input value
                $('input[name="member_id"]').val(memberId);

                if (memberId) {
                    $.ajax({
                        url: "{{ route('get.entitle.amount') }}",
                        type: "GET",
                        data: {
                            member_id: memberId
                        },
                        success: function(response) {
                            $('#entitle_amount').val(response.entitle_amount);
                        },
                        error: function(xhr) {
                            console.error("Error fetching entitle amount:", xhr);
                        }
                    });
                } else {
                    $('#entitle_amount').val('');
                }
            });
        });
    </script>
    <script>
        function parseAmount(val) {
            return parseFloat(val) || 0;
        }

        function validateTotalAmount() {
            let landline = parseAmount($('input[name="landline_amount"]').val());
            let mobile = parseAmount($('input[name="mobile_amount"]').val());
            let broadband = parseAmount($('input[name="broadband_amount"]').val());
            let entitle = parseAmount($('#entitle_amount').val());

            let total = landline + mobile + broadband;

            if (total > entitle) {
                alert("Total of Landline, Mobile, and Broadband amounts should not exceed the Entitle Amount.");
                $('input[name="landline_amount"]').val(0)
                $('input[name="mobile_amount"]').val(0)
                $('input[name="broadband_amount"]').val(0)
            }
        }

        $(document).ready(function() {
            $(document).on('input',
                'input[name="landline_amount"], input[name="mobile_amount"], input[name="broadband_amount"]',
                validateTotalAmount);
        });
    </script>
    <script>
        var select_box_element = document.querySelector('.search-select-box');
        dselect(select_box_element, {
            search: true
        });
    </script>
@endpush
