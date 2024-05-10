@if (isset($edit))
    <form action="{{ route('credit-vouchers.update', $creditVoucher->id) }}" method="POST" id="credit-vouchers-edit-form">
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
                                <select class="form-control" name="item_code_id" id="item_code_id" disabled>
                                    <option value="">Select</option>
                                    @foreach($itemCodes as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $creditVoucher->item_code_id ? 'selected' : '' }}>{{ $item->code }}</option>
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
                                <input type="text" class="form-control" name="voucher_no" id="voucher_no" value="{{ $creditVoucher->voucher_no ?? '' }}"
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
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date" value="{{ $creditVoucher->voucher_date ?? '' }}"
                                    placeholder="">
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
                                <select class="form-control" name="inv_no" id="inv_no" disabled>
                                    <option value="">Select</option>
                                    @foreach($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}" {{ $inventoryNumber->id == $creditVoucher->inv_no ? 'selected' : '' }}>{{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
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
                                <textarea class="form-control" name="description" id="description" 
                                    placeholder="" readonly >{{ $creditVoucher->description }}</textarea>
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
                                <input type="text" class="form-control" name="uom" id="uom" value="{{ $creditVoucher->uom ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                {{-- <select class="form-control" name="item_type" id="item_type">
                                    <option value="">Select</option>
                                    <option value="consumable" {{ $creditVoucher->item_type == 'consumable' ? 'selected' : '' }}>Consumable</option>
                                    <option value="non-consumable" {{ $creditVoucher->item_type == 'non-consumable' ? 'selected' : '' }}>Non Consumable</option>
                                </select> --}}
                                <input type="text" class="form-control" name="item_type" id="item_type" value="{{ $creditVoucher->item_type ?? '' }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Tax </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tax" id="edit_tax" value="{{ $creditVoucher->tax ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Price </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="price" id="edit_price" value="{{ $creditVoucher->price ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Price </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_price" id="edit_total_price" value="{{ $creditVoucher->total_price ?? '' }}"
                                    placeholder="">
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
                                <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $creditVoucher->quantity ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Supply Order Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="supply_order_no" id="supply_order_no">
                                    <option value="">Select</option>
                                    @foreach($supplyOrders as $supplyOrder)
                                        <option value="{{ $supplyOrder->id }}" {{ $supplyOrder->id == $creditVoucher->supply_order_no ? 'selected' : '' }}>{{ $supplyOrder->order_number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Receipt & Inspection Note (RIN)</label>
                            </div>
                            <div class="col-md-12">
                                {{-- <input type="text" class="form-control" name="rin" id="rin" value=""
                                    placeholder=""> --}}
                                    <textarea class="form-control" name="rin" id="rin" >{{ $creditVoucher->rin }}</textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Order Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="order_type" id="order_type">
                                    <option value="">Select</option>
                                    <option value="rs" {{ $creditVoucher->order_type == 'rs' ? 'selected' : '' }}>RS</option>
                                    <option value="rv" {{ $creditVoucher->order_type == 'rv' ? 'selected' : '' }}>RV</option>
                                    <option value="crv" {{ $creditVoucher->order_type == 'crv' ? 'selected' : '' }}>CRV</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2" id="edit_member_div">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Holder Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="member_id" id="edit_member_id" disabled>
                                    <option value="">Select Name</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}" {{ $creditVoucher->member_id == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                                    @endforeach
                                </select>
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
    <form action="{{ route('credit-vouchers.store') }}" method="POST" id="credit-vouchers-create-form">
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
                                <select class="form-control" name="item_code_id" id="item_code_id">
                                    <option value="">Select</option>
                                    @foreach($itemCodes as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

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
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="inv_no" id="inv_no">
                                    <option value="">Select</option>
                                    @foreach($inventoryNumbers as $inventoryNumber)
                                        <option value="{{ $inventoryNumber->id }}" data-hidden-value="{{ $inventoryNumber->inventory_type }}">{{ $inventoryNumber->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Description</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="description" id="description" 
                                    placeholder="" readonly></textarea>
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
                                <input type="text" class="form-control" name="uom" id="uom" value=""
                                    placeholder="">
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
                                {{-- <select class="form-control" name="item_type" id="item_type">
                                    <option value="">Select</option>
                                    <option value="consumable">Consumable</option>
                                    <option value="non-consumable">Non Consumable</option>
                                </select> --}}

                                <input type="text" class="form-control" name="item_type" id="item_type" value=""
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
                                <label>Tax </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="tax" id="tax" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Price </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="price" id="price" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_price" id="total_price" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="quantity" id="quantity" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Supply Order Number</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="supply_order_no" id="supply_order_no">
                                    <option value="">Select</option>
                                    @foreach($supplyOrders as $supplyOrder)
                                        <option value="{{ $supplyOrder->id }}">{{ $supplyOrder->order_number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Receipt & Inspection Note (RIN)</label>
                            </div>
                            <div class="col-md-12">
                                {{-- <input type="text" class="form-control" name="rin" id="rin" value=""
                                    placeholder=""> --}}
                                    <textarea class="form-control" name="rin" id="rin"></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Order Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="order_type" id="order_type">
                                    <option value="">Select</option>
                                    <option value="rs" >RS</option>
                                    <option value="rv" >RV</option>
                                    <option value="crv">CRV</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2" hidden id="member_div">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory Holder Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="member_id" id="member_id">
                                    <option value="">Select Name</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
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
