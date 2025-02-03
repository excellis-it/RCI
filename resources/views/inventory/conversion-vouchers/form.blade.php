@if (isset($edit))
    <form action="{{ route('conversion-vouchers.update', $conversionVoucher->id) }}" method="POST"
        id="conversion-vouchers-edit-form">
        @method('PUT')
        @csrf
        <div class="row justify-content-end">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no"
                                    value="{{ $conversionVoucher->voucher_no ?? '' }}" placeholder="" readonly>
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
                                <select class="form-select" name="item_code_id" id="edit_item_code" disabled>
                                    <option value="">Select</option>
                                    @foreach ($itemCodes as $item)
                                        <option value="{{ $item->item_code_id }}"
                                            {{ $item->id == $conversionVoucher->item_id ? 'selected' : '' }}>
                                            {{ $item->code }}</option>
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
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date"
                                    value="{{ $conversionVoucher->voucher_date ?? '' }}" placeholder="" readonly>
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
                                    @foreach ($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}"
                                            {{ $inventoryNumber->id == $conversionVoucher->inv_no ? 'selected' : '' }}>
                                            {{ $inventoryNumber->number }}
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
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="quantity" id="quantity"
                                    value="{{ $conversionVoucher->quantity ?? '' }}" placeholder="" readonly>
                                <span class="text-danger"></span>

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
                                <textarea class="form-control" name="remark" id="remark" placeholder="">{{ $conversionVoucher->remarks ?? '' }}</textarea>
                                <span class="text-danger"></span>
                                <div class="text-danger" id="quantity_no"></div>
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
    <form action="{{ route('conversion-vouchers.store') }}" method="POST" id="conversion-vouchers-create-form">
        @csrf
        <div class="row justify-content-end">
            <div class="col-md-12">
                <div class="row mb-4">

                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Type of voucher</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="voucher_type" id="voucher_type">
                                    <option value="">Select</option>
                                    <option value="one-to-one">One to One</option>
                                    <option value="many-to-one">Many to One</option>
                                    <option value="one-to-many">One to Many</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>

                <hr>

                <div class="row new_html mb-4">
                    <div class="col-md-12">
                        <h5>Strike Off</h5>
                    </div>
                    <div class="form-group col-xl-3 col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inv. No.</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select inv_no" name="strike_inv_id[]" id="inv_no_1">
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
                    <div class="form-group col-xl-3 col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select item_code_id item_list" name="strike_item_id[]"
                                    id="strike_item_code">
                                    <option value="">Select</option>

                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Ledger No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="strike_ledger[]"
                                    id="strike_ledger">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Desc</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-desc" name="strike_description[]"
                                    id="strike_description" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>C/NC/NCF</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item-type" name="strike_c_nc[]"
                                    id="strike_c_nc" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Unit Rate</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" value="0.00" class="form-control item-rate"
                                    name="strike_rate[]" id="strike_rate" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="init-item-quantity">
                                <input type="number" value="0" class="form-control item-quantity"
                                    name="strike_quantity[]" oninput="checkMax(this)">
                                <span class="text-danger"></span>
                                <div class="text-danger" id="quantity_no"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xl-3 col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="init-item-price">
                                <input type="text" value="0.00" class="form-control item-price"
                                    name="strike_price[]" id="strike_total_rate" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto">
                        <div class="add-more form-group mt-4">
                            <a href="javascript:void(0);" class="listing_add add-more-conv add-more-sm"><i
                                    class="fas fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>


                </div>




            </div>
        </div>

        <div id="conv_form_add_new_row"></div>









        <hr>
        <div class="row mb-4 new_html">
            <div class="col-md-12">
                <h5>Brought on change</h5>
            </div>
            <div class="form-group col-xl-3 col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Inv. No.</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select inv_no" name="brought_inv_id[]" id="inv_no_1">
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
            <div class="form-group col-xl-3 col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Item Code</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select item_code_id item_list" name="brought_item_id[]"
                            id="brought_item_code">
                            <option value="">Select</option>
                            @foreach ($itemCodes as $itemCode)
                                <option value="{{ $itemCode->item_code_id }}">{{ $itemCode->item_code_id }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-xl-3 col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Ledgar No.</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="brought_ledger[]" id="brought_ledger">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-xl-3 col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Desc</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control item-desc" name="brought_description[]"
                            id="brought_description" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-xl-3 col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>C/NC/NCF</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control item-type" name="brought_c_nc[]" id="brought_c_nc"
                            placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-xl-3 col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Unit Rate</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" value="0.00" name="brought_rate[]" class="form-control"
                            id="brought_unit_rate" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-xl-3 col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Quantity</label>
                    </div>
                    <div class="col-md-12">
                        <input name="brought_quantity[]" value="0" id="brought_quantity" class="form-control"
                            readonly>

                        <span class="text-danger"></span>
                        <div class="text-danger" id="quantity_no"></div>
                    </div>
                </div>
            </div>
            <div class="form-group col-xl-3 col-md-3 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Price</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" value="0.00" class="form-control" name="brought_price[]"
                            id="brought_total_rate" readonly>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-12">
                    <h5>Reason For Conversion</h5>
                </div>
                <div class="form-group col-md-12 mb-2">
                    <div class="row align-items-center">

                        <div class="col-md-12">
                            <textarea class="form-control" name="reason[]" id="remark" value="" placeholder=""></textarea>
                            <span class="text-danger"></span>
                            <div class="text-danger" id="reason"></div>
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
                    <button type="submit" class="listing_add">Save</button>
                </div>
            </div>
        </div>


    </form>


    {{-- conv add more div --}}

    <div id="conv_new_html" hidden>
        <div class="new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h5>Strike Off</h5>
                        </div>
                        <div class="form-group col-xl-3 col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Inv. No.</label>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-select inv_no" name="strike_inv_id[]" id="inv_no_1">
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
                        <div class="form-group col-xl-3 col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Item Code</label>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-select item_code_id item_list" name="strike_item_id[]">
                                        <option value="">Select</option>

                                    </select>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Ledger No.</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control " name="strike_ledger[]"
                                        placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Desc</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control item-desc" name="strike_description[]"
                                        placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>C/NC/NCF</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control item-type" name="strike_c_nc[]">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Unit Rate</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" value="0.00" class="form-control item-rate"
                                        name="strike_rate[]" placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Quantity</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" class="init-item-quantity">
                                    <input type="number" value="0" class="form-control item-quantity"
                                        name="strike_quantity[]" oninput="checkMax(this)">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Price</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" class="init-item-price">
                                    <input type="text" value="0.00" class="form-control item-price"
                                        name="strike_price[]" id="strike_total_rate" readonly>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 ms-auto">
                            <label>&nbsp;</label>
                            <button class="listing_add w-100 trash form-control"><i class="fa fa-times"></i></button>
                            </button>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
@endif
