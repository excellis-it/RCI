@if (isset($edit))
    <form action="{{ route('landline-allowance.update', $landline_allowance->id) }}" method="POST" id="landline-allowance-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">

                   <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Designation</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="designation_id" id="designation_id">
                                    <option value="">Select Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}"
                                            {{ $landline_allowance->designation_id == $designation->id ? 'selected' : '' }}>
                                            {{ $designation->designation }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Mobile max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mobile_max_allo" id="mobile_max_allo"
                                    value="{{ $landline_allowance->mobile_max_allo }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Landline max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="landline_max_allo"
                                    id="landline_max_allo" value="{{ $landline_allowance->landline_max_allo }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Broadband max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="broad_band_max_allo"
                                    id="broad_band_max_allo" value="{{ $landline_allowance->broad_band_max_allo }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_amount_allo"
                                    id="total_amount_allo" value="{{ $landline_allowance->total_amount_allo }}">
                                <span class="text-danger"></span>
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
    <form action="{{ route('landline-allowance.store') }}" method="POST" id="landline-allowance-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Designation</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="designation_id" id="designation_id">
                                    <option value="">Select Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}"
                                          >
                                            {{ $designation->designation }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Mobile max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mobile_max_allo" id="mobile_max_allo"
                                    value="{{ old('mobile_max_allo') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Landline max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="landline_max_allo"
                                    id="landline_max_allo" value="{{ old('landline_max_allo') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Broadband max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="broad_band_max_allo"
                                    id="broad_band_max_allo" value="{{ old('broad_band_max_allo') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total max Allocation</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_amount_allo"
                                    id="total_amount_allo" value="{{ old('total_amount_allo') }}">
                                <span class="text-danger"></span>
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
