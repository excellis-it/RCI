@if (isset($edit))
    <form action="{{ route('item-code-names.update', $item_code_name->id) }}" method="POST"
        id="item-code-names-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code No. </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_code"
                                    value="{{ $item_code_name->item_code }}" required readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $item_code_name->name }}" placeholder="" required>
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
                    <button type="submit" class="listing_add">Update</button>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('item-code-names.store') }}" method="POST" id="item-code-names-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">

                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Code No. </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="item_code" placeholder="Ex. 11.11."
                                    required>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Item Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="name" id="name" placeholder=""
                                    required>
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
                    <button type="submit" class="listing_add">Add</button>
                </div>
            </div>
        </div>
    </form>
@endif
