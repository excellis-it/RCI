@extends('imprest.layouts.master')
@section('title')
    Amount
@endsection

@push('styles')
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
                <div class="">
                    <h3>Amount Details</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Amount</a> <span class="bread-slash"></span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            <form action="{{ route('amount.store') }}" method="POST" id="amountForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Amount</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="amount"
                                                            id="amount">
                                                        <div class="text-danger mt-2" style="display:none;"></div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label></label>
                                        <div class="form-group col-md-5 mb-2">
                                            <button type="submit" class="listing_add">Save</button>
                                        </div>


                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="mt-6">
                            @include('imprest.amount.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#amountForm').on('submit', function(e) {
                    let isValid = true;
                    const amountField = $('#amount');
                    const errorMessage = amountField.next(
                    '.text-danger'); // Find the error message container for the amount field
                    const amountValue = amountField.val().trim();

                    // Clear any previous error messages
                    errorMessage.text('');
                    errorMessage.hide();

                    // Validation for empty or invalid amount
                    if (amountValue === '') {
                        errorMessage.text('Amount is required.');
                        errorMessage.show(); // Show error message
                        isValid = false;
                    } else if (isNaN(amountValue) || Number(amountValue) <= 0) {
                        errorMessage.text('Please enter a valid numeric value greater than 0.');
                        errorMessage.show(); // Show error message
                        isValid = false;
                    }

                    // If validation fails, prevent form submission and display error message
                    if (!isValid) {
                        e.preventDefault();
                        $('#error-message').text('Please correct the errors above and try again.').show();
                    } else {
                        toastr.success('Amount saved successfully', 'Amount');
                    }
                });
            });
        </script>
    @endpush
