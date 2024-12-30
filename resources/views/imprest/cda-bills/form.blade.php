@if (count($advance_settels) > 0)
    <div class="row mt-2">
        <div class="col-lg-8">
            <div class="form-group mb-2">
                <div class="row align-items-center">

                    @csrf
                    <div class="form-group col-md-4">
                        <label for="">CDA Bill No</label>
                        <input type="text" class="form-control" name="cda_bill_no" id="cda_bill_no">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">CDA Bill Date</label>
                        <input type="date" class="form-control" name="cda_bill_date" id="cda_bill_date">
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group col-md-4">
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
