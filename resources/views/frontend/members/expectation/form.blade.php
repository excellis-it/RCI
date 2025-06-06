@if (isset($edit))
    <form action="{{ route('members.expectation.update') }}" id="member-edit-expectation-form" method="post">
        @csrf

        <input type="hidden" name="member_expectation_id" id="member_edit_exp_id" value="{{ $member_expectation->id }}">
        <input type="hidden" name="member_id" id="exp_member_id" value="{{ $member_expectation->member_id }}">
        <input type="hidden" name="current_year" value="{{ $currentYear }}">
        <input type="hidden" name="current_month" value="{{ $currentMonth }}">

        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Rule Name</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="rule_name" id="exp_rule_name"
                        value="{{ $member_expectation->rule_name }}" placeholder="" readonly>

                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Percent </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="percent" id="exp_percent"
                                value="{{ $member_expectation->percent }}">
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
                            <input type="text" class="form-control" name="amount" id="exp_amount"
                                value="{{ $member_expectation->amount }}">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" value="{{ $member_expectation->amount_year }}" name="year"
                                    class="form-control" id="exp_year" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" value="{{ $member_expectation->amount_month }}" name="month"
                                    class="form-control" id="exp_month" readonly>
                                <span class="text-danger"></span>
                            </div>
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
                    <input type="text" class="form-control" name="remark" id="exp_remark"
                        value="{{ $member_expectation->remark }}">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">

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
                            {{-- <div class="form-group col-md-3 mb-2">
                                <a href="{{ route('members.create') }}"><button type="button"
                                        class="another-btn">Another</button></a>
                            </div> --}}
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_add" id="button-update">Update</button>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="button" id="expectation-delete" class="delete-btn-1"
                                    data-id="{{ isset($member_expectation->id) ? $member_expectation->id : '#' }}">Delete</button>
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
        <input type="hidden" name="current_year" value="{{ $currentYear }}">
        <input type="hidden" name="current_month" value="{{ $currentMonth }}">

        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Rule Name</label>
                </div>
                <div class="col-md-12">
                    <select class="form-select exp_rule_create" name="rule_name" id="exp_rule_name">
                        <option value="">Select</option>
                        {{-- <input type="text" class="form-control" name="rule_name" id="exp_rule_name"> --}}
                        @foreach ($rules as $rule)
                            <option value="{{ $rule->rule_name }},{{ $rule->id }}">{{ $rule->rule_name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <input type="hidden" name="member_basic" value="{{ $member->basic }}">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Percent </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="percent" id="exp_percent"
                                value="0" placeholder="">
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
                            <input type="text" class="form-control" name="amount" id="exp_amount"
                                placeholder="" value="0">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="month" id="exp_month">
                                    <option value="">Select</option>
                                    @php
                                    $monthsSe = [
                                        '01' => 'January',
                                        '02' => 'February',
                                        '03' => 'March',
                                        '04' => 'April',
                                        '05' => 'May',
                                        '06' => 'June',
                                        '07' => 'July',
                                        '08' => 'August',
                                        '09' => 'September',
                                        '10' => 'October',
                                        '11' => 'November',
                                        '12' => 'December',
                                    ];
                                    $currentMonth = date('m');
                                @endphp

                                    @foreach ($monthsSe as $num => $name)
                                        <option value="{{ $num }}" {{ $num === $currentMonth ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>

                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="exp_year">
                                    <option value="">Select</option>
                                    @php
                                        $currentYear = date('Y');
                                        for ($i = 0; $i < 5; $i++) {
                                            $year = $currentYear - $i;
                                            $selected = $year == $currentYear ? 'selected' : '';
                                            echo "<option value='{$year}' {$selected}>{$year}</option>";
                                        }
                                    @endphp
                                </select>
                                <span class="text-danger"></span>
                            </div>
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
                    <input type="text" class="form-control" name="remark" id="exp_remark">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        {{-- <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_add">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-12">
                        @if (empty($member->member_credit_info) ||
                                empty($member->member_debit_info) ||
                                empty($member->member_recovery_info) ||
                                empty($member->member_core_info_data) ||
                                empty($member->member_personal_info))
                            <div class="alert alert-warning">
                                <h6>Please complete member information before updating rules!</h6>
                                {!! empty($member->member_credit_info) ? 'Credit Info Not Updated <br>' : '' !!}
                                {!! empty($member->member_debit_info) ? 'Debit Info Not Updated <br>' : '' !!}
                                {!! empty($member->member_recovery_info) ? 'Recovery Info Not Updated <br>' : '' !!}
                                {!! empty($member->member_core_info_data) ? 'Core Info Not Updated <br>' : '' !!}
                                {!! empty($member->member_personal_info) ? 'Personal Info Not Updated <br>' : '' !!}
                            </div>
                        @else
                            <div class="row justify-content-end">
                                <div class="form-group col-md-3 mb-2">
                                    <button type="submit" class="listing_add">Save</button>
                                </div>
                                <div class="form-group col-md-3 mb-2">
                                    <button type="reset" class="listing_exit">Cancel</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </form>
@endif


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#exp_percent').on('keyup', function() {
                var percent = $(this).val();
                var basic = $('input[name="member_basic"]').val();
                if (percent && basic) {
                    var amount = (basic * percent) / 100;
                    $('#exp_amount').val(amount.toFixed(2));
                } else {
                    $('#exp_amount').val('');
                }
            });
        });
    </script>
@endpush
