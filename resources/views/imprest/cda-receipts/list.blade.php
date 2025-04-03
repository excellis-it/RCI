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
                        <div id="form-container">
                            <div id="create-form">
                                @include('imprest.cda-receipts.form')
                            </div>
                            <div id="edit-form" style="display: none;">
                                <!-- Edit form will be loaded here via Ajax -->
                            </div>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($receipt_bills) && count($receipt_bills) > 0)
                                    @foreach ($receipt_bills as $key => $receipt_bill)
                                        <tr>
                                            <td>{{ $receipt_bill->cdaBill?->cda_bill_no ?? '' }}</td>
                                            <td>{{ $receipt_bill->rct_vr_no ?? '' }}</td>
                                            <td>{{ $receipt_bill->rct_vr_date ?? '' }}</td>
                                            <td>{{ $receipt_bill->dv_no ?? 'N/A' }}</td>
                                            <td>{{ $receipt_bill->dv_date ?? 'N/A' }}</td>
                                            <td>{{ $receipt_bill->rct_vr_amount ?? 'N/A' }}</td>
                                            <td>
                                                <a href="#" class="edit-receipt edit_pencil ms-2"
                                                    data-id="{{ $receipt_bill->id }}">
                                                    <i class="ti ti-pencil"></i>
                                            </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No Bills Found</td>
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
            // Handle create form submission
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

            // Click on edit button
            $(document).on('click', '.edit-receipt', function() {
                var receiptId = $(this).data('id');

                // Load edit form via Ajax
                $.ajax({
                    url: "{{ url('imprest/cda-receipts') }}/" + receiptId + "/edit",
                    type: "GET",
                    success: function(response) {
                        // Hide create form and show edit form
                        $('#create-form').hide();
                        $('#edit-form').html(response).show();

                        // Set up edit form submission handler
                        setupEditFormHandler();
                    },
                    error: function(xhr) {
                        console.error('Error loading edit form:', xhr);
                        alert('Failed to load edit form. Please try again.');
                    }
                });
            });

            // Function to set up edit form submission handler
            function setupEditFormHandler() {
                $('#cda-receipt-edit-form').submit(function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                // Show success message
                                window.location.reload();
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message ||
                                        'Failed to update CDA receipt',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        },
                        error: function(xhr) {
                            // Clear previous errors
                            $('.text-danger').html('');

                            // Display validation errors
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                });

                // Handle cancel button click
                $(document).on('click', '#cancel-edit', function() {
                    // Hide edit form and show create form
                    $('#edit-form').hide().empty();
                    $('#create-form').show();
                });
            }
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

            // ... existing fetch data code ...
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#bill_no").change(function(e) {
                e.preventDefault();
                var selectedOption = $(this).find(":selected");
                // Retrieve the data-billamount attribute
                var the_bill_amount = selectedOption.data('billamount');

                $("#rct_vr_amount").val(the_bill_amount);

                var inputRctDateCheck = new Date($("#rct_vr_date").val());
                var theBillDate = new Date(selectedOption.data('billdate'));

                $("#rct_vr_date").attr("min", theBillDate.toISOString().split("T")[0]);

                if (inputRctDateCheck < theBillDate) {
                    $("#rct_vr_date").val('');
                }
            });
        });
    </script>
@endpush
