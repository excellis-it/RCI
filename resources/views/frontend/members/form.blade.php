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
                <div class="arrow_left"><a href="{{ route('members.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Member Create</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Create</span></li>
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

                            <form action="{{ route('members.store') }}" method="POST" id="member-create-form">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Pers No</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="pers_no"
                                                                    id="pers_no" value="{{ old('pers_no') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>EMP-ID</label>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="emp_id"
                                                                    id="emp_id" value="{{ old('emp_id') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Gender</label>
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
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Name</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="name"
                                                                    id="name" value="{{ old('name') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PM Level</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="pm_level" id="pm_level">
                                                                    <option value="">Select</option>
                                                                    @foreach ($pmLevels as $pm_level)
                                                                        <option value="{{ $pm_level->id }}">
                                                                            {{ $pm_level->value }}</option>
                                                                    @endforeach

                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PM Index</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="pm_index" id="pm_index">
                                                                    <option value="">Select</option>
                                                                    @foreach ($pmIndexes as $pmIndex)
                                                                        <option value="{{ $pmIndex->id }}">
                                                                            {{ $pmIndex->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="basic"
                                                                    id="basic" value="{{ old('basic') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Desig</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="desig"
                                                                    id="desig">
                                                                    <option value="">Select</option>
                                                                    @foreach ($designations as $designation)
                                                                        <option value="{{ $designation->id }}">
                                                                            {{ $designation->designation_type }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Division</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="division"
                                                                    id="division">
                                                                    <option value="">Select</option>
                                                                    @foreach ($divisions as $division)
                                                                        <option value="{{ $division->id }}">
                                                                            {{ $division->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Group</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="group"
                                                                    id="group">
                                                                    <option value="">Select</option>
                                                                    @foreach ($groups as $group)
                                                                        <option value="{{ $group->id }}">
                                                                            {{ $group->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Cadre</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="cadre"
                                                                    id="cadre">
                                                                    <option value="">Select</option>
                                                                    @foreach ($cadres as $cadre)
                                                                        <option value="{{ $cadre->id }}">
                                                                            {{ $cadre->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Category</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="category"
                                                                    id="category">
                                                                    <option value="">Select</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->category }}</option>
                                                                    @endforeach

                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Status</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="status"
                                                                    id="status">
                                                                    <option value="">Select</option>
                                                                    <option value="Yes">YES</option>
                                                                    <option value="No">NO</option>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>OLD BP</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="old_bp"
                                                                    id="old_bp" value="{{ old('old_bp') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>G.Pay</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="g_pay"
                                                                    id="g_pay" value="{{ old('g_pay') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PayBand</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="pay_band"
                                                                    id="pay_band">
                                                                    <option value="">Select Payband</option>
                                                                    @foreach ($paybands as $payband)
                                                                        <option value="{{ $payband->id }}">
                                                                            {{ $payband->payband_type }}</option>
                                                                    @endforeach

                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Fund Type</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="fund_type"
                                                                    id="fund_type">
                                                                    <option value="">Select</option>
                                                                    @foreach ($fundTypes as $fundType)
                                                                        <option value="{{ $fundType->id }}">
                                                                            {{ $fundType->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOB</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control" name="dob"
                                                                    id="dob" value="{{ old('dob') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOJ Lab</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control" name="doj_lab"
                                                                    id="doj_lab" value="{{ old('doj_lab') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOJ Service1</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control"
                                                                    name="doj_service1" id="doj_service1"
                                                                    value="{{ old('doj_service1') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOP</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control" name="dop"
                                                                    id="dop" value="{{ old('dop') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Next Incr</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control"
                                                                    name="next_inr" id="next_inr"
                                                                    value="{{ old('next_inr') ?? '' }}" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Quater</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="quater"
                                                                    id="quater">
                                                                    <option value="">Select</option>
                                                                    @foreach ($quaters as $quater)
                                                                        <option value="{{ $quater->id }}">
                                                                            {{ $quater->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Quarter No</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="quater_no" id="quater_no"
                                                                    value="{{ old('quater_no') ?? '' }}" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOJ Service2</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control"
                                                                    name="doj_service2" id="doj_service2"
                                                                    value="{{ old('doj_service2') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>CGEIS</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="cgeis"
                                                                    id="cgeis" value="{{ old('cgeis') ?? '' }}"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Ex-Service</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="ex_service"
                                                                    id="ex_service">
                                                                    <option value="">Select</option>
                                                                    @foreach ($exServices as $exService)
                                                                        <option value="{{ $exService->id }}">
                                                                            {{ $exService->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PG</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="pg"
                                                                    id="pg">
                                                                    <option value="">Select</option>
                                                                    @foreach ($pgs as $pg)
                                                                        <option value="{{ $pg->id }}">
                                                                            {{ $pg->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>CGEGIS</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="cgegis"
                                                                    id="cgegis">
                                                                    <option value="">Select</option>
                                                                    @foreach ($cgegises as $cgegis)
                                                                        <option value="{{ $cgegis->id }}">
                                                                            {{ $cgegis->value }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Paystop</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-inline">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="pay_stop" id="inlineRadio1"
                                                                            value="none">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">None</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="pay_stop" id="inlineRadio2"
                                                                            value="full-pay">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Full Pay</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="pay_stop" id="inlineRadio3"
                                                                            value="table-rec">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio3">Table Rec</label>
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

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-3 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PIS">PIS</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="pis"
                                                            id="pis" value="{{ old('pis') ?? '' }}"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-9 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PM_Index">Address</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="pis_address"
                                                            id="pis_address" value="{{ old('pis_address') ?? '' }}"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-3 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PIS">SOS</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="sos"
                                                            id="sos" value="{{ old('sos') ?? '' }}"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-9 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PM_Index">Address</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="sos_address"
                                                            id="sos_address" value="{{ old('sos_address') ?? '' }}"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-between">
                                    <div class="col-lg-5">
                                        <div class="add-head">
                                            <h4>Residential Address</h4>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Address line 1</label>
                                                    <input type="text" class="form-control" name="resident_address1"
                                                        id="resident_address1" value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Address line 2 (optional)</label>
                                                    <input type="text" class="form-control" name="resident_address2"
                                                        id="resident_address2" value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">City / Town</label>
                                                    <select class="form-select" name="resident_city" id="resident_city">
                                                        <option value="">Select</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Dist.</label>
                                                    <input type="text" class="form-control" name="resident_district"
                                                        id="resident_district" value="" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">State</label>
                                                    <select class="form-select" name="resident_state"
                                                        id="resident_state">
                                                        <option value="">Select</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Pin</label>
                                                    <input type="text" class="form-control" name="resident_pin"
                                                        id="resident_pin" value="" placeholder="">
                                                    <span class="text-danger"></span>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="is_permanent_add" name="is_permanent_add">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Is the residential address the same as the permanent address?
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="add-head">
                                            <h4>Permanent Address</h4>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Address line 1</label>
                                                    <input type="text" class="form-control" name="permanent_add1"
                                                        id="permanent_add1" value="" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <div class="form-group">
                                                    <label for="">Address line 2</label>
                                                    <input type="text" class="form-control" name="permanent_add2"
                                                        id="permanent_add2" value="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">City / Town</label>
                                                    <select class="form-select" name="permanent_city"
                                                        id="permanent_city">
                                                        <option value="">Select</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Dist.</label>
                                                    <input type="text" class="form-control" name="permanent_dist"
                                                        id="permanent_dist" value="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">State</label>
                                                    <select class="form-select" name="permanent_state"
                                                        id="permanent_state">
                                                        <option value="">Select</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label for="">Pin</label>
                                                    <input type="text" class="form-control" name="permanent_pin"
                                                        id="permanent_pin" value="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Is this the permanent address same as above or different?
                                                    </label>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                                {{-- save cancel button design in right corner --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row justify-content-end">
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_add">Save</button>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
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
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var lastId = localStorage.getItem('lastId');
            if (lastId === null) {
                lastId = 1;
            } else {
                lastId = parseInt(lastId) + 1;
            }

            var randomId = 'RCI_CHESS' + String(lastId).padStart(4, '0');
            localStorage.setItem('lastId', lastId);
            document.getElementById('emp_id').value = randomId;
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#member-create-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();


                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {

                        //windows load with toastr message
                        window.location.reload();
                    },
                    error: function(xhr) {

                        // Handle errors (e.g., display validation errors)
                        //clear any old errors
                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Assuming you have a div with class "text-danger" next to each input
                            $('[name="' + key + '"]').next('.text-danger').html(value[
                                0]);
                        });
                    }
                });
            });
        });
    </script>
@endpush
