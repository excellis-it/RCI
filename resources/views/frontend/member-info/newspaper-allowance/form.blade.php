@if (isset($edit))

   <form action="{{ route('member-newspaper-allowance.update', $member_newspaper->id) }}" method="POST" id="member-newspaper-edit-form">
    @csrf
    @method('PUT')

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
                                    <option value="{{ $member->id }}"
                                        {{ $member_newspaper->member_id == $member->id ? 'selected' : '' }}>
                                        {{ $member->name }} ({{ $member->desigs->designation ?? 'N/A' }})
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger member_id_error"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-5 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Duration </label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="duration" id="duration">
                                <option value="">Select Duration</option>
                                <option value="half_yearly" {{ $member_newspaper->duration == 'half_yearly' ? 'selected' : '' }}>Half Yearly</option>
                                <option value="quarterly" {{ $member_newspaper->duration == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2 news-year">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Year</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="year" id="year">
                                <option value="">Select Year</option>
                                @for ($i = date('Y'); $i >= 1950; $i--)
                                    <option value="{{ $i }}" {{ $member_newspaper->year == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2 news-month">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Month</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="month_duration" id="month">
                                <option value="">Select Month</option>
                                @if($member_newspaper->duration == 'quarterly')
                                    <option value="01-03" {{ $member_newspaper->month_duration == '01-03' ? 'selected' : '' }}>Jan - Mar</option>
                                    <option value="04-06" {{ $member_newspaper->month_duration == '04-06' ? 'selected' : '' }}>Apr - Jun</option>
                                    <option value="07-09" {{ $member_newspaper->month_duration == '07-09' ? 'selected' : '' }}>Jul - Sep</option>
                                    <option value="10-12" {{ $member_newspaper->month_duration == '10-12' ? 'selected' : '' }}>Oct - Dec</option>
                                @elseif($member_newspaper->duration == 'half_yearly')
                                    <option value="01-06" {{ $member_newspaper->month_duration == '01-06' ? 'selected' : '' }}>Jan - Jun</option>
                                    <option value="07-12" {{ $member_newspaper->month_duration == '07-12' ? 'selected' : '' }}>Jul - Dec</option>
                                @endif
                            </select>
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
                                value="{{ $member_newspaper->remarks }}" placeholder="">
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
                <a href="{{ route('member-newspaper-allowance.index') }}" class="listing_exit">Back</a>
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
    <form action="{{ route('member-newspaper-allowance.store') }}" method="POST" id="member-newspaper-create-form">
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
                                        <option value="{{ $member->id }}">{{ $member->name }}({{ $member->desigs->designation ?? 'N/A' }})</option>
                                    @endforeach
                                </select>
                                <span class="text-danger member_id_error"></span>
                            </div>
                        </div>
                    </div>

                     <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Duration </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="duration" id="duration">
                                    <option value="">Select Duration</option>
                                    <option value="half_yearly">Half Yearly</option>
                                    <option value="quarterly">Quarterly</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 news-year" >
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year">
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y'); $i >= 1950; $i--)
                                        <option value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-4 mb-2 news-month" >
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="month_duration" id="month">
                                    <option value="">Select Month</option>
                                    <option value="01-05">Jan-June</option>
                                    <option value="06-12">July-Dec</option>
                                </select>
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
