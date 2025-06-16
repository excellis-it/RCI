@if (isset($edit))
    <form action="{{ route('member-mobile-allowance.update', $member_landline->id) }}" method="POST"
        id="member-landline-edit-form">
        @method('PUT')
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <!-- Member -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Member</label>
                        <select class="form-select " id="member_id">
                            <option value="">Select Member</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}"
                                    {{ $member_landline->member_id == $member->id ? 'selected' : '' }}>
                                    {{ $member->name }} ({{ $member->desigs->designation ?? 'N/A' }})
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="member_id" value="{{ $member_landline->member_id }}">
                        <span class="text-danger"></span>
                    </div>

                    <!-- Landline Amount -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Landline Amount</label>
                        <input type="text" class="form-control" name="landline_amount"
                            value="{{ $member_landline->landline_amount ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>

                    <!-- Mobile Amount -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Mobile Amount</label>
                        <input type="text" class="form-control" name="mobile_amount"
                            value="{{ $member_landline->mobile_amount ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>

                    <!-- Broadband Amount -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Broadband Amount</label>
                        <input type="text" class="form-control" name="broadband_amount"
                            value="{{ $member_landline->broadband_amount ?? '' }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>

                    <!-- Entitle Amount -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Entitle Amount</label>
                        <input type="text" class="form-control" name="entitle_amount" id="entitle_amount"
                            value="{{ $member_landline->entitle_amount ?? '' }}" placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>

                    <!-- Year -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Year</label>
                        <select class="form-select" name="year">
                            <option value="">Select Year</option>
                            @for ($i = date('Y'); $i >= 2000; $i--)
                                <option value="{{ $i }}"
                                    {{ $member_landline->year == $i ? 'selected' : '' }}>{{ $i }}</option>
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
                                    {{ $monthVal == $member_landline->month ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>





                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="row mt-3 d-flex justify-content-between">
            <div class="col-md-2">
                <a href="{{ route('member-mobile-allowance.index') }}" class="listing_exit">Back</a>
            </div>
            <div class="col-md-2">
                <button type="submit" class="listing_add">Update</button>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('member-mobile-allowance.store') }}" method="POST" id="member-landline-create-form">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <!-- Member -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Member</label>
                        <select class="form-select " name="member_id" id="member_id">
                            <option value="">Select Member</option>
                            @foreach ($members as $member)
                                {{-- @dd($member) --}}
                                <option value="{{ $member->id }}"> {{ $member->name }}
                                    ({{ $member->desigs->designation ?? 'N/A' }})
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger"></span>
                    </div>

                    <!-- Landline Amount -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Landline Amount</label>
                        <input type="text" class="form-control" name="landline_amount"
                            value="{{ old('landline_amount') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>

                    <!-- Mobile Amount -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Mobile Amount</label>
                        <input type="text" class="form-control" name="mobile_amount"
                            value="{{ old('mobile_amount') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>

                    <!-- Broadband Amount -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Broadband Amount</label>
                        <input type="text" class="form-control" name="broadband_amount"
                            value="{{ old('broadband_amount') }}" placeholder="">
                        <span class="text-danger"></span>
                    </div>

                    <!-- Entitle Amount -->
                    <div class="form-group col-md-4 mb-2">
                        <label>Entitle Amount</label>
                        <input type="text" class="form-control" name="entitle_amount" id="entitle_amount"
                            value="{{ old('entitle_amount') }}" placeholder="" readonly>
                        <span class="text-danger"></span>
                    </div>
                    <!-- Year -->
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





                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="row mt-3 d-flex justify-content-between">
            <div class="col-md-2">
                <a href="{{ route('member-mobile-allowance.index') }}" class="listing_exit">Back</a>
            </div>
            <div class="col-md-2">
                <button type="submit" class="listing_add">Save</button>
            </div>
        </div>
    </form>

@endif
