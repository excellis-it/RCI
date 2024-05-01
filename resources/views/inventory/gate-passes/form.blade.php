@if (isset($edit))
    <form action="{{ route('gate-passes.update', $gatepass->id) }}" method="POST" id="gate-pass-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
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

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="pass_date" id="pass_date" value="{{ $gatepass->gate_pass_date ?? '' }}"
                                    placeholder="">
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
                    <div class="form-group col-md-7 mb-2">
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

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gate Pass Date</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="pass_date" id="pass_date">
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
