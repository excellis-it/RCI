@if (isset($edit))
    <form action="{{ route('nc-status.update', $nc_status->id) }}" method="POST" id="designation-type-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="status" id="status" value="{{ $nc_status->status ?? '' }}"
                                    placeholder="">
                                <span class="text-danger" id="status-error"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
             <label></label>
              <div class="mb-1">
                 <button type="submit" class="listing_add me-2">Update</button>
              </div>
              <div class="mb-1">
                <a href="" class="listing_exit">Back</a>
              </div>
            </div>
         </div>
    </form>
@else
    <form action="{{ route('nc-status.store') }}" method="POST" id="designation-type-create-form">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="row">

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="status" id="status"
                                    value="" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label></label>
                <div class="mb-1">
                    <button type="submit" class="listing_add me-2">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@endif
