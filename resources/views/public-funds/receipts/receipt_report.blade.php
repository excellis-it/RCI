@extends('frontend.public-fund.layouts.master')
@section('title')
    Receipts Report
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
                    <h3> Receipts Report</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Reports</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Receipts Report</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            <form action="{{ route('receipts.report.generate') }}" method="POST" id="receiptForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">

                                            <div class="form-group col-md-6 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Date</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control" name="date"
                                                            id="date">
                                                        <div id="dateError" class="text-danger" style="display:none;">Please
                                                            select a date.</div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Print Date</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control" name="print_date"
                                                            id="print_date">
                                                        <div id="dateError" class="text-danger" style="display:none;">Please
                                                            select a print date.</div>

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


                            <div hidden>
                                <form action="{{ route('cheque-payment.report.generate') }}" method="POST"
                                    id="paymentForm">
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
                                                                id="date2">
                                                            <div id="dateError" class="text-danger" style="display:none;">
                                                                Please
                                                                select a date.</div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Print Date</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="date" class="form-control" name="print_date"
                                                                id="print_date2">
                                                            <div id="dateError" class="text-danger" style="display:none;">
                                                                Please
                                                                select a print date.</div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label></label>
                                            <div class="form-group col-md-12 mb-2">
                                                <button type="submit" class="listing_add payadd2">Generate</button>
                                            </div>


                                        </div>
                                    </div>

                                </form>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="{{ asset('web_assets/js/jquery-3.6.0.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#receiptForm').on('submit', function(event) {
                    var date = $('#date').val();
                    $("#date2").val(date);

                    // Reset previous error message
                    $('#dateError').hide();

                    // Check if the date field is empty
                    if (!date) {
                        event.preventDefault(); // Prevent form submission
                        $('#dateError').show(); // Display error message under the input field
                        return false;
                    }


                    setTimeout(() => {
                        console.log('send 2');
                        $("#paymentForm").submit();

                    }, 2000);
                });

                // change date should change print date
                $('#date').on('change', function() {
                    var selectedDate = $(this).val();
                    $('#print_date').val(selectedDate);
                    $('#print_date2').val(selectedDate);
                });

                $('#print_date').on('change', function() {
                    var selectedDate = $(this).val();
                    $('#print_date2').val(selectedDate);
                });
            });
        </script>
    @endpush
