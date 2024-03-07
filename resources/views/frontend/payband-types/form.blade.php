@if (isset($edit))
    <form action="{{ route('payband-types.update', $payband_type->id) }}" method="POST" id="payband-type-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <label>Payband Type</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="payband_type" id="payband_type"
                                    value="{{ $payband_type->payband_type }}" placeholder="">
                                <span class="text-danger" id="payband_type-error"></span>
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
    <form action="{{ route('payband-types.store') }}" method="POST" id="payband-type-create-form">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="row">
                    <div class="form-group col-md-12 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Payband Type</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="payband_type" id="payband_type"
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
