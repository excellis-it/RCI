@if (isset($edit))
    <form action="{{ route('sirs.update', $sir->id) }}" method="POST" id="sir-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
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

                    <div class="form-group col-md-4 mb-2">
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

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Demand No. </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="demand_no" id="demand_no"
                                    value="{{ $sir->sir_date ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Demand Date </label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="demand_date" id="demand_date"
                                    value="{{ $sir->sir_date ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Invoice No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="invoice_no" id="invoice_no"
                                    value="{{ $sir->sir_date ?? '' }}">
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

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inspection Authority</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="inspection_authority"
                                    id="inspection_authority" value="{{ $sir->inspection_authority ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
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
                                <input type="text" class="form-control" name="demand_no" id="demand_no"
                                    value="{{ $sir->sir_date ?? '' }}">
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
                                    value="{{ $sir->sir_date ?? '' }}">
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
                                <input type="date" class="form-control" name="invoice_no" id="invoice_no"
                                    value="{{ $sir->sir_date ?? '' }}">
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
                                <input type="text" class="form-control" name="inspection_authority"
                                    id="inspection_authority" value="{{ $sir->inspection_authority ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Contract Authority</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="contract_authority"
                                    id="contract_authority" value="{{ $sir->contract_authority ?? '' }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Add</button>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>

        </div>

    </form>
@endif
