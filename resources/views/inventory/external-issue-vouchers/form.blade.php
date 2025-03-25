@if (isset($edit))
@else
    <form action="{{ route('external-issue-vouchers.store') }}" method="POST" id="externel-issue-vouchers-create-form">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="voucher_date" id="voucher_date"
                                    max="{{ date('Y-m-d') }}">
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
                                <select class="form-select" name="inv_no" id="inv_no">
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
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Consignee name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="consignee" id="consignee">
                                    <option value="">Select</option>
                                    @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                    <option value="0">Other</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 consignee_other_name" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Other consignee name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="other_consignee_name"
                                    id="other_consignee_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 consignee_other_number" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Other consignee number</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="other_consignee_number"
                                    id="other_consignee_number" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Non-Returnable Material Gate Pass No.(Date)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="gate_pass_id" id="">
                                    <option value="">Select</option>
                                    @foreach ($gatePasses as $gatePass)
                                        <option value="{{ $gatePass->id }}">
                                            {{ $gatePass->gate_pass_no }}({{ $gatePass->gate_pass_date }})</option>
                                    @endforeach
                                </select>
                                {{-- <div class="text-danger" id="quantity_no"></div> --}}
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Authority Of Issue</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="authority_of_issue" id="authority_of_issue"></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>


                <div class="row count-class">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item List</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select item_code_id" name="item_code_id[]" id="item_code_id">
                                    <option value="">Select</option>
                                    <!-- Items will be populated via AJAX -->
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
                                <input class="form-control description" name="description[]" id="description">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Unit Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" value="0.00" class="form-control item_price"
                                    name="unit_price[]" id="item_unit_price" placeholder="" readonly>
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
                                <select class="form-select quantity" name="quantity[]" id="quantity">
                                    <option value="">Select Quantity</option>

                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Price (GST : <span class="item_gst_percent">0</span>% , Discount :
                                    <span class="item_discount_percent">0</span>%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" value="0.00" class="form-control total_price" name="total_price[]"
                                     placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2" hidden>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>A/U status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status[]" id="au_status">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
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
                                <textarea class="form-control" name="remarks[]" id="remarks" placeholder=""></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto">
                        <div class="add-more form-group mt-4">
                            <a href="javascript:void(0);" class="listing_add add-more-eiv add-more-sm"><i
                                    class="fas fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>


                </div>
            </div>

        </div>


        <div id="credit_form_add_new_row"></div>


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


    <div id="eiv_new_html" hidden>
        <div class="new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item List</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select item_code_id" name="item_code_id[]">
                                    <option value="">Select</option>
                                    <!-- Items will be populated via AJAX -->
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
                                <input class="form-control description" name="description[]" id="">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Unit Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" value="0.00" class="form-control item_price"
                                    name="unit_price[]" id="item_unit_price" placeholder="" readonly>
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
                                <select class="form-select quantity" name="quantity[]" id="">
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Price (GST : <span class="item_gst_percent">0</span>% , Discount :
                                    <span class="item_discount_percent">0</span>%)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" value="0.00" class="form-control total_price"
                                    name="total_price[]" id="" placeholder="">
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
                                <textarea class="form-control" name="remarks[]" id="remarks" placeholder=""></textarea>
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
