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
                    <h3>Member Income Tax</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Income Tax</span></li>
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
                                                                                        <select class="form-select month_year" name="month_year" id="month_year">
                                                                                            <option value="">Select Month Year</option>
                                                                                        </select>
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12"><label>Var Incr</label></div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="form-control" name="var_incr" value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12"><label>Misc</label></div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="form-control" name="misc" value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12"><label>PTax</label></div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="form-control" name="p_tax" value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12"><label>HDFC</label></div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="form-control" name="hdfc" value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12"><label>Basic</label></div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="form-control" name="basic" value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12"><label>DA</label></div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="form-control" name="da" value="">
                                                                                        <span class="text-danger"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group col-md-3 mb-2">
                                                                                <div class="row align-items-center">
                                                                                    <div class="col-md-12"><label>OT</label></div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="text" class="form-control" name="ot" value="">
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
                                                                                        <input type="text" class="form-control" name="i_tax" value="">
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
                                                                                        <input type="text" class="form-control" name="d_misc" value="">
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
                                                                                        <input type="text" class="form-control" name="d_pay" value="">
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
                                                                                        <input type="text" class="form-control" name="hra" value="">
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
                                                                                        <input type="text" class="form-control" name="arrears" value="">
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
                                                                                        <input type="text" class="form-control" name="hba" value="">
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
                                                                                        <input type="text" class="form-control" name="gmc" value="">
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
                                                                                        <input type="text" class="form-control" name="s_pay" value="">
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
                                                                                        <input type="text" class="form-control" name="cca" value="">
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
                                                                                        <input type="text" class="form-control" name="gpf" value="">
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
                                                                                        <input type="text" class="form-control" name="pli" value="">
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
                                                                                        <input type="text" class="form-control" name="e_pay" value="">
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
                                                                                        <input type="text" class="form-control" name="tpt" value="">
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
                                                                                        <input type="text" class="form-control" name="cgeis" value="">
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
                                                                                        <input type="text" class="form-control" name="lic" value="">
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
                                                                                        <input type="text" class="form-control" name="add_incr" value="">
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
                                                                                        <input type="text" class="form-control" name="wash_ajw" value="">
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
                                                                                        <input type="text" class="form-control" name="cghs" value="">
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
                                                                                        <input type="text" class="form-control" name="eol_hpl" value="">
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
                                                                            {{-- <div class="col-auto mb-2">
                                                                                <button type="button"
                                                                                    class="another-btn">Another</button>
                                                                            </div> --}}
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
                                number: "03"
                            },
                            {
                                name: "April",
                                year: startYear,
                                number: "04"
                            },
                            {
                                name: "May",
                                year: startYear,
                                number: "05"
                            },
                            {
                                name: "June",
                                year: startYear,
                                number: "06"
                            },
                            {
                                name: "July",
                                year: startYear,
                                number: "07"
                            },
                            {
                                name: "August",
                                year: startYear,
                                number: "08"
                            },
                            {
                                name: "September",
                                year: startYear,
                                number: "09"
                            },
                            {
                                name: "October",
                                year: startYear,
                                number: "10"
                            },
                            {
                                name: "November",
                                year: startYear,
                                number: "11"
                            },
                            {
                                name: "December",
                                year: startYear,
                                number: "12"
                            },
                            {
                                name: "January",
                                year: endYear,
                                number: "01"
                            },
                            {
                                name: "February",
                                year: endYear,
                                number: "02"
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

        <script>
            $(document).ready(function() {
                $('#month_year').change(function() {
                    var monthYear = $(this).val();
                    if (monthYear) {
                        $.ajax({
                            url: '{{ route('income-tax.members-income-tax.get-pay-details') }}',
                            type: 'GET',
                            data: {
                                month_year: monthYear,
                                member_id : {{ $member->id }}
                            },
                            success: function(response) {
                                if (response.success) {
                                    // Function to safely get value or default to 0
                                    function getValue(key) {
                                        return response.data[key] !== null ? response.data[key] : 0;
                                    }

                                    // Populate the fields with response data, defaulting to 0 if null
                                    $('input[name="var_incr"]').val(getValue("var_incr"));
                                    $('input[name="misc"]').val(getValue("misc"));
                                    $('input[name="p_tax"]').val(getValue("p_tax"));
                                    $('input[name="hdfc"]').val(getValue("hdfc"));
                                    $('input[name="basic"]').val(getValue("basic"));
                                    $('input[name="da"]').val(getValue("da"));
                                    $('input[name="ot"]').val(getValue("ot"));
                                    $('input[name="i_tax"]').val(getValue("i_tax"));
                                    $('input[name="d_misc"]').val(getValue("d_misc"));
                                    $('input[name="d_pay"]').val(getValue("d_pay"));
                                    $('input[name="hra"]').val(getValue("hra"));
                                    $('input[name="arrears"]').val(getValue("arrears"));
                                    $('input[name="hba"]').val(getValue("hba"));
                                    $('input[name="gmc"]').val(getValue("gmc"));
                                    $('input[name="s_pay"]').val(getValue("s_pay"));
                                    $('input[name="cca"]').val(getValue("cca"));
                                    $('input[name="gpf"]').val(getValue("gpf"));
                                    $('input[name="pli"]').val(getValue("pli"));
                                    $('input[name="e_pay"]').val(getValue("e_pay"));
                                    $('input[name="tpt"]').val(getValue("tpt"));
                                    $('input[name="cgeis"]').val(getValue("cgeis"));
                                    $('input[name="lic"]').val(getValue("lic"));
                                    $('input[name="add_incr"]').val(getValue("add_incr"));
                                    $('input[name="wash_ajw"]').val(getValue("wash_ajw"));
                                    $('input[name="cghs"]').val(getValue("cghs"));
                                    $('input[name="eol_hpl"]').val(getValue("eol_hpl"));
                                } else {
                                    $('input[name="var_incr"]').val(0);
                                    $('input[name="misc"]').val(0);
                                    $('input[name="p_tax"]').val(0);
                                    $('input[name="hdfc"]').val(0);
                                    $('input[name="basic"]').val(0);
                                    $('input[name="da"]').val(0);
                                    $('input[name="ot"]').val(0);
                                    $('input[name="i_tax"]').val(0);
                                    $('input[name="d_misc"]').val(0);
                                    $('input[name="d_pay"]').val(0);
                                    $('input[name="hra"]').val(0);
                                    $('input[name="arrears"]').val(0);
                                    $('input[name="hba"]').val(0);
                                    $('input[name="gmc"]').val(0);
                                    $('input[name="s_pay"]').val(0);
                                    $('input[name="cca"]').val(0);
                                    $('input[name="gpf"]').val(0);
                                    $('input[name="pli"]').val(0);
                                    $('input[name="e_pay"]').val(0);
                                    $('input[name="tpt"]').val(0);
                                    $('input[name="cgeis"]').val(0);
                                    $('input[name="lic"]').val(0);
                                    $('input[name="add_incr"]').val(0);
                                    $('input[name="wash_ajw"]').val(0);
                                    $('input[name="cghs"]').val(0);
                                    $('input[name="eol_hpl"]').val(0);
                                    toastr.error(response.message)
                                }
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
