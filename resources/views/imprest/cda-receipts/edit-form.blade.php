<form action="{{ route('cda-receipts.update', $cdaReceipt->id) }}" method="POST" id="cda-receipt-edit-form">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rct Vr. No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="rct_vr_no" id="edit_rct_vr_no"
                                    value="{{ $cdaReceipt->rct_vr_no }}" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rct Vr. Date<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="rct_vr_date" id="edit_rct_vr_date"
                                    value="{{ $cdaReceipt->rct_vr_date }}" min="{{ $cdaBill->cda_bill_date ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DV No<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dv_no" id="edit_dv_no"
                                    value="{{ $cdaReceipt->dv_no }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DV Date<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dv_date" id="edit_dv_date"
                                    value="{{ $cdaReceipt->dv_date }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rct Vr. Amount<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" step="any" class="form-control" name="rct_vr_amount"
                                    id="edit_rct_vr_amount" value="{{ $cdaReceipt->rct_vr_amount }}" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>CDA Bill No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="edit_bill_no"
                                    value="{{ $cdaBill->cda_bill_no ?? 'N/A' }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-between mt-3">
        <div class="col-md-2">
            <button type="button" id="cancel-edit" class="listing_exit">Cancel</button>
        </div>
        <div class="col-md-2">
            <button type="submit" class="listing_add">Update</button>
        </div>
    </div>
</form>
