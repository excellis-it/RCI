@extends('imprest.layouts.master')
@section('title')
    CDA Bill List
@endsection

@push('styles')
    <style>
        .swal2-warning.swal2-icon-show .swal2-icon-content {
            font-size: 0.75em !important;
        }
    </style>
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
                    <h3>CDA Bill Send To Audit Team</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">CDA Bill Listing</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="create-form">


                            <form action="{{ route('cda-bills.store') }}" method="POST" id="cda-bills-create-form">

                                <div id="form">
                                    @include('imprest.cda-bills.form')
                                </div>

                                <div id="bill_table">
                                    @include('imprest.cda-bills.table')

                                </div>




                            </form>
                        </div>

                        <div id="edit-form">

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">


                        <table class="table customize-table mb-0 align-middle bg_tbody">
                            <thead class="text-white fs-4 bg_blue">
                                <tr>
                                    <th>Voucher No</th>
                                    <th>CDA Bill No</th>
                                    <th>CDA Bill Date</th>
                                    <th>Adv No</th>
                                    <th>Adv Date</th>
                                    {{-- <th>Member Name</th> --}}
                                    <th>Adv Amount</th>
                                    <th>Bill Amount</th>

                                    <th>Project</th>
                                    <th>Cheque No</th>
                                    <th>Cheque Date</th>
                                    <th>Variable Type</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($advance_bills) > 0)
                                    @foreach ($advance_bills as $key => $advance_bill)
                                        <tr>
                                            <td>{{ $advance_bill->bill_voucher_no }}</td>
                                            <td>{{ $advance_bill->cda_bill_no }}</td>
                                            <td>{{ $advance_bill->cda_bill_date }}</td>

                                            <td>{{ $advance_bill->adv_no ?? 'N/A' }}</td>
                                            <td>{{ $advance_bill->adv_date ?? 'N/A' }}</td>
                                            {{-- <td>{{ $advance_bill->member->name ?? 'N/A' }}</td> --}}
                                            <td>{{ $advance_bill->adv_amount ?? 'N/A' }}</td>

                                            <td>{{ $advance_bill->bill_amount ?? 'N/A' }}</td>

                                            <td>{{ $advance_bill->project->name ?? 'N/A' }}</td>
                                            <td>{{ $advance_bill->chq_no ?? 'N/A' }}</td>
                                            <td>{{ $advance_bill->chq_date ?? 'N/A' }}</td>
                                            <td>{{ $advance_bill->variableType->name ?? 'N/A' }}</td>
                                            <td class="sepharate">
                                                @if ($advance_bill->isEditable())
                                                    <a href="#" class="edit-bill edit_pencil ms-2"
                                                        data-id="{{ $advance_bill->id }}" title="Edit">
                                                        <i class="ti ti-pencil"></i>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        class="delete-cda-bill edit_pencil text-danger ms-2"
                                                        data-route="{{ route('cda-bills.delete', $advance_bill->id) }}">
                                                        <i class="ti ti-trash"></i>
                                                    </a>
                                                @else
                                                    {{-- <i class="ti ti-lock text-muted"
                                                        title="Cannot edit - has CDA receipt"></i> --}}
                                                @endif
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


                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#cda-bills-create-form').submit(function(e) {

                e.preventDefault();
                var formData = $(this).serialize();


                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {

                        //windows load with toastr message
                        window.location.reload();
                        toastr.success('CDA Bill Submitted Success')
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

            // Update bill_voucher_no when date changes
            $(document).on('change', '#cda_bill_date', function() {
                var date = $(this).val();

                if (date) {
                    $.ajax({
                        url: "{{ route('cda-bills.get-last-bill-voucher-no') }}",
                        type: 'GET',
                        data: {
                            date: date
                        },
                        success: function(response) {
                            $('#bill_voucher_no').val(response.billVoucherNo);
                        },
                        error: function(xhr) {
                            console.log('Error getting last voucher number');
                        }
                    });
                }
            });

            // Also update bill_voucher_no when date changes in edit form
            $(document).on('change', '#edit-form #cda_bill_date', function() {
                var date = $(this).val();

                if (date) {
                    $.ajax({
                        url: "{{ route('cda-bills.get-last-bill-voucher-no') }}",
                        type: 'GET',
                        data: {
                            date: date
                        },
                        success: function(response) {
                            $('#edit-form #bill_voucher_no').val(response.billVoucherNo);
                        },
                        error: function(xhr) {
                            console.log('Error getting last voucher number');
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.delete-cda-bill', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this Cda Bill!",
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
                    url: "{{ route('cda-bills.fetch-data') }}",
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



            // Edit CDA Bill
            $(document).on('click', '.edit-bill', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var route = "{{ route('cda-bills.edit-data', ':id') }}";
                route = route.replace(':id', id);

                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');

                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        $('#bill_table').hide();
                        $('#create-form').hide();
                        $('#edit-form').show();
                        $('#edit-form').html(response.view);


                    },
                    error: function(xhr) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        toastr.error('Error loading edit form');
                    }
                });
            });

            // $('#cda-bill-edit-form').submit(function(e) {
            $(document).on('submit', '#cda-bill-edit-form', function(e) {
                console.log('edit submit');
                e.preventDefault();
                var formData = $(this).serialize();
                var id = $(this).data('id');
                var route = "{{ route('cda-bills.update-data', ':id') }}";
                route = route.replace(':id', id);

                $.ajax({
                    url: route,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            window.location.reload();
                            toastr.success(response.success);
                        }
                    },
                    error: function(xhr) {
                        // Clear previous errors
                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('[name="' + key + '"]').next('.text-danger').html(value[
                                0]);
                        });
                    }
                });
            });

            // Cancel edit button
            $(document).on('click', '#cancel-edit', function(e) {
                e.preventDefault();
                window.location.reload();
            });


        });
    </script>
@endpush
