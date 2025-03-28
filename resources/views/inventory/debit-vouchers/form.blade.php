@if (isset($edit))
    <form action="{{ route('debit-vouchers.update', $debitVoucher->id) }}" method="POST" id="debit-vouchers-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="inv_no" id="inv_no">
                                    <option value="">Select</option>
                                    @foreach ($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}"
                                            {{ $inventoryNumber->id == $debitVoucher->inv_no ? 'selected' : '' }}>
                                            {{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code(Quantity)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="item_code_id" id="item_code_id" disabled>
                                    <option value="">Select</option>
                                    @foreach ($creditVouchers as $item)
                                        <option value="{{ $item->item_code_id }}"
                                            {{ $item->item_code_id == $debitVoucher->item_id ? 'selected' : '' }}>
                                            {{ $item->itemCode->code }}({{ $item->total_quantity }})</option>
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
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no"
                                    value="{{ $debitVoucher->voucher_no ?? '' }}" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Group</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="group" id="group"
                                    value="{{ $debitVoucher->group ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Division</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="division" id="division"
                                    value="{{ $debitVoucher->division ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date"
                                    value="{{ $debitVoucher->voucher_date ?? '' }}" placeholder="" readonly>
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
                                <input type="text" class="form-control" name="quantity" id="quantity"
                                    value="{{ $debitVoucher->quantity ?? '' }}" placeholder="" readonly>
                                {{-- <div class="text-danger" id="quantity_no"></div> --}}
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
                                <select class="form-control" name="voucher_type" id="voucher_type">
                                    <option value="">Select</option>
                                    <option value="credit"
                                        {{ $debitVoucher->voucher_type == 'credit' ? 'selected' : '' }}>Credit</option>
                                    <option value="transfer"
                                        {{ $debitVoucher->voucher_type == 'transfer' ? 'selected' : '' }}>Transfer
                                    </option>
                                    <option value="voucher"
                                        {{ $debitVoucher->voucher_type == 'voucher' ? 'selected' : '' }}>Voucher
                                    </option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="remarks" id="remarks" placeholder="">{{ $debitVoucher->remarks }}</textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3 d-flex justify-content-between">

            <div class="col-md-2">
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Update</button>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('debit-vouchers.store') }}" method="POST" id="debit-vouchers-create-form">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" name="voucher_date" class="form-control"
                                    value="{{ now()->format('Y-m-d') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2" hidden>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="voucher_type" id="voucher_type_1"
                                    onchange="getVoucherType(this)">
                                    <option value="">Select</option>
                                    <option value="credit" selected>Credit</option>
                                    <option value="transfer">Transfer</option>
                                    <option value="voucher">Voucher</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inv. No.</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="inv_no" id="inv_no_1">
                                    <option value="">Select</option>
                                    @foreach ($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}">{{ $inventoryNumber->number }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Group</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="group" id="group"
                                    value="{{ $debitVoucher->group ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Division</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="division" id="division"
                                    value="{{ $debitVoucher->division ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>


        <div class="row new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item List</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control item_code_id" name="item_code_id[]" id="item_code_id_1">

                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2" hidden>
                        <label>Item Code</label>
                        <input type="text" class="form-control item_code item-code-no" name="item_code[]"
                            readonly>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-type" name="item_type[]"
                                    id="item_type_1" value="" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Desc</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-desc" name="item_desc[]"
                                    id="item_desc_1" value="" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" name="remarks[]" id="remarks">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="init-item-quantity">
                                <input type="number" class="form-control item-quantity" name="quantity[]"
                                    id="quantity" oninput="checkMax(this)" value="0">
                                <div class="text-danger item-quantity" id="quantity_no"></div>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Unit Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="init-item-unit-price">
                                <input type="text" value="0.00" class="form-control item-unit-price"
                                    name="unit_price[]" id="unit_price" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>GST(%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-gst-percent" name="gst_percent[]"
                                    id="gst_percent" value="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>GST Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-gst-amount" name="gst_amt[]"
                                    id="gst_amount" value="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Discount(%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-discount-percent"
                                    name="disc_percent[]" id="disc_percent" placeholder="" value="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Discount Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-discount-amount" name="disc_amt[]"
                                    id="disc_amt" placeholder="" value="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="init-item-price">
                                <input type="text" value="0.00" class="form-control item-price" name="price[]"
                                    id="price" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto">
                        <div class="add-more form-group mt-4">
                            <a href="javascript:void(0);" class="listing_add add-pre_qualification add-more-sm"
                                id="add-row"><i class="fas fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>


            </div>

            <hr>
        </div>

        <div id="debit_form_add_new_row"></div>

        <div class="row mt-3 d-flex justify-content-between">

            <div class="col-md-2">
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Save</button>
                </div>
            </div>
        </div>
    </form>

    <div id="debit_new_html" hidden>
        <div class="row new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item List</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control item_code_id" name="item_code_id[]" id="item_code_id">

                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2" hidden>
                        <label>Item Code</label>
                        <input type="text" class="form-control item_code item-code-no" name="item_code[]"
                            readonly>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-type" name="item_type[]"
                                    id="item_type" value="" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Desc</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-desc" name="item_desc[]"
                                    id="item_desc" value="" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" name="remarks[]" id="remarks" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="init-item-quantity">
                                <input type="number" min="1" value="0"
                                    class="form-control item-quantity" name="quantity[]" id="quantity"
                                    oninput="checkMax(this)">
                                <div class="text-danger" id="quantity_no"></div>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Unit Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="init-item-unit-price">
                                <input type="number" value="0.00" class="form-control item-unit-price"
                                    name="unit_price[]" id="unit_price" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>GST(%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control item-gst-percent" name="gst_percent[]"
                                    id="gst_percent" value="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>GST Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control item-gst-amount" name="gst_amt[]"
                                    id="gst_amount" value="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Discount(%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control item-discount-percent"
                                    name="disc_percent[]" id="disc_percent" placeholder="" value="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Discount Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control item-discount-amount" name="disc_amt[]"
                                    id="disc_amt" placeholder="" value="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="init-item-price">
                                <input type="number" value="0.00" class="form-control item-price" name="price[]"
                                    id="price" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-2 ms-auto">
                        <label>&nbsp;</label>
                        <button class="listing_add w-100 trash form-control"><i class="fa fa-times"></i></button>
                    </div>
                </div>


            </div>
            <hr>
        </div>
    </div>
@endif
