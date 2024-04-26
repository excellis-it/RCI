@if (isset($edit))
    <form action="{{ route('advance-funds.update', $advance_fund->id) }}" method="POST" id="advance-funds-edit-form">
        @method('PUT')
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
                            <div class="col-md-12">
                                <label>Pc No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="{{ $advance_fund->pc_no }}" name="pc_no" id="pc_no"
                                    >
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
                                <select class="form-select" name="emp_id" id="emp_id">
                                    <option value="">Select</option>
                                    @foreach ($employees as $employees)
                                        <option value="{{ $employees->id }}" {{ isset($advance_fund->emp_id) &&  $employees->id == $advance_fund->emp_id ? 'selected' : '' }}>
                                            {{ $employees->emp_id }}</option>
                                    @endforeach
                                </select>
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
                                <input type="text" class="form-control" value="{{ $advance_fund->name }}" name="name" id="name"
                                     placeholder="">
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
                                <select class="form-select" name="desig" id="desig">
                                    <option value="">Select</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}" {{ isset($advance_fund->desig) &&  $designation->id == $advance_fund->desig ? 'selected' : '' }}>
                                            {{ $designation->designation_type }}</option>
                                    @endforeach
                                </select>
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
                                <input type="text" class="form-control" value="{{ $advance_fund->basic }}"  name="basic" id="basic"
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
                                <select class="form-select" name="group" id="group">
                                    <option value="">Select</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}" {{ isset($advance_fund->group) &&  $group->id == $advance_fund->group ? 'selected' : '' }}>
                                            {{ $group->value }}</option>
                                    @endforeach
                                </select>
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
                                <select class="form-select" name="division" id="division">
                                    <option value="">Select</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" {{ isset($advance_fund->division) &&  $division->id == $advance_fund->division ? 'selected' : '' }}>
                                            {{ $division->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row align-items-end">
            <div class="col-md-8">
                <div class="row align-items-end">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="{{ $advance_fund->adv_no }}" name="adv_no" id="adv_no"
                                    placeholder="">
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
                                <input type="date" class="form-control" value="{{ $advance_fund->adv_date }}" name="adv_date" id="adv_date"
                                    placeholder="">
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
                                <input type="text" class="form-control" value="{{ $advance_fund->adv_amount }}" name="adv_amount" id="adv_amount"
                                    placeholder="">
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
                                        <option value="{{ $project->id }}" {{ isset($advance_fund->project_id) &&  $project->id == $advance_fund->project_id ? 'selected' : '' }}>{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row align-items-end">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq no</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="{{ $advance_fund->chq_no }}" name="chq_no" id="chq_no"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control"  value="{{ $advance_fund->chq_date }}" name="chq_date" id="chq_date"
                                    placeholder="">
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
                                        <option value="{{ $variable_type->id }}" {{ isset($advance_fund->var_type_id) &&  $variable_type->id == $advance_fund->var_type_id ? 'selected' : '' }}>{{ $variable_type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-end">
                        <div class="me-2 mb-2">
                            <button type="submit" class="listing_add">Update</button>
                        </div>
                        <div class="me-2 mb-2">
                            <button type="reset" class="listing_exit">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('advance-funds.store') }}" method="POST" id="advance-funds-create-form">
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
                            <div class="col-md-12">
                                <label>Pers No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pc_no" id="pc_no"
                                    >
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
                                <select class="form-select" name="emp_id" id="emp_id">
                                    <option value="">Select</option>
                                    @foreach ($employees as $employees)
                                        <option value="{{ $employees->id }}">
                                            {{ $employees->emp_id }}</option>
                                    @endforeach
                                </select>
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
                                     placeholder="">
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
                                <select class="form-select" name="desig" id="desig">
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
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="basic" id="basic"
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
                                <select class="form-select" name="group" id="group">
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
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Devision</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="division" id="division">
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
                </div>
            </div>
        </div>
        <hr />
        <div class="row align-items-end">
            <div class="col-md-8">
                <div class="row align-items-end">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="adv_no" id="adv_no"
                                    placeholder="">
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
                                <input type="date" class="form-control" name="adv_date" id="adv_date"
                                    placeholder="">
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
                                <input type="text" class="form-control" name="adv_amount" id="adv_amount"
                                    placeholder="">
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
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row align-items-end">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq no</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="chq_no" id="chq_no"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="chq_date" id="chq_date"
                                    placeholder="">
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
                                        <option value="{{ $variable_type->id }}" >{{ $variable_type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-end">
                        <div class="me-2 mb-2">
                            <button type="submit" class="listing_add">Save</button>
                        </div>
                        <div class="me-2 mb-2">
                            <button type="reset" class="listing_exit">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endif