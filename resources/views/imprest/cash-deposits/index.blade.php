@extends('imprest.layouts.master')

@section('title', 'Cash Deposit')

@section('content')
    @php
        use App\Helpers\Helper;
    @endphp
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">


        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Cash Deposits</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Cash Deposits</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Create Form -->
        <div id="createFormContainer">
            @include('imprest.cash-deposits.create')
        </div>

        <!-- Edit Form - Initially Hidden -->
        <div id="editFormContainer" style="display: none;">
            <div class="row card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Edit Cash Deposit</h5>

                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id" name="id">

                        <div class="row mb-3">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="edit_vr_no" class="form-label">VR No</label>
                                    <input type="text" class="form-control" id="edit_vr_no" name="vr_no" readonly>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="edit_vr_date" class="form-label">VR Date</label>
                                    <input type="date" class="form-control" id="edit_vr_date" name="vr_date">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="edit_rct_no" class="form-label">Receipt No</label>
                                    <input type="text" class="form-control" id="edit_rct_no" name="rct_no">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="edit_rct_date" class="form-label">Receipt Date</label>
                                    <input type="date" class="form-control" id="edit_rct_date" name="rct_date">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="edit_amount" class="form-label">Amount</label>
                                    <input type="number" step="any" step="0.01" class="form-control"
                                        id="edit_amount" name="amount">
                                    <small id="editAmountHelp" class="form-text text-muted" hidden>Maximum: <span
                                            id="edit_max_amount">{{ Helper::getImprestCashInHand() }}</span></small><br>
                                    <span id="editAmountError" class="text-danger" style="display: none;"></span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3"></div>
                        </div>

                        <div class="row d-flex justify-content-between mt-3">
                            <div class="col-md-2">
                                <button type="button" id="cancelEdit" class="listing_exit">Cancel</button>
                            </div>
                            <div class="col-md-2 text-end">
                                <button type="submit" class="listing_add">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row card">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        {{-- <a href="{{ route('cash-deposits.create') }}" class="btn btn-primary">Add New Cash Deposit</a> --}}

                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>VR No</th>
                                <th>VR Date</th>
                                <th>RCT No</th>
                                <th>RCT Date</th>
                                <th>Amount</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cashDeposits as $deposit)
                                <tr>
                                    <td>{{ $deposit->vr_no }}</td>
                                    <td>{{ $deposit->vr_date->format('d-m-Y') }}</td>
                                    <td>{{ $deposit->rct_no }}</td>
                                    <td>{{ $deposit->rct_date->format('d-m-Y') }}</td>
                                    <td>{{ number_format($deposit->amount, 2) }}</td>
                                    <td>{{ $deposit->created_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="editBtn edit_pencil ms-2"
                                            data-id="{{ $deposit->id }}" data-vr-no="{{ $deposit->vr_no }}"
                                            data-vr-date="{{ $deposit->vr_date->format('Y-m-d') }}"
                                            data-rct-no="{{ $deposit->rct_no }}"
                                            data-rct-date="{{ $deposit->rct_date->format('Y-m-d') }}"
                                            data-amount="{{ $deposit->amount }}">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($cashDeposits->count() == 0)
                                <tr>
                                    <td colspan="7" class="text-center">No cash deposits found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end">
                    {{ $cashDeposits->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const maxAmount = {{ Helper::getImprestCashInHand() }};

            $('#amount').on('input', function() {
                const value = parseFloat($(this).val());
                if (value > maxAmount) {
                    $(this).val(maxAmount);
                    $('#amountError').text('Amount cannot exceed the cash in hand: ' + maxAmount).show();
                } else {
                    $('#amountError').hide();
                }
            });

            // Edit button click handler
            $('.editBtn').on('click', function() {
                // Hide create form and show edit form
                $('#createFormContainer').hide();
                $('#editFormContainer').show();

                // Set form values from data attributes
                const id = $(this).data('id');
                const vrNo = $(this).data('vr-no');
                const vrDate = $(this).data('vr-date');
                const rctNo = $(this).data('rct-no');
                const rctDate = $(this).data('rct-date');
                const amount = $(this).data('amount');

                // Populate form fields
                $('#edit_id').val(id);
                $('#edit_vr_no').val(vrNo);
                $('#edit_vr_date').val(vrDate);
                $('#edit_rct_no').val(rctNo);
                $('#edit_rct_date').val(rctDate);
                $('#edit_amount').val(amount);

                // Set form action URL
                $('#editForm').attr('action', `/imprest/cash-deposits/${id}`);
            });

            // Cancel button handler
            $('#cancelEdit').on('click', function() {
                // Reload the page to reset everything
                location.reload();
            });

            // Amount validation for edit form
            $('#edit_amount').on('input', function() {
                const value = parseFloat($(this).val());
                if (value > maxAmount) {
                    $(this).val(maxAmount);
                    $('#editAmountError').text('Amount cannot exceed the cash in hand: ' + maxAmount)
                        .show();
                } else {
                    $('#editAmountError').hide();
                }
            });

            // Handle edit form submit with AJAX
            $('#editForm').on('submit', function(e) {
                e.preventDefault();

                const formData = $(this).serialize();
                const id = $('#edit_id').val();

                $.ajax({
                    url: `/imprest/cash-deposits/${id}`,
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Show success message
                        // $('<div class="alert alert-success">Cash deposit updated successfully!</div>')
                        //     .insertBefore('.table-responsive')
                        //     .delay(3000)
                        //     .fadeOut(function() {
                        //         $(this).remove();
                        //     });

                        // Reload page after a short delay
                        setTimeout(function() {
                            location.reload();
                        }, 100);
                    },
                    error: function(xhr) {
                        // Show error message
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = 'Error updating cash deposit:';

                        for (const field in errors) {
                            errorMessage += '<br>' + errors[field][0];
                        }

                        $(`<div class="alert alert-danger">${errorMessage}</div>`)
                            .insertBefore('#editForm')
                            .delay(3000)
                            .fadeOut(function() {
                                $(this).remove();
                            });
                    }
                });
            });
        });
    </script>
@endpush
