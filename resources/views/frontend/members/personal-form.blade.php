<form action="{{ route('members.personal.update') }}" id="member-personal-form" method="post">
    @csrf
    <input type="hidden" name="member_id" value="{{ $member->id }}">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="basic" id="basic"
                                    value="{{ $member_personal->basic ?? (old('basic') ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>G.pay</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="g_pay" id="g_pay"
                                    value="{{ $member_personal->g_pay ?? (old('g_pay') ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Cadre</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="cadre" id="cadre">
                                    <option value="">Select</option>
                                    @foreach ($cadres as $cadre)
                                        <option value="{{ $cadre->id }}"
                                            {{ isset($member_core->cadre) && $cadre->id == $member_core->cadre ? 'selected' : '' }}>
                                            {{ $cadre->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOB</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dob" id="dob"
                                    value="{{ $member_personal->dob ?? (old('dob') ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Next Incr</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="next_inr" id="next_inr"
                                    value="{{ $member_personal->next_inr ?? (old('next_inr') ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Ex-Service</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="ex_service" id="ex_service">
                                    @foreach ($exServices as $exService)
                                        <option value="{{ $exService->id }}"
                                            {{ isset($member_personal->ex_service) && $exService->id == $member_personal->ex_service ? 'selected' : '' }}>
                                            {{ $exService->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PayBand</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payband" id="payband">
                                    @foreach ($paybands as $payband)
                                        <option value="{{ $payband->id }}"
                                            {{ isset($member_personal->payband) && $payband->id == $member_personal->payband ? 'selected' : '' }}>
                                            {{ $payband->payband_type }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Level</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pm_level" id="pm_level">
                                    @foreach ($pmLevels as $pmLevel)
                                        <option value="{{ $pmLevel->id }}"
                                            {{ isset($member_personal->payband) && $pmLevel->id == $member_personal->payband ? 'selected' : '' }}>
                                            {{ $pmLevel->payband_type }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>EMP-ID</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="emp_id" id="emp_id"
                                    value="{{ $member_personal->emp_id ?? (old('emp_id') ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="gender" id="gender">
                                    <option value="Male"
                                        {{ isset($member_personal->gender) && $member_personal->gender == 'Male' ? 'selected' : '' }}>
                                        Male</option>
                                    <option value="Female"
                                        {{ isset($member_personal->gender) && $member_personal->gender == 'Female' ? 'selected' : '' }}>
                                        Female</option>
                                    <option value="Others"
                                        {{ isset($member_personal->gender) && $member_personal->gender == 'Others' ? 'selected' : '' }}>
                                        Others</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="">Select</option>
                                    <option value="Yes"
                                        {{ isset($member_personal->status) && $member_personal->status == 'Yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="No"
                                        {{ isset($member_personal->status) && $member_personal->status == 'No' ? 'selected' : '' }}>
                                        No</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOJ Lab</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="doj_lab" id="doj_lab"
                                    value="{{ $member_personal->doj_lab ?? (old('doj_lab') ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quater</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="quater" id="quater">
                                    <option value="">Select</option>
                                    @foreach ($quaters as $quater)
                                        <option value="{{ $quater->id }}"
                                            {{ isset($member_personal->quater) && $quater->id == $member_personal->quater ? 'selected' : '' }}>
                                            {{ $quater->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PH</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="ph" id="ph">
                                    <option value="">Select</option>
                                    @foreach ($pgs as $pg)
                                        <option value="{{ $pg->id }}"
                                            {{ isset($member_personal->ph) && $pg->id == $member_personal->ph ? 'selected' : '' }}>
                                            {{ $pg->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Old Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="old_basic" id="old_basic"
                                    value="{{ $member_personal->old_basic ?? (old('old_basic') ?? '') }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Index</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pm_index" id="pm_index">
                                    <option value="">Select</option>
                                    @foreach ($pmIndexes as $pmIndex)
                                        <option value="{{ $pmIndex->id }}"
                                            {{ isset($member_personal->pm_index) && $pmIndex->id == $member_personal->pm_index ? 'selected' : '' }}>
                                            {{ $pmIndex->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Name</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $member_personal->name ?? (old('name') ?? '') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Desig</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="desig" id="desig">
                            <option value="">Select</option>
                            @foreach ($designations as $designation)
                                <option value="{{ $designation->id }}"
                                    {{ isset($member_personal->desig) && $designation->id == $member_personal->desig ? 'selected' : '' }}>
                                    {{ $designation->value }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Category</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="category" id="category">
                            <option value="">Select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ isset($member_personal->category) && $category->id == $member_personal->category ? 'selected' : '' }}>
                                    {{ $category->category }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOJ Service</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="doj_service" id="doj_service"
                                    value="{{ $member_personal->doj_service ?? (old('doj_service') ?? '') }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quater No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="quater_no" id="quater_no"
                                    value="{{ $member_personal->quater_no ?? (old('quater_no') ?? '') }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOP</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dop" id="dop"
                                    value="{{ $member_personal->dop ?? (old('dop') ?? '') }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Fund Typ</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="fund_type" id="fund_type"
                                    value="{{ $member_personal->fund_type ?? (old('fund_type') ?? '') }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>CGEGIS</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" name="cgegis" id="cgegis">
                                <option value="">Select</option>
                                @foreach ($cgegises as $cgegis)
                                    <option value="{{ $cgegis->id }}"
                                        {{ isset($member_personal->cgegis) && $cgegis->id == $member_personal->cgegis ? 'selected' : '' }}>
                                        {{ $cgegis->value }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cgegis_text" id="cgegis_text"
                                value="{{ $member_personal->cgegis_text ?? (old('cgegis_text') ?? '') }}"
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Paystop</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pay_stop" id="inlineRadio1"
                                    value="None"
                                    {{ isset($member_personal->pay_stop) && $member_personal->pay_stop == 'None' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">None</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pay_stop" id="inlineRadio2"
                                    value="Full Pay"
                                    {{ isset($member_personal->pay_stop) && $member_personal->pay_stop == 'Full Pay' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Full Pay</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pay_stop" id="inlineRadio3"
                                    value="Table Rce"
                                    {{ isset($member_personal->pay_stop) && $member_personal->pay_stop == 'Table Rce' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio3">Table Rce</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-2">
                        <button type="submit" class="listing_add">Save &
                            Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="gross-div mt-3">
                                                    <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Gross Pay</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Top Debits</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Net Pay</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Tot Rec</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-2">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label>Take Home</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="basic" id="basic" value="{{ old('basic') ?? '' }}" placeholder="">
                                                                        <span class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="row justify-content-end">
                        <div class="form-group col-md-3 mb-2">
                            <a href="{{ route('members.create') }}"><button type="button"
                                    class="another-btn">Another</button></a>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="submit" class="listing_add">Update</button>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="" class="listing_exit">Exit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
