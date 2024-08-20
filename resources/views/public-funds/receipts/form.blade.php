@if (isset($edit))
    <form action="{{ route('receipts.update', $public_fund_vendor->id) }}" method="POST" id="public-vendor-edit-form">
        @method('PUT')
        @csrf
        <div class="row align-items-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Mode</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="mode" id="mode">
                                    <option value="">Select</option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                </select>
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
                                <input type="date" class="form-control" name="vr_date" id="vr_date" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="amount" id="amount">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cash-form" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Form</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="form" id="form">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cash-details" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Details</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="details" id="details">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cheque-sr-no" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sr no.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sr_no" id="sr_no">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vendor</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="vendor_id" id="vendor_id">
                                    <option value="">Select</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->f_name }} {{ $vendor->l_name }} ({{ $vendor->phone }})</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cheque-vendor-desig" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Desig.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="desig" id="desig">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cheque-bill-ref" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Bill ref.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="bill_ref" id="bill_ref" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cheque-bank-acc" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Bank Acc</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="bank_acc" id="bank_acc">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2 col-md-4 cheque-dv-no" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DV No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dv_no" id="dv_no"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
             

                    <div class="form-group mb-2 col-md-4 cheque-chq-no" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="cheque_no" id="cheque_no" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                  

                    <div class="form-group mb-2 col-md-4 cheque-date-no" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="cheque_date" id="cheque_date">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group mb-2 col-md-4 cheque-narration" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Narration</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="narration" id="narration">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
              

                    <div class="row justify-content-between">
                        <div class="col-xl-8">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
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
@else
    <form action="{{ route('receipts.store') }}" method="POST" id="receipts-create-form">
        @csrf
        <div class="row align-items-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Mode</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="mode" id="mode">
                                    <option value="">Select</option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                </select>
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
                                <input type="date" class="form-control" name="vr_date" id="vr_date" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="amount" id="amount">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cash-form" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Form</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="form" id="form">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cash-details" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Details</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="details" id="details">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cheque-sr-no" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sr no.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sr_no" id="sr_no">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vendor</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="vendor_id" id="vendor_id">
                                    <option value="">Select</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->f_name }} {{ $vendor->l_name }} ({{ $vendor->phone }})</option>
                                    @endforeach
                                    <option value="Other">Other</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cheque-vendor-name" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vendor Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="vendor_name" id="vendor_name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cheque-vendor-desig" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Desig.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="desig" id="desig">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cheque-bill-ref" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Bill ref.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="bill_ref" id="bill_ref" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 cheque-bank-acc" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Bank Acc</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="bank_acc" id="bank_acc">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-2 col-md-4 cheque-dv-no" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DV No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="dv_no" id="dv_no"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
             

                    <div class="form-group mb-2 col-md-4 cheque-chq-no" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="cheque_no" id="cheque_no" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                  

                    <div class="form-group mb-2 col-md-4 cheque-date-no" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="cheque_date" id="cheque_date">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group mb-2 col-md-4 cheque-narration" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Narration</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="narration" id="narration">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
              

                    <div class="row justify-content-between">
                        <div class="col-xl-8">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
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
@endif
