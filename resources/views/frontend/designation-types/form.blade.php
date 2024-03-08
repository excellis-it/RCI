@if (isset($edit))
    <form action="{{ route('designation-types.update', $designation_type->id) }}" method="POST" id="designation-type-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="row">
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Designation Type</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="designation_type" id="designation_type" value="{{ $designation_type->designation_type ?? '' }}"
                                    placeholder="">
                                <span class="text-danger" id="designation_type-error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <button type="submit" class="listing_add w-100 me-2">Update</button>
                    <a href="" class="listing_exit w-100">Back</a>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('designation-types.store') }}" method="POST" id="designation-type-create-form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="row">
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Designation Type</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="designation_type" id="designation_type"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center">
                    <button type="submit" class="listing_add w-100 me-2">Add</button>
                    <a href="" class="listing_exit w-100">Back</a>
                </div>
            </div>
        </div>
    </form>
@endif
