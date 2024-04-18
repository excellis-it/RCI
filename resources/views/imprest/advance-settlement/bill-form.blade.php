@if (isset($edit))
    <form action="{{ route('cda-bills.update', $cdaBill->id) }}" method="POST" id="advance-settlement-bills-edit-form">
        @method('PUT')
        @csrf
        
        <div class="row align-items-end">
            <div class="col-md-8">
                <div class="row align-items-end">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="chq_no" id="chq_no"
                                    placeholder="" value="{{ $cdaBill->chq_no ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="chq_date" id="chq_date"
                                    placeholder="" value="{{ $cdaBill->chq_date ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Crv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="crv_no" id="crv_no"
                                    placeholder="" value="{{ $cdaBill->crv_no ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-end">
                        <div class="me-2 mb-2">
                            <button type="submit" class="listing_add">Update</button>
                        </div>
                        <div class="me-2 mb-2">
                            <button type="reset" class="listing_exit">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('advance-settle-bills.store') }}" method="POST" id="advance-settlement-bills-create-form">
        @csrf
        <input type="text"  name="advance_settlement_id"  value="{{ $advance_settlement->id }}" hidden>
        <div class="row align-items-end">
            <div class="col-md-8">
                <div class="row align-items-end">
                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Firm</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="firm" id="firm"
                                    placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Bill Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="bill_amount" id="bill_amount"
                                    placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Balance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="balance" id="balance"
                                    placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-8 mb-2">
                        <div class="d-flex align-items-end">
                            <div class="me-2 mb-2">
                                <button type="submit" class="listing_add">Add</button>
                            </div>
                            <div class="me-2 mb-2">
                                <button type="reset" class="listing_exit">Delete</button>
                            </div>\
                            <div class="me-2 mb-2">
                                <button type="reset" class="listing_exit">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </form>
@endif
