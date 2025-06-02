@extends('frontend.layouts.master')
@section('title')
    Paybill Report Generate
@endsection

@push('styles')
@endpush

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="{{ route('members.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Report Generate</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Paybill</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            <form action="{{ route('reports.paybill-generate') }}" method="POST" >
                                @csrf

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Employee Status</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="e_status" class="form-select" id="e_status">
                                                        <option value="">Select Employee Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="deputation">On Deputation</option>
                                                    </select>
                                                    @if ($errors->has('e_status'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('e_status') }}</div>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Category</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="category" class="form-select" id="category">
                                                        <option value="">Select Employee Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category }}</option>

                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('category'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('category') }}</div>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Year</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="year" class="form-select" id="report_year">
                                                            <option value="">Select Year</option>
                                                            @for ($i = date('Y'); $i >= 1958; $i--)
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                        @if ($errors->has('year'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('year') }}</div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-4">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Month</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="month" class="form-select" id="report_month">
                                                            <option value="">Select Month</option>
                                                        </select>
                                                        @if ($errors->has('month'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('month') }}</div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3 mb-2">
                                                <div class="col-md-12">
                                                    <label>A/c Off Sign</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select class="form-control" name="account_officer_sign"
                                                        id="account_officer_sign">
                                                        <option value="">Select Accountant</option>
                                                        @foreach ($accountants as $accountant)
                                                            <option value="{{ $accountant->id }}">
                                                                {{ $accountant->user_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- validation  --}}
                                                @error('account_officer_sign')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- <div class="form-group col-md-12 mb-4">
                                                <div class="card p-3 shadow-sm border rounded">
                                                    <label class="mb-2"><strong>Select Report Type</strong></label>

                                                    @php
                                                        $reportTypes = [
                                                            'paybill' => 'Paybill',
                                                            'credit_summary' => 'Credit Summary Report',
                                                            'debit_summary' => 'Debit Summary Report',
                                                            'debit2_summary' => 'Debit2 Summary Report for Bill No',
                                                            'category_summary_ns' => 'Summary for Category NS for the Month',
                                                            'change_statement_credits' => 'Change Statement (Credits) - NIE NPS Bill',
                                                            'change_statement_debits' => 'Change Statement (Debits) - NIE NPS Bill',
                                                            'recovery_cgegis' => 'Recovery Schedule of CGEGIS',
                                                            'grand_summary_cgegis' => 'Grand Summary of CGEGIS',
                                                            'recovery_cghs' => 'Recovery Schedule of CGHS',
                                                            'grand_summary_cghs' => 'Grand Summary of CGHS',
                                                            'recovery_quarter' => 'Recovery Schedule of Quarter Charges',
                                                            'recovery_misc' => 'Recovery Schedule of MISC',
                                                            'recovery_employee_contribution' => 'Recovery Schedule of Employee Monthly Contribution',
                                                            'grand_summary_pension' => 'Grand Summary Pension',
                                                        ];
                                                    @endphp

                                                    @foreach ($reportTypes as $value => $label)
                                                        <div class="form-check form-check-inline me-4 mb-2">
                                                            <input class="form-check-input" type="radio" name="report_type" id="{{ $value }}" value="{{ $value }}" {{ old('report_type', 'paybill') == $value ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="{{ $value }}">
                                                                {{ $label }}
                                                            </label>
                                                        </div>
                                                    @endforeach

                                                    @if ($errors->has('report_type'))
                                                        <div class="error mt-2" style="color:red;">
                                                            {{ $errors->first('report_type') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div> --}}


                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                         <label></label>
                                        <div class="form-group mb-2">
                                            <button type="submit" class="listing_add">Generate</button>
                                        </div>
                                      </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        $(document).ready(function() {
            $('#report_year').change(function() {
                var year = $(this).val();
                var currentDate = new Date();
                var monthDropdown = $('#report_month');

                if(year == currentDate.getFullYear()) {
                    var currentMonth = currentDate.getMonth();
                    var endMonth = (year == currentDate.getFullYear()) ? currentMonth : 12;

                    monthDropdown.empty();
                    for (var month = 1; month <= endMonth; month++) {
                        var option = $('<option></option>');
                        option.val(month);
                        option.text(new Date(year, month - 1).toLocaleString('default', { month: 'long' }));
                        monthDropdown.append(option);
                    }

                } else {
                    monthDropdown.empty();
                    for (var month = 1; month <= 12; month++) {
                        var option = $('<option></option>');
                        option.val(month);
                        option.text(new Date(year, month - 1).toLocaleString('default', { month: 'long' }));
                        monthDropdown.append(option);
                    }
                }

            });
        });
    </script>

@endpush
