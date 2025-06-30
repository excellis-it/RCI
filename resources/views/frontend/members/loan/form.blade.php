@if (isset($edit))

    <form action="{{ route('members.loan.update') }}" id="member-edit-loan-form" method="post">
        @csrf

        <input type="hidden" name="member_loan_id" id="member_loan_id" value="{{ $member_loan->id }}">
        <input type="hidden" name="member_id" id="member_id" value="{{ $member_loan->member_id }}">
        <input type="hidden" name="current_year" value="{{ $currentYear }}">
        <input type="hidden" name="current_month" value="{{ $currentMonth }}">

        <div class="row">

            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan Name</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="loan_name" id="loan_name" disabled>
                            <option value="">Select Loan</option>
                            @foreach ($loans as $loan)
                                <option value="{{ $loan->id }}"
                                    {{ isset($member_loan->loan_id) && $loan->id == $member_loan->loan_id ? 'selected' : '' }}>
                                    {{ $loan->loan_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan Amount</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total_amount" id="total_amount"
                            value="{{ $member_loan->total_amount }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>


            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan No of Installment</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_no_of_inst" id="tot_no_of_inst"
                            value="{{ $member_loan->tot_no_of_inst }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>


            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Installment Amount</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_amount" id="inst_amount"
                            value="{{ $member_loan->inst_amount }}" placeholder="" >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Present Installment No</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="present_inst_no" id="present_inst_no"
                            value="{{ $member_loan->present_inst_no }}" placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Balance</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="balance" id="balance"
                            value="{{ $member_loan->balance }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-2" hidden>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Installment Rate</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_rate" id="inst_rate"
                            value="{{ $member_loan->inst_rate }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            @php
                $hideFields = false;
                if (isset($member_loan->loan->loan_name) && Str::contains($member_loan->loan->loan_name, 'INT')) {
                    $hideFields = true;
                }
            @endphp
            @if (!$hideFields)
                {{-- <div class="form-group col-md-6 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Interst Percentage (%)</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="interst_percentage"
                                id="interst_percentage" value="{{ $member_loan->interst_percentage }}"
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div> --}}

                <div class="form-group col-md-6 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Total Interest</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="total_interest" id="total_interest"
                                value="{{ $member_loan->total_interest }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            @endif
            {{-- <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Recovery Type</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="recovery_type" id="recovery_type"
                            value="{{ $member_loan->recovery_type }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div> --}}

            <div class="form-group col-md-6 mb-2" hidden>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Penal Installment Rate</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="penal_inst_rate" id="penal_inst_rate"
                            value="{{ $member_loan->penal_inst_rate }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2" hidden>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Start Date</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="start_date" id="start_date"
                            value="{{ $member_loan->start_date }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2" hidden>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>End Date</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="end_date" id="end_date"
                            value="{{ $member_loan->end_date }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>



            <div class="form-group col-md-12 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remark" id="remark"
                            value="{{ $member_loan->remark }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-end">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="form-group col-md-4 mb-2">
                        <a href="{{ route('members.create') }}"><button type="button"
                                class="another-btn">Another</button></a>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <button type="submit" class="listing_add">Update</button>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <button type="button" id="loan-delete" class="delete-btn-1"
                            data-id="{{ isset($member_loan->id) ? $member_loan->id : '#' }}">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('members.loan.store') }}" id="member-loan-info-form" method="post">
        @csrf

        <input type="hidden" name="member_id" value="{{ $member->id }}">
        <input type="hidden" name="current_year" value="{{ $currentYear }}">
        <input type="hidden" name="current_month" value="{{ $currentMonth }}">
        <div class="row">

            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan Name</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="loan_name" id="loan_name">
                            <option value="">Select Loan</option>
                            @foreach ($loans as $loan)
                                <option value="{{ $loan->id }}">
                                    {{ $loan->loan_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan Amount</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total_amount" id="total_amount"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Total No of Installment</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_no_of_inst" id="tot_no_of_inst"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Installment Amount</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_amount" id="inst_amount"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Present Installment No</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="present_inst_no" id="present_inst_no"
                            value="1" placeholder="" >
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>


            <div class="form-group col-md-6 mb-2" hidden>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Installment Rate</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_rate" id="inst_rate" value="0"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>





            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Balance</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="balance" id="balance" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>


            {{-- <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Interst Percentage (%)</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="interst_percentage" id="interst_percentage"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div> --}}

            <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Total Interest</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total_interest" id="total_interest"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            {{-- <div class="form-group col-md-6 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Recovery Type</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="recovery_type" id="recovery_type"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div> --}}

            <div class="form-group col-md-6 mb-2" hidden>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Penal Installment Rate</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="penal_inst_rate" id="penal_inst_rate"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2" hidden>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Start Date</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="start_date" id="start_date"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-2" hidden>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>End Date</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="end_date" id="end_date" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>



            <div class="form-group col-md-12 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remark" id="remark" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

        </div>

        {{-- <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="form-group col-md-6 mb-2">
                    <button type="submit" class="listing_add">Save</button>
                </div>
            </div>
        </div>
    </div> --}}
        <div class="row justify-content-end">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="form-group col-md-4 mb-2">
                        <a href="{{ route('members.create') }}"><button type="button"
                                class="another-btn">Another</button></a>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <button type="submit" class="listing_add">Save</button>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <button type="reset" class="listing_exit">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endif
