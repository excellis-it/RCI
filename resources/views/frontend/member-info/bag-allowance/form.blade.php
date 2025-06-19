@if (isset($edit))
    <form action="{{ route('member-bag-allowance.update', $member_bag_purse->id) }}" method="POST"
        id="member-bag-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="member_id" id="member_id">
                                    <option value="">Select Member</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}"
                                            {{ $member_bag_purse->member_id == $member->id ? 'selected' : '' }}>
                                            {{ $member->name }} ( {{ $member->desigs->desig ?? ''}})</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Entitled Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="entitle_amount"
                                    value="{{ $member_bag_purse->entitle_amount ?? '' }}" id="entitle_amount"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Year -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Year</label>
                        <select class="form-select" name="year">
                            <option value="">Select Year</option>
                            @for ($i = date('Y'); $i >= 2000; $i--)
                                <option value="{{ $i }}"
                                    {{ $member_bag_purse->year == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <span class="text-danger"></span>
                    </div>

                    <!-- Month -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Month</label>
                        <select class="form-select" name="month" id="month">
                            @foreach (range(1, 12) as $m)
                                @php
                                    $monthVal = str_pad($m, 2, '0', STR_PAD_LEFT);
                                    $current_month = date('m');
                                @endphp
                                <option value="{{ $monthVal }}"
                                    {{ $monthVal == $member_bag_purse->month ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Bill Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="bill_amount" id="bill_amount"
                                    value="{{ $member_bag_purse->bill_amount ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Net Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="net_amount" id="net_amount"
                                    value="{{ $member_bag_purse->net_amount ?? '' }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="remarks" id="remarks"
                                    value="{{ $member_bag_purse->remarks ?? '' }}" placeholder="">
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
    <form action="{{ route('member-bag-allowance.store') }}" method="POST" id="member-bag-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select search-select-box" name="member_id" id="member_id">
                                    <option value="">Select Member</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }} ( {{ $member->desigs->designation ?? ''}})</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Entitled Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="entitle_amount" id="entitle_amount"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                      <div class="form-group col-md-4 mb-2">
                        <label>Year</label>
                        <select class="form-select" name="year">
                            <option value="">Select Year</option>
                            @for ($i = date('Y'); $i >= 2000; $i--)
                                <option value="{{ $i }}" {{ old('year') == $i ? 'selected' : '' }}>
                                    {{ $i }}</option>
                            @endfor
                        </select>
                        <span class="text-danger"></span>
                    </div>
                    <!-- Month -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Month</label>
                        <select class="form-select" name="month" id="month">
                            <option value="">Select Month</option>
                            @foreach (range(1, 12) as $m)
                                @php
                                    $monthVal = str_pad($m, 2, '0', STR_PAD_LEFT);
                                @endphp
                                <option value="{{ $monthVal }}"
                                    {{ old('month') == $monthVal ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Bill Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="bill_amount" id="bill_amount"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Net Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="net_amount" id="net_amount"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="remarks" id="remarks"
                                    placeholder="">
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
