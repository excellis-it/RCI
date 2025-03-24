@if (isset($edit))
    <form action="{{ route('item-codes.update', $edit_item_code->id) }}" method="POST" id="items-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_name" id="item_name"
                                    value="{{ $edit_item_code->item_name ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_code" id="item_code"
                                    value="{{ $edit_item_code->code ?? '' }}" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>



                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_price" id="item_price" value="{{ $edit_item_code->item_price ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12 d-flex justify-content-between">
                                <label>UOM(Unit Of Measurement)</label>
                                <a href="javascript:void(0);" class="edit_pencil add-uom-btn"><i
                                        class="fa fa-plus"></i></a>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="uom" id="uom">
                                    <option value="">Select</option>
                                    @foreach ($uoms as $uom)
                                        <option value="{{ $uom->id }}"
                                            {{ $edit_item_code->uom == $uom->id ? 'selected' : '' }}>
                                            {{ $uom->name }}</option>
                                    @endforeach
                                </select>
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
                                <select class="form-select" name="nc_status" id="nc_status">
                                    <option value="">Select</option>
                                    @foreach ($nc_statuses as $status)
                                        <option value="{{ $status->id }}"
                                            {{ $edit_item_code->nc_status == $status->id ? 'selected' : '' }}>
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
                                <label>AU Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status" id="au_status">
                                    <option value="">Select</option>
                                    @foreach ($au_statuses as $status)
                                        <option value="{{ $status->id }}"
                                            {{ $edit_item_code->au_status == $status->id ? 'selected' : '' }}>
                                            {{ $status->status }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Classification</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_code_type_id" id="item_code_type_id">
                                    <option value="">Select</option>
                                    @foreach ($item_classifications as $item_classification)
                                        <option value="{{ $item_classification->id }}"
                                            {{ $edit_item_code->item_code_type_id == $item_classification->id ? 'selected' : '' }}>
                                            {{ $item_classification->code_type_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_type" id="item_type">
                                    <option value="Consumable"
                                        {{ $edit_item_code->item_type == 'Consumable' ? 'selected' : '' }}>
                                        Consumable(C)
                                    </option>
                                    <option value="Non-Consumable"
                                        {{ $edit_item_code->item_type == 'Non-Consumable' ? 'selected' : '' }}>
                                        Non-Consumable(NC)</option>
                                    <option value="Non-Consumable-Fixed"
                                        {{ $edit_item_code->item_type == 'Non-Consumable-Fixed' ? 'selected' : '' }}>
                                        Non-Consumable Fitment(NCF)</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Description</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="description" id="description" placeholder="">{{ $edit_item_code->description ?? '' }}</textarea>
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
                                <input type="text" class="form-control" value="{{ Auth::user()->user_name ?? '' }}"
                                    readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="row mt-3 d-flex justify-content-between">

            <div class="col-md-2">
                <div class="mb-1">
                    <a href="" class="listing_exit">Update</a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Save</button>
                </div>
            </div>
        </div>


    </form>
@else
    <form action="{{ route('item-codes.store') }}" method="POST" id="item-create-form">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control item_name" name="item_name" id="item_name"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 item-code-select" style="display: none">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Select Item Code (Founds by name search : <span
                                        id="search-by-item-name"></span>)</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="select_item_code" id="select-item-code"></select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_code" id="item_code"
                                    placeholder="99.99.">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Price</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_price" id="item_price" value="{{ $edit_item_code->item_price ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}


                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12 d-flex justify-content-between">
                                <label>UOM(Unit Of Measurement)</label>
                                <a href="javascript:void(0);" class="edit_pencil add-uom-btn"><i
                                        class="fa fa-plus"></i></a>
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

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>NC Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="nc_status" id="nc_status">
                                    <option value="">Select</option>
                                    @foreach ($nc_statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2" hidden>
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>AU Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status" id="au_status">
                                    <option value="">Select</option>
                                    @foreach ($au_statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Classification</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_code_type_id" id="item_code_type_id">
                                    <option value="">Select</option>
                                    @foreach ($item_classifications as $item_classification)
                                        <option value="{{ $item_classification->id }}">
                                            {{ $item_classification->code_type_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="item_type" id="item_type">
                                    <option value="">Select</option>
                                    <option value="Consumable">Consumable(C)</option>
                                    <option value="Non-Consumable">Non-Consumable(NC)</option>
                                    <option value="Non-Consumable-Fixed"> Non-Consumable Fitment(NCF)</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Description</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="description" id="description" placeholder=""></textarea>
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
                                <input type="text" class="form-control"
                                    value="{{ Auth::user()->user_name ?? '' }}" readonly>
                                <input type="hidden" class="form-control" name="member_id" id="member_id"
                                    value="{{ Auth::user()->id ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
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
                    <button type="submit" class="listing_add">Save</button>
                </div>
            </div>
        </div>




    </form>
@endif

<!-- UOM Modal -->
<div class="modal fade" id="uomModal" tabindex="-1" aria-labelledby="uomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uomModalLabel">Add New UOM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uom-form">
                    @csrf
                    <div class="mb-3">
                        <label for="uom_name" class="form-label">UOM Name</label>
                        <input type="text" class="form-control" id="uom_name" name="name" required>
                        <span class="text-danger uom-error" id="name-error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="uom_status" class="form-label">Status</label>
                        <select class="form-select" id="uom_status" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-uom">Save</button>
            </div>
        </div>
    </div>
</div>
