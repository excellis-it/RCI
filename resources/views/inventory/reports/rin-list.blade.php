@extends('inventory.layouts.master')
@section('title')
    Inventory Report Generate
@endsection

@push('styles')
    <style>

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
                    <h3>Rin Control Register Report</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Inventory / Reports</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <form action="{{ route('reports.rin-controller') }}" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-md-3 mb-2">
                    <div class="mb-3">
                        <label for="" class="form-label">Financial Year</label>
                        <select class="form-select" name="financial_year" id="financial_year">
                            <option value="">Select Year</option>
                            @foreach ($financialYears as $financialYear)
                                <option value="{{ $financialYear }}" >{{ $financialYear }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('financial_year'))
                            <span class="text-danger"> {{ $errors->first('financial_year') }}</span>
                        @endif
                    </div>

                </div>

                <div class="form-group col-md-3 mb-2">

                    <label for="" class="form-label">Select Paper
                        Type</label>
                    <select class="form-select" name="paper_type">
                        {{-- <option value="" disabled selected>Select Portrait/Landscape</option> --}}
                        <option value="portrait" selected>Portrait</option>
                        <option value="landscape">Landscape</option>
                    </select>
                    <small id="helpId" class="form-text text-danger"></small>


                </div>

                <div class="form-group col-md-3 mb-2">


                    <div class="mb-3">
                        <label for="" class="form-label">&nbsp;</label>
                        <button type="submit" class="listing_add">Generate PDF</button>
                    </div>

                </div>

            </div>
        </form>




    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#daterange').daterangepicker({
                opens: 'right', // Position of the picker
                locale: {
                    format: 'YYYY-MM-DD' // Date format
                }
            });
        });
    </script>
@endpush
