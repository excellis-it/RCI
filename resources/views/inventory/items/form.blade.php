@if (isset($edit))
    <form action="{{ route('item-codes.update', $edit_item_code->id) }}" method="POST" id="items-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_code" id="item_code" value="{{ $edit_item_code->code ?? '' }}"
                                    placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_name" id="item_name" value="{{ $edit_item_code->item_name ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>UOM(Unit Of Measurement)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="uom" id="uom">
                                    <option value="">Select</option>
                                    @foreach ($uoms as $uom)
                                        <option value="{{ $uom->id }}" {{ ($edit_item_code->uom == $uom->id) ? 'selected' : '' }}>{{ $uom->name }}</option>
                                        
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
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="item_type" id="item_type">
                                    <option value="Consumable" {{ $edit_item_code->item_type == 'Consumable' ? 'selected':'' }}>Consumable</option>
                                    <option value="Non-Consumable" {{ $edit_item_code->item_type == 'Non-Consumable' ? 'selected':'' }}>Non-Consumable</option>
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
                                <textarea class="form-control" name="description" id="description" 
                                    placeholder="">{{ $edit_item_code->description ?? '' }}</textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Created By(Person)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="member_id" id="member_id">
                                    <option value="">Select</option>
                                        @foreach ($members as $member)
                                            <option value="{{ $member->id }}" {{ ($edit_item_code->member_id == $member->id) ? 'selected' : '' }}>{{ $member->user_name }}</option>   
                                        @endforeach
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
    <form action="{{ route('item-codes.store') }}" method="POST" id="item-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control"  name="item_code" id="item_code" placeholder="99.99.">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_name" id="item_name" value="{{ $edit_item_code->item_name ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>UOM(Unit Of Measurement)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="uom" id="uom">
                                    <option value="">Select</option>
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
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_type" id="item_type">
                                    <option value="">Select</option>
                                    <option value="Consumable">Consumable</option>
                                    <option value="Non-Consumable">Non-Consumable</option>
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
                                <textarea class="form-control" name="description" id="description" 
                                    placeholder=""></textarea>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Created By(Person)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="member_id" id="member_id">
                                    <option value="">Select</option>
                                        @foreach ($members as $member)
                                            <option value="{{ $member->id }}">{{ $member->user_name }}</option>   
                                        @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@endif
