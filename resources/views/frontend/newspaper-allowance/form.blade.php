@if (isset($edit))
    <form action="{{ route('newspaper-allowance.update', $newspaper_allowance->id) }}" method="POST" id="newspaper-allowance-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Category </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    <option value="NPS" {{ $newspaper_allowance->category_id == "NPS" ? 'selected' : ''}}>NPS</option>
                                    <option value="GPF" {{ $newspaper_allowance->category_id == "GPF" ? 'selected' : ''}}>GPF</option>
                                    <!-- @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $newspaper_allowance->category_id == $category->id ? 'selected' :''}}>{{ $category->category }}</option>
                                    @endforeach -->
                                </select>
                                <span class="text-danger"></span>                         
                            </div>   
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="max_allocation_amount" value="{{ $newspaper_allowance->max_allocation_amount}}" id="max_allocation_amount" >
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
                                <input type="text" class="form-control" value="{{ $newspaper_allowance->remarks}}" name="remarks" id="remarks" >
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
    <form action="{{ route('newspaper-allowance.store') }}" method="POST" id="newspaper-allowance-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Group </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="group_id" id="group_id">
                                    <option value="">Select Group</option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>                         
                            </div>   
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="max_allocation_amount" id="max_allocation_amount" >
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
                                <input type="text" class="form-control" name="remarks" id="remarks" >
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
