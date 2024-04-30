@if (isset($edit))
    <form action="{{ route('cda-bills.update', $cdaBill->id) }}" method="POST" id="cda-bills-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="adv_no" id="adv_no"
                                    value="{{ $cdaBill->adv_no ?? '' }}" placeholder="">
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
                                    value="{{ $cdaBill->adv_date ?? '' }}" placeholder="">
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
                                    value="{{ $cdaBill->adv_amount ?? '' }}" placeholder="">
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
                                    
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" {{ isset($cdaBill->project_id) && $project->id == $cdaBill->project_id ? 'selected' : '' }}>{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="var_date" id="var_date"
                                    value="{{ $cdaBill->var_date ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="var_amount" id="var_amount"
                                    value="{{ $cdaBill->var_amount ?? '' }}" placeholder="">
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
                                   
                                    @foreach ($variable_types as $variable_type)
                                        <option value="{{ $variable_type->id }}" {{ isset($cdaBill->var_type_id) && $variable_type->id == $cdaBill->var_type_id ? 'selected' : '' }}>{{ $variable_type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col-md-8">
                <div class="row align-items-end">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="chq_no" id="chq_no"
                                    placeholder="" value="{{ $cdaBill->chq_no ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="chq_date" id="chq_date"
                                    placeholder="" value="{{ $cdaBill->chq_date ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Crv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="crv_no" id="crv_no"
                                    placeholder="" value="{{ $cdaBill->crv_no ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Update</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('cda-bills.store') }}" method="POST" id="cda-bills-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="adv_no" id="adv_no"
                                    value="{{ $cdaBill->adv_no ?? '' }}" placeholder="">
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
                                    value="{{ $cdaBill->adv_date ?? '' }}" placeholder="">
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
                                    value="{{ $cdaBill->adv_amount ?? '' }}" placeholder="">
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
                                    <option value="">Select Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="var_date" id="var_date"
                                    value="{{ $cdaBill->var_date ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="var_amount" id="var_amount"
                                    value="{{ $cdaBill->var_amount ?? '' }}" placeholder="">
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
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col-md-8">
                <div class="row align-items-end">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="chq_no" id="chq_no"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="chq_date" id="chq_date"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Crv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="crv_no" id="crv_no"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@endif
