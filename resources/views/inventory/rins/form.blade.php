@if (isset($edit))
    <form action="{{ route('rins.update', $rin->id) }}" method="POST" id="rins-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
           
            @foreach($all_rins as $rin)

            <input type="hidden" name="id" value="{{ $rin->id }}">
            <div class="col-md-8 row-item-rin">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code  </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_id[]" id="item_id">
                                    <option value="">Select Item Code </option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}" {{ $rin->item_id == $item->id ? 'selected' :''}}>{{ $item->code }}</option> 
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
                                <input type="text" class="form-control" value="{{ $rin->description ?? ''}}" name="description[]" id="description" >
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
                                <input type="text" class="form-control received_quantity" value="{{ $rin->received_quantity ?? ''}}" name="received_quantity[]" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Accepted Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control accepted_quantity" value="{{ $rin->accepted_quantity ?? ''}}" name="accepted_quantity[]" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rejected Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control rejected_quantity" value="{{ $rin->rejected_quantity ?? ''}}" name="rejected_quantity[]" >
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
                                <input type="text" class="form-control" value="{{ $rin->remarks ?? ''}}" name="remarks[]" id="remarks" value=""
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
                                <input type="text" class="form-control" value="{{ $rin->unit_cost ?? ''}}" name="unit_cost[]" id="unit_cost"  
                                    placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Cost</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control"  value="{{ $rin->total_cost ?? ''}}" name="total_cost[]" id="total_cost"  
                                    placeholder="" >
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
                                <select class="form-select" name="nc_status[]" id="nc_status">
                                    <option value="C" {{ $rin->nc_status == 'C' ? 'selected':''}}>C</option>
                                    <option value="NC" {{ $rin->nc_status == 'NC' ? 'selected':''}}>NC</option>
                                    <option value="NCF" {{ $rin->nc_status == 'NCF' ? 'selected':''}}>NCF</option>
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
                                <label>A/U Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status[]" id="au_status">
                                    <option value="">Select A/U Status</option>
                                    <option value="yes" {{ $rin->au_status == 'yes' ? 'selected':''}}>Yes</option>
                                    <option value="no" {{ $rin->au_status == 'no' ? 'selected':''}}>No</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-2 ms-auto">
                        <div class="add-more form-group mt-4">
                            <a href="javascript:void(0);" class="listing_add add-more-rin"><i
                                    class="fas fa-plus-circle"></i> Add More</a>
                        </div>
                    </div> --}}
                  
                    <div class="col-md-2 ms-auto">
                        <label>&nbsp;</label>
                        <button class="listing_add w-100 del-rin form-control"><i class="fa fa-times"></i></button>
                    </div>
                    
                </div>

                
            </div>
            @endforeach

            <div class="col-md-8">
                <div id="credit_form_edit_new_row"></div>
            </div>

            <div class="col-md-2 ms-auto">
                <div class="add-more form-group mt-4">
                    <a href="javascript:void(0);" class="edit_rin_add add-more-rin"><i
                            class="fas fa-plus-circle"></i> Add More</a>
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

    <div id="rins_edit_html" hidden>
        <div class="row new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code  </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_id[]" id="item_id">
                                    <option value="">Select Item Code </option>
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
                                <input type="text" class="form-control" name="description[]" id="description" value=""
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
                                <input type="text" class="form-control" name="received_quantity[]" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Accepted Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="accepted_quantity[]" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rejected Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="rejected_quantity[]" >
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
                                <input type="text" class="form-control" name="remarks[]" id="remarks" value=""
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
                                <input type="text" class="form-control" name="unit_cost[]" id="unit_cost"  
                                    placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Cost</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_cost[]" id="total_cost"  
                                    placeholder="" >
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
                                <select class="form-select" name="nc_status[]" id="nc_status">
                                    <option value="">Select NC Status</option>
                                    <option value="C">C</option>
                                    <option value="NC">NC</option>
                                    <option value="NCF">NCF</option>
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
                                <label>A/U Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status[]" id="au_status">
                                    <option value="">Select A/U Status</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
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
@else
    <form action="{{ route('rins.store') }}" method="POST" id="rins-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code  </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_id[]" id="item_id">
                                    <option value="">Select Item Code </option>
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
                                <input type="text" class="form-control" name="description[]" id="description" >
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
                                <input type="text" class="form-control received_quantity" name="received_quantity[]" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Accepted Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control accepted_quantity" name="accepted_quantity[]" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rejected Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control rejected_quantity" name="rejected_quantity[]" >
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
                                <input type="text" class="form-control" name="remarks[]" id="remarks" value=""
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
                                <input type="text" class="form-control" name="unit_cost[]" id="unit_cost"  
                                    placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Cost</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_cost[]" id="total_cost"  
                                    placeholder="" >
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
                                <select class="form-select" name="nc_status[]" id="nc_status">
                                    <option value="">Select NC Status</option>
                                    <option value="C">C</option>
                                    <option value="NC">NC</option>
                                    <option value="NCF">NCF</option>
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
                                <label>A/U Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status[]" id="au_status">
                                    <option value="">Select A/U Status</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 ms-auto">
                        <div class="add-more form-group mt-4">
                            <a href="javascript:void(0);" class="listing_add add-more-rin"><i
                                    class="fas fa-plus-circle"></i> Add More</a>
                        </div>
                    </div>
                </div>

                <div id="credit_form_add_new_row"></div>
            </div>

            
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>

    <div id="rins_new_html" hidden>
        <div class="row new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code  </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_id[]" id="item_id">
                                    <option value="">Select Item Code </option>
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
                                <input type="text" class="form-control" name="description[]" id="description" value=""
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
                                <input type="text" class="form-control" name="received_quantity[]" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Accepted Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="accepted_quantity[]" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rejected Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="rejected_quantity[]" >
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
                                <input type="text" class="form-control" name="remarks[]" id="remarks" value=""
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
                                <input type="text" class="form-control" name="unit_cost[]" id="unit_cost"  
                                    placeholder="" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Cost</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="total_cost[]" id="total_cost"  
                                    placeholder="" >
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
                                <select class="form-select" name="nc_status[]" id="nc_status">
                                    <option value="">Select NC Status</option>
                                    <option value="C">C</option>
                                    <option value="NC">NC</option>
                                    <option value="NCF">NCF</option>
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
                                <label>A/U Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status[]" id="au_status">
                                    <option value="">Select A/U Status</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
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
