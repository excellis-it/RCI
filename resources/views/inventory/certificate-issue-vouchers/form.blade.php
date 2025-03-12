@if (isset($edit))
  
@else
    <form action="{{ route('certificate-issue-vouchers.store') }}" method="POST"
        id="certificate-issue-vouchers-create-form">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Inventory number </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box2" name="inv_no" id="inv_no">
                                    <option value="">Select No </option>
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
                                <label>Inventory Holder Name </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="inventory_holder" id="inventory_holder"
                                    class="form-control">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Voucher Date </label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" name="voucher_date" id="voucher_date" class="form-control"
                                    max="{{ date('Y-m-d') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <hr>
                </div>



                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select item_code_id" name="item_id[]" id="item_id">
                                    <option value="">Select Item Code </option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" value="0.00" class="form-control item_price" name="price[]"
                                    id="item_price" placeholder="">
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
                                <input class="form-control description" name="description[]" id="description"
                                    readonly>
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
                                <select class="form-control quantity" name="quantity[]" id="quantity">
                                    <option value="">Select Quantity</option>
                                </select>
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
                                <input type="text" value="0.00" class="form-control total_price"
                                    name="total_price[]" id="total_price" placeholder="" readonly>
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
                                <textarea class="form-control" name="remarks[]" id="remarks"></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto">
                        <div class="add-more form-group mt-4">
                            <a href="javascript:void(0);" class="listing_add add-more-civ add-more-sm"><i
                                    class="fas fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>


                <div id="credit_form_add_new_row"></div>
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

    <div id="civ_new_html" hidden>
        <div class="new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select item_code_id" name="item_id[]">
                                    <option value="">Select Item Code </option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" value="0.00" class="form-control item_price" name="price[]"
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
                                <input class="form-control description" name="description[]" readonly>
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
                                <select class="form-control quantity" name="quantity[]">
                                    <option value="">Select Quantity</option>
                                </select>
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
                                <input type="text" value="0.00" class="form-control total_price"
                                    name="total_price[]" placeholder="" readonly>
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
                                <textarea class="form-control" name="remarks[]" id="remarks"></textarea>
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
