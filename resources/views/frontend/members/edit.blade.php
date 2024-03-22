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
                                                    <input type="text" class="form-control" name="pers_no" id="pers_no" value="" >
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
                                                    <input type="text" class="form-control" name="emp_id" id="emp_id" value="" placeholder="">
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
                                                    <input type="text" class="form-control" name="name" id="name" value="" placeholder="">
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
                                                    <input type="text" class="form-control" name="desig" id="desig" value="" placeholder="">
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
                                                    <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
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
                                                    <input type="text" class="form-control" name="group" id="group" value="" placeholder="">
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
                                                    <input type="text" class="form-control" name="devision" id="devision" value="" placeholder="">
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
                                        <button class="nav-link active" id="credits-tab" data-bs-toggle="tab" data-bs-target="#credits-tab-pane" type="button" role="tab" aria-controls="credits-tab-pane" aria-selected="true">Credits</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="debits-tab" data-bs-toggle="tab" data-bs-target="#debits-tab-pane" type="button" role="tab" aria-controls="debits-tab-pane" aria-selected="false">Debits</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="recoveries-tab" data-bs-toggle="tab" data-bs-target="#recoveries-tab-pane" type="button" role="tab" aria-controls="recoveries-tab-pane" aria-selected="false">Recoveries</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="core-tab" data-bs-toggle="tab" data-bs-target="#core-tab-pane" type="button" role="tab" aria-controls="core-tab-pane" aria-selected="false">Core Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="policy-tab" data-bs-toggle="tab" data-bs-target="#policy-tab-pane" type="button" role="tab" aria-controls="policy-tab-pane" aria-selected="false">Policy Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="loan-tab" data-bs-toggle="tab" data-bs-target="#loan-tab-pane" type="button" role="tab" aria-controls="loan-tab-pane" aria-selected="false">Loan Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="var-tab" data-bs-toggle="tab" data-bs-target="#var-tab-pane" type="button" role="tab" aria-controls="var-tab-pane" aria-selected="false">Var.Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pers-tab" data-bs-toggle="tab" data-bs-target="#pers-tab-pane" type="button" role="tab" aria-controls="pers-tab-pane" aria-selected="false">Pers Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="exp-tab" data-bs-toggle="tab" data-bs-target="#exp-tab-pane" type="button" role="tab" aria-controls="exp-tab-pane" aria-selected="false">Expectations</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="credits-tab-pane" role="tabpanel" aria-labelledby="credits-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form action=""  id="member-credit-form">
                                               
                                                 
                                                <input type="hidden" name="member_id" value="{{ $member->id }}">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Pay</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="pay" id="pay" value="{{ old('pay') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>DA</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="da" id="da" value="{{ old('da') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>TPT</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="tpt" id="tpt" value="{{ old('tpt') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Cr Rent</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="cr_rent" id="cr_rent" value="{{ old('cr_rent') ?? '' }}" placeholder="">
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
                                                                    <label>G.Pay</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="g_pay" id="g_pay" value="{{ old('g_pay') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>HRA</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="hra" id="hra" value="{{ old('hra') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>DA on TPT</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="da_on_tpt" id="da_on_tpt" value="{{ old('da_on_tpt') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Cr Elec</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="cr_elec" id="cr_elec" value="{{ old('cr_elec') ?? '' }}" placeholder="">
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
                                                                    <label>FPA</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="fpa" id="fpa" value="{{ old('fpa') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>S.Pay</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="s_pay" id="s_pay" value="{{ old('s_pay') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Hindi</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="hindi" id="hindi" value="{{ old('hindi') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Cr Water</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="cr_water" id="cr_water" value="{{ old('cr_water') ?? '' }}" placeholder="">
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
                                                                    <label>2 Add Inc</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="2_add_inc" id="2_add_inc" value="{{ old('2_add_inc') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>NPA</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="npa" id="npa" value="{{ old('npa') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Deptn Alw</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="deptn_alw" id="deptn_alw" value="{{ old('deptn_alw') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Misc 1</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="misc_1" id="misc_1" value="{{ old('misc_1') ?? '' }}" placeholder="">
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
                                                                    <label>Var Incr</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="var_incr" id="var_incr" value="{{ old('var_incr') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Wash Alw</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="wash_alw" id="wash_alw" value="{{ old('wash_alw') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Dis Alw</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="dis_alw" id="dis_alw" value="{{ old('dis_alw') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Misc 2</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="misc_2" id="misc_2" value="{{ old('misc_2') ?? '' }}" placeholder="">
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
                                                                        <div class="col-md-12">
                                                                            <label>Risk Alw</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="risk_alw" id="risk_alw" value="{{ old('risk_alw') ?? '' }}" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Tot.Credits</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="tot_credits" id="tot_credits" value="{{ old('tot_credits') ?? '' }}" placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>Remarks</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="remarks" id="remarks" value="{{ old('remarks') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
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
                                                                        <input type="text" class="form-control" name="gross_pay" id="gross_pay" value="{{ old('gross_pay') ?? '' }}" placeholder="">
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
                                                                        <input type="text" class="form-control" name="top_debits" id="top_debits" value="{{ old('top_debits') ?? '' }}" placeholder="">
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
                                                                        <input type="text" class="form-control" name="net_pay" id="net_pay" value="{{ old('net_pay') ?? '' }}" placeholder="">
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
                                                                        <input type="text" class="form-control" name="tot_rec" id="tot_rec" value="{{ old('tot_rec') ?? '' }}" placeholder="">
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
                                                                        <input type="text" class="form-control" name="take_home" id="take_home" value="{{ old('take_home') ?? '' }}" placeholder="">
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
                                                                        <button type="" class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="" class="listing_exit">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="debits-tab-pane" role="tabpanel" aria-labelledby="debits-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>GPA Sub</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="gpa_sub" id="gpa_sub" value="{{ old('gpa_sub') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Eol/Hpl</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="eol" id="eol" value="{{ old('eol') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Rent</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="rent" id="rent" value="{{ old('rent') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>LF Arr</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="lf_arr" id="lf_arr" value="{{ old('lf_arr') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>TADA</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="tada" id="tada" value="{{ old('tada') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>HBA</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="hba" id="hba" value="{{ old('hba') ?? '' }}" placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>Misc 1</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="misc_1" id="misc_1" value="{{ old('misc_1') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>GPF Rec</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="gpf_rec" id="gpf_rec" value="{{ old('gpf_rec') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>I.Tax</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="i_tax" id="i_tax" value="{{ old('i_tax') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Elec</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="elec" id="elec" value="{{ old('elec') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Elec Arr</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="elec_arr" id="elec_arr" value="{{ old('elec_arr') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Medi</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>Pc</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Misc 2</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>GPF Arr</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Ecess</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Water</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Water Arr</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>LTC</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Fadv</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Misc3</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>CGEGIS</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>CDA</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Furn</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>Furn Arr</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>CAR</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>HRA Rec</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>TotDebits</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>CGHS</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>P.Tax</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>CMG</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>PLI</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Scooter</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>TPT Rec</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Net Pay</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Basic</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>Remarks</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                    <span class="text-danger"></span>
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
                                                                        <button type="submit" class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_exit">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="recoveries-tab-pane" role="tabpanel" aria-labelledby="recoveries-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>V.Incr</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <label>NOI</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <label>Total</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <label>Stop</label>
                                                                </div>
                                                                <div class="col-md-12">
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
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Save</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="delete-btn-1">Delete</button>
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
                                                                        <button type="submit" class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_exit">Exit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="core-tab-pane" role="tabpanel" aria-labelledby="core-tab" tabindex="0">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>GPF Sub</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                        <button type="submit" class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_exit">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="policy-tab-pane" role="tabpanel" aria-labelledby="policy-tab" tabindex="0">
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
                                                                <div class="col-md-12">
                                                                    <label>Policy Name</label>
                                                                </div>
                                                                <div class="col-md-12">
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
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Policy No</label>
                                                                </div>
                                                                <div class="col-md-12">
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
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Amount</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                        <div class="row justify-content-end">
                                                            <div class="col-md-6">
                                                                <div class="row justify-content-end">
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Save</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="delete-btn-1">Delete</button>
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
                                                                        <button type="submit" class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_exit">Exit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="loan-tab-pane" role="tabpanel" aria-labelledby="loan-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="recov-table">
                                                            <table class="table customize-table mb-0 align-middle bg_tbody">
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
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Loan Name</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <select class="form-select" name="gender" id="gender">
                                                                                <option value="">Inst Amt</option>
                                                                                <option value="Male">Inst Amt</option>
                                                                                <option value="Female">Inst Amt</option>
                                                                                <option value="Others">Inst Amt</option>
                                                                            </select>
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Present InstNo</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Tot No of Inst</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Remarks</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Inst Amt</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Tot Amt</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Balance</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
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
                                                                        <button type="submit" class="listing_add">Save</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="delete-btn-1">Delete</button>
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
                                                                        <button type="submit" class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Save</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_exit">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="var-tab-pane" role="tabpanel" aria-labelledby="var-tab" tabindex="0">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>GPF Sub</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
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
                                                                        <button type="submit" class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_exit">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pers-tab-pane" role="tabpanel" aria-labelledby="pers-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Basic</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>G.pay</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Casre</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                                        <div class="col-md-12">
                                                                            <label>DOB</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Next Incr</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Ex-Service</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                                        <div class="col-md-12">
                                                                            <label>PayBand</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                                        <div class="col-md-12">
                                                                            <label>PM Level</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>EMP-ID</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Gender</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                                        <div class="col-md-12">
                                                                            <label>Status</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                                        <div class="col-md-12">
                                                                            <label>DOJ Lab</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Quater</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                                        <div class="col-md-12">
                                                                            <label>PH</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                                        <div class="col-md-12">
                                                                            <label>Old Basic</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>PM Index</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Name</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                    <span class="text-danger"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Desig</label>
                                                                </div>
                                                                <div class="col-md-12">
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
                                                                <div class="col-md-12">
                                                                    <label>Category</label>
                                                                </div>
                                                                <div class="col-md-12">
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
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>DOJ Service</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Quater No</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>DOP</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Fund Typ</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                            <span class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-12">
                                                                        <label>CGEGIS</label>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <select class="form-select" name="gender" id="gender">
                                                                            <option value="">Select</option>
                                                                            <option value="Male">1</option>
                                                                            <option value="Female">2</option>
                                                                            <option value="Others">3</option>
                                                                        </select>
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group mb-3">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-12">
                                                                        <label>Paystop</label>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                                            <label class="form-check-label" for="inlineRadio1">None</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                            <label class="form-check-label" for="inlineRadio2">Full Pay</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                                            <label class="form-check-label" for="inlineRadio3">Table Rce</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-2">
                                                                    <button type="submit" class="listing_add">Save & Update</button>
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
                                                                        <button type="submit" class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_exit">Exit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="exp-tab-pane" role="tabpanel" aria-labelledby="exp-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="recov-table">
                                                            <table class="table customize-table mb-0 align-middle bg_tbody">
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
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
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
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
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
                                                                            <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
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
                                                                        <div class="col-md-12">
                                                                            <label>Month</label>
                                                                        </div>
                                                                        <div class="col-md-12">
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
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Remark</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control" name="basic" id="basic" value="" placeholder="">
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
                                                                        <button type="submit" class="listing_add">Save</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="delete-btn-1">Delete</button>
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
                                                                        <button type="submit" class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit" class="listing_exit">Exit</button>
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