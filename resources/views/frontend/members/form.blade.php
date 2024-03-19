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
                                    value="{{ $designation->designation ?? '' }}" placeholder="">
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
                                        <option value="{{ $category->id }}" >
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
                                <input type="number" class="form-control" name="order" id="order"
                                    value="{{ $designation->order ?? '' }}" placeholder="">
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
                                        <option value="{{ $designationType->id }}">
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
                                        <select class="form-select payscale_type_id" name="payscale_type_id"
                                            id="payscale_type_id">
                                            <option value="">Select Payscale</option>
                                            @foreach ($payscale_types as $scaleType)
                                                <option value="{{ $scaleType->id }}">
                                                    {{ $scaleType->payscale_type }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control payscale_number"
                                            name="payscale_number" id="payscale_number"
                                            value="{{ $designation->payscale_number ?? '' }}" placeholder="">

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
                                        <option value="{{ $paybandType->id }}">
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
                                <input type="text" class="form-control" name="pers_no" id="pers_no"
                                    value="{{ old('pers_no') ?? '' }}" placeholder="">
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
                                <input type="text" class="form-control" name="emp_id" id="emp_id"
                                    value="{{ old('emp_id') ?? '' }}" placeholder="">
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
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name') ?? '' }}" placeholder="">
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
                                <input type="text" class="form-control" name="desig" id="desig"
                                    value="{{ old('desig') ?? '' }}" placeholder="">
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
                                <input type="text" class="form-control" name="basic" id="basic"
                                    value="{{ old('basic') ?? '' }}" placeholder="">
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
                                <input type="text" class="form-control" name="group" id="group"
                                    value="{{ old('group') ?? '' }}" placeholder="">
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
                                <input type="text" class="form-control" name="devision" id="devision"
                                    value="{{ old('devision') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Pers No</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="pers_no" id="pers_no"
                                            value="{{ old('pers_no') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>EMP-ID</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="emp_id" id="emp_id"
                                            value="{{ old('emp_id') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="gender" id="gender">
                                            <option value="">Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>PM Level</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="pm_level" id="pm_level">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>PM Index</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="pm_index" id="pm_index">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Basic</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="basic" id="basic"
                                            value="{{ old('basic') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <label>Desig</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-select" name="desig" id="desig">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Division</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="division" id="division">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Group</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="group" id="group">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Cadre</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="cadre" id="cadre">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <label>Category</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-select" name="category" id="category">
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" >
                                                {{ $category->category }}</option>
                                            @endforeach

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="status" id="status">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>OLD BP</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="old_bp" id="old_bp"
                                            value="{{ old('old_bp') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>G.Pay</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="g_pay" id="g_pay"
                                            value="{{ old('g_pay') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-group col-md-6 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>PayBand</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="pay_band" id="pay_band">
                                            <option value="">Select Payband</option>
                                            @foreach ($payband_types as $paybandType)
                                                <option value="{{ $paybandType->id }}">
                                                    {{ $paybandType->payband_type }}</option>
                                            @endforeach

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Fund Type</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="fund_type" id="fund_type">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>DOB</label>
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
                                    <div class="col-md-4">
                                        <label>DOJ Lab</label>
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
                                    <div class="col-md-4">
                                        <label>DOJ Service</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="full_name" id="full_name"
                                            value="{{ old('full_name') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-group col-md-6 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>DOP</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="designation"
                                            id="designation" value="{{ old('designation') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Next Incr</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="designation"
                                            id="designation" value="{{ old('designation') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Quater</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="quater" id="quater">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Quater No</label>
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
                                    <div class="col-md-4">
                                        <label>DOJ Service</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="full_name" id="full_name"
                                            value="{{ old('full_name') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <label>CGEIS</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="designation"
                                            id="designation" value="{{ old('designation') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>Ex-Service</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="ex_service" id="ex_service">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>PG</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="pg" id="pg">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <label>CGEGIS</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-select" name="cge_gis" id="cge_gis">
                                            <option value="">Select</option>

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-group col-md-12 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <label>PayStop</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="designation"
                                            id="designation" value="{{ old('designation') ?? '' }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label for="PIS">PIS</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="PIS" id="PIS"
                                    value="{{ old('full_name') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-9 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-1">
                                <label for="PM_Index">Address</label>
                            </div>
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="PM_Index" id="PM_Index"
                                    value="{{ old('full_name') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <label for="PIS">SOS</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="PIS" id="PIS"
                                    value="{{ old('full_name') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-9 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-1">
                                <label for="PM_Index">Address</label>
                            </div>
                            <div class="col-md-11">
                                <input type="text" class="form-control" name="PM_Index" id="PM_Index"
                                    value="{{ old('full_name') ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- save cancel button design in right corner --}}
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row">
                                    <div class="col-md-8 text-right"> <!-- Use text-right class here -->
                                        <button type="submit" class="listing_add">Save</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <div class="row">
                                    <div class="col-md-8 text-right"> <!-- Use text-right class here -->
                                        <a href="" class="listing_exit">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endif
