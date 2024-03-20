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
                                        <div class="form-group col-md-2 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>PC NO</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>Pers No</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="pers_no" id="pers_no"
                                                        value="{{ old('pers_no') ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>EMP-ID</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="emp_id" id="emp_id"
                                                        value="{{ old('emp_id') ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="{{ old('name') ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>EMP-ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>Desig</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="desig" id="desig"
                                                        value="{{ old('desig') ?? '' }}" placeholder="">
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
                                                    <input type="text" class="form-control" name="basic" id="basic"
                                                        value="{{ old('basic') ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>Group</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="group" id="group"
                                                        value="{{ old('group') ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-4">
                                                    <label>Devision</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="devision"
                                                        id="devision" value="{{ old('devision') ?? '' }}"
                                                        placeholder="">
                                                    <span class="text-danger"></span>
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
                                        <button class="nav-link active" id="credits-tab" data-bs-toggle="tab"
                                            data-bs-target="#credits-tab-pane" type="button" role="tab"
                                            aria-controls="credits-tab-pane" aria-selected="true">Credits</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="debits-tab" data-bs-toggle="tab"
                                            data-bs-target="#debits-tab-pane" type="button" role="tab"
                                            aria-controls="debits-tab-pane" aria-selected="false">Debits</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="recoveries-tab" data-bs-toggle="tab"
                                            data-bs-target="#recoveries-tab-pane" type="button" role="tab"
                                            aria-controls="recoveries-tab-pane"
                                            aria-selected="false">Recoveries</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="core-tab" data-bs-toggle="tab"
                                            data-bs-target="#core-tab-pane" type="button" role="tab"
                                            aria-controls="core-tab-pane" aria-selected="false">Core Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="policy-tab" data-bs-toggle="tab"
                                            data-bs-target="#policy-tab-pane" type="button" role="tab"
                                            aria-controls="policy-tab-pane" aria-selected="false">Policy Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="loan-tab" data-bs-toggle="tab"
                                            data-bs-target="#loan-tab-pane" type="button" role="tab"
                                            aria-controls="loan-tab-pane" aria-selected="false">Loan Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="var-tab" data-bs-toggle="tab"
                                            data-bs-target="#var-tab-pane" type="button" role="tab"
                                            aria-controls="var-tab-pane" aria-selected="false">Var.Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pers-tab" data-bs-toggle="tab"
                                            data-bs-target="#pers-tab-pane" type="button" role="tab"
                                            aria-controls="pers-tab-pane" aria-selected="false">Pers Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="exp-tab" data-bs-toggle="tab"
                                            data-bs-target="#exp-tab-pane" type="button" role="tab"
                                            aria-controls="exp-tab-pane" aria-selected="false">Expectations</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="credits-tab-pane" role="tabpanel"
                                        aria-labelledby="credits-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-end">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <label>Basic</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control"
                                                                                name="basic" id="basic"
                                                                                value="{{ old('basic') ?? '' }}"
                                                                                placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <label>Basic</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control"
                                                                                name="basic" id="basic"
                                                                                value="{{ old('basic') ?? '' }}"
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
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-2">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gross-div mt-3">
                                                    <div
                                                        class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <div class="row justify-content-end">
                                                            <div class="col-md-6">
                                                                <div class="row justify-content-end">
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_add">Save</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_exit">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="debits-tab-pane" role="tabpanel"
                                        aria-labelledby="debits-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-2">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div </div>
                                                    </div>
                                                </div>
                                                <div class="gross-div mt-3">
                                                    <div
                                                        class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <div class="row justify-content-end">
                                                            <div class="col-md-6">
                                                                <div class="row justify-content-end">
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_add">Save</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_exit">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="recoveries-tab-pane" role="tabpanel"
                                        aria-labelledby="recoveries-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                          <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4">
                                                            <label>Basic</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                name="basic" id="basic"
                                                                value="{{ old('basic') ?? '' }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4">
                                                            <label>Basic</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                name="basic" id="basic"
                                                                value="{{ old('basic') ?? '' }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4">
                                                            <label>Basic</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                name="basic" id="basic"
                                                                value="{{ old('basic') ?? '' }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4">
                                                            <label>Basic</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select class="form-select" name="gender" id="gender">
                                                                <option value="">Select</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="form-group col-md-3 mb-2">
                                                                <button type="submit"
                                                                    class="listing_add">Save</button>
                                                            </div>
                                                            <div class="form-group col-md-3 mb-2">
                                                                <button type="submit"
                                                                    class="delete-btn-1">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="gross-div mt-3">
                                            <div
                                                class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"
                                                                    name="basic" id="basic"
                                                                    value="{{ old('basic') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"
                                                                    name="basic" id="basic"
                                                                    value="{{ old('basic') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"
                                                                    name="basic" id="basic"
                                                                    value="{{ old('basic') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"
                                                                    name="basic" id="basic"
                                                                    value="{{ old('basic') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"
                                                                    name="basic" id="basic"
                                                                    value="{{ old('basic') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="row justify-content-end">
                                                    <div class="col-md-6">
                                                        <div class="row justify-content-end">
                                                            <div class="form-group col-md-3 mb-2">
                                                                <button type="submit"
                                                                    class="another-btn">Another</button>
                                                            </div>
                                                            <div class="form-group col-md-3 mb-2">
                                                                <button type="submit"
                                                                    class="listing_add">Save</button>
                                                            </div>
                                                            <div class="form-group col-md-3 mb-2">
                                                                <button type="submit"
                                                                    class="listing_exit">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="core-tab-pane" role="tabpanel"
                                        aria-labelledby="core-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <select class="form-select" name="gender"
                                                                        id="gender">
                                                                        <option value="">Select</option>
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <label>Basic</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control"
                                                                                name="basic" id="basic"
                                                                                value="{{ old('basic') ?? '' }}"
                                                                                placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-4">
                                                                            <label>Basic</label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control"
                                                                                name="basic" id="basic"
                                                                                value="{{ old('basic') ?? '' }}"
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
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-2">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="basic"
                                                                        id="basic" value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="gross-div mt-3">
                                                    <div
                                                        class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Basic</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="{{ old('basic') ?? '' }}"
                                                                            placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <div class="row justify-content-end">
                                                            <div class="col-md-6">
                                                                <div class="row justify-content-end">
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_add">Save</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_exit">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="policy-tab-pane" role="tabpanel"
                                        aria-labelledby="policy-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                              <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="recov-table">
                                                        <table class="table customize-table mb-0 align-middle bg_tbody">
                                                            <thead class="text-white fs-4 bg_blue">
                                                                <tr>
                                                                    <th>Policy </th>
                                                                    <th>Policy No.</th>
                                                                    <th>Amount</th>
                                                                    <th>Stop Rec</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tbody_height_scroll">
                                                                <tr>
                                                                    <td>ABC</td>
                                                                    <td>1234567890</td>
                                                                    <td>1500000</td>
                                                                    <td>Stop Rec</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ABC</td>
                                                                    <td>1234567890</td>
                                                                    <td>1500000</td>
                                                                    <td>Stop Rec</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ABC</td>
                                                                    <td>1234567890</td>
                                                                    <td>1500000</td>
                                                                    <td>Stop Rec</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ABC</td>
                                                                    <td>1234567890</td>
                                                                    <td>1500000</td>
                                                                    <td>Stop Rec</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>    
                                                </div>
                                              </div>

                                              <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-select" name="gender"
                                                                    id="gender">
                                                                    <option value="">Select</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-select" name="gender"
                                                                    id="gender">
                                                                    <option value="">Select</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="basic"
                                                                    id="basic" value="{{ old('basic') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-4">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-select" name="gender"
                                                                    id="gender">
                                                                    <option value="">Select</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>

                                              <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-md-6">
                                                            <div class="row justify-content-end">
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit"
                                                                        class="listing_add">Save</button>
                                                                </div>
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit"
                                                                        class="delete-btn-1">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                              <div class="gross-div mt-3">
                                                <div
                                                    class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                    <div class="col">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-4">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-md-6">
                                                            <div class="row justify-content-end">
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit"
                                                                        class="another-btn">Another</button>
                                                                </div>
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit"
                                                                        class="listing_add">Save</button>
                                                                </div>
                                                                <div class="form-group col-md-3 mb-2">
                                                                    <button type="submit"
                                                                        class="listing_exit">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="loan-tab-pane" role="tabpanel"
                                        aria-labelledby="loan-tab" tabindex="0">
                                        loan
                                    </div>
                                    <div class="tab-pane fade" id="var-tab-pane" role="tabpanel"
                                        aria-labelledby="var-tab" tabindex="0">
                                        Var
                                    </div>
                                    <div class="tab-pane fade" id="pers-tab-pane" role="tabpanel"
                                        aria-labelledby="pers-tab" tabindex="0">
                                        pers
                                    </div>
                                    <div class="tab-pane fade" id="exp-tab-pane" role="tabpanel"
                                        aria-labelledby="exp-tab" tabindex="0">
                                        exp
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