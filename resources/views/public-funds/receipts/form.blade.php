<div id="create_form">

    <div class="text-end">
        @if (!empty($draft_rc_members) && $draft_rc_members->count() > 0)
            <a href="{{ route('receipts.clearDraft') }}" type="button" class="listing_add btn-sm " id="clearDraftReceipt">
                Create New
            </a>
        @endif

        <button type="button" class="listing_add ms-3" id="saveDraftReceipt">
            Save as Draft
        </button>



    </div>
    <br>

    <form action="{{ route('receipts.store') }}" method="POST" id="receipts-create-form">
        @csrf
        <input type="hidden" id="form_type" name="form_type" value="0">
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
                                <input type="date" class="form-control" name="vr_date" id="vr_date"
                                    value="{{ $vrDate }}">
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
                                <input type="text" class="form-control" name="dv_no" id="dv_no"
                                    value="{{ $dvNo }}">
                                <span class="text-danger" style="display:none; color:red;">DV No. field is
                                    required</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12 mb-4 mt-3">

                        <div id="dynamic-fields">





                            @if (!empty($draft_rc_members) && $draft_rc_members->count() > 0)
                                @foreach ($draft_rc_members as $drc_member)
                                    <div class="dynamic-section dynamic-fields">
                                        <div class="row mb-3">
                                            <div class="col-md-2">
                                                <label>Sr No.</label>
                                                <input type="text" class="form-control sr-no" name="sr_no[]" readonly
                                                    value="{{ $drc_member->serial_no }}">
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
                                                                <option
                                                                    {{ $member->id == $drc_member->member->id ? 'selected' : '' }}
                                                                    value="{{ $member->id }}">{{ $member->name }}
                                                                </option>
                                                            @endforeach


                                                        </select>
                                                        <span class="text-danger"
                                                            style="display:none; color:red;">Member
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
                                                        <input type="text" class="form-control member_name" readonly
                                                            value="{{ $drc_member->member->name }}">
                                                        <span class="text-danger"
                                                            style="display:none; color:red;">Member
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
                                                        <input type="text" class="form-control desig" readonly
                                                            value="{{ $drc_member->member->desigs->designation ?? '' }}">
                                                        <span class="text-danger"
                                                            style="display:none; color:red;">Desig.
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
                                                        <input type="text" class="form-control bank_acc" readonly
                                                            value="{{ $drc_member->member->memberCoreInfo->bank_acc_no ?? '' }}">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" form-group col-md-2">
                                                <label>Amount</label>
                                                <input type="number" class="form-control" name="member_amount[]"
                                                    value="{{ $drc_member->amount }}">
                                                <span class="text-danger" style="display:none; color:red;">Amount
                                                    field is
                                                    required</span>

                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Bill reference</label>
                                                <input type="text" class="form-control" name="bill_ref[]"
                                                    value="{{ $drc_member->bill_ref }}">


                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Cheque No.</label>
                                                <input type="text" class="form-control" name="cheq_no[]"
                                                    value="{{ $drc_member->cheq_no }}">


                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Cheque Date</label>
                                                <input type="date" class="form-control" name="cheq_date[]"
                                                    value="{{ $drc_member->cheq_date }}">

                                            </div>
                                            <button type="button"
                                                class="btn btn-danger remove-section remove_trash"><i
                                                    class="ti ti-trash"></i></button>

                                        </div>
                                    </div>
                                @endforeach
                            @else
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


                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Cheque No.</label>
                                            <input type="text" class="form-control" name="cheq_no[]">


                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Cheque Date</label>
                                            <input type="date" class="form-control" name="cheq_date[]">

                                        </div>

                                    </div>
                                </div>
                            @endif





                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-section mt-4"><i
                                    class="ti ti-trash"></i></button>
                        </div>
                        <div class="col-md-12 text-end mt-2">
                            <button type="button" class="btn btn-primary add-more-sm" id="add-section"><i
                                    class="ti ti-plus"></i>Add More</button>
                        </div>
                    </div>

                    <div class="form-group mb-2 col-md-4 cheque-narration">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Narration</label>
                            </div>
                            <div class="col-md-12">
                                <textarea type="text" class="form-control" name="narration" id="narration">{{ $narration }}</textarea>

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
                                                        value="{{ $paymentCategory->id }}"
                                                        {{ $dvcategory == $paymentCategory->id ? 'checked' : '' }}>
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

                    </div>







                </div>
            </div>

        </div>


        <div class="row justify-content-between mt-3">

            <div class="col-md-2 mb-2">
                <a href="{{ route('receipts.index') }}" class="listing_exit">Back</a>
            </div>

            <div class="col-md-2 text-end mb-2">
                <button type="button" class="listing_add" id="saveReceipt">Add</button>
            </div>
        </div>

    </form>

</div>

<div id="edit_form" style="display: none;">

</div>
