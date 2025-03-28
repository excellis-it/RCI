<form action="{{ route('rins.update', $rin->id) }}" method="POST" id="rins-edit-form">
    @method('PUT')
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12 d-flex justify-content-between">
                            <label>SIR No</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="sir_no" id="sir_no">
                                <option value="">Select SIR No </option>
                                @foreach ($sir_nos as $key => $sir_no)
                                    <option value="{{ $key }}" {{ $rin->sir_no == $key ? 'selected' : '' }}>
                                        {{ $key }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>RIN No</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control rin_no" name="rin_no" id="rin_no"
                                value="{{ $rin->rin_no }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group
                        col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>RIN Date</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control rin_date" name="rin_date" id="rin_date"
                                value="{{ $rin->rin_date }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Sir Date</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control sir_date" name="sir_date" id="sir_date"
                                value="{{ $rin->sir_date }}" readonly placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Demand No</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control demand_no" name="demand_no" id="demand_no"
                                value="{{ $rin->demand_no ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Demand Date</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control demand_date" name="demand_date" id="demand_date"
                                value="{{ $rin->demand_date ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Inventory No</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="inventory_no" id="inventory_no">
                                <option value="">Select Inventory No</option>
                                @foreach ($inventory_nos as $inventory_no)
                                    <option value="{{ $inventory_no->id }}"
                                        {{ $rin->inventory_id == $inventory_no->id ? 'selected' : '' }}>
                                        {{ $inventory_no->number }}
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
                            <label>Invoice Number</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control invoice_no" name="invoice_no" id="invoice_no"
                                value="{{ $rin->invoice_no ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Invoice Date</label>
                        </div>
                        <div class="col-md-12">
                            <input type="date" class="form-control invoice_date" name="invoice_date"
                                id="invoice_date" value="{{ $rin->invoice_date ?? '' }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12 d-flex justify-content-between">
                            <label>Supplier Detail</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="vendor_id" id="vendor_id">
                                <option value="">Select Supplier</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}"
                                        {{ $rin->vendor_id == $vendor->id ? 'selected' : '' }}>
                                        {{ $vendor->name }} ({{ $vendor->phone }})
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12 d-flex justify-content-between">
                            <label>Supply Order No</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="supply_order_no" id="supply_order_no">
                                <option value="">Select Supply Order No</option>
                                @foreach ($supply_orders as $supply_order)
                                    <option value="{{ $supply_order->id }}"
                                        {{ $rin->supply_order_no == $supply_order->id ? 'selected' : '' }}>
                                        {{ $supply_order->order_number }}
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
                            <label>Inspection Authority</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="authority_id" id="authority_id">
                                <option value="">Select Inspection Authority</option>
                                @foreach ($authorities as $authority)
                                    <option value="{{ $authority->id }}"
                                        {{ $rin->authority_id == $authority->id ? 'selected' : '' }}>
                                        {{ $authority->user_name }}
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
                            <label>Designation</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select form-select-search" name="member_id" id="member_id">
                                <option value="">Select Member</option>
                                @foreach ($all_members as $member)
                                    <option value="{{ $member->id }}"
                                        {{ $rin->member_id == $member->id ? 'selected' : '' }}>
                                        {{ $member->name }}
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
                            <label>Budget Head Details</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="budget_head_details"
                                id="budget_head_details" value="{{ $rin->budget_head_details }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <label for="" class="form-label">Financial Year</label>
                    <select class="form-select" name="financial_year" id="financial_year">
                        <option value="">Select Year</option>
                        @foreach ($financialYears as $financialYear)
                            <option value="{{ $financialYear }}"
                                {{ $rin->financial_year == $financialYear ? 'selected' : '' }}>
                                {{ $financialYear }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>

                <div class="form-group col-md-3 mb-2">
                    <label for="" class="form-label">Store Received Date</label>
                    <input type="date" class="form-control" name="store_received_date" id="store_received_date"
                        value="{{ $rin->store_received_date }}">
                    <span class="text-danger"></span>
                </div>

                <div class="form-group col-md-3 mb-2" hidden>
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" value="1" name="update_all_items"
                            id="update_all_items" checked>
                        <label class="form-check-label" for="update_all_items">
                            Update all items in this RIN
                        </label>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="credit_form_edit_new_row">
            <!-- Display each RIN item for editing -->
            @foreach ($all_rins as $index => $item)
                <div class="new_html">
                    <hr />
                    <div class="col-md-12 count-class">
                        <div class="row item-row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Item Code (Demand No.)</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control item_id" name="item_id[]"
                                            value="{{ $item->gem_item_code }}" placeholder="">
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
                                        <input type="text" class="form-control description" name="description[]"
                                            value="{{ $item->description }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Received Quantity</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control rcv_quantity"
                                            name="received_quantity[]" value="{{ $item->received_quantity }}">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Remarks</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="remarks[]"
                                            value="{{ $item->remarks }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Unit Cost</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control units_cost" name="unit_cost[]"
                                            value="{{ $item->unit_cost }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Total Unit Cost</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control total_cost" name="total_cost[]"
                                            value="{{ $item->total_cost }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <label>Discount
                                            <select class="discount_type" name="discount_type[]" id="discount_type">
                                                <option value="percentage"
                                                    {{ $item->discount_type == 'percentage' ? 'selected' : '' }}>
                                                    Percentage (%)</option>
                                                <option value="fixed"
                                                    {{ $item->discount_type == 'fixed' ? 'selected' : '' }}>Fixed
                                                    Amount</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control disc_percent" name="disc_percent[]"
                                            id="disc_percent" value="{{ $item->discount }}" placeholder="">
                                        <input type="hidden" class="form-control discount_amount"
                                            name="discount_amount[]" id="discount_amount"
                                            value="{{ $item->discount_amount }}" placeholder="">
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
                                        <select class="form-select gst_percent" name="gst[]">
                                            <option value="">Select GST</option>
                                            @foreach ($gsts as $gst)
                                                <option value="{{ $gst->gst_percent }}"
                                                    {{ $item->gst == $gst->gst_percent ? 'selected' : '' }}>
                                                    {{ $gst->gst_percent }}</option>
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
                                        <input type="number" class="form-control gst_amount" name="gst_amount[]"
                                            value="{{ $item->gst_amount }}" placeholder="" readonly>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Total Amount</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control total_amount" name="total_amount[]"
                                            value="{{ $item->total_amount }}" placeholder="" readonly>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Round Figure Amount</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" class="form-control round_amount" name="round_amount[]"
                                            id="round_amount" value="{{ $item->round_amount }}">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>NC Status</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" name="nc_status[]">
                                            <option value="">Select NC Status</option>
                                            @if (count($nc_statuses) > 0)
                                                @foreach ($nc_statuses as $nc_status)
                                                    <option value="{{ $nc_status['status'] }}"
                                                        {{ $item->nc_status == $nc_status['status'] ? 'selected' : '' }}>
                                                        {{ $nc_status['status'] }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Damage Status</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select" name="damage_status[]" id="damage_status">
                                            <option value="">Select Damage Status</option>
                                            <option value="1"
                                                {{ $item->damage_status == '1' ? 'selected' : '' }}>Damaged</option>
                                            <option value="0"
                                                {{ $item->damage_status == '0' ? 'selected' : '' }}>Not Damaged
                                            </option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($index > 0 || count($all_rins) > 1)
                            <div class="row">
                                <div class="col-md-2 ms-auto">
                                    <label>&nbsp;</label>
                                    <button type="button" class="listing_add w-100 trash form-control remove-item"
                                        data-id="{{ $item->id }}">
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

            <div class="row">
                <div class="col-md-2 ms-auto">
                    <button type="button" class="listing_add w-100 form-control edit_rin_add">
                        <i class="fas fa-plus-circle"></i> Add Item
                    </button>
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
