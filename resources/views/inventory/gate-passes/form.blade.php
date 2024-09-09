@if (isset($edit))
    <form action="{{ route('gate-passes.update', $gatepass->id) }}" method="POST" id="gate-pass-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="item_code_id" id="item_code_id" disabled>
                                    <option value="">Select</option>
                                    @foreach ($itemCodes as $item)
                                        <option value="{{ $item->id }}" {{ $gatepass->item_code_id ==  $item->id ? 'selected': ''}}>
                                            {{ $item->code }} ({{ $item->item_name }})</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass No.</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pass_no" id="pass_no" value="{{ $gatepass->gate_pass_no ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass Date</label>
                            </div>
                            <div class="col-md-12">
                                 <input type="date" class="form-control" name="pass_date" id="pass_date" value="{{ $gatepass->gate_pass_date ?? '' }}" max="{{ date('Y-m-d') }}">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pass_type" id="pass_type">
                                    <option value="">Select Gate Pass Type</option>
                                    <option value="returnable" {{ ($gatepass->gate_pass_type == 'returnable') ? 'selected' : '' }}>Returnable</option>
                                    <option value="non-returnable" {{ ($gatepass->gate_pass_type == 'non-returnable') ? 'selected' : '' }}>Non-Returnable</option>
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
    <form action="{{ route('gate-passes.store') }}" method="POST" id="gate-pass-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Consignee name</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="consignee" id="consignee">
                                    <option value="">Select</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->user_name }}</option>
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
                                <input type="text" class="form-control" name="other_consignee_name" id="other_consignee_name" placeholder="">
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
                                <input type="text" class="form-control" name="other_consignee_number" id="other_consignee_number" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass No. </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="pass_no" id="pass_no" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="item_code_id" id="item_code_id" >
                                    <option value="">Select</option>
                                    @foreach ($itemCodes as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->code }} ({{ $item->item_name }})</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                   
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
