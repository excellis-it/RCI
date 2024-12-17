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
                            <form action="{{ route('receipts.report.generate') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">

                                            <div class="form-group col-md-12 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Date</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control" name="date" required>

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
        <script></script>
    @endpush
