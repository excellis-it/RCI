@extends('frontend.layouts.master')
@section('title')
Members List
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
            <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
            <div class="">
                <h3>Member Listing</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Member Listing</span></li>
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
                        <form action="" method="POST" id="designation-create-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>Pers No</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="pers_no" id="pers_no" value="{{ old('pers_no') ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>ID No</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="emp_id" id="emp_id" value="{{ old('emp_id') ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>Desig</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="pers_no" id="pers_no" value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>Basic</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="pers_no" id="pers_no" value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>Group</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="pers_no" id="pers_no" value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>Section</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="pers_no" id="pers_no" value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-4">
                                                        <label>Financial Year</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="date" class="form-control" name="name" id="name" value="" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="edit-mem-tab">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="paydetails-tab" data-bs-toggle="tab" data-bs-target="#paydetails-tab-pane" type="button" role="tab" aria-controls="paydetails-tab-pane" aria-selected="true">Pay Details</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="areas-tab" data-bs-toggle="tab" data-bs-target="#areas-tab-pane" type="button" role="tab" aria-controls="areas-tab-pane" aria-selected="false">Areas</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="savings-tab" data-bs-toggle="tab" data-bs-target="#savings-tab-pane" type="button" role="tab" aria-controls="savings-tab-pane" aria-selected="false">Savings</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="ot-tab" data-bs-toggle="tab" data-bs-target="#ot-tab-pane" type="button" role="tab" aria-controls="ot-tab-pane" aria-selected="false">OT</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="rent-tab" data-bs-toggle="tab" data-bs-target="#rent-tab-pane" type="button" role="tab" aria-controls="rent-tab-pane" aria-selected="false">Rent</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="paydetails-tab-pane" role="tabpanel" aria-labelledby="paydetails-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Monthly Year</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-select" name="gender" id="gender">
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
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Var Incr</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Misc</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>PTax</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>HDFC</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>DA</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>OT</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>ITax</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>DMisc</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>D.Pay</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>HRA</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Arrears</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>HBA</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>GMC</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>S.Pay</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>CCA</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>GPF</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>PLI</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>F.Pay</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>TPT</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>CGEIS</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>LIC</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Add Incr</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Wash Alw</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>CGHS</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>EOL/HPL</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-md-4">
                                                            <div class="row justify-content-end">
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit" class="listing_add">Save</button>
                                                                </div>
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit" class="listing_exit">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="areas-tab-pane" role="tabpanel" aria-labelledby="areas-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="recov-table">
                                                        <table class="table customize-table mb-0 align-middle bg_tbody">
                                                            <thead class="text-white fs-4 bg_blue">
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Name</th>
                                                                    <th>Amt</th>
                                                                    <th>CPS</th>
                                                                    <th>I.Tax</th>
                                                                    <th>CGHS</th>
                                                                    <th>GMC</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tbody_height_scroll">
                                                                <tr>
                                                                    <td>22/03/2024</td>
                                                                    <td>22/03/2024</td>
                                                                    <td>12456</td>
                                                                    <td>1050</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>1473</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>22/03/2024</td>
                                                                    <td>22/03/2024</td>
                                                                    <td>12456</td>
                                                                    <td>1050</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>1473</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>22/03/2024</td>
                                                                    <td>22/03/2024</td>
                                                                    <td>12456</td>
                                                                    <td>1050</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>1473</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>22/03/2024</td>
                                                                    <td>22/03/2024</td>
                                                                    <td>12456</td>
                                                                    <td>1050</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>1473</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>22/03/2024</td>
                                                                    <td>22/03/2024</td>
                                                                    <td>12456</td>
                                                                    <td>1050</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>1473</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Date</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="date" class="form-control" name="name" id="name" value="" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Name</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <select class="form-select" name="gender" id="gender">
                                                                            <option value="">Select</option>
                                                                            <option value="Male">1</option>
                                                                            <option value="Female">2</option>
                                                                            <option value="Others">3</option>
                                                                        </select>
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Amt</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>CPS Rec</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>I.Tax Rec</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>CGHS Rec</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>GMC Rec</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-md-4">
                                                            <div class="row justify-content-end">
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit" class="listing_add">Save</button>
                                                                </div>
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit" class="listing_exit">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="savings-tab-pane" role="tabpanel" aria-labelledby="savings-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Annual Rent</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>PH/Disable
                                                                    <smal>(80 U)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>FD int</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>NSC/CTC
                                                                    <smal>(80 C)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>TFree
                                                                    <smal>(80 C)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>HBA</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Edu Loan Int
                                                                    <smal>(80 E)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>NSC Int</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>HBA Prncpl
                                                                    <smal>(80 C)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Others-S
                                                                    <smal>(80 C)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>HBA Int
                                                                    <smal>(80 EE)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Other-D
                                                                    <smal>(80 G)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Let Out</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>PLI
                                                                    <smal>(80 C)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Infra Bound </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Med Ins
                                                                    <small>80 EE</small>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>A/C Int
                                                                    <smal>(80 TTA)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Pension</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>JS / Sukanya
                                                                    <smal>(80 C)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>NSDI
                                                                    <smal>80 CCD (1b)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Med Trt
                                                                    <small>(80 EE)</small>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Equity / MF
                                                                    <small>(80 CCG)</small>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>PPF
                                                                    <small>(80 C)</small>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>LIC
                                                                    <smal>(80 C)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Sec 89</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Cancer
                                                                    <small>(80 EE)</small>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>CEA
                                                                    <small>U/S 10(14)</small>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Bonds</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>ULIP
                                                                    <smal>(80 C)</smal>
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>PH</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="radio-2">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-group mb-3">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-8">
                                                                    <label>Med Ins (80) Sr. Citizen Dependent included</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                        <label class="form-check-label" for="inlineRadio1">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                        <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-group mb-3">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-8">
                                                                    <label>Cancer (80 DDB) Sr. Citizen Dependent included</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                        <label class="form-check-label" for="inlineRadio1">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                        <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-group mb-3">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-8">
                                                                    <label>Med Trt (80 DD) Severe Disability</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                        <label class="form-check-label" for="inlineRadio1">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                        <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-group mb-3">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-8">
                                                                    <label>PH / Disable (80 U) Severe Disability</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                        <label class="form-check-label" for="inlineRadio1">No</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                        <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-group mb-3">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-8">
                                                                    <label>IT Rules</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                        <label class="form-check-label" for="inlineRadio1">Old</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                        <label class="form-check-label" for="inlineRadio2">New</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-md-4">
                                                            <div class="row justify-content-end">
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit" class="listing_add">Save</button>
                                                                </div>
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit" class="listing_exit">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="ot-tab-pane" role="tabpanel" aria-labelledby="ot-tab" tabindex="0">
                                        <div class="credit-frm">
                                            ot
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="rent-tab-pane" role="tabpanel" aria-labelledby="rent-tab" tabindex="0">
                                        <div class="credit-frm">
                                            rent
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