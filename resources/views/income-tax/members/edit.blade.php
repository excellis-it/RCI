@extends('income-tax.layouts.master')
@section('title')
    Arrears
@endsection

@push('styles')
@endpush

@section('content')
    <!-- Loader Overlay -->
    <div id="loaderOverlay"
        style="
    display: none;
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(255, 255, 255, 0.7);
    z-index: 9999;
    justify-content: center;
    align-items: center;
">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Member Income Tax</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Income Tax</span></li>
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

                            <div class="row">
                                <div class="col-md-12">
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
                                                            <input type="text" class="form-control" name="pers_no"
                                                                id="pers_no" value="{{ $member->pers_no ?? '' }}">
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
                                                            <input type="text" class="form-control" name="emp_id"
                                                                id="emp_id" value="{{ $member->emp_id ?? '' }}"
                                                                placeholder="">
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
                                                            <input type="text" class="form-control" name="name_edit"
                                                                id="name_edit" value="{{ $member->name ?? '' }}"
                                                                placeholder="">
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
                                                            <input type="text" class="form-control" name="desig"
                                                                id="desig"
                                                                value="{{ $member->desigs->designation ?? '' }}"
                                                                placeholder="">
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
                                                            <input type="text" class="form-control" name="basic"
                                                                id="basic" value="{{ $member->basic ?? '' }}"
                                                                placeholder="">
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
                                                            <input type="text" class="form-control" name="group"
                                                                id="group" value="{{ $member->groups->value ?? '' }}"
                                                                placeholder="">
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
                                                                id="devision"
                                                                value="{{ $member->divisions->value ?? '' }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
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
                                                <div class="col-md-3">
                                                    <label>Financial Year:</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="form-select" name="financial_year"
                                                        id="financial_year">
                                                        <option value="">Select Financial Year</option>
                                                        @foreach (\App\Helpers\Helper::getNewFinancialYears(20) as $year)
                                                            <option value="{{ $year }}"
                                                                {{ $year == $financialYear ? 'selected' : '' }}>
                                                                {{ $year }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="edit-mem-tab">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="loan-tab-pane" role="tabpanel"
                                            aria-labelledby="loan-tab" tabindex="0">
                                            <div class="credit-frm">

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="edit-mem-tab">
                                                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link active" id="pay_details-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#pay_details"
                                                                        type="button" role="tab"
                                                                        aria-controls="pay_details"
                                                                        aria-selected="true">Pay Details</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="arrears-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#arrears"
                                                                        type="button" role="tab"
                                                                        aria-controls="arrears" aria-selected="false"
                                                                        tabindex="-1">Arrears</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="savings-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#savings"
                                                                        type="button" role="tab"
                                                                        aria-controls="savings" aria-selected="false"
                                                                        tabindex="-1">Savings</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="rent-tab"
                                                                        data-bs-toggle="tab" data-bs-target="#rents"
                                                                        type="button" role="tab"
                                                                        aria-controls="rents" aria-selected="false"
                                                                        tabindex="-1">Rent</button>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content" id="myTabContent">

                                                                @include('income-tax.members.pay-details')

                                                                @include('income-tax.members.arrears')

                                                                @include('income-tax.members.saving')

                                                                @include('income-tax.members.rent')

                                                                <div class="row justify-content-end mt-4">
                                                                    <input type="hidden" name="member_id"
                                                                        value="{{ $member['id'] ?? '' }}">

                                                                    <div class="col-auto mb-2">
                                                                        <button type="button" class="another-btn"
                                                                            id="generateReport">Report</button>

                                                                    </div>
                                                                    <div class="col-auto mb-2">
                                                                        <button type="button" class="another-btn"
                                                                            id="generateReportForm16">FORM16</button>
                                                                    </div>
                                                                    <div class="col-auto mb-2">
                                                                        Recovey Form

                                                                        <select name="recovery_from" id="recovery_from"
                                                                            class="p-2 rounded">
                                                                            <option value="">Select Month</option>
                                                                            <option value="7"
                                                                                {{ old('recovery_from') == '7' ? 'selected' : '' }}>
                                                                                Aug</option>
                                                                            <option value="6"
                                                                                {{ old('recovery_from') == '6' ? 'selected' : '' }}>
                                                                                Sep</option>
                                                                            <option value="5"
                                                                                {{ old('recovery_from') == '5' ? 'selected' : '' }}>
                                                                                Oct</option>
                                                                            <option value="4"
                                                                                {{ old('recovery_from') == '4' ? 'selected' : '' }}>
                                                                                Nov</option>
                                                                            <option value="3"
                                                                                {{ old('recovery_from') == '3' ? 'selected' : '' }}>
                                                                                Dec</option>
                                                                            <option value="2"
                                                                                {{ old('recovery_from') == '2' ? 'selected' : '' }}>
                                                                                Jan</option>
                                                                            <option value="1"
                                                                                {{ old('recovery_from') == '1' ? 'selected' : '' }}>
                                                                                Feb</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                $('#generateReport').on('click', function() {
                    // Show loader
                    $('#loaderOverlay').css('display', 'flex');

                    let recovery_from = $('#recovery_from').val();
                    let report_year = $('#financial_year').val();
                    let generate_by = 'member'; // fixed for now
                    let e_status = 'active'; // fixed for now
                    let member_id = $('[name="member_id"]').val();
                    let category = ''; // optional if not used

                    $.ajax({
                        url: '{{ route('reports.annual-income-tax-report-generate') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            recovery_from,
                            report_year,
                            generate_by,
                            e_status,
                            member_id,
                            category
                        },
                        xhrFields: {
                            responseType: 'blob'
                        },
                        success: function(blob) {
                            let now = new Date();
                            let filename =
                                `income-tax-${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}.pdf`;
                            let link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = filename;
                            link.click();
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                let msg = Object.values(errors).flat().join('\n');
                                alert("Validation Error:\n" + msg);
                            } else {
                                alert("Error: " + (xhr.responseJSON?.message ||
                                    'Failed to generate report.'));
                            }
                        },
                        complete: function() {
                            // Hide loader in all cases
                            $('#loaderOverlay').hide();
                        }
                    });
                });


                $('#generateReportForm16').on('click', function() {
                    // Show loader
                    $('#loaderOverlay').css('display', 'flex');

                    let recovery_from = $('#recovery_from').val();
                    let report_year = $('#financial_year').val();
                    let generate_by = 'member'; // fixed for now
                    let e_status = 'active'; // fixed for now
                    let member_id = $('[name="member_id"]').val();
                    let category = ''; // optional if not used

                    $.ajax({
                        url: '{{ route('reports.form-16b-generate') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            recovery_from,
                            report_year,
                            generate_by,
                            e_status,
                            member_id,
                            category
                        },
                        xhrFields: {
                            responseType: 'blob'
                        },
                        success: function(blob) {
                            let now = new Date();
                            let filename =
                                `form-16-${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}.pdf`;
                            let link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = filename;
                            link.click();
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                let msg = Object.values(errors).flat().join('\n');
                                alert("Validation Error:\n" + msg);
                            } else {
                                alert("Error: " + (xhr.responseJSON?.message ||
                                    'Failed to generate report.'));
                            }
                        },
                        complete: function() {
                            // Hide loader in all cases
                            $('#loaderOverlay').hide();
                        }
                    });
                });
            });
        </script>


        <script>
            $(document).ready(function() {
                $('#month_year').change(function() {
                    var monthYear = $(this).val();
                    if (monthYear) {
                        $.ajax({
                            url: '{{ route('income-tax.members-income-tax.get-pay-details') }}',
                            type: 'GET',
                            data: {
                                month_year: monthYear,
                                member_id: {{ $member->id }}
                            },
                            success: function(response) {
                                if (response.success) {
                                    // Function to safely get value or default to 0
                                    function getValue(key) {
                                        return response.data[key] !== null ? response.data[key] : 0;
                                    }

                                    // Populate the fields with response data, defaulting to 0 if null
                                    $('input[name="dis_alw"]').val(getValue("dis_alw"));
                                    $('input[name="nps"]').val(getValue("nps"));
                                    $('input[name="npsc"]').val(getValue("npsc"));
                                    $('input[name="ups_10_per_rec"]').val(getValue(
                                        "ups_10_per_rec"));
                                    $('input[name="upsc_10"]').val(getValue("upsc_10"));

                                    $('input[name="var_incr"]').val(getValue("var_incr"));
                                    $('input[name="misc"]').val(getValue("misc"));
                                    $('input[name="p_tax"]').val(getValue("p_tax"));
                                    $('input[name="hdfc"]').val(getValue("hdfc"));
                                    $('input[name="basic"]').val(getValue("basic"));
                                    $('input[name="da"]').val(getValue("da"));
                                    $('input[name="ot"]').val(getValue("ot"));
                                    $('input[name="i_tax"]').val(getValue("i_tax"));
                                    $('input[name="d_misc"]').val(getValue("d_misc"));
                                    $('input[name="d_pay"]').val(getValue("d_pay"));
                                    $('input[name="hra"]').val(getValue("hra"));
                                    $('input[name="arrears"]').val(getValue("arrears"));
                                    $('input[name="hba"]').val(getValue("hba"));
                                    $('input[name="gmc"]').val(getValue("gmc"));
                                    $('input[name="s_pay"]').val(getValue("s_pay"));
                                    $('input[name="cca"]').val(getValue("cca"));
                                    $('input[name="gpf"]').val(getValue("gpf"));
                                    $('input[name="pli"]').val(getValue("pli"));
                                    $('input[name="e_pay"]').val(getValue("e_pay"));
                                    $('input[name="tpt"]').val(getValue("tpt"));
                                    $('input[name="da_tpt"]').val(getValue("da_tpt"));
                                    $('input[name="cgeis"]').val(getValue("cgeis"));
                                    $('input[name="lic"]').val(getValue("lic"));
                                    $('input[name="add_incr"]').val(getValue("add_incr"));
                                    $('input[name="cghs"]').val(getValue("cghs"));
                                    $('input[name="eol_hpl"]').val(getValue("eol_hpl"));
                                } else {

                                    $('input[name="dis_alw"]').val(0);
                                    $('input[name="nps"]').val(0);
                                    $('input[name="npsc"]').val(0);
                                    $('input[name="ups_10_per_rec"]').val(0);
                                    $('input[name="upsc_10"]').val(0);
                                    $('input[name="var_incr"]').val(0);
                                    $('input[name="misc"]').val(0);
                                    $('input[name="p_tax"]').val(0);
                                    $('input[name="hdfc"]').val(0);
                                    $('input[name="basic"]').val(0);
                                    $('input[name="da"]').val(0);
                                    $('input[name="ot"]').val(0);
                                    $('input[name="i_tax"]').val(0);
                                    $('input[name="d_misc"]').val(0);
                                    $('input[name="d_pay"]').val(0);
                                    $('input[name="hra"]').val(0);
                                    $('input[name="arrears"]').val(0);
                                    $('input[name="hba"]').val(0);
                                    $('input[name="gmc"]').val(0);
                                    $('input[name="s_pay"]').val(0);
                                    $('input[name="cca"]').val(0);
                                    $('input[name="gpf"]').val(0);
                                    $('input[name="pli"]').val(0);
                                    $('input[name="e_pay"]').val(0);
                                    $('input[name="tpt"]').val(0);
                                    $('input[name="da_tpt"]').val(0);
                                    $('input[name="cgeis"]').val(0);
                                    $('input[name="lic"]').val(0);
                                    $('input[name="add_incr"]').val(0);
                                    $('input[name="cghs"]').val(0);
                                    $('input[name="eol_hpl"]').val(0);
                                    toastr.error(response.message)
                                }
                            }
                        });
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                function populateMonths(financialYear) {
                    if (financialYear) {
                        var years = financialYear.split("-");
                        var startYear = parseInt(years[0]); // First part of financial year
                        var endYear = parseInt(years[1]); // Second part of financial year

                        var months = [{
                                name: "March",
                                value: "03",
                                year: startYear
                            },
                            {
                                name: "April",
                                value: "04",
                                year: startYear
                            },
                            {
                                name: "May",
                                value: "05",
                                year: startYear
                            },
                            {
                                name: "June",
                                value: "06",
                                year: startYear
                            },
                            {
                                name: "July",
                                value: "07",
                                year: startYear
                            },
                            {
                                name: "August",
                                value: "08",
                                year: startYear
                            },
                            {
                                name: "September",
                                value: "09",
                                year: startYear
                            },
                            {
                                name: "October",
                                value: "10",
                                year: startYear
                            },
                            {
                                name: "November",
                                value: "11",
                                year: startYear
                            },
                            {
                                name: "December",
                                value: "12",
                                year: startYear
                            },
                            {
                                name: "January",
                                value: "01",
                                year: endYear
                            },
                            {
                                name: "February",
                                value: "02",
                                year: endYear
                            },

                        ];

                        $("#month").empty().append('<option value="">Select Month</option>');
                        $.each(months, function(index, month) {
                            $("#month").append(
                                `<option value="${month.value}" data-year="${month.year}">${month.name}</option>`
                            );
                        });

                        // Reset year field
                        $("#year").val("");
                    } else {
                        $("#month").empty().append('<option value="">Select Month</option>');
                        $("#year").val("");
                    }
                }

                // Trigger financial year selection on page load if already selected
                var preselectedFinancialYear = $("#financial_year").val();

                if (preselectedFinancialYear) {
                    populateMonths(preselectedFinancialYear);
                }

                // When financial year changes, update month list
                $(document).on('change', "#financial_year", function() {
                    populateMonths($(this).val());
                });

                // When month is selected, update year field
                $(document).on('change', "#month", function() {
                    var selectedYear = $(this).find(":selected").data("year");
                    $("#year").val(selectedYear);
                });
            });
        </script>


        <script>
            $(document).ready(function() {
                function populateMonths(selectedYear) {
                    let monthDropdown = $(".month_year");
                    monthDropdown.empty().append('<option value="">Select Month Year</option>');

                    if (selectedYear) {
                        let years = selectedYear.split("-");
                        let startYear = parseInt(years[0]);
                        let endYear = parseInt(years[1]);

                        let months = [{
                                name: "March",
                                year: startYear,
                                number: "03"
                            },
                            {
                                name: "April",
                                year: startYear,
                                number: "04"
                            },
                            {
                                name: "May",
                                year: startYear,
                                number: "05"
                            },
                            {
                                name: "June",
                                year: startYear,
                                number: "06"
                            },
                            {
                                name: "July",
                                year: startYear,
                                number: "07"
                            },
                            {
                                name: "August",
                                year: startYear,
                                number: "08"
                            },
                            {
                                name: "September",
                                year: startYear,
                                number: "09"
                            },
                            {
                                name: "October",
                                year: startYear,
                                number: "10"
                            },
                            {
                                name: "November",
                                year: startYear,
                                number: "11"
                            },
                            {
                                name: "December",
                                year: startYear,
                                number: "12"
                            },
                            {
                                name: "January",
                                year: endYear,
                                number: "01"
                            },
                            {
                                name: "February",
                                year: endYear,
                                number: "02"
                            }
                        ];

                        // Populate the month dropdown
                        $.each(months, function(index, item) {
                            monthDropdown.append(
                                `<option value="${item.number}-${item.year}">${item.name} ${item.year}</option>`
                            );
                        });
                    }
                }

                // Trigger when the financial year is changed
                $("#financial_year").change(function() {
                    let selectedYear = $(this).val();
                    populateMonths(selectedYear);
                });

                // Call on page load if financial year is already selected
                let preSelectedYear = $("#financial_year").val();
                if (preSelectedYear) {
                    populateMonths(preSelectedYear);
                }
            });
        </script>




        <script>
            $(document).ready(function() {
                // Handle edit click
                $(document).on("click", ".edit-route-arrear-form", function(e) {
                    e.preventDefault();

                    let editUrl = $(this).attr("href");

                    $.ajax({
                        url: editUrl,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                let arrear = response.data;

                                // Populate form fields
                                $("input[name='arrear_id']").val(arrear.id);
                                $("input[name='date']").val(arrear.date);
                                $("select[name='name']").val(arrear.name);
                                $("input[name='amt']").val(arrear.amt);
                                $("input[name='cps']").val(arrear.cps);
                                $("input[name='i_tax']").val(arrear.i_tax);
                                $("input[name='cghs']").val(arrear.cghs);
                                $("input[name='gmc']").val(arrear.gmc);

                                // Store ID in form for update
                                $("#arrearsForm").attr("data-update-id", arrear.id);

                                toastr.info("Editing record. Make changes and save.");
                            } else {
                                toastr.error("Failed to fetch arrear details.");
                            }
                        },
                        error: function() {
                            toastr.error("An error occurred while fetching the record.");
                        }
                    });
                });

                // Form submission handling
                $(document).on("submit", "#arrearsForm", function(e) {
                    e.preventDefault();

                    let form = $(this);
                    let formData = form.serialize();
                    let updateId = form.attr("data-update-id"); // Get update ID if exists

                    let url = updateId ?
                        `{{ route('income-tax.members-income-tax.arrears.update', '') }}/${updateId}` :
                        "{{ route('income-tax.members-income-tax.arrears.store') }}";
                    let method = updateId ? "PUT" : "POST";

                    $.ajax({
                        url: url,
                        type: method,
                        data: formData,
                        dataType: "json",
                        beforeSend: function() {
                            $(".text-danger").text("");
                        },
                        success: function(response) {
                            if (response.success) {
                                $('.not-found').css('display', 'none');
                                let formattedDate = response.data.date ?? "N/A";
                                let editRoute =
                                    `{{ route('income-tax.members-income-tax.arrears.edit', ':id') }}`
                                    .replace(':id', response.data.id);
                                let deleteRoute =
                                    `{{ route('income-tax.members-income-tax.arrears.delete', ':id') }}`
                                    .replace(':id', response.data.id);

                                let updatedRow = `
                        <tr data-id="${response.data.id}">
                            <td>${formattedDate}</td>
                            <td>${response.data.name ?? 'N/A'}</td>
                            <td>${parseFloat(response.data.amt ?? 0).toFixed(2)}</td>
                            <td>${parseFloat(response.data.cps ?? 0).toFixed(2)}</td>
                            <td>${parseFloat(response.data.i_tax ?? 0).toFixed(2)}</td>
                            <td>${parseFloat(response.data.cghs ?? 0).toFixed(2)}</td>
                            <td>${parseFloat(response.data.gmc ?? 0).toFixed(2)}</td>
                            <td class="sepharate">
                                <a href="${editRoute}" class="edit_pencil edit-route-arrear-form"><i class="ti ti-pencil"></i></a>
                                <a type="button" class="delete_arrear delete" data-route="${deleteRoute}"><i class="ti ti-trash"></i></a>
                            </td>
                        </tr>
                    `;

                                if (updateId) {
                                    // Update existing row
                                    $(`#arrear-table tbody tr[data-id='${updateId}']`).replaceWith(
                                        updatedRow);
                                } else {
                                    // Append new row
                                    $("#arrear-table tbody").append(updatedRow);
                                }

                                form[0].reset();
                                form.removeAttr("data-update-id"); // Reset form mode
                                toastr.success("Record saved successfully!");
                            } else {
                                toastr.error("Failed to save data.");
                            }
                        },
                        error: function(xhr) {
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function(key, value) {
                                    $(`.${key}-err`).text(value[0]);

                                });
                            } else {
                                toastr.error("An unexpected error occurred.");
                            }
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                function updateMonthRange(financialYear) {
                    if (!financialYear) return;

                    // Extract start and end year (e.g., "2024-2025" → startYear = 2024, endYear = 2025)
                    let years = financialYear.split('-');
                    let startYear = parseInt(years[0]);
                    let endYear = parseInt(years[1]);

                    // Define the start and end date range (April 1st - March 31st)
                    let startDate = `${startYear}-03-01`;
                    let endDate = `${endYear}-02-31`;

                    // Update the date input field
                    $("#date-arr").attr("min", startDate);
                    $("#date-arr").attr("max", endDate);
                    $("#date-arr").val(startDate); // Set default to April 1st
                }

                // On page load, set the financial year range based on the default selection
                let defaultFinancialYear = $("#financial_year").val();
                updateMonthRange(defaultFinancialYear);

                // On change event for financial year dropdown
                $(document).on("change", "#financial_year", function() {
                    let selectedYear = $(this).val();
                    updateMonthRange(selectedYear);
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                function loadArrearTable(financialYear) {
                    if (!financialYear) return;

                    $.ajax({
                        url: "{{ route('income-tax.members-income-tax.arrear.data') }}",
                        type: "GET",
                        data: {
                            financial_year: financialYear,
                            member_id: "{{ $member->id }}",
                        },
                        beforeSend: function() {
                            $("#arrear-table tbody").html(
                                '<tr><td colspan="8" class="text-center">Loading...</td></tr>'
                            );
                        },
                        success: function(response) {
                            let tbody = $("#arrear-table tbody");
                            tbody.empty();
                            if (response.arrears.length > 0) {
                                $.each(response.arrears, function(index, arrear) {
                                    let formattedDate = arrear.date ? new Date(arrear.date)
                                        .toLocaleDateString('en-GB') : 'N/A';

                                    let editRoute =
                                        `{{ route('income-tax.members-income-tax.arrears.edit', ':id') }}`
                                        .replace(':id', arrear.id);
                                    let deleteRoute =
                                        `{{ route('income-tax.members-income-tax.arrears.delete', ':id') }}`
                                        .replace(':id', arrear.id);

                                    tbody.append(`
                            <tr class="edit-route-arrear" data-id="${arrear.id}">
                                <td>${formattedDate}</td>
                                <td>${arrear.name ?? 'N/A'}</td>
                                <td>${parseFloat(arrear.amt ?? 0).toFixed(2)}</td>
                                <td>${parseFloat(arrear.cps ?? 0).toFixed(2)}</td>
                                <td>${parseFloat(arrear.i_tax ?? 0).toFixed(2)}</td>
                                <td>${parseFloat(arrear.cghs ?? 0).toFixed(2)}</td>
                                <td>${parseFloat(arrear.gmc ?? 0).toFixed(2)}</td>
                                <td class="sepharate">
                                    <a href="${editRoute}" class="edit_pencil edit-route-arrear-form"><i class="ti ti-pencil"></i></a>
                                    <a type="button" class="delete_arrear delete" data-route="${deleteRoute}">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        `);
                                });
                            } else {
                                tbody.html(
                                    '<tr class="not-found"><td colspan="8" class="text-center">No data available</td></tr>'
                                );
                            }
                        },
                        error: function() {
                            $("#arrear-table tbody").html(
                                '<tr><td colspan="8" class="text-center text-danger">Error loading data</td></tr>'
                            );
                        }
                    });
                }

                // When financial year is changed
                $(document).on("change", "#financial_year", function() {
                    let selectedYear = $(this).val();
                    loadArrearTable(selectedYear);
                    fetchSavingData(selectedYear);
                });

                function populateSavingsForm(data) {
                    $("#savings_annual_rent").val(data.annual_rent || 0);
                    $("#savings_ph_disable").val(data.ph_disable || 0);
                    $("#savings_fd_int").val(data.fd_int || 0);
                    $("#savings_nsc_ctd").val(data.nsc_ctd || 0);
                    $("#savings_t_fee").val(data.t_fee || 0);
                    $("#savings_hba_int").val(data.hba_int || 0);
                    $("#savings_edu_loan_int").val(data.edu_loan_int || 0);
                    $("#savings_nscint").val(data.nscint || 0);
                    $("#savings_hba_prncpl").val(data.hba_prncpl || 0);
                    $("#savings_ohters_s").val(data.ohters_s || 0);
                    $("#savings_hba_int_80ee").val(data.hba_int_80ee || 0);
                    $("#savings_others_d").val(data.others_d || 0);
                    $("#savings_letout").val(data.letout || 0);
                    $("#savings_infa_bond").val(data.infa_bond || 0);
                    $("#savings_ac_int_80tta").val(data.ac_int_80tta || 0);
                    $("#savings_pension").val(data.pension || 0);
                    $("#savings_js_sukanya").val(data.js_sukanya || 0);
                    $("#savings_nsdl").val(data.nsdl || 0);
                    $("#savings_med_trt").val(data.med_trt || 0);
                    $("#savings_equity_mf").val(data.equity_mf || 0);
                    $("#savings_ppf").val(data.ppf || 0);
                    $("#savings_sec_89").val(data.sec_89 || 0);
                    $("#savings_cancer").val(data.cancer || 0);
                    $("#savings_cancer_amount").val(data.cancer_amount || 0);

                    $("#savings_cea").val(data.cea || 0);
                    $("#savings_bonds").val(data.bonds || 0);
                    $("#savings_ulip").val(data.ulip || 0);
                    $("#savings_ph").val(data.ph || 0);
                    $("#savings_lic").val(data.lic || 0);
                    $("#savings_pli").val(data.pli || 0);
                    $("#savings_med_ins").val(data.med_ins || 0);

                    //  console.log('med_ins_80d_______'+data.med_ins_80d);
                    // Radio buttons
                    if (data.med_ins_80d == 1) {
                        $("#savings_med_ins1").prop('checked', true);
                    } else {
                        $("#savings_med_ins2").prop('checked', true);
                    }

                    if (data.cancer_80ddb_senior_dependent) {
                        $("#savings_cancer1").prop('checked', true);
                    } else {
                        $("#savings_cancer2").prop('checked', true);
                    }

                    if (data.med_tri_80dd_disability) {
                        $("#savings_med_tri1").prop('checked', true);
                    } else {
                        $("#savings_med_tri2").prop('checked', true);
                    }

                    if (data.ph_disable_80u_disability) {
                        $("#savings_server_dis1").prop('checked', true);
                    } else {
                        $("#savings_server_dis2").prop('checked', true);
                    }

                    if (data.it_rules) {
                        $("#savings_it_rules1").prop('checked', true);
                    } else {
                        $("#savings_it_rules2").prop('checked', true);
                    }
                }


                function fetchSavingData(financialYear) {
                    $('.financial_year').val(financialYear)
                    $.ajax({
                        url: "{{ route('income-tax.saving.get-data') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            member_id: "{{ $member->id }}",
                            financial_year: financialYear,
                        },
                        beforeSend: function() {
                            // Show loading indicator
                            $("#loading").show();
                        },
                        success: function(response) {
                            if (response.status == true) {
                                // Populate form with data
                                populateSavingsForm(response.data);

                            } else {
                                // Reset form if no data found
                                resetSavingsForm();
                                // Optionally show message
                                // alert(response.message);
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                            alert("Error fetching data. Please try again.");
                        },
                        complete: function() {
                            // Hide loading indicator
                            $("#loading").hide();
                        }
                    });
                }

                function resetSavingsForm() {
                    // Save the month_year value before resetting
                    let monthYear = $("#savings_month_year").val();

                    // Reset the form
                    $("#savingsForm")[0].reset();

                    // Restore the month_year value
                    $("#savings_month_year").val(monthYear);
                }

                // Load arrears table when the page loads if a financial year is selected
                let preSelectedYear = $("#financial_year").val();
                if (preSelectedYear) {
                    loadArrearTable(preSelectedYear);
                    fetchSavingData(preSelectedYear);
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                $(document).on("click", ".delete_arrear", function(e) {
                    e.preventDefault();

                    let deleteUrl = $(this).data("route"); // Get delete route
                    let row = $(this).closest("tr"); // Get the table row

                    if (confirm("Are you sure you want to delete this record?")) {
                        $.ajax({
                            url: deleteUrl,
                            type: "GET",
                            data: {
                                _token: "{{ csrf_token() }}" // Laravel CSRF token
                            },
                            success: function(response) {
                                if (response.success) {
                                    row.remove(); // Remove the row from the table
                                    toastr.success("Record deleted successfully!");
                                } else {
                                    toastr.error("Something went wrong!");
                                }
                            },
                            error: function(xhr) {
                                toastr.error("Error: " + xhr.responseText);
                            }
                        });
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Load arrears names when arrears tab is clicked
                $('#arrears-tab').on('click', function() {
                    loadArrearsNames();
                });

                // Also load on page init if the tab is active
                if ($('#arrears').hasClass('active show')) {
                    loadArrearsNames();
                }

                function loadArrearsNames() {
                    $.ajax({
                        url: "{{ route('income-tax.arrears-name.get-active') }}",
                        type: "GET",
                        success: function(response) {
                            if (response.success) {
                                let nameSelect = $('#name');
                                nameSelect.empty().append('<option value="">Select Name</option>');

                                $.each(response.data, function(index, item) {
                                    nameSelect.append(
                                        `<option value="${item.name}">${item.name}</option>`);
                                });
                            } else {
                                toastr.error("Error loading arrears names");
                            }
                        },
                        error: function() {
                            toastr.error("Failed to load arrears names");
                        }
                    });
                }
            });
        </script>
    @endpush
