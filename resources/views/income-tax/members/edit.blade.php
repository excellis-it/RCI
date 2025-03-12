@extends('income-tax.layouts.master')
@section('title')
    Arrears
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
                    <h3>Arrears</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Arrears Edit</span></li>
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

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-2 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>PC NO</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Pers No</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="pers_no"
                                                                id="pers_no" value="{{ $member->pers_no ?? '' }}">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>EMP-ID</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="emp_id"
                                                                id="emp_id" value="{{ $member->emp_id ?? '' }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Name</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" value="{{ $member->name ?? '' }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>EMP-ID</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Desig</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="desig"
                                                                id="desig"
                                                                value="{{ $member->desigs->designation ?? '' }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Basic</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="basic"
                                                                id="basic" value="{{ $member->basic ?? '' }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Group</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="group"
                                                                id="group" value="{{ $member->groups->value ?? '' }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Devision</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="devision"
                                                                id="devision"
                                                                value="{{ $member->divisions->value ?? '' }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-3">
                                                    <label>Financial Year:</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select" name="financial_year"
                                                        id="financial_year">
                                                        <option value="">Select Financial Year</option>
                                                        <option value="2024-2025">
                                                            2024-2025
                                                        </option>
                                                        <option value="2023-2024">
                                                            2023-2024
                                                        </option>
                                                        <option value="2022-2023">
                                                            2022-2023
                                                        </option>
                                                        <option value="2021-2022">
                                                            2021-2022
                                                        </option>
                                                        <option value="2020-2021">
                                                            2020-2021
                                                        </option>
                                                        <option value="2019-2020">
                                                            2019-2020
                                                        </option>
                                                        <option value="2018-2019">
                                                            2018-2019
                                                        </option>
                                                        <option value="2017-2018">
                                                            2017-2018
                                                        </option>
                                                        <option value="2016-2017">
                                                            2016-2017
                                                        </option>
                                                        <option value="2015-2016">
                                                            2015-2016
                                                        </option>
                                                        <option value="2014-2015">
                                                            2014-2015
                                                        </option>
                                                    </select>
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="edit-mem-tab">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="loan-tab-pane" role="tabpanel"
                                            aria-labelledby="loan-tab" tabindex="0">
                                            <div class="credit-frm">

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="edit-mem-tab">
                                                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link active" id="pay_details-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#pay_details"
                                                                        type="button" role="tab"
                                                                        aria-controls="pay_details"
                                                                        aria-selected="true">Pay Details</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="arrears-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#arrears"
                                                                        type="button" role="tab"
                                                                        aria-controls="arrears" aria-selected="false"
                                                                        tabindex="-1">Arrears</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="savings-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#savings"
                                                                        type="button" role="tab"
                                                                        aria-controls="savings" aria-selected="false"
                                                                        tabindex="-1">Savings</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="rent-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#rent"
                                                                        type="button" role="tab"
                                                                        aria-controls="rent" aria-selected="false"
                                                                        tabindex="-1">Rent</button>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content" id="myTabContent">
                                                                <div class="tab-pane fade show active" id="pay_details"
                                                                    role="tabpanel" aria-labelledby="pay_details-tab">
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Month Year</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Var Incr</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Misc</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>PTax</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>HDFC</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Basic</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>DA</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>OT</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>ITax</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>DMisc</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>D.Pay</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>HRA</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Arrears</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>HBA</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>GMC</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>S.Pay</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>CCA</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>GPF</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>PLI</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>E.Pay</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>TPT</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>CGEIS</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>LIC</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Add Incr</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Wash AJW</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>CGHS</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>EOL/HPL</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row justify-content-end mt-4">
                                                                            <div class="col-auto mb-2">
                                                                                <button type="submit"
                                                                                    class="listing_add">Save</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">Another</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="reset"
                                                                                    class="listing_exit">Cancel</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">Report</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">FORM16</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                Recovey Form
                                                                                <select class="p-2 rounded">
                                                                                    <option>Jan</option>
                                                                                    <option>Feb</option>
                                                                                    <option>Mar</option>
                                                                                    <option>Apr</option>
                                                                                    <option>May</option>
                                                                                    <option>Jun</option>
                                                                                    <option>Jul</option>
                                                                                    <option>Aug</option>
                                                                                    <option>Sep</option>
                                                                                    <option>Oct</option>
                                                                                    <option>Nov</option>
                                                                                    <option>Dec</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="tab-pane fade" id="arrears" role="tabpanel"
                                                                    aria-labelledby="arrears-tab">
                                                                    <form>
                                                                        <div class="credit-frm">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-7">
                                                                                    <div class="recov-table">
                                                                                        <table
                                                                                            class="table customize-table mb-0 align-middle bg_tbody"
                                                                                            id="loan-table">
                                                                                            <thead
                                                                                                class="text-white fs-4 bg_blue">
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
                                                                                            <tbody
                                                                                                class="tbody_height_scroll">
                                                                                                <tr
                                                                                                    class="edit-route-loan">
                                                                                                    <td>18/02/2025</td>
                                                                                                    <td>DA2</td>
                                                                                                    <td>20796</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    class="edit-route-loan">
                                                                                                    <td>18/02/2025</td>
                                                                                                    <td>DA2</td>
                                                                                                    <td>20796</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    class="edit-route-loan">
                                                                                                    <td>18/02/2025</td>
                                                                                                    <td>DA2</td>
                                                                                                    <td>20796</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    class="edit-route-loan">
                                                                                                    <td>18/02/2025</td>
                                                                                                    <td>DA2</td>
                                                                                                    <td>20796</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                </tr>
                                                                                                <tr
                                                                                                    class="edit-route-loan">
                                                                                                    <td>18/02/2025</td>
                                                                                                    <td>DA2</td>
                                                                                                    <td>20796</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                    <td>0</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-5" id="loan-form">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="form-group col-md-6 mb-2">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col-md-12">
                                                                                                    <label>Date</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        value="">
                                                                                                    <span
                                                                                                        class="text-danger"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-md-6 mb-2">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col-md-12">
                                                                                                    <label>Name</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        value="">
                                                                                                    <span
                                                                                                        class="text-danger"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-md-6 mb-2">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col-md-12">
                                                                                                    <label>Amt</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        value="">
                                                                                                    <span
                                                                                                        class="text-danger"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-md-6 mb-2">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col-md-12">
                                                                                                    <label>CPS</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        value="">
                                                                                                    <span
                                                                                                        class="text-danger"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-md-6 mb-2">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col-md-12">
                                                                                                    <label>I.Tax</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        value="">
                                                                                                    <span
                                                                                                        class="text-danger"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-md-6 mb-2">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col-md-12">
                                                                                                    <label>CGHS</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        value="">
                                                                                                    <span
                                                                                                        class="text-danger"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-md-6 mb-2">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col-md-12">
                                                                                                    <label>GMC</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        value="">
                                                                                                    <span
                                                                                                        class="text-danger"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row justify-content-end">
                                                                                        <div class="col-md-12">
                                                                                            <div
                                                                                                class="row justify-content-end">
                                                                                                <div
                                                                                                    class="form-group col-md-4 mb-2">
                                                                                                    <button type="submit"
                                                                                                        class="listing_add">Save</button>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group col-md-4 mb-2">
                                                                                                    <button type="reset"
                                                                                                        class="listing_exit">Delete</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row justify-content-end mt-4">
                                                                            <div class="col-auto mb-2">
                                                                                <button type="submit"
                                                                                    class="listing_add">Save</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">Another</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="reset"
                                                                                    class="listing_exit">Cancel</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">Report</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">FORM16</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                Recovey Form
                                                                                <select class="p-2 rounded">
                                                                                    <option>Jan</option>
                                                                                    <option>Feb</option>
                                                                                    <option>Mar</option>
                                                                                    <option>Apr</option>
                                                                                    <option>May</option>
                                                                                    <option>Jun</option>
                                                                                    <option>Jul</option>
                                                                                    <option>Aug</option>
                                                                                    <option>Sep</option>
                                                                                    <option>Oct</option>
                                                                                    <option>Nov</option>
                                                                                    <option>Dec</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="tab-pane fade" id="savings" role="tabpanel"
                                                                    aria-labelledby="savings-tab">
                                                                    <form>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Month Year</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Var Incr</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Misc</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>PTax</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>HDFC</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Basic</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>DA</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>OT</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>ITax</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>DMisc</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>D.Pay</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>HRA</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Arrears</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>HBA</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>GMC</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>S.Pay</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>CCA</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>GPF</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>PLI</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>E.Pay</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>TPT</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>CGEIS</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>LIC</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Add Incr</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Wash AJW</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>CGHS</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>EOL/HPL</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="" id=""
                                                                                            value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-4 mb-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Med Ins ( 80 D ) Sr. Citizen
                                                                                            Dependent Inclided</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio"
                                                                                                name="mid_ins"
                                                                                                id="mid_ins1"
                                                                                                value="Yes">
                                                                                            <label class="form-check-label"
                                                                                                for="mid_ins1">Yes</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio"
                                                                                                name="mid_ins"
                                                                                                id="mid_ins2"
                                                                                                value="No"
                                                                                                checked="">
                                                                                            <label class="form-check-label"
                                                                                                for="mid_ins2">No</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-4 mb-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Cancer ( 80 DDB ) Sr. Citizen
                                                                                            Dependent Included</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio"
                                                                                                name="cancer"
                                                                                                id="cancer1"
                                                                                                value="Yes">
                                                                                            <label class="form-check-label"
                                                                                                for="cancer1">Yes</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio"
                                                                                                name="cancer"
                                                                                                id="cancer2"
                                                                                                value="No"
                                                                                                checked="">
                                                                                            <label class="form-check-label"
                                                                                                for="cancer2">No</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-4 mb-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>Med Tri ( 80 DD ) Severe
                                                                                            Disability</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio"
                                                                                                name="med_tri"
                                                                                                id="med_tri1"
                                                                                                value="Yes">
                                                                                            <label class="form-check-label"
                                                                                                for="med_tri1">Yes</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio"
                                                                                                name="med_tri"
                                                                                                id="med_tri2"
                                                                                                value="No"
                                                                                                checked="">
                                                                                            <label class="form-check-label"
                                                                                                for="med_tri2">No</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-4 mb-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>PH /Disable ( 80 U ) Severe
                                                                                            Disability</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio"
                                                                                                name="server_dis"
                                                                                                id="server_dis1"
                                                                                                value="Yes">
                                                                                            <label class="form-check-label"
                                                                                                for="server_dis1">Yes</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio"
                                                                                                name="server_dis"
                                                                                                id="server_dis2"
                                                                                                value="No"
                                                                                                checked="">
                                                                                            <label class="form-check-label"
                                                                                                for="server_dis2">No</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-4 mb-3">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12">
                                                                                        <label>IT Rules</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio"
                                                                                                name="it_rules"
                                                                                                id="it_rules1"
                                                                                                value="Yes">
                                                                                            <label class="form-check-label"
                                                                                                for="it_rules1">Yes</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-check form-check-inline">
                                                                                            <input class="form-check-input"
                                                                                                type="radio"
                                                                                                name="it_rules"
                                                                                                id="it_rules2"
                                                                                                value="No"
                                                                                                checked="">
                                                                                            <label class="form-check-label"
                                                                                                for="it_rules2">No</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row justify-content-end mt-4">
                                                                            <div class="col-auto mb-2">
                                                                                <button type="submit"
                                                                                    class="listing_add">Save</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">Another</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="reset"
                                                                                    class="listing_exit">Cancel</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">Report</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">FORM16</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                Recovey Form
                                                                                <select class="p-2 rounded">
                                                                                    <option>Jan</option>
                                                                                    <option>Feb</option>
                                                                                    <option>Mar</option>
                                                                                    <option>Apr</option>
                                                                                    <option>May</option>
                                                                                    <option>Jun</option>
                                                                                    <option>Jul</option>
                                                                                    <option>Aug</option>
                                                                                    <option>Sep</option>
                                                                                    <option>Oct</option>
                                                                                    <option>Nov</option>
                                                                                    <option>Dec</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="tab-pane fade" id="rent" role="tabpanel"
                                                                    aria-labelledby="rent-tab">
                                                                    <form>
                                                                        <div class="credit-frm">
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-7">
                                                                                    <div class="recov-table">
                                                                                        <table
                                                                                            class="table customize-table mb-0 align-middle bg_tbody"
                                                                                            id="loan-table">
                                                                                            <thead
                                                                                                class="text-white fs-4 bg_blue">
                                                                                                <tr>
                                                                                                    <th>Month</th>
                                                                                                    <th>Year</th>
                                                                                                    <th>Rent</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody
                                                                                                class="tbody_height_scroll">
                                                                                                <tr
                                                                                                    class="edit-route-loan">
                                                                                                    <td>May</td>
                                                                                                    <td>2024</td>
                                                                                                    <td>20796</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-5" id="loan-form">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="form-group col-md-6 mb-2">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col-md-12">
                                                                                                    <label>Month</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        value="">
                                                                                                    <span
                                                                                                        class="text-danger"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-md-6 mb-2">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col-md-12">
                                                                                                    <label>Year</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        value="">
                                                                                                    <span
                                                                                                        class="text-danger"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="form-group col-md-6 mb-2">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col-md-12">
                                                                                                    <label>Rent</label>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name=""
                                                                                                        id=""
                                                                                                        value="">
                                                                                                    <span
                                                                                                        class="text-danger"></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row justify-content-end">
                                                                                        <div class="col-md-12">
                                                                                            <div
                                                                                                class="row justify-content-end">
                                                                                                <div
                                                                                                    class="form-group col-md-4 mb-2">
                                                                                                    <button type="submit"
                                                                                                        class="listing_add">Save</button>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group col-md-4 mb-2">
                                                                                                    <button type="reset"
                                                                                                        class="listing_exit">Delete</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row justify-content-end mt-4">
                                                                            <div class="col-auto mb-2">
                                                                                <button type="submit"
                                                                                    class="listing_add">Save</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">Another</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="reset"
                                                                                    class="listing_exit">Cancel</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">Report</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">FORM16</button>
                                                                            </div>
                                                                            <div class="col-auto mb-2">
                                                                                Recovey Form
                                                                                <select class="p-2 rounded">
                                                                                    <option>Jan</option>
                                                                                    <option>Feb</option>
                                                                                    <option>Mar</option>
                                                                                    <option>Apr</option>
                                                                                    <option>May</option>
                                                                                    <option>Jun</option>
                                                                                    <option>Jul</option>
                                                                                    <option>Aug</option>
                                                                                    <option>Sep</option>
                                                                                    <option>Oct</option>
                                                                                    <option>Nov</option>
                                                                                    <option>Dec</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
    @endpush
