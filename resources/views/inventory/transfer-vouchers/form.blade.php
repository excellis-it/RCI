@if (isset($edit))
    <form action="{{ route('transfer-vouchers.update', $transfer_voucher->id) }}" method="POST" id="items-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date"
                                    placeholder="" value="{{ $transfer_voucher->voucher_date }}">
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
                                    placeholder="" value="{{ $transfer_voucher->voucher_no }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>From Inv Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="from_inv_number" id="from_inv_number" disabled>
                                    <option value="">Select</option>
                                    @foreach ($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}"
                                            {{ $inventoryNumber->id == $transfer_voucher->from_inv_number ? 'selected' : '' }}>
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
                                <label>To Inv Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="to_inv_number" id="to_inv_number"
                                    placeholder="" value="{{ $transfer_voucher->toInvNo->number }}" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item List(Quantity)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="item_code_id" id="item_code_id" disabled>
                                    <option value="">Select</option>
                                    @foreach ($creditVouchers as $item)
                                        <option value="{{ $item->item_code_id }}"
                                            {{ $item->item_code_id == $transfer_voucher->item_id ? 'selected' : '' }}>
                                            {{ $item->itemCodes->code }}({{ $item->total_quantity }})</option>
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
                                    value="{{ $transfer_voucher->quantity }}" readonly>
                                <div class="text-danger" id="quantity_no"></div>
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
                                <textarea class="form-control" name="remarks" id="remarks" placeholder="">{{ $transfer_voucher->remarks }}</textarea>
                                <span class="text-danger"></span>
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
    <form action="{{ route('transfer-vouchers.store') }}" method="POST" id="transfer-voucher-create-form">
        @csrf
        <div class="row justify-content-end">
            <div class="col-md-12">
                <div class="row mb-4">


                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="issuing_inv_no" id="issuing_inv_no"
                                    onchange="">
                                    <option value="">Select</option>
                                    @foreach ($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}"
                                            data-hidden-value="{{ $inventoryNumber->inventory_type }}"
                                            data-division="{{ $inventoryNumber->division }}"
                                            data-crvs="{{ $inventoryNumber->creditVoucherDetails }}">
                                            {{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Issuing Division</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="issuing_division"
                                    id="issuing_division" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="receiving_inv_no" id="receiving_inv_no"
                                    onchange="">
                                    <option value="">Select</option>
                                    @foreach ($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}"
                                            data-hidden-value="{{ $inventoryNumber->inventory_type }}"
                                            data-division="{{ $inventoryNumber->division }}">
                                            {{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group col-xl-3 col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Receiving Division</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="receiving_division"
                                    id="receiving_division" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div hidden>
                        <select name="" id="item_code_list">


                        </select>

                    </div>


                </div>

                <div class="new_html">
                    <div class="col-md-12 count-class">
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <h5>Strike off Charge</h5>
                            </div>
                            <div class="form-group col-xl-3 col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Ledger Number</label>
                                    </div>
                                    <div class="col-md-12">

                                        <select class="form-control item_code_list"
                                            name="strike_ledger_no[]"></select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xl-3 col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Nomenclature</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control item_description"
                                            name="strike_nomenclature[]" readonly>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xl-3 col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Quantity</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control item_quantity"
                                            name="strike_quantity[]" value="0">
                                        <div class="text-danger" id="quantity_no"></div>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xl-3 col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Rate</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" value="0.00" class="form-control item_rate"
                                            name="strike_rate[]" readonly>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <h5>Broght on change</h5>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Ledger Number</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control item_code"
                                            name="brought_ledger_no[]" readonly>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Nomenclature</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control item_description"
                                            name="brought_nomenclature[]" readonly>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Quantity</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" value="0" class="form-control item_quantity"
                                            name="brought_quantity[]" readonly>
                                        <div class="text-danger" id="quantity_no"></div>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 ms-auto">
                                <div class="add-more form-group mt-4">
                                    <a href="javascript:void(0);" class="listing_add add-more-trans"><i
                                            class="fas fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>

                        </div>




                    </div>
                </div>


                <div id="trans_form_add_new_row"></div>

            </div>
            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Save</button>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-6">
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>

    {{-- add more transaction --}}
    <div id="transaction_new_html" hidden>
        <div class="new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h5>Strike off Charge</h5>
                        </div>
                        <div class="form-group col-xl-3 col-md-4 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Ledger Number</label>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-control item_code_list" name="strike_ledger_no[]"></select>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-md-4 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Nomenclature</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control item_description"
                                        name="strike_nomenclature[]" readonly>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-md-4 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Quantity</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" value="0" class="form-control item_quantity"
                                        name="strike_quantity[]">
                                    <div class="text-danger" id="quantity_no"></div>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xl-3 col-md-4 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Rate</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" value="0.00" class="form-control item_rate" name="strike_rate[]"
                                        readonly>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h5>Broght on change</h5>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Ledger Number</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control item_code" name="brought_ledger_no[]"
                                        readonly>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Nomenclature</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control item_description"
                                        name="brought_nomenclature[]" readonly>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Quantity</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" value="0" class="form-control item_quantity"
                                        name="brought_quantity[]" readonly>
                                    <div class="text-danger" id="quantity_no"></div>
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
@endif
