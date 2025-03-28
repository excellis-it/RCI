@if (isset($edit))
    <form action="{{ route('credit-vouchers.update', $creditVoucher->id) }}" method="POST" id="credit-vouchers-edit-form">
        @method('PUT')
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_number" id="voucher_number"
                                    value="{{ $creditVoucher->voucher_no }}">
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
                                <input type="text" class="form-control" name="rin" id="rin1"
                                    value="{{ $creditVoucher->rin_no }}" readonly>
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
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date_1"
                                    value="{{ $creditVoucher->voucher_date }}" max="{{ date('Y-m-d') }}">
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
                                <select class="form-select form-select-search" name="inv_no" id="inv_no">
                                    <option value="{{ $creditVoucher->inv_id }}" selected>
                                        {{ $creditVoucher->invNumber?->number }}
                                    </option>

                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 member_div" hidden id="member_div">
                        {{-- <div class="row align-items-center justify-content-between">
                            <div class="col-md-12">
                                <label>Inventory Holder Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="member_id" id="member_id">
                                    <option value="">Select Name</option>
                                    @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->user_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-group col-md-4 mb-2 project_div" hidden id="division">
                        {{-- <div class="row align-items-center justify-content-between">
                            <div class="col-md-12">
                                <label>Inventory Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="project_id" id="project_id">
                                    <option value="">Select Name</option>
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div> --}}
                    </div>

                    <div class="form-group col-md-4 mb-2" hidden>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Order Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="order_type" id="order_type">
                                    <option value="">Select</option>
                                    <option value="rs">RS</option>
                                    <option value="rv">RV</option>
                                    <option value="crv" selected>CRV</option>
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
                                <input type="text" class="form-control cost_debatable_input" name="cost_debatable"
                                    value="{{ $creditVoucher->budget_head }}" placeholder="">
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
                                <select class="form-select form-select-search" name="supply_order_no"
                                    id="supply_order_no">
                                    <option value="{{ $creditVoucher->supply_order_id }}" selected>
                                        {{ $creditVoucher->supply_order_id }}
                                    </option>
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
                                <label>Inovoice Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="invoice_no" id="invoice_no"
                                    value="{{ $creditVoucher->invoice_no }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Invoice Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="invoice_date" id="invoice_date"
                                    value="{{ $creditVoucher->invoice_date }}" max="{{ date('Y-m-d') }}">
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
                                <textarea class="form-control" name="remarks" id="remarks">{{ $creditVoucher->remarks }}</textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <label>Store Receipt Date</label>
                        <input type="date" class="form-control" name="store_receipt_date" id="store_receipt_date"
                            value="{{ $creditVoucher->store_receipt_date }}">
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label>Demand No</label>
                        <input type="text" class="form-control" name="demand_no" id="demand_no"
                            value="{{ $creditVoucher->demand_no }}">
                    </div>
                    <div class="form-group col-md-4 mb-2" hidden>
                        <label>ICC No</label>
                        <input type="text" class="form-control" name="icc_no" id="icc_no"
                            value="{{ $creditVoucher->icc_no }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <label>Division Name</label>
                        <input type="text" class="form-control" name="division_name" id="division_name"
                            value="{{ $creditVoucher->division_name }}">
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label>Group Name</label>
                        <input type="text" class="form-control" name="division_group" id="division_group"
                            value="{{ $creditVoucher->division_group }}">
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12" id="receipt-and-inspection">
                        @include('inventory.credit-vouchers.edit-rins')

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
    <form action="{{ route('credit-vouchers.store') }}" method="POST" id="credit-vouchers-create-form">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="voucher_number" id="voucher_number"
                                    value="">
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
                                <select class="form-select form-select-search rin" name="rin" id="rin1">
                                    <option value="">Select</option>
                                    @foreach ($rins as $key => $rin)
                                        <option value="{{ $key }}">{{ $key }}
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
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date_1"
                                    value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
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
                                <select class="form-select form-select-search" name="inv_no" id="inv_no">

                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 member_div" hidden id="member_div">
                        {{-- <div class="row align-items-center justify-content-between">
                            <div class="col-md-12">
                                <label>Inventory Holder Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="member_id" id="member_id">
                                    <option value="">Select Name</option>
                                    @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->user_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-group col-md-4 mb-2 project_div" hidden id="division">
                        {{-- <div class="row align-items-center justify-content-between">
                            <div class="col-md-12">
                                <label>Inventory Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="project_id" id="project_id">
                                    <option value="">Select Name</option>
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div> --}}
                    </div>

                    <div class="form-group col-md-4 mb-2" hidden>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Order Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="order_type" id="order_type">
                                    <option value="">Select</option>
                                    <option value="rs">RS</option>
                                    <option value="rv">RV</option>
                                    <option value="crv" selected>CRV</option>
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
                                <input type="text" class="form-control cost_debatable_input" name="cost_debatable"
                                    id="cost_debatable" value="0.00" placeholder="">
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
                                <select class="form-select form-select-search" name="supply_order_no"
                                    id="supply_order_no">
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
                                <label>Inovoice Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="invoice_no" id="invoice_no"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Invoice Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="invoice_date" id="invoice_date"
                                    value="" max="{{ date('Y-m-d') }}">
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
                                <textarea class="form-control" name="remarks" id="remarks"></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <label>Store Receipt Date</label>
                        <input type="date" class="form-control" name="store_receipt_date" id="store_receipt_date"
                            value="">
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label>Demand No</label>
                        <input type="text" class="form-control" name="demand_no" id="demand_no" value="">
                    </div>
                    <div class="form-group col-md-4 mb-2" hidden>
                        <label>ICC No</label>
                        <input type="text" class="form-control" name="icc_no" id="icc_no" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <label>Division Name</label>
                        <input type="text" class="form-control" name="division_name" id="division_name"
                            value="">
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <label>Group Name</label>
                        <input type="text" class="form-control" name="division_group" id="division_group"
                            value="">
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12" id="receipt-and-inspection">
                        @include('inventory.credit-vouchers.rin')

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

    <div id="credit_new_html" hidden>
        <div class="row new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control item-code" name="item_code_id[]" id=""
                                    onchange="getItemDetails(this)" readonly>
                                    <option value="">Select</option>
                                    @foreach ($itemCodes as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }}</option>
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
                                <input type="date" class="form-control voucher-date" name="voucher_date"
                                    id="voucher_date" value="" placeholder="" readonly>
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
                                <select class="form-control" name="inv_no[]" id="inv_no"
                                    onchange="getInvDetail(this)">
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
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Description</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="description[]" id="description" placeholder="" readonly></textarea>
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
                                <input type="text" class="form-control uom_id" name="uom[]" id="uom"
                                    value="" placeholder="">
                                <input type="hidden" name="uom_id[]" id="uom_id">
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

                                <input type="text" class="form-control" name="item_type[]" id="item_type"
                                    value="" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Tax(%) </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control tax" name="tax[]" id="tax"
                                    value="" placeholder="">
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
                                <input type="text" class="form-control price" name="price[]" id="price"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Tax Amount </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control tax_amt" name="tax_amt[]" id="tax_amt"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Discount(%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control disc_percent" name="disc_percent[]"
                                    id="disc_percent" value="" placeholder="">
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
                                <input type="number" class="form-control disc_amt" name="disc_amt[]" id="disc_amt"
                                    value="" placeholder="" readonly>
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
                                        <option value="{{ $gstPercentage->id }}">{{ $gstPercentage->gst_percent }}
                                            {{-- <input type="hidden" name="gst_percent_id[]" id="gst_percent_id" value="{{  }}"> --}}
                                        </option>
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
                                <label>GST Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control gst_amt" name="gst_amt[]" id="gst_amt"
                                    value="" placeholder="" readonly>
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
                                <input type="number" class="form-control total_price" name="total_price[]"
                                    id="total_price" value="" placeholder="">
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
                                <input type="number" class="form-control" name="quantity[]" id="quantity"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                                <label>Receipt & Inspection Note (RIN)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control rin" name="rin[]" id="rin" disabled>
                                    <option value="">Select</option>
                                    {{-- @foreach ($rins as $rin)
                                        <option value="{{ $rin->id }}">{{ $rin->rin_no }}
                                        </option>
                                    @endforeach --}}
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
                                <input type="text" class="form-control cost_debatable_input"
                                    name="cost_debatable[]" id="cost_debatable" value="" placeholder="">
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
                    <div class="form-group col-md-3 mb-2" hidden id="member_div">
                        <div class="row align-items-center">
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
                    <div class="form-group col-md-3 mb-2" hidden id="project_div">
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
                    <div class="col-md-2 ms-auto">
                        <label>&nbsp;</label>
                        <button class="listing_add w-100 trash form-control"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif
