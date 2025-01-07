<form action="{{ route('advance-funds.store') }}" method="POST" id="advance-funds-create-form">
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
                            <select class="js-example-basic-single form-control member_id" name="member_id" readonly>
                                <option value="">Select</option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}
                                    </option>
                                @endforeach

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
                            <input type="text" class="form-control member_name" name="member_name" placeholder=""
                                readonly>
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
                            <input type="text" class="form-control emp_id" name="emp_id" placeholder="" readonly>
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
                            <input type="text" class="form-control pers_no" name="pers_no" placeholder="" readonly>
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
                            <input type="text" class="form-control desig" name="desig" placeholder="" readonly>
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
                            <input type="text" class="form-control basic" name="basic" placeholder="" readonly>
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
                            <input type="text" class="form-control groups" name="groups" placeholder="" readonly>

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
                            <input type="text" class="form-control divisions" name="divisions" placeholder=""
                                readonly>

                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="memeber-funds-table">

    </div>




    <hr />
    <div class="row align-items-end">
        <div class="col-md-12">
            <div class="row align-items-end">
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Adv No</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="adv_no" id="adv_no" placeholder=""
                                value="{{ $advNo }}">
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
                            <input type="date" class="form-control" name="adv_date" id="adv_date" placeholder=""
                                value="{{ date('Y-m-d') }}" min="{{ $last_withdraw_date }}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Adv Amt<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <input type="number" class="form-control" name="adv_amount" id="adv_amount"
                                placeholder="">
                            <span class="text-danger advamnt_msg"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Project<span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-12">
                            <select name="project_id" id="project_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Vr Type</label>
                        </div>
                        <div class="col-md-12">
                            <select name="var_type_id" id="var_type_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($variable_types as $variable_type)
                                    <option value="{{ $variable_type->id }}">{{ $variable_type->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Cheque No.</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="chq_no" id="chq_no"
                                placeholder="">

                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Cheque Date</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control" name="chq_date" id="chq_date"
                                placeholder="">

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
                    <button type="submit" class="listing_add" id="advfund_save_btn">Save</button>
                </div>
            </div>

        </div>


    </div>
    </div>
</form>
