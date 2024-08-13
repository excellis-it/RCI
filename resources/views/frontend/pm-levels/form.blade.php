@if (isset($edit))
    <form action="{{ route('pm-levels.update', $pm_level->id) }}" method="POST" id="pm-level-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Commission</label>
                            </div>
                            <div class="col-md-12">
                                    <select class="form-select" name="pay_commission" id="pay_commission">
                                        <option value="">Select Commission</option>
                                        @foreach($pay_commissions as $pay_commission)
                                            <option value="{{ $pay_commission->id }}" {{ $pay_commission->id == $pm_level->pay_commission ? 'selected':'' }}>{{ $pay_commission->name }}</option>
                                        @endforeach
                                    </select>    
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Level Value</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="value" id="value" value="{{ $pm_level->value ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="basic" id="basic" value="{{ $pm_level->basic ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Payband</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payband" id="payband">
                                    <option value="">Select Payband</option>
                                    @foreach($pay_bands as $payband)
                                        <option value="{{ $payband->id }}" {{ $payband->id == $pm_level->payband ? 'selected':'' }}>@if($payband->low_band){{ $payband->low_band }} - {{ $payband->high_band }} @else {{ $payband->high_band }}@endif</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="year" id="year" value="{{ $pm_level->year ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{ ($pm_level->status == 1) ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($pm_level->status == 0) ? 'selected' : '' }}>Inactive</option>
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
    <form action="{{ route('pm-levels.store') }}" method="POST" id="pm-levels-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pay Commission</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pay_commission" id="pay_commission">
                                    <option value="">Select Commission</option>
                                    @foreach($pay_commissions as $pay_commission)
                                        <option value="{{ $pay_commission->id }}">{{ $pay_commission->name }}</option>
                                    @endforeach
                                </select>    
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Level Value</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="value" id="value" value="{{ $pm_level->value ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="basic" id="basic" value="{{ $pm_level->basic ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Payband</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payband" id="payband">
                                    <option value="">Select Payband</option>
                                    @foreach($pay_bands as $payband)
                                        <option value="{{ $payband->id }}">@if($payband->low_band){{ $payband->low_band }} - {{ $payband->high_band }} @else {{ $payband->high_band }}@endif</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="year" id="year" value="{{ $pm_level->year ?? '' }}"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
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
