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

        <div class="row mb-5">
            <div class="col-md-2 ms-auto">
                <div class="add-more form-group mt-4">

                    <a href="javascript:void(0);" class="listing_add add-more-rin add-more-sm" style="display: none;"><i
                            class="fas fa-plus-circle"></i> Add More</a>

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
        <div class="row count-class rin-items">
            <hr />


        </div>
    </div>

    <!-- Add blank RIN item template -->
    <div id="blank_rin_template" style="display: none;">
        <div class="row count-class rin-items new-rin-item">
            <div class="form-group col-md-4 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Item Code</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-control item_code_name" name="item_code[]" id="item_code" required>
                            <option value="">Select</option>
                            @foreach ($itemCodes as $itemCode)
                                <option value="{{ $itemCode->code }}" data-item-code-id="{{ $itemCode->id }}"
                                    data-item-nc-status-name="{{ $itemCode->ncStatus?->status ?? '' }}"
                                    data-item-uom="{{ $itemCode->uom ?? '' }}">
                                    {{ $itemCode->code }}</option>
                            @endforeach
                        </select>
                        <input class="item_code_id" type="hidden" name="item_code_id[]">
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
                            value="" placeholder="">
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
                        <textarea class="form-control" name="description[]" id="description" placeholder=""></textarea>
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
                        <select class="form-control uom_id" name="uom_id[]" id="uom">
                            @foreach ($uoms as $uom)
                                <option value="{{ $uom->id }}">{{ $uom->name }}</option>
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
                            value="" placeholder="" readonly>
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
                        <input type="number" step="any" class="form-control price" name="price[]"
                            id="price" value="0.0" placeholder="">
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
                        <input type="number" step="any" class="form-control quantity" name="quantity[]"
                            id="quantity" placeholder="" value="0">
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
                                <option value="{{ $gst->gst_percent }}">
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
                        <input type="number" step="any" class="form-control gst_amount" name="gst_amt[]"
                            id="gst_amount" value="0.0" readonly>
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
                            id="disc_percent" placeholder="" value="0">
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
                        <input type="number" step="any" class="form-control disc_amt" name="disc_amt[]"
                            id="disc_amt" placeholder="" value="0" readonly>
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
                        <input type="number" step="any" step="any" class="form-control total_price"
                            name="total_price[]" id="total_price" placeholder="" value="0.0">
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
                        <input type="text" class="form-control" name="ledger_no[]" id="ledger_no" value=""
                            placeholder="">
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
                        <input type="text" class="form-control" name="folio_no[]" id="folio_no" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-4 mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>&nbsp;</label>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-danger remove-rin-item"><i class="fas fa-trash"></i> Remove</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endif
