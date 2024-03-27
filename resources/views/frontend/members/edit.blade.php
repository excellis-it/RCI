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
                                    <div class="tab-pane fade show active" id="credits-tab-pane" role="tabpanel"
                                        aria-labelledby="credits-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form action="{{ route('members.credit.update') }}" id="member-credit-form" method="post">
                                                @csrf

                                                <input type="hidden" name="member_id" value="{{ $member->id }}">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Pay</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="pay" 
                                                                        value="{{ $member_credit->pay ?? (old('pay') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="da" value="{{ $member_credit->da ?? (old('da') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="tpt" value="{{ $member_credit->tpt ?? (old('tpt') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="cr_rent" id="cr_rent"
                                                                        value="{{ $member_credit->cr_rent ?? (old('cr_rent') ?? '') }}"
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
                                                                <div class="col-md-12">
                                                                    <label>G.Pay</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="g_pay" id="g_pay"
                                                                        value="{{ $member_credit->g_pay ?? (old('g_pay') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="hra" id="hra"
                                                                        value="{{ $member_credit->hra ?? (old('hra') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="da_on_tpt" id="da_on_tpt"
                                                                        value="{{ $member_credit->da_on_tpt ?? (old('da_on_tpt') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="cr_elec" id="cr_elec"
                                                                        value="{{ $member_credit->cr_elec ?? (old('cr_elec') ?? '') }}"
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
                                                                <div class="col-md-12">
                                                                    <label>FPA</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="fpa" id="fpa"
                                                                        value="{{ $member_credit->fpa ?? (old('fpa') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="s_pay" id="s_pay"
                                                                        value="{{ $member_credit->s_pay ?? (old('s_pay') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="hindi" id="hindi"
                                                                        value="{{ $member_credit->hindi ?? (old('hindi') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="cr_water" id="cr_water"
                                                                        value="{{ $member_credit->cr_water ?? (old('cr_water') ?? '') }}"
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
                                                                <div class="col-md-12">
                                                                    <label>2 Add Inc</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="add_inc2" id="add_inc2"
                                                                        value="{{ $member_credit->add_inc2 ?? (old('add_inc2') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="npa" id="npa"
                                                                        value="{{ $member_credit->npa ?? (old('npa') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="deptn_alw" id="deptn_alw"
                                                                        value="{{ $member_credit->deptn_alw ?? (old('deptn_alw') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="misc_1" id="misc_1"
                                                                        value="{{ $member_credit->misc1 ?? (old('misc_1') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="var_incr" id="var_incr"
                                                                        value="{{ $member_credit->var_incr ?? (old('var_incr') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="wash_alw" id="wash_alw"
                                                                        value="{{ $member_credit->wash_alw ?? (old('wash_alw') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="dis_alw" id="dis_alw"
                                                                        value="{{ $member_credit->dis_alw ?? (old('dis_alw') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="misc_2" id="misc_2"
                                                                        value="{{ $member_credit->misc2 ?? (old('misc_2') ?? '') }}" placeholder="">
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
                                                                            <input type="text" class="form-control"
                                                                                name="risk_alw" id="risk_alw"
                                                                                value="{{ $member_credit->risk_alw ?? (old('risk_alw') ?? '') }}"
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
                                                                            <label>Tot.Credits</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control"
                                                                                name="tot_credits" id="tot_credits"
                                                                                value="{{ $member_credit->tot_credits ?? (old('tot_credits') ?? '') }}"
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
                                                                <div class="col-md-12">
                                                                    <label>Remarks</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="remarks" id="remarks"
                                                                        value="{{ $member_credit->remarks ?? (old('remarks') ?? '') }}"
                                                                        placeholder="">
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
                                                                        <button type="button"
                                                                            class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="button"
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
                                            <form action="{{ route('members.debit.update') }}" id="member-debit-form" method="post">
                                                @csrf

                                                <input type="hidden" name="member_id" value="{{ $member->id }}">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>GPA Sub</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="gpa_sub" id="gpa_sub"
                                                                        value="{{ $member_debit->gpa_sub ?? (old('gpa_sub') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="eol" id="eol"
                                                                        value="{{ $member_debit->eol ?? (old('eol') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="rent" id="rent"
                                                                        value="{{ $member_debit->rent ?? (old('rent') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="lf_arr" id="lf_arr"
                                                                        value="{{ $member_debit->lf_arr ?? (old('lf_arr') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="tada" id="tada"
                                                                        value="{{ $member_debit->tada ?? (old('tada') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="hba" id="hba"
                                                                        value="{{ $member_debit->hba ?? (old('hba') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="misc1" id="misc1"
                                                                        value="{{ $member_debit->misc1 ?? (old('misc1') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="gpf_rec" id="gpf_rec"
                                                                        value="{{ $member_debit->gpf_rec ?? (old('gpf_rec') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="i_tax" id="i_tax"
                                                                        value="{{ $member_debit->i_tax ?? (old('i_tax') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="elec" id="elec"
                                                                        value="{{ $member_debit->elec ?? (old('elec') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="elec_arr" id="elec_arr"
                                                                        value="{{ $member_debit->elec_arr ?? (old('elec_arr') ?? '') }}"
                                                                        placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="medi" id="medi"
                                                                        value="{{ $member_debit->medi ?? (old('medi') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="pc" id="pc"
                                                                        value="{{ $member_debit->pc ?? (old('pc') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="misc2" id="misc2"
                                                                        value="{{ $member_debit->misc2 ?? (old('misc2') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="gpf_arr" id="gpf_arr"
                                                                        value="{{ $member_debit->gpf_arr ?? (old('gpf_arr') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="ecess" id="ecess"
                                                                        value="{{ $member_debit->ecess ?? (old('ecess') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="water" id="water"
                                                                        value="{{ $member_debit->water ?? (old('water') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="water_arr" id="water_arr"
                                                                        value="{{ $member_debit->water_arr ?? (old('water_arr') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="ltc" id="ltc"
                                                                        value="{{ $member_debit->ltc ?? (old('ltc') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="fadv" id="fadv"
                                                                        value="{{ $member_debit->fadv ?? (old('fadv') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="misc3" id="misc3"
                                                                        value="{{ $member_debit->misc3 ?? (old('misc3') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="cgegis" id="cgegis"
                                                                        value="{{ $member_debit->cgegis ?? (old('cgegis') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="cda" id="cda"
                                                                        value="{{ $member_debit->cda ?? (old('cda') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="furn" id="furn"
                                                                        value="{{ $member_debit->furn ?? (old('furn') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="furn_arr" id="furn_arr"
                                                                        value="{{ $member_debit->furn_arr ?? (old('furn_arr') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="car" id="car"
                                                                        value="{{ $member_debit->car ?? (old('car') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="hra_rec" id="hra_rec"
                                                                        value="{{ $member_debit->hra_rec ?? (old('hra_rec') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="tot_debits" id="tot_debits"
                                                                        value="{{ $member_debit->tot_debits ?? (old('tot_debits') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="cghs" id="cghs"
                                                                        value="{{ $member_debit->cghs ?? (old('cghs') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="ptax" id="ptax"
                                                                        value="{{ $member_debit->ptax ?? (old('ptax') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="cmg" id="cmg"
                                                                        value="{{ $member_debit->cmg ?? (old('cmg') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="pli" id="pli"
                                                                        value="{{ $member_debit->pli ?? (old('pli') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="scooter" id="scooter"
                                                                        value="{{ $member_debit->scooter ?? (old('scooter') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="tpt_rec" id="tpt_rec"
                                                                        value="{{ $member_debit->tpt_rec ?? (old('tpt_rec') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="net_pay" id="net_pay"
                                                                        value="{{ $member_debit->net_pay ?? (old('net_pay') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="basics" id="basics"
                                                                        value="{{ $member_debit->basic ?? (old('basic') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="remarks" id="remarks"
                                                                        value="{{ $member_debit->remarks ?? (old('remarks') ?? '') }}" placeholder="">
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
                                    <div class="tab-pane fade" id="recoveries-tab-pane" role="tabpanel"
                                        aria-labelledby="recoveries-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form action="{{ route('members.recovery.update') }}" id="member-recovery-form" method="post">
                                                @csrf

                                                <input type="hidden" name="member_id" value="{{ $member->id }}">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>V.Incr</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="v_incr" id="v_incr"
                                                                        value="{{ $member_recovery->v_incr ?? (old('v_incr') ?? '') }}" placeholder="">
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
                                                                    <input type="text" class="form-control"
                                                                        name="noi" id="noi"
                                                                        value="{{ $member_recovery->noi ?? (old('noi') ?? '') }}"
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
                                                                <div class="col-md-12">
                                                                    <label>Total</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="total" id="total"
                                                                        value="{{ $member_recovery->total ?? (old('total') ?? '') }}"
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
                                                                <div class="col-md-12">
                                                                    <label>Stop</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select class="form-select" name="stop" id="stop">
                                                                        <option value="Yes" {{ (isset($member_recovery->stop) && $member_recovery->stop == 'Yes') || old('stop') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                                        <option value="No" {{ (isset($member_recovery->stop) && $member_recovery->stop == 'No') || old('stop') == 'No' ? 'selected' : '' }}>No</option>
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
                                                                        <button type="button"
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
                                                                        <button type=""
                                                                            class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type=""
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
                                    <div class="tab-pane fade" id="core-tab-pane" role="tabpanel"
                                        aria-labelledby="core-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <form action="{{ route('members.core-info.update') }}" id="member-credit-form" method="post">
                                                @csrf

                                                <input type="hidden" name="member_id" value="{{ $member->id }}">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Bank A/c No.</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="bank_acc_no" id="bank_acc_no"
                                                                        value="{{ $member_core->bank_acc_no ?? (old('bank_acc_no') ?? '') }}"
                                                                        placeholder="">
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
                                                                        name="ccs_mem_no" id="ccs_mem_no"
                                                                        value="{{ $member_core->ccs_mem_no ?? (old('ccs_mem_no') ?? '') }}"
                                                                        placeholder="">
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
                                                                        name="fpa" id="fpa"
                                                                        value="{{ $member_core->fpa ?? (old('fpa') ?? '') }}"
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
                                                                <div class="col-md-12">
                                                                    <label>Bank</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select class="form-select" name="bank"
                                                                        id="bank">
                                                                       @foreach($banks as $bank)
                                                                        <option value="{{ $bank->id }}" {{ (isset($member_core->bank) && $member_core->bank == $bank->id) || old('bank') == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>                                                             
                                                                       @endforeach                                                                   
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
                                                                        name="gpf_sub" id="gpf_sub"
                                                                        value="{{ $member_core->gpf_sub ?? (old('gpf_sub') ?? '') }}"
                                                                        placeholder="">
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
                                                                        name="add2" id="add2"
                                                                        value="{{ $member_core->add2 ?? (old('add2') ?? '') }}"
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
                                                                <div class="col-md-12">
                                                                    <label>GPF A/c No</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="gpf_acc_no" id="gpf_acc_no"
                                                                        value="{{ $member_core->gpf_acc_no ?? (old('gpf_acc_no') ?? '') }}"
                                                                        placeholder="">
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
                                                                        name="i_tax" id="i_tax"
                                                                        value="{{ $member_core->i_tax ?? (old('i_tax') ?? '') }}"
                                                                        placeholder="">
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
                                                                        name="pran_no" id="pran_no"
                                                                        value="{{ $member_core->pran_no ?? (old('pran_no') ?? '') }}"
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
                                                                <div class="col-md-12">
                                                                    <label>PAN No</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="pan_no" id="pan_no"
                                                                        value="{{ $member_core->pan_no ?? (old('pan_no') ?? '') }}"
                                                                        placeholder="">
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
                                                                        name="ecess" id="ecess"
                                                                        value="{{ $member_core->ecess ?? (old('ecess') ?? '') }}"
                                                                        placeholder="">
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
                                                                        name="ben_acc_no" id="ben_acc_no"
                                                                        value="{{ $member_core->ben_acc_no ?? (old('ben_acc_no') ?? '') }}"
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
                                                                        <div class="col-md-12">
                                                                            <label>DCMAF No</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <input type="text" class="form-control"
                                                                                name="dcmaf_no" id="dcmaf_no"
                                                                                value="{{ $member_core->dcmaf_no ?? (old('dcmaf_no') ?? '') }}"
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
                                                                                name="s_pay" id="s_pay"
                                                                                value="{{ $member_core->s_pay ?? (old('s_pay') ?? '') }}"
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
                                                                        <button type=""
                                                                            class="another-btn">Another</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type="submit"
                                                                            class="listing_add">Update</button>
                                                                    </div>
                                                                    <div class="form-group col-md-3 mb-2">
                                                                        <button type=""
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
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
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
                                    <div class="tab-pane fade" id="loan-tab-pane" role="tabpanel"
                                        aria-labelledby="loan-tab" tabindex="0">
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
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>Loan Name</label>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <select class="form-select" name="gender"
                                                                                id="gender">
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
                                                                            <label>Tot No of Inst</label>
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
                                                                            <label>Remarks</label>
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
                                                                            <label>Inst Amt</label>
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
                                                                            <label>Tot Amt</label>
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
                                                                            <label>Balance</label>
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
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
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
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
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
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
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
                                                                <div class="col-md-12">
                                                                    <label>GPF A/c No</label>
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
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>I.Tax</label>
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
                                                    <div class="col-md-3">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>PRAN No</label>
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
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
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
                                                                        value="{{ old('basic') ?? '' }}"
                                                                        placeholder="">
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
                                                                        value="{{ old('basic') ?? '' }}"
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
                                                                            <label>G.pay</label>
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
                                                                            <label>Casre</label>
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
                                                                            <label>DOB</label>
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
                                                                            <label>Next Incr</label>
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
                                                                            <label>Ex-Service</label>
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
                                                                            <label>PayBand</label>
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
                                                                            <label>PM Level</label>
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
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>EMP-ID</label>
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
                                                                            <label>Gender</label>
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
                                                                            <label>Status</label>
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
                                                                            <label>DOJ Lab</label>
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
                                                                            <label>Quater</label>
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
                                                                            <label>PH</label>
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
                                                                            <label>Old Basic</label>
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
                                                                            <label>PM Index</label>
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
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Name</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control"
                                                                        name="basic" id="basic" value=""
                                                                        placeholder="">
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
                                                                    <label>Category</label>
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
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group mb-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-12">
                                                                            <label>DOJ Service</label>
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
                                                                            <label>Quater No</label>
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
                                                                            <label>DOP</label>
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
                                                                            <label>Fund Typ</label>
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
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-12">
                                                                        <label>CGEGIS</label>
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
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                            name="basic" id="basic"
                                                                            value="" placeholder="">
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
                                                                            <input class="form-check-input"
                                                                                type="radio" name="inlineRadioOptions"
                                                                                id="inlineRadio1" value="option1">
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio1">None</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input"
                                                                                type="radio" name="inlineRadioOptions"
                                                                                id="inlineRadio2" value="option2">
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio2">Full Pay</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input"
                                                                                type="radio" name="inlineRadioOptions"
                                                                                id="inlineRadio3" value="option3">
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio3">Table Rce</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group mb-2">
                                                                    <button type="submit" class="listing_add">Save &
                                                                        Update</button>
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
                },
                'da': {
                    required: true
                },
                'tpt': {
                    required: true
                },
                'cr_rent': {
                    required: true
                },
                'g_pay' : {
                    required: true
                },
                'hra' : {
                    required: true
                },
                'da_on_tpt': {
                    required: true
                },
                'cr_elec': {
                    required: true
                },
                'fpa':{
                    required: true
                },
                's_pay' :{
                    required: true
                },
                'hindi':{
                    required: true
                },
                'cr_water' : {
                    required: true
                },
                'add_inc2': {
                    required: true
                },
                'npa': {
                    required: true
                },
                'deptn_alw' : {
                    required: true
                },
                'misc_1':{
                    required: true
                },
                'var_incr':{
                    required: true
                },
                'wash_alw' : {
                    required: true
                },
                'dis_alw':{
                    required: true
                },
                'misc_2':{
                    required: true
                },
                'risk_alw':{
                    required: true
                },
                'tot_credits': {
                    required: true
                },
                'remarks':{
                    required: true
                }
                

            },
            messages: {
                // Define messages for your form fields
                'pay': {
                    required: "Please enter pay",
                },
                'da': {
                    required: "Please enter DA",
                },
                'tpt': {
                    required: "Please enter TPT",
                },
                'cr_rent': {
                    required: "Please enter Cr Rent",
                },
                'g_pay': {
                    required: "Please enter G.pay",
                },
                'hra' : {
                    required: "Please enter HRA",
                },
                'da_on_tpt' : {
                    required: "Please enter da on TPT",
                },
                'cr_elec' : {
                    required: "Please enter Cr Elec",
                },
                'fpa' : {
                    required: "Please enter FPA",
                },
                's_pay': {
                    required: "Please enter S. pay",
                },
                'hindi': {
                    required: "Please enter Hindi",
                },
                'cr_water': {
                    required: "Please enter Cr Water",
                },
                'add_inc2': {
                    required: "Please enter 2 Add Inc",
                },
                'npa': {
                    required: "Please enter Npa",
                },
                'deptn_alw': {
                    required: "Please enter Deptn Alw",
                },
                'misc_1': {
                    required: "Please enter Misc 1",
                },
                'var_incr' :{
                    required: "Please enter Var Incr",
                },
                'wash_alw' :{
                    required: "Please enter Wash Alw",
                },
                'dis_alw' :{
                    required: "Please enter Dis Alw",
                },
                'misc_2' :{
                    required: "Please enter Misc 2",
                },
                'risk_alw' :{
                    required: "Please enter Risk Alw",
                },
                'tot_credits' :{
                    required: "Please enter Tot Credit",
                },
                'remarks' :{
                    required: "Please enter Remarks",
                }
            },
            submitHandler: function(form) {
                var formData = $(form).serialize();

                $.ajax({
                    url: $(form).attr('action'),
                    type: $(form).attr('method'),
                    data: formData,
                    success: function(response) {
                        toastr.success('Credit details added successfully');
                    },
                    error: function(xhr) {
                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('[name="' + key + '"]').next('.text-danger').html(value[0]);
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
            rules: {
                // Define rules for your form fields
                'gpa_sub': {
                    required: true
                },
                'eol': {
                    required: true
                },
                'rent': {
                    required: true
                },
                'lf_arr': {
                    required: true
                },
                'tada' : {
                    required: true
                },
                'hba' : {
                    required: true
                },
                'misc1': {
                    required: true
                },
                'gpf_rec': {
                    required: true
                },
                'i_tax':{
                    required: true
                },
                'elec' :{
                    required: true
                },
                'elec_arr':{
                    required: true
                },
                'medi' : {
                    required: true
                },
                'pc': {
                    required: true
                },
                'misc2': {
                    required: true
                },
                'gpf_arr' : {
                    required: true
                },
                'ecess':{
                    required: true
                },
                'water':{
                    required: true
                },
                'water_arr' : {
                    required: true
                },
                'ltc':{
                    required: true
                },
                'fadv':{
                    required: true
                },
                'misc3':{
                    required: true
                },
                'cgegis': {
                    required: true
                },
                'cda':{
                    required: true
                },
                'furn':{
                    required: true
                },
                'furn_arr':{
                    required: true
                },
                'car':{
                    required: true
                },
                'hra_rec':{
                    required: true
                },
                'tot_debits':{
                    required: true
                },
                'cghs':{
                    required: true
                },
                'ptax':{
                    required: true
                },
                'cmg':{
                    required: true
                },
                'pli':{
                    required: true
                },
                'scooter':{
                    required: true
                },
                'tpt_rec':{
                    required: true
                },
                'net_pay':{
                    required: true
                },
                'basic':{
                    required: true
                },
                'remarks':{
                    required: true
                }
                

            },
            messages: {
                // Define messages for your form fields
                'gpa_sub': {
                    required: "Please enter Gpa Sub",
                },
                'eol': {
                    required: "Please enter Eol",
                },
                'rent': {
                    required: "Please enter rent",
                },
                'lf_arr': {
                    required: "Please enter Lf arr",
                },
                'tada': {
                    required: "Please enter Tada",
                },
                'hba' : {
                    required: "Please enter Hba",
                },
                'misc1' : {
                    required: "Please enter Misc 1",
                },
                'gpf_rec' : {
                    required: "Please enter GPF Rec",
                },
                'i_tax' : {
                    required: "Please enter I Tax",
                },
                'elec': {
                    required: "Please enter Elec",
                },
                'elec_arr': {
                    required: "Please enter Elec Arr",
                },
                'medi': {
                    required: "Please enter Medi",
                },
                'pc': {
                    required: "Please enter Pc",
                },
                'misc2': {
                    required: "Please enter Misc2",
                },
                'gpf_arr': {
                    required: "Please enter Gpf Arr",
                },
                'ecess': {
                    required: "Please enter Ecess",
                },
                'water' :{
                    required: "Please enter Water",
                },
                'water_arr' :{
                    required: "Please enter Wash Arr",
                },
                'ltc' :{
                    required: "Please enter Itc",
                },
                'fadv' :{
                    required: "Please enter Fadv",
                },
                'misc3' :{
                    required: "Please enter Misc 3",
                },
                'cgegis' :{
                    required: "Please enter Cgegis",
                },
                'cda' :{
                    required: "Please enter Cda",
                },
                'furn':{
                    required: "Please enter Furn",
                },
                'furn_arr':{
                    required: "Please enter Furn Arr",
                },
                'car':{
                    required: "Please enter Car",
                },
                'hra_rec':{
                    required: "Please enter Hra Rec",
                },
                'tot_debits':{
                    required: "Please enter Tot Debits",
                },
                'cghs':{
                    required: "Please enter Cghs",
                },
                'ptax':{
                    required: "Please enter Ptax",
                },
                'cmg':{
                    required: "Please enter Cmg",
                },
                'pli':{
                    required: "Please enter Pli",
                },
                'scooter':{
                    required: "Please enter Scooter",
                },
                'tpt_rec':{
                    required: "Please enter Tpt Rec",
                },
                'net_pay':{
                    required: "Please enter Net Pay",
                },
                'basic':{
                    required: "Please enter Basic",
                },
                'remarks':{
                    required: "Please enter Remarks",
                }
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
                        toastr.success('Debit details added successfully');
                    },
                    error: function(xhr) {
                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('[name="' + key + '"]').next('.text-danger').html(value[0]);
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
             },
             'stop': {
                 required: true
             }
             

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
             },
             'stop': {
                 required: "Please enter Stop",
             }
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
                     toastr.success('Recovery details added successfully');
                 },
                 error: function(xhr) {
                     $('.text-danger').html('');
                     var errors = xhr.responseJSON.errors;
                     $.each(errors, function(key, value) {
                         $('[name="' + key + '"]').next('.text-danger').html(value[0]);
                     });
                 }
             });
         }
     });
 });
</script>
    
@endpush

