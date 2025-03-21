@if (isset($creditVoucherItems))
    @if (count($creditVoucherItems) > 0)
        @foreach ($creditVoucherItems as $creditVoucherItem)
            <div class="row count-class rin-items">
                {{-- @dd($creditVoucherItem->itemCode) --}}
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Item Code</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-control item_code_name" name="item_code[]" id="item_code" required>
                                <option value="{{ $creditVoucherItem->item_code_id }}" selected>
                                    {{ $creditVoucherItem->item_code_id }}</option>

                            </select>
                            <input class="item_code_id" type="hidden" name="item_code_id[]"
                                value="{{ $creditVoucherItem->item_code }}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Gem Item Code</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="gem_item_code[]" id="gem_item_code"
                                value="{{ $creditVoucherItem->gem_item_code }}" placeholder="" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Description</label>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="description[]" id="description" placeholder="" readonly>{{ $creditVoucherItem->description }}</textarea>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>UOM</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-control" name="uom_id[]" id="uom">
                                @foreach ($uoms as $uom)
                                    <option value="{{ $uom->id }}"
                                        {{ $creditVoucherItem->uom == $uom->id ? 'selected' : '' }}>{{ $uom->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Item Type</label>
                        </div>
                        <div class="col-md-12">

                            <input type="text" class="form-control item_type" name="item_type[]" id="item_type"
                                value="{{ $creditVoucherItem->item_type }}" placeholder="" readonly>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Unit Price </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control price" name="price[]" id="price"
                                value="{{ $creditVoucherItem->price ?? 0.0 }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>



                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Discount(%)</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control disc_percent" name="disc_percent[]"
                                id="disc_percent" placeholder="" value="{{ $creditVoucherItem->disc_percent ?? 0 }}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Discount Amt</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control disc_amt" name="disc_amt[]" id="disc_amt"
                                placeholder="" value="{{ $creditVoucherItem->disc_amt ?? 0 }}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>GST</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select gst_percent" name="gst_percent[]" id="gst">
                                <option value="">Select GST</option>
                                @foreach ($gstPercentages as $gst)
                                    <option value="{{ $gst->gst_percent }}"
                                        {{ $creditVoucherItem->gst == $gst->gst_percent ? 'selected' : '' }}>
                                        {{ $gst->gst_percent }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>GST Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control gst_amount" name="gst_amt[]" id="gst_amount"
                                value="{{ $creditVoucherItem->gst_amount ?? 0.0 }}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Total Unit Price</label>
                        </div>
                        <div class="col-md-12">
                            <input type="number" class="form-control total_price" name="total_price[]" id="total_price"
                                placeholder="" value="{{ $creditVoucherItem->total_price ?? 0.0 }}">
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
                            <input type="text" class="form-control quantity" name="quantity[]" id="quantity"
                                placeholder="" value="{{ $creditVoucherItem->quantity ?? 0 }}">
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
                            <input type="text" class="form-control" name="ledger_no[]" id="ledger_no"
                                value="{{ $creditVoucherItem->ledger_no ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>


                <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Page No</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="folio_no[]" id="folio_no"
                                value="{{ $creditVoucherItem->folio_no ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
        @endforeach
    @endif
@endif
