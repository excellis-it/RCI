@if (isset($edit))
    <form action="{{ route('conversion-vouchers.update', $conversionVoucher->id) }}" method="POST" id="conversion-vouchers-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_code_id" id="edit_item_code" disabled>
                                    <option value="">Select</option>
                                    @foreach($itemCodes as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $conversionVoucher->item_id ? 'selected' : '' }}>{{ $item->code }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no" value="{{ $conversionVoucher->voucher_no ?? '' }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_date" id="voucher_date" value="{{ $conversionVoucher->voucher_date ?? '' }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="inv_no" id="inv_no" disabled>
                                    <option value="">Select</option>
                                    @foreach($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}" {{ $inventoryNumber->id == $conversionVoucher->inv_no ? 'selected' : '' }}>{{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $conversionVoucher->quantity ?? '' }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                               
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_type" id="voucher_type" value="{{ $conversionVoucher->voucher_type ?? '' }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                                <div class="text-danger" id="voucher_type"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    
                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remark" id="remark" 
                                    placeholder="">{{ $conversionVoucher->remarks ?? '' }}</textarea>
                                <span class="text-danger"></span>
                                <div class="text-danger" id="quantity_no"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Update</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('conversion-vouchers.store') }}" method="POST" id="conversion-vouchers-create-form">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="inv_no" id="inv_no">
                                    <option value="">Select</option>
                                    @foreach($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}">{{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_date" id="voucher_date" value="{{ date('Y-m-d') }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <hr>
                <h4>Strike Off</h4>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>From Inv Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="from_inv_number" id="from_inv_number">
                                    <option value="">Select</option>
                                    @foreach($inventoryNumbers as $inventoryNumber)
                                    <option value="{{ $inventoryNumber->id }}">{{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_code_id" id="item_code_id">
                                    <option value="">Select</option>
                                        <option></option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Ledger No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Qty</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="quantity" id="quantity">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="rate" id="rate" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Desc</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="desc" id="desc" value=""
                                    placeholder=""></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <hr>
                <h4>Brought Of Changes</h4>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>To Inv Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="to_inv_number" id="to_inv_number">
                                    
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Ledger No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Qty</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Desc</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remark" id="remark" value=""
                                    placeholder=""></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Reason</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remark" id="remark" value=""
                                    placeholder=""></textarea>
                                <span class="text-danger"></span>
                                <div class="text-danger" id="quantity_no"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remark" id="remark" value=""
                                    placeholder=""></textarea>
                                <span class="text-danger"></span>
                                <div class="text-danger" id="quantity_no"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@endif
