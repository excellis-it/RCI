@if (count($advance_settels) > 0)
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="form-group mb-2">
                <div class="row align-items-center">

                    @csrf
                    <div class="form-group col-md-3">
                        <label for="">CDA Bill Date</label>
                        <input type="date" class="form-control cda_bill_date_input" name="cda_bill_date"
                            id="cda_bill_date" min="{{ $lastSettleDate }}">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Voucher No</label>
                        <input type="number" class="form-control" name="bill_voucher_no" id="bill_voucher_no"
                            value="" readonly>
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">CDA Bill No</label>
                        <input type="text" class="form-control" name="cda_bill_no" id="cda_bill_no">
                        <span class="text-danger"></span>
                    </div>


                    <div class="form-group col-md-3">
                        <label for="">&nbsp;</label>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@else
    <center>
        <p>No Advance Settlement Found</p>
    </center>
@endif
