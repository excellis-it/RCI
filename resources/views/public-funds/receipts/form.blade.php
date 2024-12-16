<div id="create_form">

    <form action="{{ route('receipts.store') }}" method="POST" id="receipts-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr. No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="vr_no" id="vr_no"
                                    value="{{ $vrNo }}" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr. Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="vr_date" id="vr_date">
                                <span class="text-danger" style="display:none; color:red;">Vr. Date field is
                                    required</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DV No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dv_no" id="dv_no">
                                <span class="text-danger" style="display:none; color:red;">DV No. field is
                                    required</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12 mb-4">

                        <div id="dynamic-fields">
                            <div class="dynamic-section dynamic-fields">
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <label>Sr No.</label>
                                        <input type="text" class="form-control sr-no" name="sr_no[]" readonly
                                            value="1">
                                    </div>
                                    <div class="form-group col-md-2 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Member</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select class="js-example-basic-single form-control member_id"
                                                    name="member_id[]">
                                                    <option value="">Select</option>
                                                    @foreach ($members as $member)
                                                        <option value="{{ $member->id }}">{{ $member->name }}
                                                        </option>
                                                    @endforeach
                                                    {{-- <option value="Other">Other</option> --}}
                                                </select>
                                                <span class="text-danger" style="display:none; color:red;">Member
                                                    field is
                                                    required</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-2 cheque-member-name">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Member Name</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control member_name" readonly>
                                                <span class="text-danger" style="display:none; color:red;">Member
                                                    Name field is
                                                    required</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-2 cheque-member-desig">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Desig.</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control desig" readonly>
                                                <span class="text-danger" style="display:none; color:red;">Desig.
                                                    field is
                                                    required</span>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group col-md-4 mb-2 cheque-bank-acc">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Bank Acc</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control bank_acc" readonly>
                                                <span class="text-danger" style="display:none; color:red;">Bank Acc
                                                    field is
                                                    required</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" form-group col-md-2">
                                        <label>Amount</label>
                                        <input type="number" class="form-control" name="member_amount[]">
                                        <span class="text-danger" style="display:none; color:red;">Amount field is
                                            required</span>

                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Bill reference</label>
                                        <input type="text" class="form-control" name="bill_ref[]">
                                        <span class="text-danger" style="display:none; color:red;">Bill ref. field
                                            is
                                            required</span>

                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Cheque No.</label>
                                        <input type="text" class="form-control" name="cheq_no[]">
                                        <span class="text-danger" style="display:none; color:red;">Cheque No. field
                                            is
                                            required</span>

                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Cheque Date</label>
                                        <input type="date" class="form-control" name="cheq_date[]">
                                        <span class="text-danger" style="display:none; color:red;">Cheque Date
                                            field is
                                            required</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-section mt-4"><i
                                    class="ti ti-trash"></i></button>
                        </div>
                        <div class="col-md-12 text-end mt-2">
                            <button type="button" class="btn btn-primary" id="add-section"><i
                                    class="ti ti-plus"></i></button>
                        </div>
                    </div>

                    <div class="form-group mb-2 col-md-4 cheque-narration">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Narration</label>
                            </div>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" name="narration" id="narration"></textarea>
                                <span class="text-danger" style="display:none; color:red;">Narration field is
                                    required</span>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Category</label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-inline">
                                            @foreach ($paymentCategories as $key => $paymentCategory)
                                                <div class="form-check form-check-inline ml-2">
                                                    <input class="form-check-input" type="radio" name="category"
                                                        id="inlineRadio{{ $key }}"
                                                        value="{{ $paymentCategory->id }}">
                                                    <label class="form-check-label"
                                                        for="inlineRadio{{ $key }}">{{ $paymentCategory->name }}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                        <span class="text-danger" style="display:none; color:red;">Category field is
                                            required</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 mt-3">
                            <div class="row justify-content-end">
                                <div class="form-group col-md-6 mb-2">
                                    <button type="submit" class="listing_add">Add</button>
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <button type="reset" class="listing_exit">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </form>

</div>

<div id="edit_form" style="display: none;">

</div>
