<form action="{{ route('advance-funds.update', $advance_fund->id) }}" method="POST" id="advance-funds-edit-form">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="row member-section">



                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Member</label>
                        </div>
                        <div class="col-md-12">
                            <select class=" form-control" name="member_id" readonly>


                                <option value="{{ $advance_fund->member_id }}" selected>
                                    {{ $advance_fund->member->name }}
                                </option>


                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>


                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Name</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control member_name" name="member_name"
                                value="{{ $advance_fund->member->name }}" placeholder="" readonly>
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
                            <input type="text" class="form-control emp_id" name="emp_id"
                                value="{{ $advance_fund->member->emp_id }}" placeholder="" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Pers No</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control pers_no" name="pers_no"
                                value="{{ $advance_fund->member->pers_no }}" placeholder="" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Desig</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control desig" name="desig"
                                value="{{ $advance_fund->member->designation->designation_type }}" placeholder=""
                                readonly>
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
                            <input type="text" class="form-control basic" name="basic"
                                value="{{ $advance_fund->member->basic }}" placeholder="" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Group</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control groups" name="groups"
                                value="{{ $advance_fund->member->groups->value }}" placeholder="" readonly>

                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Divisions</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control divisions" name="divisions"
                                value="{{ $advance_fund->member->divisions->value }}" placeholder="" readonly>

                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="memeber-funds-table-edit">

    </div> --}}




    <hr />
    <div class="row align-items-end">
        <div class="col-md-12">
            <div class="row align-items-end">
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        {{-- <div class="col-md-12">
                            <label>Adv No</label>
                        </div> --}}
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="adv_no"
                                value="{{ $advance_fund->adv_no }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Adv Dt</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control" name="adv_date"
                                value="{{ $advance_fund->adv_date }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Adv Amt</label>
                        </div>
                        <div class="col-md-12">
                            <input type="number" class="form-control" name="adv_amount"
                                value="{{ $advance_fund->adv_amount }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Project</label>
                        </div>
                        <div class="col-md-12">
                            <select name="project_id" id="project_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        {{ isset($advance_fund->project_id) && $project->id == $advance_fund->project_id ? 'selected' : '' }}>
                                        {{ $project->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Vr Type</label>
                        </div>
                        <div class="col-md-12">
                            <select name="var_type_id" id="var_type_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($variable_types as $variable_type)
                                    <option value="{{ $variable_type->id }}"
                                        {{ isset($advance_fund->var_type_id) && $variable_type->id == $advance_fund->var_type_id ? 'selected' : '' }}>
                                        {{ $variable_type->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Cheque No.</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="chq_no"
                                value="{{ $advance_fund->chq_no }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Cheque Date</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control" name="chq_date"
                                value="{{ $advance_fund->chq_date }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        {{-- <div class="col-md-2">
            <div class="mb-2">
                <button type="reset" class="listing_exit">Back</button>
            </div>
        </div> --}}

        <div class="row justify-content-end">
            <div class="col-md-2">
                <div class="mb-2">
                    <button type="submit" class="listing_add">Update</button>
                </div>
            </div>

            <div class="col-md-2">
                <div class="mb-2">
                    <a href="{{ route('advance-funds.index') }}" type="button" class="listing_exit">Back</a>
                </div>
            </div>

        </div>


    </div>
    </div>
</form>
