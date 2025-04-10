@if (isset($edit))
    <form action="{{ route('sirs.update', $sir->id) }}" method="POST" id="sir-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>SIR No </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sir_no" id="sir_no"
                                    value="{{ $sir->sir_no ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>SIR Date </label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="sir_date" id="sir_date"
                                    value="{{ $sir->sir_date ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Demand No. </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="demand_no" id="demand_no"
                                    value="{{ $sir->demand_no ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Demand Date </label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="demand_date" id="demand_date"
                                    value="{{ $sir->demand_date ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Invoice No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="invoice_no" id="invoice_no"
                                    value="{{ $sir->invoice_no ?? '' }}">
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
                                <input type="date" class="form-control" name="invoice_date" id="invoice_date"
                                    value="{{ $sir->invoice_date ?? '' }}">
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
                                <select class="form-select" name="inventory_no">
                                    <option value="">Select Inventory No </option>
                                    @foreach ($inventory_nos as $inventory_no)
                                        <option value="{{ $inventory_no->id }}"
                                            {{ $sir->inventory_no == $inventory_no->id ? 'selected' : '' }}>
                                            {{ $inventory_no->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12 d-flex justify-content-between">
                                <label>Supplier Detail</label>
                                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn"
                                    id="add-supplier-btn"><i class="fa fa-plus"></i></a>
                                {{-- <button type="button" class="btn btn-sm btn-primary" id="add-supplier-btn">Add Supplier</button> --}}
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="supplier_id" id="supplier_id">
                                    <option value="">Select Supplier</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}"
                                            {{ $sir->supplier_id == $vendor->id ? 'selected' : '' }}>
                                            {{ $vendor->name }}
                                            ({{ $vendor->phone }})
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
                                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn"
                                    id="add-supply-order-btn"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="supply_order_no" id="supply_order_no">
                                    <option value="">Select Supply Order No</option>
                                    @foreach ($supply_orders as $supply_order)
                                        <option value="{{ $supply_order->id }}"
                                            {{ $sir->supply_order_no == $supply_order->id ? 'selected' : '' }}>
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
                                <select class="form-select" name="inspection_authority" id="inspection_authority">
                                    <option value="">Select Inspection Authority</option>
                                    @foreach ($authorities as $authority)
                                        <option value="{{ $authority->id }}"
                                            {{ $sir->inspection_authority == $authority->id ? 'selected' : '' }}>
                                            {{ $authority->user_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group col-md-3 mb-2" hidden>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ $sir->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $sir->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- sir types --}}
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>SIR Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="sir_type">
                                    <option value="">Select SIR Type</option>
                                    @foreach ($sir_types as $sir_type)
                                        <option value="{{ $sir_type->id }}"
                                            {{ $sir->sir_type_id == $sir_type->id ? 'selected' : '' }}>
                                            {{ $sir_type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>

                    </div>

                    {{-- store_received_date --}}
                    <div class="form-group
                        col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Store Received Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="store_received_date"
                                    id="store_received_date" value="{{ $sir->store_received_date ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <div>
                <hr>
                <div>
                    <div class="row mb-3">
                        <div class="col-md-2 ms-auto">
                            <div class="add-more form-group">
                                <a href="javascript:void(0);" class="listing_add add-more-rin add-more-sm"><i
                                        class="fas fa-plus-circle"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="credit_form_add_new_row">
                        @foreach ($sirItems as $key => $sirItem)
                            <div class="new_html">
                                <div class="serial-number-display mb-2 fw-bold">Item #<span
                                        class="item-serial">{{ count($sirItems) - $key }}</span></div>
                                <div class="row">


                                    <div class="form-group col-md-4 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Item Code (Demand No.)</label>
                                            </div>
                                            <div class="col-md-12">

                                                <input type="text" name="item_id[]" id="item_id"
                                                    value="{{ $sirItem->gem_item_code }}"
                                                    class="form-control item_id">
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
                                                <input type="text" class="form-control description"
                                                    name="description[]" id="description"
                                                    value="{{ $sirItem->description }}">
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
                                                <input type="number" step="any"
                                                    class="form-control rcv_quantity" name="received_quantity[]"
                                                    id="received_quantity"
                                                    value="{{ $sirItem->received_quantity ?? 0 }}">
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
                                                    id="remarks" placeholder="" value="{{ $sirItem->remarks }}">
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
                                                <input type="number" step="any" class="form-control units_cost"
                                                    name="unit_cost[]" id="unit_cost" placeholder=""
                                                    value="{{ $sirItem->unit_cost ?? 0.0 }}">
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
                                                <input type="number" step="any" class="form-control total_cost"
                                                    name="total_cost[]" id="total_cost" placeholder=""
                                                    value="{{ $sirItem->total_cost ?? 0.0 }}">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12 d-flex justify-content-between">
                                                <label>Discount <select class="discount_type" name="discount_type[]"
                                                        id="discount_type">
                                                        <option
                                                            {{ $sirItem->discount_type == 'percentage' ? 'selected' : '' }}
                                                            value="percentage">Percentage (%)</option>
                                                        <option
                                                            {{ $sirItem->discount_type == 'fixed' ? 'selected' : '' }}
                                                            value="fixed">Fixed Amount</option>
                                                    </select></label>
                                            </div>
                                            <div class="col-md-12">
                                                <input
                                                    type="{{ $sirItem->discount_type == 'fixed' ? 'hidden' : 'number' }}"
                                                    class="form-control disc_percent" name="disc_percent[]"
                                                    max="100" id="disc_percent" placeholder="Enter percentage"
                                                    value="{{ $sirItem->discount_type == 'percentage' && $sirItem->total_cost > 0 ? round(($sirItem->discount_amount / $sirItem->total_cost) * 100, 2) : 0.0 }}"
                                                    {{ $sirItem->discount_type == 'fixed' ? 'disabled' : '' }}>

                                                <input
                                                    type="{{ $sirItem->discount_type == 'percentage' || $sirItem->discount_type == '' ? 'hidden' : 'number' }}"
                                                    class="form-control discount_amount mt-2" name="discount_amount[]"
                                                    id="discount_amount" placeholder="Enter fixed amount"
                                                    value="{{ $sirItem->discount_type == 'fixed' ? $sirItem->discount_amount : 0.0 }}">
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
                                                <select class="form-select gst_percent" name="gst[]"
                                                    id="gst">
                                                    <option value="">Select Gst</option>
                                                    @foreach ($gsts as $gst)
                                                        <option
                                                            {{ $sirItem->gst == $gst->gst_percent ? 'selected' : '' }}
                                                            value="{{ $gst->gst_percent }}">{{ $gst->gst_percent }}
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
                                                <label>Gst Amount</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="number" step="any" class="form-control gst_amount"
                                                    name="gst_amount[]" id="gst_amount" placeholder=""
                                                    value="{{ $sirItem->gst_amount ?? 0.0 }}" readonly>
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
                                                <input type="number" step="any"
                                                    class="form-control total_amount" name="total_amount[]"
                                                    id="total_amount" placeholder=""
                                                    value="{{ $sirItem->total_amount ?? 0.0 }}">
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
                                                <select class="form-select nc_statuses" name="nc_status[]"
                                                    id="nc_status">
                                                    <option value="">Select</option>
                                                    @foreach ($nc_statuses as $status)
                                                        <option value="{{ $status->status }}"
                                                            {{ $sirItem->nc_status == $status->status ? 'selected' : '' }}>
                                                            {{ $status->status }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-2" hidden>
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>A/U Status</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-select au_statuses" name="au_status[]"
                                                    id="au_status">
                                                    <option value="">Select</option>
                                                    @foreach ($au_statuses as $status)
                                                        <option value="{{ $status->id }}"
                                                            {{ $sirItem->au_status == $status->id ? 'selected' : '' }}>
                                                            {{ $status->status }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 ms-auto">
                                        <label>&nbsp;</label>
                                        <button type="button" class="listing_add w-100 trash form-control add-more">
                                            <i class="fa fa-cross">x</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
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
    <form action="{{ route('sirs.store') }}" method="POST" id="sir-create-form">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>SIR No </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sir_no" id="sir_no">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>SIR Date </label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="sir_date" id="sir_date">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Demand No. </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="demand_no" id="demand_no">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Demand Date </label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="demand_date" id="demand_date">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Invoice No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="invoice_no" id="invoice_no">
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
                                <input type="date" class="form-control" name="invoice_date" id="invoice_date">
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
                                <select class="form-select" name="inventory_no">
                                    <option value="">Select Inventory No </option>
                                    @foreach ($inventory_nos as $inventory_no)
                                        <option value="{{ $inventory_no->id }}">{{ $inventory_no->number }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12 d-flex justify-content-between">
                                <label>Supplier Detail</label>
                                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn"
                                    id="add-supplier-btn"><i class="fa fa-plus"></i></a>
                                {{-- <button type="button" class="btn btn-sm btn-primary" id="add-supplier-btn">Add Supplier</button> --}}
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="supplier_id" id="supplier_id">
                                    <option value="">Select Supplier</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}
                                            ({{ $vendor->phone }})
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
                                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn"
                                    id="add-supply-order-btn"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="supply_order_no" id="supply_order_no">
                                    <option value="">Select Supply Order No</option>
                                    @foreach ($supply_orders as $supply_order)
                                        <option value="{{ $supply_order->id }}">{{ $supply_order->order_number }}
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
                                <select class="form-select" name="inspection_authority" id="inspection_authority">
                                    <option value="">Select Inspection Authority</option>
                                    @foreach ($authorities as $authority)
                                        <option value="{{ $authority->id }}">{{ $authority->user_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Contract Authority</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="contract_authority"
                                    id="contract_authority">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Contract Authority Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="contract_authority_date"
                                    id="contract_authority_date">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group col-md-3 mb-2" hidden>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="">Select Status</option>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    {{-- sir types --}}
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>SIR Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="sir_type">
                                    <option value="">Select SIR Type</option>
                                    @foreach ($sir_types as $sir_type)
                                        <option value="{{ $sir_type->id }}">{{ $sir_type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- store_received_date --}}
                    <div class="form-group
                        col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Store Received Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="store_received_date"
                                    id="store_received_date" value="{{ $sir->store_received_date ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div>
            <hr>
            <div>
                <div class="row mb-3">
                    <div class="col-md-2 ms-auto">
                        <div class="add-more form-group">
                            <a href="javascript:void(0);" class="listing_add add-more-rin add-more-sm"><i
                                    class="fas fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="credit_form_add_new_row">
                    <div class="new_html border border-3 border-light p-3">
                        <div class="serial-number-display mb-2 fw-bold">Item #<span class="item-serial">1</span></div>
                        <div class="row">
                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Item Code (Demand No.)</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" name="item_id[]" id="item_id" value=""
                                            class="form-control item_id">
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
                                            id="description">
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
                                        <input type="number" step="any" value="0"
                                            class="form-control rcv_quantity" name="received_quantity[]"
                                            id="received_quantity">
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
                                        <input type="text" class="form-control" name="remarks[]" id="remarks"
                                            placeholder="">
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
                                        <input type="number" step="any" value="0.00"
                                            class="form-control units_cost" name="unit_cost[]" id="unit_cost"
                                            placeholder="">
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
                                        <input type="number" step="any" value="0.00"
                                            class="form-control total_cost" name="total_cost[]" id="total_cost"
                                            placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <label>Discount <select class="discount_type" name="discount_type[]"
                                                id="discount_type">
                                                <option value="percentage">Percentage (%)</option>
                                                <option value="fixed">Fixed Amount</option>
                                            </select></label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" step="any" max="100" step="1"
                                            value="0" class="form-control disc_percent" name="disc_percent[]"
                                            id="disc_percent" placeholder="">
                                        <input type="hidden" class="form-control discount_amount"
                                            name="discount_amount[]" id="discount_amount" placeholder="">
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
                                        <select class="form-select gst_percent" name="gst[]" id="gst">
                                            <option value="">Select Gst</option>
                                            @foreach ($gsts as $gst)
                                                <option value="{{ $gst->gst_percent }}">{{ $gst->gst_percent }}
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
                                        <label>Gst Amount</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" step="any" value="0.00"
                                            class="form-control gst_amount" name="gst_amount[]" id="gst_amount"
                                            placeholder="" readonly>
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
                                        <input type="number" step="any" value="0.00"
                                            class="form-control total_amount" name="total_amount[]" id="total_amount"
                                            placeholder="">
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
                                        <select class="form-select nc_status" name="nc_status[]" id="nc_status">
                                            <option value="">Select</option>
                                            @foreach ($nc_statuses as $status)
                                                <option value="{{ $status->status }}">{{ $status->status }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2" hidden>
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>A/U Status</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select au_status" name="au_status[]" id="au_status">
                                            <option value="">Select</option>
                                            @foreach ($au_statuses as $status)
                                                <option value="{{ $status->status }}">{{ $status->status }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
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
                    <button type="submit" class="listing_add">Add</button>
                </div>
            </div>
        </div>
    </form>
@endif

<!-- Modals and other content -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel"
    aria-hidden="true" style="top: 60px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSupplierModalLabel">Add Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-supplier-form">
                    <div class="form-group mb-3">
                        <label for="supplier-name">Name</label>
                        <input type="text" class="form-control" id="supplier-name" name="name">
                        <span class="text-danger" id="error-name"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="supplier-phone">Phone</label>
                        <input type="text" class="form-control" id="supplier-phone" name="phone">
                        <span class="text-danger" id="error-phone"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="supplier-email">Email</label>
                        <input type="email" class="form-control" id="supplier-email" name="email">
                        <span class="text-danger" id="error-email"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="supplier-address">Address</label>
                        <textarea class="form-control" id="supplier-address" name="address"></textarea>
                        <span class="text-danger" id="error-address"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addSupplyOrderModal" tabindex="-1" aria-labelledby="addSupplyOrderModalLabel"
    aria-hidden="true" style="top: 60px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSupplyOrderModalLabel">Add Supply Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-supply-order-form">
                    <div class="form-group mb-3">
                        <label for="supply-order-number">Order Number</label>
                        <input type="text" class="form-control" id="supply-order-number" name="order_number">
                        <span class="text-danger" id="error-order-number"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="supply-order-number">Date</label>
                        <input type="date" class="form-control" id="supply-order-date" name="date"
                            value="{{ date('Y-m-d') }}">
                        <span class="text-danger" id="error-order-number"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

