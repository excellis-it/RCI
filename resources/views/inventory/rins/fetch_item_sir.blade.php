@if (isset($allSirDetails))
@foreach ($allSirDetails as $index => $sir)
<div class="new_html">
    <div class="row">
        <div class="form-group col-md-4 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Item Code </label>
                </div>
                <div class="col-md-12">
                    <select class="form-select item_id" name="item_id[]" id="item_id">
                        <option value="">Select Item Code</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}" {{ $sir->item_id == $item->id ? 'selected' : '' }}>
                                {{ $item->code }}
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
                    <label>Description</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control description" name="description[]" id="description"
                           value="{{ $sir->description }}">
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
                    <input type="text" class="form-control rcv_quantity" name="received_quantity[]"
                           id="received_quantity" value="{{ $sir->received_quantity }}">
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
                    <input type="text" class="form-control" name="remarks[]" id="remarks" value="{{ $sir->remarks }}">
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
                    <input type="text" class="form-control units_cost" name="unit_cost[]" id="unit_cost"
                           value="{{ $sir->unit_cost }}">
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
                    <input type="text" class="form-control total_cost" name="total_cost[]" id="total_cost"
                           value="{{ $sir->total_cost }}">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="form-group col-md-4 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12 d-flex justify-content-between">
                    <label>Discount
                        <select class="discount_type" name="discount_type[]" id="discount_type">
                            <option value="percentage" {{ $sir->discount_type == 'percentage' ? 'selected' : '' }}>
                                Percentage (%)
                            </option>
                            <option value="fixed" {{ $sir->discount_type == 'fixed' ? 'selected' : '' }}>
                                Fixed Amount
                            </option>
                        </select>
                    </label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control disc_percent" name="disc_percent[]" id="disc_percent"
                           value="{{ $sir->discount }}">
                    <input type="hidden" class="form-control discount_amount" name="discount_amount[]"
                           id="discount_amount" value="{{ $sir->discount_amount }}">
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
                        <option value="">Select GST</option>
                        @foreach ($gsts as $gst)
                            <option value="{{ $gst->gst_percent }}" {{ $sir->gst == $gst->gst_percent ? 'selected' : '' }}>
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
                    <input type="text" class="form-control gst_amount" name="gst_amount[]" id="gst_amount"
                           value="{{ $sir->gst_amount }}">
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
                    <input type="text" class="form-control total_amount" name="total_amount[]" id="total_amount"
                           value="{{ $sir->total_amount }}">
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
                        @foreach ($nc_statuses as $nc_status)
                            <option value="{{ $nc_status->status }}" {{ $sir->nc_status == $nc_status->status ? 'selected' : '' }}>
                                {{ $nc_status->status }}
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
                    <label>A/U Status</label>
                </div>
                <div class="col-md-12">
                    <select class="form-select" name="au_status[]" id="au_status">
                        <option value="">Select A/U Status</option>
                        @foreach ($au_statuses as $au_status)
                            <option value="{{ $au_status->status }}" {{ $sir->au_status == $au_status->status ? 'selected' : '' }}>
                                {{ $au_status->status }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-2 ms-auto">
            <div class="add-more form-group mt-4">
                @if ($index === 0)
                    <a href="javascript:void(0);" class="listing_add add-more-rin"><i class="fas fa-plus-circle"></i> Add More</a>
                @else
                    <a href="javascript:void(0);" class="listing_add w-100 trash form-control add-more"><i class="fas fa-minus-circle"></i> Remove</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach


@endif
