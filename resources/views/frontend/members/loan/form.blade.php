

@if (isset($edit))

<form action="{{ route('members.loan.update') }}" id="member-edit-loan-form" method="post">
    @csrf
   
    <div class="row">

        <input type="hidden" name="member_loan_id" value="{{ $member_loan->id }}" >
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan Name</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="loan_name" id="loan_name">
                            @foreach ($loans as $loan)
                                <option value="{{ $loan->id }}"  {{ isset($member_loan->loan_id) && $loan->id == $member_loan->loan_id ? 'selected' : '' }}>
                                    {{ $loan->loan_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

           
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Present InstNo</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="present_inst_no" id="present_inst_no"
                            value="{{ $member_loan->present_inst_no }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot No of Inst</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_no_of_inst" id="tot_no_of_inst"
                            value="{{ $member_loan->tot_no_of_inst }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remark" id="remark" value="{{ $member_loan->remark }}"
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
                        <label>Inst Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_amount" id="inst_amount" value="{{ $member_loan->inst_amount }}"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total_amount" id="total_amount" value="{{ $member_loan->total_amount }}"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Balance</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="balance" id="balance" value="{{ $member_loan->balance }}"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="form-group col-md-6 mb-2">
                    <button type="submit" class="listing_add">Update</button>
                </div>
                <div class="form-group col-md-6 mb-2">
                    <button type="" class="delete-btn-1">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="form-group col-md-4 mb-2">
                    <button type="" class="another-btn">Another</button>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="submit" class="listing_add">Update</button>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="" class="listing_exit">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

@else

<form action="{{ route('members.loan.create') }}" id="member-loan-info-form" method="post">
    @csrf

    <input type="hidden" name="member_id" value="{{ $member->id }}" >
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan Name</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="loan_name" id="loan_name">
                            @foreach ($loans as $loan)
                                <option value="{{ $loan->id }}">
                                    {{ $loan->loan_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Present InstNo</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="present_inst_no" id="present_inst_no"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot No of Inst</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_no_of_inst" id="tot_no_of_inst"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
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
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Inst Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_amount" id="inst_amount" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total_amount" id="total_amount" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
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
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="form-group col-md-6 mb-2">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="form-group col-md-6 mb-2">
                    <button type="" class="delete-btn-1">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="form-group col-md-4 mb-2">
                    <button type="" class="another-btn">Another</button>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="" class="listing_exit">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endif
