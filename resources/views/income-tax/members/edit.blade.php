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
                                                        @foreach (\App\Helpers\Helper::getNewFinancialYears(20) as $year)
                                                            <option value="{{ $year }}">{{ $year }}
                                                            </option>
                                                        @endforeach
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
                                                                                        <select
                                                                                            class="form-select month_year"
                                                                                            name="month_year"
                                                                                            id="month_year">
                                                                                            <option value="">Select
                                                                                                Month Year</option>
                                                                                        </select>
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

                                                                @include('income-tax.members.arrears')

                                                                @include('income-tax.members.saving')

                                                                @include('income-tax.members.rent')

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
        <script>
            $(document).ready(function() {
                $("#financial_year").change(function() {
                    let selectedYear = $(this).val();
                    let monthDropdown = $(".month_year");
                    monthDropdown.empty().append('<option value="">Select Month Year</option>');

                    if (selectedYear) {
                        let years = selectedYear.split("-");
                        let startYear = parseInt(years[0]);
                        let endYear = parseInt(years[1]);

                        let months = [{
                                name: "March",
                                year: startYear,
                                number: 3
                            },
                            {
                                name: "April",
                                year: startYear,
                                number: 4
                            },
                            {
                                name: "May",
                                year: startYear,
                                number: 5
                            },
                            {
                                name: "June",
                                year: startYear,
                                number: 6
                            },
                            {
                                name: "July",
                                year: startYear,
                                number: 7
                            },
                            {
                                name: "August",
                                year: startYear,
                                number: 8
                            },
                            {
                                name: "September",
                                year: startYear,
                                number: 9
                            },
                            {
                                name: "October",
                                year: startYear,
                                number: 10
                            },
                            {
                                name: "November",
                                year: startYear,
                                number: 11
                            },
                            {
                                name: "December",
                                year: startYear,
                                number: 12
                            },
                            {
                                name: "January",
                                year: endYear,
                                number: 1
                            },
                            {
                                name: "February",
                                year: endYear,
                                number: 2
                            }
                        ];

                        // Populate the month dropdown
                        $.each(months, function(index, item) {
                            monthDropdown.append(
                                `<option value="${item.number}-${item.year}">${item.name} ${item.year}</option>`
                            );
                        });
                    }
                });
            });
        </script>
    @endpush

   
