@if (isset($edit))

    <form action="{{ route('rins.update', $rin->id) }}" method="POST" id="rins-edit-form">
        @method('PUT')
        @csrf


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
    <form action="{{ route('rins.store') }}" method="POST" id="rins-create-form">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12 d-flex justify-content-between">
                                <label>SIR No</label>
                                {{-- <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn"
                                    id="add-sir-btn"><i class="fa fa-plus"></i></a> --}}
                                {{-- <button type="button" class="btn btn-sm btn-primary" id="add-supplier-btn">Add Supplier</button> --}}
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="sir_no" id="sir_no" readonly>
                                    <option value="">Select SIR No </option>
                                    @foreach ($sir_nos as $key => $sir_no)
                                        <option value="{{ $key }}">{{ $key }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group
                        col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>RIN No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control rin_no" name="rin_no" id="rin_no"
                                    placeholder="">
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
                                    placeholder="">
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
                                    readonly placeholder="">
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
                                <input type="text" class="form-control demand_no" readonly name="demand_no"
                                    id="demand_no" placeholder="">
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
                                <input type="date" class="form-control demand_date" readonly name="demand_date"
                                    id="demand_date" placeholder="">
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
                                <input type="text" class="form-control inventory_code" name="inventory_code" readonly
                                    id="inventory_code" placeholder="">
                                <input type="hidden" class="form-control inventory_no" name="inventory_no"
                                    id="inventory_no" placeholder="">

                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Group/Division</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control group_name" readonly name="group_name"
                                    id="group_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control project_number" readonly name="project_number"
                                    id="project_number" placeholder="">
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
                                <input type="text" class="form-control contract_authority" readonly
                                    name="contract_authority" id="contract_authority" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Invoice Number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control invoice_no" readonly name="invoice_no"
                                    id="invoice_no" placeholder="">
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
                                <input type="date" class="form-control invoice_date" readonly name="invoice_date"
                                    id="invoice_date" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center" id="supply_order_field">
                            <div class="col-md-12 d-flex justify-content-between">
                                <label>Supplier Detail</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control supplier" name="supplier_id" readonly
                                    id="supplier" placeholder="">
                                <input type="hidden" class="form-control vendor_id" name="vendor_id" id="vendor_id"
                                    placeholder="">


                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center" id="supply_order_number_field">
                            <div class="col-md-12 d-flex justify-content-between">
                                <label>Supply Order No</label>

                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control supplier_order_number"
                                    name="supplier_order_number" readonly id="supplier_order_number" placeholder="">
                                <input type="hidden" class="form-control supply_order_no" name="supply_order_no"
                                    id="supply_order_no" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center" id="inspection_authority_field">
                            <div class="col-md-12">
                                <label>Inspection Authority</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control inspection_authority_name"
                                    name="inspection_authority_name" readonly id="inspection_authority_name"
                                    placeholder="">
                                <input type="hidden" class="form-control authority_id" name="authority_id"
                                    id="authority_id" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>



                    {{-- <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Designation</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="authority_designation" id="authority_designation">
                                    <option value="">Select Inspection Authority</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->designation }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Designation</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select form-select-search" name="member_id" id="member_id">
                                    <option value="">Select Inspection Authority</option>
                                    @foreach ($all_members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}
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
                                    id="budget_head_details" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">

                        <label for="" class="form-label">Financial Year</label>
                        <select class="form-select" name="financial_year" id="financial_year">
                            <option value="">Select Year</option>
                            @foreach ($financialYears as $financialYear)
                                <option value="{{ $financialYear }}">{{ $financialYear }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('financial_year'))
                            <span class="text-danger"> {{ $errors->first('financial_year') }}</span>
                        @endif


                    </div>

                    <div class="form-group col-md-3 mb-2">


                        <label for="" class="form-label">Store Received Date</label>

                        <input type="date" class="form-control" name="store_received_date"
                            id="store_received_date" value="">
                        <span class="text-danger"></span>


                    </div>


                </div>
                <hr>
            </div>


        </div>

        <div class="row mb-5">
            <div class="col-md-2 ms-auto">
                <div class="add-more form-group mt-4">

                        <a href="javascript:void(0);" class="listing_add add-more-rin add-more-sm"><i
                                class="fas fa-plus-circle"></i> Add More</a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" id="credit_form_add_new_row">
                @include('inventory.rins.fetch_item_sir')

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


    {{-- <div id="rins_new_html" hidden>
        <div class="new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row item-row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select item_id" name="item_id[]">
                                    <option value="">Select Item Code</option>
                                    @foreach ($items as $item)
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
                                <label>Description</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control description" name="description[]"
                                    placeholder="">
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
                                <input type="text" class="form-control rcv_quantity" name="received_quantity[]">
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
                                <input type="text" class="form-control" name="remarks[]" placeholder="">
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
                                <input type="text" class="form-control units_cost" name="unit_cost[]"
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
                                <input type="text" class="form-control total_cost" name="total_cost[]" readonly
                                    placeholder="">
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
                                        <option value="{{ $gst->gst_percent }}">{{ $gst->gst_percent }}</option>
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
                                <input type="text" class="form-control gst_amount" name="gst_amount[]"
                                    placeholder="">
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
                                <input type="text" class="form-control total_amount" name="total_amount[]"
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
                                <select class="form-select" name="nc_status[]">
                                    <option value="">Select NC Status</option>
                                    <option value="C">C</option>
                                    <option value="NC">NC</option>
                                    <option value="NCF">NCF</option>
                                </select>
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
                                <select class="form-select" name="uom[]">
                                    <option value="">Select UOM</option>
                                    @foreach ($uoms as $uom)
                                        <option value="{{ $uom->id }}">{{ $uom->name }}</option>
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
        </div>
    </div> --}}

@endif
