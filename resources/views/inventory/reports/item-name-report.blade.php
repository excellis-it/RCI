@extends('inventory.layouts.master')
@section('title')
    Item Name Report Generate
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
                    <h3>Item Name - Report</h3>
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

                        <form action="{{ route('reports.item-names-report-generate') }}" method="post"
                            id="item-name-report-form">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Item Name</label>
                                        <input type="text" minlength="2" min="2" name="item_name" id="item_name"
                                            value="{{ old('item_name') }}" class="form-control" />
                                        @if (session('error'))
                                            <small id="helpId"
                                                class="form-text text-danger">{{ session('error') }}</small>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group col-md-3 ">
                                    <div class="mb-3">
                                        <label for="" class="form-label"> &nbsp; </label>
                                        <input type="submit" name="file_type" value="Generate Excel" class="listing_add ">
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
@endpush
