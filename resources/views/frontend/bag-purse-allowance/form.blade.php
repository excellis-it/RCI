@if (isset($edit))
    <form action="{{ route('bag-purse-allowance.update', $bag_purse_allowance->id) }}" method="POST"
        id="bag-purse-allowance-edit-form">
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
                                            {{ $bag_purse_allowance->designation_id == $designation->id ? 'selected' : '' }}>
                                            {{ $designation->designation }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Entitled Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="entitle_amount" id="entitle_amount"
                                    value="{{ $bag_purse_allowance->entitle_amount }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year">
                                    <option value="">Select year</option>
                                    @for ($year = date('Y'); $year >= 1958; $year--)
                                        <option value="{{ $year }}"
                                            {{ $bag_purse_allowance->year == $year ? 'selected' : '' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

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
@else
    <form action="{{ route('bag-purse-allowance.store') }}" method="POST" id="bag-purse-allowance-create-form">
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

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Entitled Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="entitle_amount" id="entitle_amount"
                                    value="{{ old('entitle_amount') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label> Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year">
                                    <option value="">Select year</option>
                                    @for ($year = date('Y'); $year >= 1958; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

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
