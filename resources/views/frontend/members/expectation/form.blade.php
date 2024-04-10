@if (isset($edit))

    <form action="{{ route('members.expectation.update') }}" id="member-edit-expectation-form" method="post">
        @csrf

        <input type="hidden" name="member_expectation_id" value="{{ $member_expectation->id }}">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Rule Name</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="rule_name" id="basic"
                        value="{{ $member_expectation->rule_name }}" placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Percent </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="percent" id="percent"
                                value="{{ $member_expectation->percent }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="amount" id="amount"
                                value="{{ $member_expectation->amount }}" placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Year</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="year" id="year">
                                @for ($i = date('Y'); $i >= 1950; $i--)
                                    <option value="{{ $i }}"
                                        {{ $member_expectation->year == $i ? 'selected' : '' }}>{{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Month</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="month" id="month">
                                <option value="1" {{ $member_expectation->month == 1 ? 'selected' : '' }}>January</option>
                                <option value="2" {{ $member_expectation->month == 2 ? 'selected' : '' }}>February</option>
                                <option value="3" {{ $member_expectation->month == 3 ? 'selected' : '' }}>March</option>
                                <option value="4" {{ $member_expectation->month == 4 ? 'selected' : '' }}>April</option>
                                <option value="5" {{ $member_expectation->month == 5 ? 'selected' : '' }}>May</option>
                                <option value="6" {{ $member_expectation->month == 6 ? 'selected' : '' }}>June</option>
                                <option value="7" {{ $member_expectation->month == 7 ? 'selected' : '' }}>July</option>
                                <option value="8" {{ $member_expectation->month == 8 ? 'selected' : '' }}>August</option>
                                <option value="9" {{ $member_expectation->month == 9 ? 'selected' : '' }}>September</option>
                                <option value="10" {{ $member_expectation->month == 10 ? 'selected' : '' }}>October</option>
                                <option value="11" {{ $member_expectation->month == 11 ? 'selected' : '' }}>November</option>
                                <option value="12" {{ $member_expectation->month == 12 ? 'selected' : '' }}>December</option>
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Remark</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="remark" id="remark" value="{{ $member_expectation->remark }}"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_add">Update</button>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="delete-btn-1">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="another-btn">Another</button>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_add">Update</button>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_exit">Exit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('members.expectation.store') }}" id="member-expectation-form" method="post">
        @csrf

        <input type="hidden" name="member_id" value="{{ $member->id }}">

        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Rule Name</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="rule_name" id="rule_name">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Percent </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="percent" id="percent" value=""
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="amount" id="amount" value=""
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Year</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="year" id="year">
                                <option value="">Select</option>
                                @for ($i = date('Y'); $i >= 1950; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor

                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Month</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="month" id="month">
                                <option value="">Select</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Remark</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="remark" id="remark">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_add">Save</button>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="reset" class="delete-btn-1">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">
                            <div class="form-group col-md-3 mb-2">
                                <button type="{{ route('members.create') }}" class="another-btn">Another</button>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_add">Update</button>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="reset" class="listing_exit">Exit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endif
