@if (isset($set_rins))
@if (count($rins) > 0)
@foreach ($rins as $rin)
<div class="row">
    {{-- @dd($rin->itemCode) --}}
    <div class="form-group col-md-4 mb-2">
        <div class="row align-items-center">
            <div class="col-md-12">
                <label>Item Code</label>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="item_code[]" id="item_code" value="{{ $rin->itemCode->code }}"
                    placeholder="">
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
                <textarea class="form-control" name="description[]" id="description" placeholder="" readonly>{{ $rin->itemCode->description }}</textarea>
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
                <input type="text" class="form-control" name="uom[]" id="uom" value="{{ $rin->itemCode->uomajorment ? $rin->itemCode->uomajorment->name : '' }}"
                    placeholder="" readonly>
                <input type="hidden" name="uom_id[]" id="uom_id" value="{{ $rin->itemCode->uomajorment ? $rin->itemCode->uomajorment->id : '' }}">
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

                <input type="text" class="form-control" name="item_type[]" id="item_type" value=" {{ $rin->itemCode->item_type }}" placeholder="" readonly>
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
                <input type="text" class="form-control price" name="price[]" id="price" value="{{ $rin->itemCode->item_price }}"
                    placeholder="">
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
                <input type="text" class="form-control disc_percent" name="disc_percent[]" id="disc_percent" 
                    placeholder="">
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
                    placeholder="">
                <span class="text-danger"></span>
            </div>
        </div>
    </div>
    <div class="form-group col-md-4 mb-2">
        <div class="row align-items-center">
            <div class="col-md-12">
                <label>GST(%)</label>
            </div>
            <div class="col-md-12">
                <select class="form-control gst_percent" name="gst_percent[]" id="gst_percent">
                    <option value="">Select</option>
                    @foreach ($gstPercentages as $gstPercentage)
                    <option value="{{ $gstPercentage->gst_percent }}">{{ $gstPercentage->gst_percent }}
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
                <input type="text" class="form-control gst_amt" name="gst_amt[]" id="gst_amt" value="" placeholder="">
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
                <input type="text" class="form-control total_price" name="total_price[]" id="total_price" value=""
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
                <input type="text" class="form-control" name="quantity[]" id="quantity" value="" placeholder="">
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
                <select class="form-control" name="supply_order_no[]" id="supply_order_no">
                    <option value="">Select</option>
                    @foreach ($supplyOrders as $supplyOrder)
                    <option value="{{ $supplyOrder->id }}">{{ $supplyOrder->order_number }}
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
                <label>Cost Debatable to Budget Head</label>
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="cost_debatable[]" id="cost_debatable" value=""
                    placeholder="">
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
                <select class="form-control" name="order_type[]" id="order_type">
                    <option value="">Select</option>
                    <option value="rs">RS</option>
                    <option value="rv">RV</option>
                    <option value="crv">CRV</option>
                </select>
                <span class="text-danger"></span>
            </div>
        </div>
    </div>
    <div class="form-group col-md-4 mb-2">
        <div class="row align-items-center">
            <div class="col-md-12">
                <label>Consigner's Name & Address</label>
            </div>
            <div class="col-md-12">
                <select class="form-control" name="consigner[]" id="consigner">
                    <option value="">Select Name</option>
                    @foreach ($vendors as $consigner)
                    <option value="{{ $consigner->id }}">{{ $consigner->name }}</option>
                    @endforeach
                </select>
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
                <select class="form-control" name="inv_no[]" id="inv_no" onchange="getInvDetail(this)">
                    <option value="">Select</option>
                    @foreach ($inventoryNumbers as $inventoryNumber)
                    <option value="{{ $inventoryNumber->id }}"
                        data-hidden-value="{{ $inventoryNumber->inventory_type }}">
                        {{ $inventoryNumber->number }}</option>
                    @endforeach
                </select>
                <span class="text-danger"></span>
            </div>
        </div>
    </div>
        <div class="form-group col-md-3 mb-2 member_div" hidden>
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12">
                    <label>Inventory Holder Name</label>
                </div>
                <div class="col-md-12">
                    <select class="form-control" name="member_id[]" id="member_id">
                        <option value="">Select Name</option>
                        @foreach ($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group col-md-3 mb-2 project_div" hidden>
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12">
                    <label>Inventory Project Name</label>
                </div>
                <div class="col-md-12">
                    <select class="form-control" name="project_id[]" id="project_id">
                        <option value="">Select Name</option>
                        @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
   
    
    
</div>
<hr>
@endforeach
@endif

@endif