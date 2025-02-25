@if (isset($edit))
    <form action="{{ route('item-code-names.update', $item_code_name->id) }}" method="POST"
        id="item-code-names-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-12">
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

                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>UOM</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="uom">
                                    <option value="">Select</option>
                                    @foreach ($uoms as $uom)
                                        <option value="{{ $uom->id }}"
                                            {{ $item_code_name->uom == $uom->id ? 'selected' : '' }}>
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
                                <select class="form-select" name="nc_status">
                                    <option value="">Select</option>
                                    @foreach ($nc_statuses as $status)
                                        <option value="{{ $status->id }}"
                                            {{ $item_code_name->nc_status == $status->id ? 'selected' : '' }}>
                                            {{ $status->status }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>AU Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status">
                                    <option value="">Select</option>
                                    @foreach ($au_statuses as $status)
                                        <option value="{{ $status->id }}"
                                            {{ $item_code_name->au_status == $status->id ? 'selected' : '' }}>
                                            {{ $status->status }}</option>
                                    @endforeach
                                </select>
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
            <div class="col-md-12">
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

                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12 d-flex justify-content-between">
                                <label>UOM</label>
                                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn"
                                    id="add-uom-btn"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="uom">
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
                            <div class="col-md-12 d-flex justify-content-between">
                                <label>NC Status</label>
                                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn"
                                    id="add-nc-status-btn"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="nc_status">
                                    <option value="">Select</option>
                                    @foreach ($nc_statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12 d-flex justify-content-between">
                                <label>AU Status</label>
                                <a href="javascript:void(0);" class="edit_pencil edit-route print-route print-btn"
                                    id="add-au-status-btn"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="au_status">
                                    <option value="">Select</option>
                                    @foreach ($au_statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
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

<!-- UOM Modal -->
<div class="modal fade" id="uomModal" tabindex="-1" aria-labelledby="uomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uomModalLabel">Add UOM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uom-form">
                    @csrf
                    <div class="mb-2">
                        <label for="uom-name" class="form-label">Name</label>
                        <input type="text" name="name" id="uom-name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- NC Status Modal -->
<div class="modal fade" id="ncStatusModal" tabindex="-1" aria-labelledby="ncStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ncStatusModalLabel">Add NC Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nc-status-form">
                    @csrf
                    <div class="mb-2">
                        <label for="nc-status" class="form-label">Status</label>
                        <input type="text" name="status" id="nc-status" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- AU Status Modal -->
<div class="modal fade" id="auStatusModal" tabindex="-1" aria-labelledby="auStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="auStatusModalLabel">Add AU Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="au-status-form">
                    @csrf
                    <div class="mb-2">
                        <label for="au-status" class="form-label">Status</label>
                        <input type="text" name="status" id="au-status" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            // Show modals on button click
            $('#add-uom-btn').on('click', function() {
                $('#uomModal').modal('show');
            });
            $('#add-nc-status-btn').on('click', function() {
                $('#ncStatusModal').modal('show');
            });
            $('#add-au-status-btn').on('click', function() {
                $('#auStatusModal').modal('show');
            });

            // Store new UOM
            $('#uom-form').on('submit', function(e) {
                e.preventDefault();
                $.post('{{ route('item-code-names.storeUom') }}', $(this).serialize())
                    .done(function(res) {
                        $('#uomModal').modal('hide');
                        let option = new Option(res.uom.name, res.uom.id);
                        $('select[name="uom"]').append(option);
                        toastr.success('UOM added successfully');
                    });
            });

            // Store new NC Status
            $('#nc-status-form').on('submit', function(e) {
                e.preventDefault();
                $.post('{{ route('item-code-names.storeNcStatus') }}', $(this).serialize())
                    .done(function(res) {
                        $('#ncStatusModal').modal('hide');
                        let option = new Option(res.nc_status.status, res.nc_status.id);
                        $('select[name="nc_status"]').append(option);
                        toastr.success('NC Status added successfully');
                    });
            });

            // Store new AU Status
            $('#au-status-form').on('submit', function(e) {
                e.preventDefault();
                $.post('{{ route('item-code-names.storeAuStatus') }}', $(this).serialize())
                    .done(function(res) {
                        $('#auStatusModal').modal('hide');
                        let option = new Option(res.au_status.status, res.au_status.id);
                        $('select[name="au_status"]').append(option);
                        toastr.success('AU Status added successfully');
                    });
            });
        });
    </script>
@endpush
