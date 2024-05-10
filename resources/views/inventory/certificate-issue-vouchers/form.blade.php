@if (isset($edit))
    <form action="{{ route('certificate-issue-vouchers.update', $certificateIssueVoucher->id) }}" method="POST" id="certificate-issue-vouchers-edit-form">
        @method('PUT')
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
                                <select class="form-select" name="item_id" id="item_id">
                                    <option value="">Select Item Code </option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}" {{ ($rin->item_id == $item->id) ? 'selected' : '' }}>{{ $item->code }}</option>
                                        
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
                                <input type="text" class="form-control" name="description" id="description" value="{{ $rin->description }}"
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
                                <input type="text" class="form-control" name="received_quantity" id="edit_received_quantity" value="{{ $rin->received_quantity }}"
                                    placeholder="">
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
                                <input type="text" class="form-control" name="accepted_quantity" id="edit_accepted_quantity"  value="{{ $rin->accepted_quantity }}"
                                    placeholder="">
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
                                <input type="text" class="form-control" name="rejected_quantity" id="edit_rejected_quantity"  value="{{ $rin->rejected_quantity }}"
                                    placeholder="" readonly>
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
                                <input type="text" class="form-control" name="remarks" id="remarks" value="{{ $rin->remarks }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NC Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="nc_status" id="nc_status">
                                    <option value="">Select NC Status</option>
                                    <option value="C" {{ ($rin->nc_status == 'C') ? 'selected' : '' }}>C</option>
                                    <option value="NC" {{ ($rin->nc_status == 'NC') ? 'selected' : '' }}>NC</option>
                                    <option value="NCF" {{ ($rin->nc_status == 'NCF') ? 'selected' : '' }}>NCF</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>A/U Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status" id="au_status">
                                    <option value="">Select A/U Status</option>
                                    <option value="yes" {{ ($rin->au_status == 'yes') ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ ($rin->au_status == 'no') ? 'selected' : '' }}>No</option>
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
    <form action="{{ route('certificate-issue-vouchers.store') }}" method="POST" id="certificate-issue-vouchers-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Person Name </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="member_id" id="member_id">
                                    <option value="">Select Name </option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->code }}</option>
                                        
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code  </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_id" id="item_id">
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
                                <label>Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="price" id="price" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_type" id="item_type">
                                    <option value="">Select Item Type</option>
                                    @foreach ($items as $itemType)
                                        <option value="{{ $itemType->item_type }}">{{ $itemType->item_type }}</option>
                                        
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
                                <label>Accepted Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="accepted_quantity" id="accepted_quantity" value=""
                                    placeholder="">
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
                                <input type="text" class="form-control" name="rejected_quantity" id="rejected_quantity" value=""
                                    placeholder="" readonly>
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
                                <input type="text" class="form-control" name="remarks" id="remarks" value=""
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NC Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="nc_status" id="nc_status">
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
                                <label>A/U Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status" id="au_status">
                                    <option value="">Select A/U Status</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
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
@endif
