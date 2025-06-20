@if (isset($edit))
    <form action="{{ route('newspaper-allowance.update', $newspaper_allowance->id) }}" method="POST"
        id="newspaper-allowance-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Designation </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="designation_id" id="designation_id" >
                                    <option value="">Select Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}"
                                            {{ $newspaper_allowance->designation_id == $designation->id ? 'selected' : '' }}>
                                            {{ $designation->designation }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Duration </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="duration" id="duration" >
                                    <option value="half_yearly"
                                        {{ $newspaper_allowance->duration == 'half_yearly' ? 'selected' : '' }}>Half
                                        Yearly</option>
                                    <option value="quarterly" {{ $newspaper_allowance->duration == 'quarterly' ? 'selected' : '' }}>Quarterly</option>

                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group col-md-4 mb-2 news-year">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year" disabled>
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y'); $i >= 1950; $i--)
                                        <option value="{{ $i }}"
                                            {{ $newspaper_allowance->year == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    @if (isset($newspaper_allowance->month_duration))
                        <div class="form-group col-md-4 mb-2 news-month">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Month </label>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-select" name="month_duration" id="month" disabled>
                                        <option value="01-05"
                                            {{ $newspaper_allowance->month_duration == '01-05' ? 'selected' : '' }}>
                                            Jan-June</option>
                                        <option value="06-12"
                                            {{ $newspaper_allowance->month_duration == '06-12' ? 'selected' : '' }}>
                                            July-Dec</option>
                                    </select>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    @endif --}}


                    <div class="form-group col-md-4 mb-2 news-amount">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control"
                                    value="{{ $newspaper_allowance->max_allocation_amount }}"
                                    name="max_allocation_amount" id="max_allocation_amount">
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
                                <input type="text" class="form-control" name="remarks" id="remarks"
                                    value="{{ $newspaper_allowance->remarks }}">
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
    <form action="{{ route('newspaper-allowance.store') }}" method="POST" id="newspaper-allowance-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Designation </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="designation_id" id="designation_id">
                                    <option value="">Select Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
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
{{--
                    <div class="form-group col-md-4 mb-2 news-year" style="display:none;">
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


                    <div class="form-group col-md-4 mb-2 news-month" style="display:none;">
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
                    </div> --}}


                    <div class="form-group col-md-4 mb-2 news-amount" style="display:none;">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="max_allocation_amount"
                                    id="max_allocation_amount">
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
                                <input type="text" class="form-control" name="remarks" id="remarks">
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
