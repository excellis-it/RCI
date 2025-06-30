@if (isset($edit))

   <form action="{{ route('member-medical-allowance.update', $medicalAllowance->id) }}" method="POST" id="member-medical-allowance-update-form">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-12">
            <div class="row">

                 <!-- Member -->
                <div class="form-group col-md-4 mb-2">
                    <label>Member</label>
                    <select class="form-select select2" name="member_id" id="member_id">
                        <option value="">Select Member</option>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}"
                                {{ old('member_id', $medicalAllowance->member_id) == $member->id ? 'selected' : '' }}>
                                {{ $member->name }} ({{ $member->desigs->designation ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                     <span class="text-danger"></span>
                </div>

                  <!-- Patient Name -->
                <div class="form-group col-md-4 mb-2">
                    <label>Patient Name</label>
                    <input type="text" class="form-control" name="patient_name" placeholder="" value="{{ old('patient_name', $medicalAllowance->patient_name) }}">
                      <span class="text-danger"></span>
                </div>
                 <!-- Hospital Name -->
                <div class="form-group col-md-4 mb-2">
                    <label>Hospital Name</label>
                    <input type="text" class="form-control" name="name_of_hospital" placeholder="" value="{{ old('name_of_hospital', $medicalAllowance->name_of_hospital) }}">
                      <span class="text-danger"></span>
                </div>
                 <!-- Treatment For -->
                <div class="form-group col-md-4 mb-2">
                    <label>Treatment For</label>
                    <input type="text" class="form-control" name="treatment_for" value="{{ old('treatment_for', $medicalAllowance->treatment_for) }}" placeholder="e.g. Self / Spouse">
                     <span class="text-danger"></span>
                </div>
                <!-- Bill No -->
                <div class="form-group col-md-4 mb-2">
                    <label>Bill No</label>
                    <input type="text" class="form-control" name="bill_no" value="{{ old('bill_no', $medicalAllowance->bill_no) }}" placeholder="Enter Bill No">
                    <span class="text-danger"></span>
                </div>

                <!-- Bill Date -->
                <div class="form-group col-md-4 mb-2">
                    <label>Bill Date</label>
                    <input type="date" class="form-control" name="bill_date" value="{{ old('bill_date', $medicalAllowance->bill_date) }}">
                     <span class="text-danger"></span>
                </div>

                <!-- Type -->
                <div class="form-group col-md-4 mb-2">
                    <label>Type</label>
                    <input type="text" class="form-control" name="type" value="{{ old('type', $medicalAllowance->type) }}" placeholder="e.g. CGHS">
                     <span class="text-danger"></span>
                </div>

                <!-- Type Number -->
                <div class="form-group col-md-4 mb-2">
                    <label>Type Number</label>
                    <input type="text" class="form-control" name="type_number" value="{{ old('type_number', $medicalAllowance->type_number) }}" placeholder="Enter Type Number">
                     <span class="text-danger"></span>
                </div>

                <!-- Amount Claimed -->
                <div class="form-group col-md-4 mb-2">
                    <label>Amount Claimed</label>
                    <input type="number" step="0.01" class="form-control" name="amount_claimed" value="{{ old('amount_claimed', $medicalAllowance->amount_claimed) }}">
                     <span class="text-danger"></span>
                </div>

                <!-- Total Advance Amount Given -->
                <div class="form-group col-md-4 mb-2">
                    <label>Total Advance Amount Given</label>
                    <input type="number" step="0.01" class="form-control" name="total_adv_amount_given" value="{{ old('total_adv_amount_given', $medicalAllowance->total_adv_amount_given) }}">
                      <span class="text-danger"></span>
                </div>

                <!-- Amount Passed -->
                <div class="form-group col-md-4 mb-2">
                    <label>Amount Passed</label>
                    <input type="number" step="0.01" class="form-control" name="amount_passed" value="{{ old('amount_passed', $medicalAllowance->amount_passed) }}">
                 <span class="text-danger"></span>
                </div>

                <!-- Amount Disallowed -->
                <div class="form-group col-md-4 mb-2">
                    <label>Amount Disallowed</label>
                    <input type="number" step="0.01" class="form-control" name="amount_disallowed" value="{{ old('amount_disallowed', $medicalAllowance->amount_disallowed) }}">
                      <span class="text-danger"></span>
                </div>

            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row mt-3 justify-content-between">
        <div class="col-md-2">
            <a href="{{ route('member-medical-allowance.index') }}" class="btn btn-secondary w-100">Back</a>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Update</button>
        </div>
    </div>
</form>


@else
<form action="{{ route('member-medical-allowance.store') }}" method="POST" id="member-medical-allowance-create-form">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="row">
            <!-- Member -->
                <div class="form-group col-md-4 mb-2">
                    <label>Member</label>
                    <select class="form-select select2" name="member_id" id="member_id">
                        <option value="">Select Member</option>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}">
                                {{ $member->name }} ({{ $member->desigs->designation ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                      <span class="text-danger"></span>
                </div>
                 <!-- Patient Name -->
                <div class="form-group col-md-4 mb-2">
                    <label>Patient Name</label>
                    <input type="text" class="form-control" name="patient_name" placeholder="">
                      <span class="text-danger"></span>
                </div>
                 <!-- Hospital Name -->
                <div class="form-group col-md-4 mb-2">
                    <label>Hospital Name</label>
                    <input type="text" class="form-control" name="name_of_hospital" placeholder="">
                      <span class="text-danger"></span>
                </div>
                 <!-- Treatment For -->
                <div class="form-group col-md-4 mb-2">
                    <label>Treatment For</label>
                    <input type="text" class="form-control" name="treatment_for" placeholder="e.g. Self / Spouse">
                      <span class="text-danger"></span>
                </div>
                <!-- Bill No -->
                <div class="form-group col-md-4 mb-2">
                    <label>Bill No</label>
                    <input type="text" class="form-control" name="bill_no" placeholder="Enter Bill No">
                      <span class="text-danger"></span>
                </div>

                <!-- Bill Date -->
                <div class="form-group col-md-4 mb-2">
                    <label>Bill Date</label>
                    <input type="date" class="form-control" name="bill_date">
                      <span class="text-danger"></span>
                </div>

                <!-- Type -->
                <div class="form-group col-md-4 mb-2">
                    <label>Type</label>
                    <input type="text" class="form-control" name="type" placeholder="e.g. CGHS">
                      <span class="text-danger"></span>
                </div>

                <!-- Type Number -->
                <div class="form-group col-md-4 mb-2">
                    <label>Type Number</label>
                    <input type="text" class="form-control" name="type_number" placeholder="Enter Type Number">
                      <span class="text-danger"></span>
                </div>




                <!-- Amount Claimed -->
                <div class="form-group col-md-4 mb-2">
                    <label>Amount Claimed</label>
                    <input type="number" step="0.01" class="form-control" name="amount_claimed">
                      <span class="text-danger"></span>
                </div>

                <!-- Total Advance Amount Given -->
                <div class="form-group col-md-4 mb-2">
                    <label>Total Advance Amount Given</label>
                    <input type="number" step="0.01" class="form-control" name="total_adv_amount_given">
                      <span class="text-danger"></span>
                </div>

                <!-- Amount Passed -->
                <div class="form-group col-md-4 mb-2">
                    <label>Amount Passed</label>
                    <input type="number" step="0.01" class="form-control" name="amount_passed">
                      <span class="text-danger"></span>
                </div>

                <!-- Amount Disallowed -->
                <div class="form-group col-md-4 mb-2">
                    <label>Amount Disallowed</label>
                    <input type="number" step="0.01" class="form-control" name="amount_disallowed">
                      <span class="text-danger"></span>
                </div>

            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row mt-3 justify-content-between">
        <div class="col-md-2">
            <a href="{{ route('member-medical-allowance.index') }}" class="btn btn-secondary w-100">Back</a>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Add</button>
        </div>
    </div>
</form>


@endif
