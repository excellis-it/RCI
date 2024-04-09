@extends('frontend.layouts.master')
@section('title')
Cash Payment List
@endsection

@push('styles')
@endpush

@section('content')
<section id="loading">
    <div id="loading-content"></div>
</section>
<div class="container-fluid">
    <div class="breadcome-list">
        <div class="d-flex">
            <div class="arrow_left"><a href="{{ route('cash-payments.index') }}" class="text-white"><i
                        class="ti ti-arrow-left"></i></a></div>
            <div class="">
                <h3>Cash Payment Create</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Cash Payment Create</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!--  Row 1 -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div id="form">

                        <form action="" method="POST" id="member-create-form">
                            @csrf

                            <div class="row justify-content-center align-items-center">
                                <div class="form-group col-md-3 mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <label>Last Vr. No</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="" id="" value=""
                                                placeholder="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <label>Last Vr. Date</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="" id="" value=""
                                                placeholder="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-7">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Vr. No</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="" id="" value=""
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Vr. Date</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select class="form-select" name="" id="">
                                                            <option value="">Select</option>
                                                            <option value="Male">1</option>
                                                            <option value="Female">2</option>
                                                            <option value="Others">3</option>
                                                        </select>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Amount</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="" id="" value=""
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Rct No</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="" id="" value=""
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Form</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="" id="" value=""
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Details</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="" id="" value=""
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="" id="" value=""
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-xl-7 mb-lg-3">
                                    <div class="form-group">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Category</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-inline">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="pay_stop"
                                                            id="inlineRadio1" value="none">
                                                        <label class="form-check-label" for="inlineRadio1">CGOS</label>
                                                    </div>
                                                    <div class="form-check form-check-inline ml-2">
                                                        <input class="form-check-input" type="radio" name="pay_stop"
                                                            id="inlineRadio2" value="full-pay">
                                                        <label class="form-check-label" for="inlineRadio2">NGOS</label>
                                                    </div>
                                                    <div class="form-check form-check-inline ml-2">
                                                        <input class="form-check-input" type="radio" name="pay_stop"
                                                            id="inlineRadio3" value="table-rec">
                                                        <label class="form-check-label" for="inlineRadio3">IES</label>
                                                    </div>
                                                    <div class="form-check form-check-inline ml-2">
                                                        <input class="form-check-input" type="radio" name="pay_stop"
                                                            id="inlineRadio3" value="table-rec">
                                                        <label class="form-check-label" for="inlineRadio3">TADA</label>
                                                    </div>
                                                    <div class="form-check form-check-inline ml-2">
                                                        <input class="form-check-input" type="radio" name="pay_stop"
                                                            id="inlineRadio3" value="table-rec">
                                                        <label class="form-check-label" for="inlineRadio3">GPF</label>
                                                    </div>
                                                    <div class="form-check form-check-inline ml-2">
                                                        <input class="form-check-input" type="radio" name="pay_stop"
                                                            id="inlineRadio3" value="table-rec">
                                                        <label class="form-check-label"
                                                            for="inlineRadio3">Medical</label>
                                                    </div>
                                                    <div class="form-check form-check-inline ml-2">
                                                        <input class="form-check-input" type="radio" name="pay_stop"
                                                            id="inlineRadio3" value="table-rec">
                                                        <label class="form-check-label" for="inlineRadio3">Misc</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="row justify-content-end">
                                        <div class="form-group col-md-6 mb-2">
                                            <button type="submit" class="listing_add">Save</button>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <button type="submit" class="listing_exit">Cancel</button>
                                        </div>
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