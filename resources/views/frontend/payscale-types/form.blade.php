@if (isset($edit))
    <form action="{{ route('payscale-types.update', $payscale_type->id) }}" method="POST" id="payscale-type-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Payscale Type</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="payscale_type"
                                            id="payscale_type" value="{{ $payscale_type->payscale_type ?? '' }}"
                                            placeholder="">
                                        <span class="text-danger" id="payscale_type-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3 d-flex justify-content-between">

            <div class="col-md-2">
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Update</button>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('payscale-types.store') }}" method="POST" id="payscale-type-create-form">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Payscale Type</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="payscale_type"
                                            id="payscale_type" value="" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3 d-flex justify-content-between">

            <div class="col-md-2">
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Add</button>
                </div>
            </div>
        </div>
    </form>
@endif
