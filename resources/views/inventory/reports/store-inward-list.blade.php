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
                    <h3>Store Inward Register - Report</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Inventory / Reports</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <form action="{{ route('reports.store-inward') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="" class="form-label">Date</label>
                        <input type="text" id="daterange" name="daterange" class="form-control" />
                        <small id="helpId" class="form-text text-danger"></small>
                        @if ($errors->has('daterange'))
                            <span class="text-danger">{{$errors->first('daterange')}}</span>
                        @endif
                    </div>

                </div>

                <div class="col-md-2">


                    <div class="mb-3 mt-2">
                        <label for="">&nbsp;</label>
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
