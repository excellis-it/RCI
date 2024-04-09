@extends('frontend.layouts.master')
@section('title')
    Members Edit
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
                    <h3>Member Edit</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Edit</span></li>
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
                            {{-- <form action="" method="POST" id="designation-create-form">
                            
                            @csrf --}}
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
                                                <div class="col-md-12">
                                                    <label>Pers No</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="pers_no" id="pers_no"
                                                        value="{{ $member->pers_no ?? '' }}">
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
                                                    <input type="text" class="form-control" name="emp_id" id="emp_id"
                                                        value="{{ $member->emp_id ?? '' }}" placeholder="">
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
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="{{ $member->name ?? '' }}" placeholder="">
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
                                                <div class="col-md-12">
                                                    <label>Desig</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="desig" id="desig"
                                                        value="{{ $member->designation->designation_type ?? '' }}"
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
                                                    <input type="text" class="form-control" name="basic" id="basic"
                                                        value="{{ $member->basic ?? '' }}" placeholder="">
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
                                                    <input type="text" class="form-control" name="group" id="group"
                                                        value="{{ $member->groups->value ?? '' }}" placeholder="">
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
                                                        id="devision" value="{{ $member->divisions->value ?? '' }}"
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
                                            aria-controls="recoveries-tab-pane" aria-selected="false">Recoveries</button>
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
                                    {{-- credit --}}
                                    <div class="tab-pane fade show active" id="credits-tab-pane" role="tabpanel"
                                        aria-labelledby="credits-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.credit-form')
                                        </div>
                                    </div>
                                    {{-- credit end --}}

                                    {{-- debit --}}
                                    <div class="tab-pane fade" id="debits-tab-pane" role="tabpanel"
                                        aria-labelledby="debits-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.debit-form')

                                        </div>
                                    </div>
                                    {{-- debit end --}}

                                    {{-- recovery  --}}
                                    <div class="tab-pane fade" id="recoveries-tab-pane" role="tabpanel"
                                        aria-labelledby="recoveries-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.recovery-form')

                                        </div>
                                    </div>
                                    {{-- recovery end --}}

                                    {{-- core --}}
                                    <div class="tab-pane fade" id="core-tab-pane" role="tabpanel"
                                        aria-labelledby="core-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.core-form')

                                        </div>
                                    </div>
                                    {{-- core end --}}

                                    {{-- policy --}}
                                    <div class="tab-pane fade" id="policy-tab-pane" role="tabpanel"
                                        aria-labelledby="policy-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <div class="recov-table">
                                                            <table
                                                                class="table customize-table mb-0 align-middle bg_tbody">
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
                                                                <div class="col-md-12">
                                                                    <label>Policy Name</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select class="form-select" name="policy_name"
                                                                        id="policy_name">
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
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Policy No</label>
                                                                </div>
                                                                <div class="col-md-12">
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
                                                                <div class="col-md-12">
                                                                    <label>Amount</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Rec Stop</label>
                                                                </div>
                                                                <div class="col-md-12">
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
                                                {{-- <div class="gross-div mt-3">
                                                    <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Gross Pay</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Top Debits</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Net Pay</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Tot Rec</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Take Home</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
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
                                                                            class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_exit">Exit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- policy end --}}



                                    {{-- loan --}}
                                    <div class="tab-pane fade" id="loan-tab-pane" role="tabpanel"
                                        aria-labelledby="loan-tab" tabindex="0">
                                        <div class="credit-frm">

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="recov-table">
                                                        <table class="table customize-table mb-0 align-middle bg_tbody"
                                                            id="loan-table">
                                                            <thead class="text-white fs-4 bg_blue">
                                                                <tr>
                                                                    <th>Loan Name</th>
                                                                    <th>Percent</th>
                                                                    <th>Amount</th>
                                                                    <th>Date</th>
                                                                    <th>Remarks</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tbody_height_scroll">
                                                                @include('frontend.members.loan.table')

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-6" id="loan-form">
                                                    @include('frontend.members.loan.form')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- loan end --}}



                                    <div class="tab-pane fade" id="var-tab-pane" role="tabpanel"
                                        aria-labelledby="var-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Bank A/c No.</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>CCM Mem No</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>FPA</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>Bank</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select class="form-select" name="gender"
                                                                        id="gender">
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
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>GPF Sub</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>2 Add</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>GPF A/c No</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>I.Tax</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>PRAN No</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>PAN No</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Ecess</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Ben A/C No</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic"
                                                                        value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                        <div class="col-md-12">
                                                                            <label>DCMAF No</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                                        <div class="col-md-12">
                                                                            <label>S.Pay</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                {{-- <div class="gross-div mt-3">
                                                    <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Gross Pay</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Top Debits</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Net Pay</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Tot Rec</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Take Home</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
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
                                                                            class="listing_add">Update</button>
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
                                    <div class="tab-pane fade" id="pers-tab-pane" role="tabpanel"
                                        aria-labelledby="pers-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.personal-form')

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="exp-tab-pane" role="tabpanel"
                                        aria-labelledby="exp-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="recov-table">
                                                            <table
                                                                class="table customize-table mb-0 align-middle bg_tbody">
                                                                <thead class="text-white fs-4 bg_blue">
                                                                    <tr>
                                                                        <th>Rule</th>
                                                                        <th>Percent</th>
                                                                        <th>Amount</th>
                                                                        <th>Date</th>
                                                                        <th>Remarks</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="tbody_height_scroll">
                                                                    <tr>
                                                                        <td>MESS</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>05/12/2023</td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>TPT</td>
                                                                        <td>30</td>
                                                                        <td>20</td>
                                                                        <td>05/12/2023</td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Rule Name</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic" value=""
                                                                        placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Present </label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control"
                                                                                name="basic" id="basic"
                                                                                value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Amount</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control"
                                                                                name="basic" id="basic"
                                                                                value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Year</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <select class="form-select" name="gender"
                                                                                id="gender">
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
                                                                        <div class="col-md-12">
                                                                            <label>Month</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <select class="form-select" name="gender"
                                                                                id="gender">
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
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Remark</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic" value=""
                                                                        placeholder="">
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
                                                {{-- <div class="gross-div mt-3">
                                                    <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Gross Pay</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Top Debits</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Net Pay</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Tot Rec</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Take Home</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
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
                                                                            class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_exit">Exit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#member-credit-form').validate({ // Initialize form validation
                rules: {
                    // Define rules for your form fields
                    'pay': {
                        required: true
                    }
                    // 'da': {
                    //     required: true
                    // }
                    // 'tpt': {
                    //     required: true
                    // },
                    // 'cr_rent': {
                    //     required: true
                    // },
                    // 'g_pay' : {
                    //     required: true
                    // },
                    // 'hra' : {
                    //     required: true
                    // },
                    // 'da_on_tpt': {
                    //     required: true
                    // },
                    // 'cr_elec': {
                    //     required: true
                    // },
                    // 'fpa':{
                    //     required: true
                    // },
                    // 's_pay' :{
                    //     required: true
                    // },
                    // 'hindi':{
                    //     required: true
                    // },
                    // 'cr_water' : {
                    //     required: true
                    // },
                    // 'add_inc2': {
                    //     required: true
                    // },
                    // 'npa': {
                    //     required: true
                    // },
                    // 'deptn_alw' : {
                    //     required: true
                    // },
                    // 'misc_1':{
                    //     required: true
                    // },
                    // 'var_incr':{
                    //     required: true
                    // },
                    // 'wash_alw' : {
                    //     required: true
                    // },
                    // 'dis_alw':{
                    //     required: true
                    // },
                    // 'misc_2':{
                    //     required: true
                    // },
                    // 'risk_alw':{
                    //     required: true
                    // },
                    // 'tot_credits': {
                    //     required: true
                    // },
                    // 'remarks':{
                    //     required: true
                    // }


                },
                messages: {
                    // Define messages for your form fields
                    'pay': {
                        required: "Please enter pay",
                    }
                    // 'da': {
                    //     required: "Please enter DA",
                    // }
                    // 'tpt': {
                    //     required: "Please enter TPT",
                    // },
                    // 'cr_rent': {
                    //     required: "Please enter Cr Rent",
                    // },
                    // 'g_pay': {
                    //     required: "Please enter G.pay",
                    // },
                    // 'hra' : {
                    //     required: "Please enter HRA",
                    // },
                    // 'da_on_tpt' : {
                    //     required: "Please enter da on TPT",
                    // },
                    // 'cr_elec' : {
                    //     required: "Please enter Cr Elec",
                    // },
                    // 'fpa' : {
                    //     required: "Please enter FPA",
                    // },
                    // 's_pay': {
                    //     required: "Please enter S. pay",
                    // },
                    // 'hindi': {
                    //     required: "Please enter Hindi",
                    // },
                    // 'cr_water': {
                    //     required: "Please enter Cr Water",
                    // },
                    // 'add_inc2': {
                    //     required: "Please enter 2 Add Inc",
                    // },
                    // 'npa': {
                    //     required: "Please enter Npa",
                    // },
                    // 'deptn_alw': {
                    //     required: "Please enter Deptn Alw",
                    // },
                    // 'misc_1': {
                    //     required: "Please enter Misc 1",
                    // },
                    // 'var_incr' :{
                    //     required: "Please enter Var Incr",
                    // },
                    // 'wash_alw' :{
                    //     required: "Please enter Wash Alw",
                    // },
                    // 'dis_alw' :{
                    //     required: "Please enter Dis Alw",
                    // },
                    // 'misc_2' :{
                    //     required: "Please enter Misc 2",
                    // },
                    // 'risk_alw' :{
                    //     required: "Please enter Risk Alw",
                    // },
                    // 'tot_credits' :{
                    //     required: "Please enter Tot Credit",
                    // },
                    // 'remarks' :{
                    //     required: "Please enter Remarks",
                    // }
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();

                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        success: function(response) {
                            toastr.success(response.message);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#member-debit-form').validate({ // Initialize form validation
                // rules: {
                //     // Define rules for your form fields
                //     'gpa_sub': {
                //         required: true
                //     },
                //     'eol': {
                //         required: true
                //     },
                //     'rent': {
                //         required: true
                //     },
                //     'lf_arr': {
                //         required: true
                //     },
                //     'tada' : {
                //         required: true
                //     },
                //     'hba' : {
                //         required: true
                //     },
                //     'misc1': {
                //         required: true
                //     },
                //     'gpf_rec': {
                //         required: true
                //     },
                //     'i_tax':{
                //         required: true
                //     },
                //     'elec' :{
                //         required: true
                //     },
                //     'elec_arr':{
                //         required: true
                //     },
                //     'medi' : {
                //         required: true
                //     },
                //     'pc': {
                //         required: true
                //     },
                //     'misc2': {
                //         required: true
                //     },
                //     'gpf_arr' : {
                //         required: true
                //     },
                //     'ecess':{
                //         required: true
                //     },
                //     'water':{
                //         required: true
                //     },
                //     'water_arr' : {
                //         required: true
                //     },
                //     'ltc':{
                //         required: true
                //     },
                //     'fadv':{
                //         required: true
                //     },
                //     'misc3':{
                //         required: true
                //     },
                //     'cgegis': {
                //         required: true
                //     },
                //     'cda':{
                //         required: true
                //     },
                //     'furn':{
                //         required: true
                //     },
                //     'furn_arr':{
                //         required: true
                //     },
                //     'car':{
                //         required: true
                //     },
                //     'hra_rec':{
                //         required: true
                //     },
                //     'tot_debits':{
                //         required: true
                //     },
                //     'cghs':{
                //         required: true
                //     },
                //     'ptax':{
                //         required: true
                //     },
                //     'cmg':{
                //         required: true
                //     },
                //     'pli':{
                //         required: true
                //     },
                //     'scooter':{
                //         required: true
                //     },
                //     'tpt_rec':{
                //         required: true
                //     },
                //     'net_pay':{
                //         required: true
                //     },
                //     'basic':{
                //         required: true
                //     },
                //     'remarks':{
                //         required: true
                //     }


                // },
                // messages: {
                //     // Define messages for your form fields
                //     'gpa_sub': {
                //         required: "Please enter Gpa Sub",
                //     },
                //     'eol': {
                //         required: "Please enter Eol",
                //     },
                //     'rent': {
                //         required: "Please enter rent",
                //     },
                //     'lf_arr': {
                //         required: "Please enter Lf arr",
                //     },
                //     'tada': {
                //         required: "Please enter Tada",
                //     },
                //     'hba' : {
                //         required: "Please enter Hba",
                //     },
                //     'misc1' : {
                //         required: "Please enter Misc 1",
                //     },
                //     'gpf_rec' : {
                //         required: "Please enter GPF Rec",
                //     },
                //     'i_tax' : {
                //         required: "Please enter I Tax",
                //     },
                //     'elec': {
                //         required: "Please enter Elec",
                //     },
                //     'elec_arr': {
                //         required: "Please enter Elec Arr",
                //     },
                //     'medi': {
                //         required: "Please enter Medi",
                //     },
                //     'pc': {
                //         required: "Please enter Pc",
                //     },
                //     'misc2': {
                //         required: "Please enter Misc2",
                //     },
                //     'gpf_arr': {
                //         required: "Please enter Gpf Arr",
                //     },
                //     'ecess': {
                //         required: "Please enter Ecess",
                //     },
                //     'water' :{
                //         required: "Please enter Water",
                //     },
                //     'water_arr' :{
                //         required: "Please enter Wash Arr",
                //     },
                //     'ltc' :{
                //         required: "Please enter Itc",
                //     },
                //     'fadv' :{
                //         required: "Please enter Fadv",
                //     },
                //     'misc3' :{
                //         required: "Please enter Misc 3",
                //     },
                //     'cgegis' :{
                //         required: "Please enter Cgegis",
                //     },
                //     'cda' :{
                //         required: "Please enter Cda",
                //     },
                //     'furn':{
                //         required: "Please enter Furn",
                //     },
                //     'furn_arr':{
                //         required: "Please enter Furn Arr",
                //     },
                //     'car':{
                //         required: "Please enter Car",
                //     },
                //     'hra_rec':{
                //         required: "Please enter Hra Rec",
                //     },
                //     'tot_debits':{
                //         required: "Please enter Tot Debits",
                //     },
                //     'cghs':{
                //         required: "Please enter Cghs",
                //     },
                //     'ptax':{
                //         required: "Please enter Ptax",
                //     },
                //     'cmg':{
                //         required: "Please enter Cmg",
                //     },
                //     'pli':{
                //         required: "Please enter Pli",
                //     },
                //     'scooter':{
                //         required: "Please enter Scooter",
                //     },
                //     'tpt_rec':{
                //         required: "Please enter Tpt Rec",
                //     },
                //     'net_pay':{
                //         required: "Please enter Net Pay",
                //     },
                //     'basic':{
                //         required: "Please enter Basic",
                //     },
                //     'remarks':{
                //         required: "Please enter Remarks",
                //     }
                // },
                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            toastr.success(response.message);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#member-recovery-form').validate({ // Initialize form validation
                rules: {
                    // Define rules for your form fields
                    'v_incr': {
                        required: true
                    },
                    'noi': {
                        required: true
                    },
                    'total': {
                        required: true
                    }
                    //      'stop': {
                    //          required: true
                    //      }
                },
                messages: {
                    // Define messages for your form fields
                    'v_incr': {
                        required: "Please enter VIncr",
                    },
                    'noi': {
                        required: "Please enter NOI",
                    },
                    'total': {
                        required: "Please enter Total",
                    }
                    //      'stop': {
                    //          required: "Please enter Stop",
                    //      }
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            toastr.success(response.message);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#member-core-form').validate({ // Initialize form validation
                //  rules: {
                //      // Define rules for your form fields
                //      'v_incr': {
                //          required: true
                //      },
                //      'noi': {
                //          required: true
                //      },
                //      'total': {
                //          required: true
                //      },
                //      'stop': {
                //          required: true
                //      }


                //  },
                //  messages: {
                //      // Define messages for your form fields
                //      'v_incr': {
                //          required: "Please enter VIncr",
                //      },
                //      'noi': {
                //          required: "Please enter NOI",
                //      },
                //      'total': {
                //          required: "Please enter Total",
                //      },
                //      'stop': {
                //          required: "Please enter Stop",
                //      }
                //  },
                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            toastr.success(response.message);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#member-personal-form').validate({ // Initialize form validation
                //  rules: {
                //      // Define rules for your form fields
                //      'v_incr': {
                //          required: true
                //      },
                //      'noi': {
                //          required: true
                //      },
                //      'total': {
                //          required: true
                //      },
                //      'stop': {
                //          required: true
                //      }


                //  },
                //  messages: {
                //      // Define messages for your form fields
                //      'v_incr': {
                //          required: "Please enter VIncr",
                //      },
                //      'noi': {
                //          required: "Please enter NOI",
                //      },
                //      'total': {
                //          required: "Please enter Total",
                //      },
                //      'stop': {
                //          required: "Please enter Stop",
                //      }
                //  },
                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            toastr.success(response.message);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#member-loan-info-form').validate({
                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Extract form data
                            var data = response.data;
                            // Construct table row HTML
                            var newRow = '<tr>';
                            newRow += '<td>' + data.loan_name +
                                '</td>'; // Use loanName directly if it's a string, adjust accordingly
                            newRow += '<td>' + data.present_inst_no + '</td>';
                            newRow += '<td>' + data.total_amount + '</td>';
                            newRow += '<td>' + new Date().toISOString().split('T')[0] +
                                '</td>';
                            newRow += '<td>' + data.remark + '</td>';
                            newRow += '</tr>';

                            // Append new row to table
                            $('#loan-table tbody').append(newRow);

                            // Show success message if needed
                            toastr.success(response.message);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-route', function() {
                var route = $(this).data('route');
                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#loan-form').html(response.view);
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        $('#offcanvasEdit').offcanvas('show');
                    },
                    error: function(xhr) {
                        // Handle errors
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        console.log(xhr);
                    }
                });
            });

            // Handle the form submission
            $(document).on('submit', '#member-edit-loan-form', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                       // respobnse data replcae by id
                        var data = response.data;
                        var row = $('#loan-table tbody').find('tr[data-id="' + data.id + '"]');
                        row.find('td:eq(0)').text(data.loan_name);
                        row.find('td:eq(1)').text(data.present_inst_no);
                        row.find('td:eq(2)').text(data.total_amount);
                        row.find('td:eq(4)').text(data.remark);

                        // Hide the offcanvas
                        $('#offcanvasEdit').offcanvas('hide');

                        // Show success message if needed
                        toastr.success(response.message);
                       
                    },
                    error: function(xhr) {
                        // Handle errors (e.g., display validation errors)
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Assuming you have a span with class "text-danger" next to each input
                            $('#' + key + '-error').html(value[0]);
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).on('click', '#delete-recovery', function(e) {

            //first swal alert then call jax
            e.preventDefault();
            var id = $(this).data('id');
            var route = $(this).data('route');
           
            swal({
                    title: "Are you sure?",
                    text: "Once delete you can not recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: route,
                            type: 'POST',
                            data: 
                            {
                                "_token": "{{ csrf_token() }}",
                                "id": id
                            },
                            success: function(response) {
                               // how to load page thwn back to recovery tab
                                window.location.reload();
                                
                                
                            },
                            error: function(xhr) {
                                toastr.error('Something went wrong!');
                            }
                        });
                    }
                });


        });
    </script>
@endpush
