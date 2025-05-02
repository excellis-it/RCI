@extends('frontend.layouts.master')
@section('title')
    Members Edit
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
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Member Edit</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Edit</span></li>
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
                            {{-- <form action="" method="POST" id="designation-create-form">

                            @csrf --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-2 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>PC NO</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Pers No</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="pers_no" id="pers_no"
                                                        value="{{ $member->pers_no ?? '' }}">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>EMP-ID</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="emp_id" id="emp_id"
                                                        value="{{ $member->emp_id ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        value="{{ $member->name ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>EMP-ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Desig</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="desig" id="desig"
                                                        value="{{ $member->desigs->designation ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Basic</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="basic" id="basic"
                                                        value="{{ $member->basic ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Group</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="group" id="group"
                                                        value="{{ $member->groups->value ?? '' }}" placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Devision</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="devision"
                                                        id="devision" value="{{ $member->divisions->value ?? '' }}"
                                                        placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-2">
                                        <div class="row align-items-center">
                                            @php
                                                $current_year = request('year') ?? $currentYear;
                                                $current_month = request('month') ?? $currentMonth;
                                            @endphp

                                            <!-- Year Dropdown -->
                                            <div class="form-group col-md-6 mb-2">
                                                <label for="year">Year</label>
                                                <select class="form-select" name="year" id="year">
                                                    @for ($i = date('Y'); $i >= 2000; $i--)
                                                        <option value="{{ $i }}"
                                                            {{ $i == $current_year ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                <span class="text-danger" id="year_error"></span>
                                            </div>

                                            <!-- Month Dropdown -->
                                            {{-- @dd( $current_month) --}}
                                            <div class="form-group col-md-6 mb-2">
                                                <label for="month">Month</label>
                                                <select class="form-select" name="month" id="month">
                                                    @foreach (range(1, 12) as $m)
                                                        @php $monthVal = str_pad($m, 2, '0', STR_PAD_LEFT); @endphp
                                                        <option value="{{ $monthVal }}"
                                                            {{ $monthVal == $current_month ? 'selected' : '' }}>
                                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger" id="month_error"></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <div class="edit-mem-tab" id="filter-year-month">
                                @include('frontend.members.filter-year-month')


                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        const currentYear = new Date().getFullYear();
        const currentMonth = new Date().getMonth() + 1; // getMonth returns 0-indexed value

        // Function to populate months
        function populateMonths(selectedYear) {
            let $monthSelect = $('#month');
            let prevSelected = $monthSelect.val(); // store previously selected month
            $monthSelect.empty(); // clear existing options

            let maxMonth = 12;
            if (parseInt(selectedYear) == currentYear) {
                maxMonth = currentMonth;
            }

            for (let m = 1; m <= maxMonth; m++) {
                let monthVal = m.toString().padStart(2, '0');
                let monthName = new Date(2000, m - 1, 1).toLocaleString('default', { month: 'long' });

                // Select currentMonth if year is current and no previous selection,
                // or retain previous selected month if it exists
                let isSelected =
                    (selectedYear == currentYear && m === currentMonth && !prevSelected) ||
                    (monthVal === prevSelected);

                $monthSelect.append(
                    `<option value="${monthVal}" ${isSelected ? 'selected' : ''}>${monthName}</option>`
                );
            }
        }

        // Initial call on page load
        populateMonths($('#year').val());

        // Change event on year dropdown
        $('#year').on('change', function () {
            populateMonths($(this).val());
        });
    });
</script>

@endpush
