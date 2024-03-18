@if (isset($edit))
    <form action="{{ route('designations.update', $designation->id) }}" method="POST" id="designation-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <label>Desig</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="designation" id="designation"
                                    value="{{ $designation->designation  ?? ''}}" placeholder="">
                                <span class="text-danger" id="designation-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Full Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="full_name" id="full_name"
                                    value="{{ $designation->full_name ?? '' }}" placeholder="">
                                <span class="text-danger" id="full_name-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Category</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ ($designation->category_id == $category->id) ? 'selected' : '' }}>
                                            {{ $category->category }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="category_id-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Order</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="order" id="order" value="{{ $designation->order ?? '' }}"
                                    placeholder="">
                                <span class="text-danger" id="order-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Type</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select" name="designation_type_id" id="designation_type_id">
                                    <option value="">Select Designation</option>
                                    @foreach ($designation_types as $designationType)
                                        <option value="{{ $designationType->id }}"
                                            {{ ($designation->designation_type_id == $designationType->id) ? 'selected' : '' }}>
                                            {{ $designationType->designation_type }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="designation_type_id-error"></span>
                            </div>
                        </div>
                    </div>
                    {{-- increment 1 --}}
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Payscale</label>
                            </div>
                            <div class="col-md-8">
                              <div class="row align-items-center">
                                <div class="col-md-6">
                                    <select class="form-select payscale_type_id" name="payscale_type_id" id="payscale_type_id">
                                        <option value="">Select Payscale</option>
                                        @foreach ($payscale_types as $scaleType)
                                            <option value="{{ $scaleType->id }}"
                                                {{ ($designation->payscale_type_id == $scaleType->id) ? 'selected' : '' }}>
                                                {{ $scaleType->payscale_type }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control payscale_number" name="payscale_number" id="payscale_number" value="{{ $designation->payscale_number ?? '' }}"
                                    placeholder="">

                                </div>
                                <span class="text-danger" id="payscale_type_id-error"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                    {{-- increment 2 --}}
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Payband</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select" name="payband_type_id" id="payband_type_id">
                                    <option value="">Select Payband</option>
                                    @foreach ($payband_types as $paybandType)
                                        <option value="{{ $paybandType->id }}"
                                            {{ old('payband_type_id') == $paybandType->id ? 'selected' : '' }}>
                                            {{ $paybandType->payband_type }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="payband_type_id-error"></span>
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
    <form action="{{ route('designations.store') }}" method="POST" id="designation-create-form">
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
                            <div class="col-md-4">
                                <label>Pers No</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="full_name" id="full_name"
                                    value="{{ old('full_name') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>EMP-ID</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="full_name" id="full_name"
                                    value="{{ old('full_name') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <label>Name</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="designation" id="designation"
                                    value="{{ old('designation') ?? '' }}" placeholder="">
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
                            <div class="col-md-4">
                                <label>Desig</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="full_name" id="full_name"
                                    value="{{ old('full_name') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Basic</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="full_name" id="full_name"
                                    value="{{ old('full_name') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Group</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="full_name" id="full_name"
                                    value="{{ old('full_name') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Devision</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="full_name" id="full_name"
                                    value="{{ old('full_name') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <label>Name</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="designation" id="designation"
                                    value="{{ old('designation') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Category</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Order</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="order" id="order"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Type</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select" name="designation_type_id" id="designation_type_id">
                                    <option value="">Select Designation</option>
                                    @foreach ($designation_types as $designationType)
                                        <option value="{{ $designationType->id }}"
                                            {{ old('designation_type_id') == $designationType->id ? 'selected' : '' }}>
                                            {{ $designationType->designation_type }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- increment 1 --}}
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Payscale</label>
                            </div>
                            <div class="col-md-8">
                              <div class="row align-items-center">
                                <div class="col-md-6">
                                    <select class="form-select payscale_type_id" name="payscale_type_id" id="payscale_type_id">
                                        <option value="">Select Payscale</option>
                                        @foreach ($payscale_types as $scaleType)
                                            <option value="{{ $scaleType->id }}"
                                                {{ old('payscale_type_id') == $scaleType->id ? 'selected' : '' }}>
                                                {{ $scaleType->payscale_type }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control payscale_number" name="payscale_number" id="payscale_number"
                                    placeholder="">

                                </div>
                                <span class="text-danger" id="payscale_type_id_msg"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                    {{-- increment 2 --}}
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label>Payband</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-select" name="payband_type_id" id="payband_type_id">
                                    <option value="">Select Payband</option>
                                    @foreach ($payband_types as $paybandType)
                                        <option value="{{ $paybandType->id }}"
                                            {{ old('payband_type_id') == $paybandType->id ? 'selected' : '' }}>
                                            {{ $paybandType->payband_type }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </form>
@endif
