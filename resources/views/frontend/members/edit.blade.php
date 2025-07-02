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
    $(document).ready(function() {
        // === Filter Data by Year and Month ===
      // Remove any previous binding, then bind once
      let filterTimer;
        $(document).off('change', '#year, #month').on('change', '#year, #month', function () {
            clearTimeout(filterTimer);
            filterTimer = setTimeout(() => {
                const year = $('#year').val();
                const month = $('#month').val();

                if (year && month) {
                    $.ajax({
                        url: '{{ route('members.filterData') }}',
                        type: 'GET',
                        data: {
                            year: year,
                            month: month,
                            member_id: '{{ $member->id }}'
                        },
                        beforeSend: function () {
                            $('#filter-year-month').html('<div>Loading...</div>');
                        },
                        success: function (response) {
                            $('#filter-year-month').html(response);

                            const baseUrl = window.location.origin + window.location.pathname;
                            history.pushState(null, '', `${baseUrl}?year=${year}&month=${month}`);

                            calculateLoanTotal();
                            updateTotalDebit();
                            calculateOrgRecoTotal();
                        },
                        error: function (xhr) {
                            console.error(xhr.responseText);
                            $('#filter-year-month').html('<div class="text-danger">Error loading data</div>');
                        }
                    });
                }
            }, 300); // 300ms debounce
        });



       $(document).on('keyup', '#misc1', function () {
            let miscValue = parseFloat($(this).val()) || 0;

            // Calculate 10% and 14% and round to nearest integer
            let adj10 = Math.round(miscValue * 0.10);
            let arr14 = Math.round(miscValue * 0.14);

            // Set the values
            $('#npsg_adj').val(adj10);
            $('#nps_14_adj').val(arr14);
        });


        // === Calculate Total Loan Installment ===
        function calculateLoanTotal() {
            let total = 0;
            $('.loan_inst_amounts').each(function() {
                total += parseFloat($(this).val()) || 0;
            });

            $('#total_loan_inst_amount').val(total.toFixed(2));
            return total;
        }

        // === Calculate Organization Recovery Total ===
        const orgFields = [
            'ccs_sub', 'mess', 'security', 'misc7', 'ccs_rec', 'asso_fee', 'dbf', 'misc8',
            'wel_sub', 'ben', 'med_ins', 'wel_rec', 'hdfc', 'maf', 'final_pay', 'lic',
            'cort_atch', 'ogpf', 'ntp', 'ptax'
        ];

        function calculateOrgRecoTotal() {
            let total = 0;
            orgFields.forEach(id => {
                const val = parseFloat($('#' + id).val()) || 0;
                total += val;
            });
            $('#tot_rec').val(total.toFixed(2));
            getAllTotal(); // ✅ Corrected function name
        }

        orgFields.forEach(id => {
            $('#' + id).on('input', calculateOrgRecoTotal);
        });

        // === Calculate Debits from Deductions ===
        const debitFields = [
            "#gpa_sub", "#gpa_adv", "#gpf_arr", "#cgegis", "#cghs", "#hba", "#hba_interest", "#car",
            "#car_interest",
            '#gpf_rec', '#npsg_arr', '#nps_10_rec',
            '#nps_10_arr',
            '#nps_14_adj',
            "#scooter", "#scooter_interest", "#comp_adv", "#comp_int", "#fadv", "#ltc", "#medi", "#tada",
            "#leave_rec", "#pension_rec", "#i_tax", "#ecess", "#pli", "#misc1", "#misc2", "#quarter_charge",
            "#penal_interest", "#nps_sub", "#eol", "#ccl", "#rent", "#elec", "#elec_arr", "#pc", "#water",
            "#water_arr",
            "#arrear_pay", "#npsg", "#npsg_adj", "#ltc_rec", "#medical_rec", "#tada_rec", "#misc3",
            "#cda", "#furn", "#furn_arr", "#hra_rec", "#cmg", "#tpt_rec", "#licence_fee", "#society"
        ];

        function updateTotalDebit() {
            let total = 0;
            debitFields.forEach(field => {
                if ($(field).length) {
                    const val = parseFloat($(field).val()) || 0;
                    total += val;
                }
            });

            const loanTotal = parseFloat($('#total_loan_inst_amount').val()) || 0;
            // alert(loanTotal)
            // alert(total)
            let grandTotal = total + loanTotal;

            $('#tot_debits').val(grandTotal.toFixed(2)); // sets with 2 decimal places


            const totalCredits = parseFloat($('#tot_credits').val()) || 0;
            console.log('total credit-' + totalCredits);
            console.log('total -' + total);

            const netPay = Math.max(totalCredits - grandTotal, 0);
            $('#net_pay').val(netPay.toFixed(2));

            getAllTotal(); // ✅ Corrected function name
        }

        debitFields.forEach(field => {
            $(field).on('keyup', updateTotalDebit);
        });

        // === Calculate Net Pay and Take Home ===
        function getAllTotal() {
            const totalCredits = parseFloat($('#tot_credits').val()) || 0;
            const otherDebits = parseFloat($('#tot_debits').val()) || 0;
            // alert(loanTotal);
            // alert(otherDebits);

            const totalDebits = otherDebits;
            const netPay = totalCredits - totalDebits;
            const recovery = parseFloat($('#tot_rec').val()) || 0;
            const takeHome = netPay - recovery;

            $('#total_gross_pay').val(totalCredits.toFixed(2));
            $('#total_debits').val(totalDebits.toFixed(2));
            $('#total_net_pay').val(netPay.toFixed(2));
            $('#total_recovery').val(recovery.toFixed(2));
            $('#take_home').val(takeHome.toFixed(2));
        }

        // === Initial Calculations on Page Load ===
        calculateLoanTotal();
        calculateOrgRecoTotal();
        updateTotalDebit();
    });
</script>
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
