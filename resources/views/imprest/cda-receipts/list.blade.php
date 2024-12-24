@extends('imprest.layouts.master')
@section('title')
    CDA Receipt List
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
                    <h3>CDA Receipt Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">CDA Receipt Listing</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-start mb-3">
                <h5>Last Vr No. - {{ !empty($lastcdaReceipt->rct_vr_no) ? $lastcdaReceipt->rct_vr_no : '' }}</h5>
            </div>
            <div class="col-md-6 text-end mb-3">
                <h5>Last Vr Date -
                    {{ !empty($lastcdaReceipt->created_at) != null ? $lastcdaReceipt->created_at->format('Y-m-d') : '' }}
                </h5>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            @include('imprest.cda-receipts.form')
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
                                    <th>CDA Bill No</th>
                                    <th>Rct Vr. No</th>
                                    <th>Rct Vr. Date</th>
                                    <th>DV No</th>
                                    <th>DV Date</th>
                                    <th>Rct Vr. Amount</th>
                                    {{-- <th>Details</th> --}}



                                    {{-- <th>Project</th>
                                    <th>Cheque No</th>
                                    <th>Cheque Date</th>
                                    <th>Variable Type</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($receipt_bills) && count($receipt_bills) > 0)
                                    @foreach ($receipt_bills as $key => $receipt_bill)
                                        <tr>
                                            <td>{{ $receipt_bill->cdaBill->cda_bill_no }}</td>
                                            <td>{{ $receipt_bill->rct_vr_no }}</td>
                                            <td>{{ $receipt_bill->rct_vr_date }}</td>

                                            <td>{{ $receipt_bill->dv_no ?? 'N/A' }}</td>
                                            <td>{{ $receipt_bill->dv_date ?? 'N/A' }}</td>
                                            <td>{{ $receipt_bill->rct_vr_amount ?? 'N/A' }}</td>
                                            {{-- <td>{{ $receipt_bill->remark ?? 'N/A' }}</td> --}}


                                            {{-- <td>{{ $receipt_bill->project->name ?? 'N/A' }}</td>
                                            <td>{{ $receipt_bill->chq_no ?? 'N/A' }}</td>
                                            <td>{{ $receipt_bill->chq_date ?? 'N/A' }}</td>
                                            <td>{{ $receipt_bill->variableType->name ?? 'N/A' }}</td> --}}

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="11" class="text-center">No Bills Found
                                        </td>
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
            $('#cda-receipt-create-form').submit(function(e) {

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
        $(document).on('click', '#delete', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this Cda Receipt!",
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
                    url: "{{ route('cda-receipts.fetch-data') }}",
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
                        // $('#offcanvasEdit').offcanvas('show');
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
            $(document).on('submit', '#cda-receipt-edit-form', function(e) {
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
            $("#bill_id").change(function(e) {
                e.preventDefault();
                var selectedOption = $(this).find(":selected");
                // Retrieve the data-billamount attribute
                var the_bill_amount = selectedOption.data('billamount');
                // alert(the_bill_amount);
                $("#rct_vr_amount").val(the_bill_amount);

            });
        });
    </script>
@endpush
