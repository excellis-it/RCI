@if (isset($advance_bills) && count($advance_bills) > 0)
    <form action="{{ route('cda-receipts.store') }}" method="POST" id="cda-receipt-create-form">
        @csrf

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
                                    <input type="text" class="form-control" name="rct_vr_no" id="rct_vr_no"
                                        value="{{ $rctNo }}" placeholder="" readonly>
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
                                    <input type="date" class="form-control" name="rct_vr_date" id="rct_vr_date"
                                        placeholder="" value="">
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
                                    <input type="text" class="form-control" name="dv_no" id="dv_no"
                                        placeholder="">
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
                                    <input type="date" class="form-control" name="dv_date" id="dv_date"
                                        placeholder="">
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
                                        id="rct_vr_amount" placeholder="" readonly>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Bill No.<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">

                                        <select name="bill_no" id="bill_no" class="form-control" readonly required>
                                            <option value="">Select</option>
                                            @foreach ($advance_bills as $advance_bill)
                                                <option value="{{ $advance_bill->cda_bill_no }}"
                                                    data-billamount="{{ $advance_bill->total_bill_amount }}"
                                                    data-billdate="{{ $advance_bill->bill_date }}">
                                                    {{ $advance_bill->cda_bill_no }}
                                                </option>
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

        <div class="row justify-content-between mt-3">
            <div class="col-md-2">

                <a href="" class="listing_exit">Back</a>

            </div>
            <div class="col-md-2">

                <button type="submit" class="listing_add">Save</button>


            </div>
        </div>

    </form>
@else
    <center>
        <p>No Bills Found</p>
    </center>
@endif
