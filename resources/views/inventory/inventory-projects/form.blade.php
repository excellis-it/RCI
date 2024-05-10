@if (isset($edit))
    <form action="{{ route('inventory-projects.update', $inventory_project->id) }}" method="POST" id="inventory-projects-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="project_name" id="project_name" value="{{ $inventory_project->project_name ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sanction Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="sanction_amount" id="sanction_amount" value="{{ $inventory_project->sanction_amount ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Sanction Authority</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="sanction_authority" id="sanction_authority">
                                    <option value="">Select Authority</option>
                                    @foreach($sanction_authorities as $sanction_authority)
                                        <option value="{{ $sanction_authority->id }}" {{ ($inventory_project->sanction_authority == $sanction_authority->id) ? 'selected' : '' }}>{{ $sanction_authority->authority_name }}</option>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PDC(Prabable date of completion)</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="pdc" id="pdc" value="{{ $inventory_project->pdc ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>




                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ ($inventory_project->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($inventory_project->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('inventory-projects.store') }}" method="POST" id="inventory-projects-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="project_name" id="project_name" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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
