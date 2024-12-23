@extends('frontend.public-fund.layouts.master')
@section('title')
    Payment Report
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
                    <h3> Payment Report</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Reports</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Payment Report</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            <form action="{{ route('cheque-payment.report.generate') }}" method="POST" id="paymentForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Cheque Date</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control" name="date"
                                                            id="date">
                                                        <div id="dateError" class="text-danger" style="display:none;">Please
                                                            select a date.</div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label></label>
                                        <div class="form-group col-md-12 mb-2">
                                            <button type="submit" class="listing_add">Generate</button>
                                        </div>


                                    </div>
                                </div>

                            </form>
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
                $('#paymentForm').on('submit', function(event) {
                    var date = $('#date').val();

                    // Reset previous error message
                    $('#dateError').hide();

                    // Check if the date field is empty
                    if (!date) {
                        event.preventDefault(); // Prevent form submission
                        $('#dateError').show(); // Display error message under the input field
                        return false;
                    }
                });
            });
        </script>
    @endpush
