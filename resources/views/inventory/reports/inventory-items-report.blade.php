@extends('inventory.layouts.master')
@section('title')
    Inventory Items Report Generate
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
                    <h3>Inventory Items - Report</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Inventory / Reports</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">

                        <form action="{{ route('reports.inventory-items-report-generate') }}" method="post"
                            id="item-name-report-form">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Inventory Number</label>

                                        <select name="inventory_number" id="inventory_number" class="form-select-search">
                                            <option value="">Select Inventory Number</option>
                                            @foreach ($inventoryNumbers as $inventoryNumber)
                                                <option value="{{ $inventoryNumber->number }}">
                                                    {{ $inventoryNumber->number }}</option>
                                            @endforeach
                                        </select>
                                        @if (session('error'))
                                            <small id="helpId"
                                                class="form-text text-danger">{{ session('error') }}</small>
                                        @endif
                                    </div>

                                </div>


                                <div class="form-group col-md-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Date</label>
                                        <input type="text" name="date_range" id="daterange" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group col-md-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Item Type</label>
                                        <select name="item_nc_type" id="item_type" class="form-select-search">
                                            <option value="">Select Item Type</option>
                                            @foreach ($nc_statuses as $nc_statuse)
                                                <option value="{{ $nc_statuse->id }}">
                                                    {{ $nc_statuse->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group col-md-3 ">
                                    <div class="mb-3">
                                        <label for="" class="form-label"> &nbsp; </label>
                                        <input type="submit" name="file_type" value="Generate PDF" class="listing_add ">
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
