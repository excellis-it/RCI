@if (isset($edit))
    <form action="{{ route('payscale-types.update', $payscale_type->id) }}" method="POST" id="payscale-type-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="row">
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Payscale Type</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="payscale_type" id="payscale_type" value="{{ $payscale_type->payscale_type ?? '' }}"
                                    placeholder="">
                                <span class="text-danger" id="payscale_type-error"></span>
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
    <form action="{{ route('payscale-types.store') }}" method="POST" id="payscale-type-create-form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="row">
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Payscale Type</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="payscale_type" id="payscale_type"
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
