@if (isset($edit))
    <form action="{{ route('policy.update', $policy_edit->id) }}" method="POST" id="policy-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Policy Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="policy_name" value="{{ $policy_edit->policy_name }}" id="policy_name" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Policy No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="policy_no" value="{{ $policy_edit->policy_no }}" id="policy_no" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ ($policy_edit->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($policy_edit->status == 0) ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
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
    <form action="{{ route('policy.store') }}" method="POST" id="policy-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Policy Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="policy_name" id="policy_name" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Policy No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="policy_no" id="policy_no" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
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