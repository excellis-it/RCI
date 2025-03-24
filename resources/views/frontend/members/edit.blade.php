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
                            <hr />
                            <div class="edit-mem-tab">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="credits-tab" data-bs-toggle="tab"
                                            data-bs-target="#credits-tab-pane" type="button" role="tab"
                                            aria-controls="credits-tab-pane" aria-selected="true">Credits</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link debit-recv" id="debits-tab" data-bs-toggle="tab"
                                            data-bs-target="#debits-tab-pane" type="button" role="tab"
                                            aria-controls="debits-tab-pane" aria-selected="false">Debits</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link debit-recv" id="recovery-tab" data-bs-toggle="tab"
                                            data-bs-target="#recovery-tab-pane" type="button" role="tab"
                                            aria-controls="recovery-tab-pane" aria-selected="false">Recoveries</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="core-tab" data-bs-toggle="tab"
                                            data-bs-target="#core-tab-pane" type="button" role="tab"
                                            aria-controls="core-tab-pane" aria-selected="false">Core Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="policy-tab" data-bs-toggle="tab"
                                            data-bs-target="#policy-tab-pane" type="button" role="tab"
                                            aria-controls="policy-tab-pane" aria-selected="false">Policy Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="loan-tab" data-bs-toggle="tab"
                                            data-bs-target="#loan-tab-pane" type="button" role="tab"
                                            aria-controls="loan-tab-pane" aria-selected="false">Loan Info</button>
                                    </li>
                                    {{-- <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="var-tab" data-bs-toggle="tab"
                                            data-bs-target="#var-tab-pane" type="button" role="tab"
                                            aria-controls="var-tab-pane" aria-selected="false">Var.Info</button>
                                    </li> --}}

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="var-tab" data-bs-toggle="tab"
                                            data-bs-target="#var-tab-pane" type="button" role="tab"
                                            aria-controls="var-tab-pane" aria-selected="false">Var.Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pers-tab" data-bs-toggle="tab"
                                            data-bs-target="#pers-tab-pane" type="button" role="tab"
                                            aria-controls="pers-tab-pane" aria-selected="false">Pers Info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="exp-tab" data-bs-toggle="tab"
                                            data-bs-target="#exp-tab-pane" type="button" role="tab"
                                            aria-controls="exp-tab-pane" aria-selected="false">Exceptions</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    {{-- credit --}}
                                    <div class="tab-pane fade show active" id="credits-tab-pane" role="tabpanel"
                                        aria-labelledby="credits-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.credit-form')
                                        </div>
                                    </div>
                                    {{-- credit end --}}

                                    {{-- debit --}}
                                    <div class="tab-pane fade" id="debits-tab-pane" role="tabpanel"
                                        aria-labelledby="debits-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.debit-form')

                                        </div>
                                    </div>
                                    {{-- debit end --}}

                                    {{-- var info  --}}
                                    <div class="tab-pane fade" id="var-tab-pane" role="tabpanel"
                                        aria-labelledby="var-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.recovery-form')

                                        </div>
                                    </div>
                                    {{-- var info end --}}

                                    {{-- core --}}
                                    <div class="tab-pane fade" id="core-tab-pane" role="tabpanel"
                                        aria-labelledby="core-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.core-form')

                                        </div>
                                    </div>
                                    {{-- core end --}}

                                    {{-- policy --}}
                                    <div class="tab-pane fade" id="policy-tab-pane" role="tabpanel"
                                        aria-labelledby="policy-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="recov-table">
                                                        <table class="table customize-table mb-0 align-middle bg_tbody"
                                                            id="policy-table">
                                                            <thead class="text-white fs-4 bg_blue">
                                                                <tr>
                                                                    <th>Policy </th>
                                                                    <th>Policy No.</th>
                                                                    <th>Amount</th>
                                                                    <th>Stop Rec</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tbody_height_scroll" id="policy-data">
                                                                {{-- <tr>
                                                                    <td>ABC</td>
                                                                    <td>1234567890</td>
                                                                    <td>1500000</td>
                                                                    <td>Stop Rec</td>
                                                                </tr> --}}
                                                                @include('frontend.members.policy-info.table')
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12" id="policy-form">
                                                @include('frontend.members.policy-info.form')

                                            </div>
                                        </div>
                                    </div>
                                    {{-- policy end --}}

                                    {{-- loan --}}
                                    <div class="tab-pane fade" id="loan-tab-pane" role="tabpanel"
                                        aria-labelledby="loan-tab" tabindex="0">
                                        <div class="credit-frm">

                                            <div class="row mb-3">
                                                <div class="col-md-7">
                                                    <div class="recov-table">
                                                        <table class="table customize-table mb-0 align-middle bg_tbody"
                                                            id="loan-table">
                                                            <thead class="text-white fs-4 bg_blue">
                                                                <tr>
                                                                    <th>Loan Name</th>
                                                                    <th>Loan Amount</th>
                                                                    {{-- <th>Interest Rate</th>
                                                                    <th>Interest Amount</th> --}}
                                                                    <th>Inst Amount</th>
                                                                    <th>Start Date</th>
                                                                    <th>Remarks</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tbody_height_scroll">
                                                                @include('frontend.members.loan.table')
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-5" id="loan-form">
                                                    @include('frontend.members.loan.form')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- loan end --}}


                                    {{-- recovery --}}
                                    <div class="tab-pane fade" id="recovery-tab-pane" role="tabpanel"
                                        aria-labelledby="recovery-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.recovery-original-form')
                                        </div>
                                    </div>

                                    {{-- personal info --}}
                                    <div class="tab-pane fade" id="pers-tab-pane" role="tabpanel"
                                        aria-labelledby="pers-tab" tabindex="0">
                                        <div class="credit-frm">
                                            @include('frontend.members.personal-form')
                                        </div>
                                    </div>
                                    {{-- personal info end --}}

                                    {{-- expectation  --}}
                                    <div class="tab-pane fade" id="exp-tab-pane" role="tabpanel"
                                        aria-labelledby="exp-tab" tabindex="0">
                                        <div class="credit-frm">
                                            <div class="row mb-3">
                                                <div class="col-md-7">
                                                    <div class="recov-table">
                                                        <table class="table customize-table mb-0 align-middle bg_tbody"
                                                            id="expectation-table">
                                                            <thead class="text-white fs-4 bg_blue">
                                                                <tr>
                                                                    <th>Rule</th>
                                                                    <th>Percent</th>
                                                                    <th>Amount</th>
                                                                    <th>Remarks</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="tbody_height_scroll" id="fetch-exp-table">
                                                                @include('frontend.members.expectation.table')
                                                                {{-- <tr>
                                                                        <td>MESS</td>
                                                                        <td>0</td>
                                                                        <td>0</td>
                                                                        <td>05/12/2023</td>
                                                                        <td></td>
                                                                    </tr> --}}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-5" id="expectation-form">
                                                    @include('frontend.members.expectation.form')

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- expectation end --}}
                                </div>
                            </div>

                        </div>






                        <div class="row mt-4">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="gross_pay">Gross Pay</label>
                                    <input type="number" class="form-control" id="total_gross_pay" name="gross_pay"
                                        value="0" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="total_debits">Total Debits</label>
                                    <input type="number" class="form-control" id="total_debits" name="total_debits"
                                        value="0" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="net_pay">Net Pay</label>
                                    <input type="number" class="form-control" id="total_net_pay" name="net_pay"
                                        value="0" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="total_recovery">Total Recovery</label>
                                    <input type="number" class="form-control" id="total_recovery" name="total_recovery"
                                        value="0" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="take_home">Take Home</label>
                                    <input type="number" class="form-control" id="take_home" name="take_home"
                                        value="0" readonly>
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
    <script src="{{ asset('web_assets/js/jquery.validate.min.js') }}"></script>



    <script>
        $(document).ready(function() {
            // Save the active tab to sessionStorage before reloading
            $('.nav-link').on('click', function() {
                var activeTabId = $(this).attr('id'); // Get the ID of the clicked tab-pane
                sessionStorage.setItem('activeTabEditMember', activeTabId);
                //   alert(activeTabId);
            });

            // Restore the active tab after the page reloads
            const activeTabId = sessionStorage.getItem('activeTabEditMember');
            if (activeTabId) {
                const activeTab = $('#' + activeTabId); // Use jQuery to select the tab-pane by ID
                if (activeTab.length) {
                    new bootstrap.Tab(activeTab).show(); // Bootstrap 5 Tab method
                }
            }
        });
    </script>


    {{-- credit script --}}
    <script>
        $(document).ready(function() {
            $('#member-credit-form').validate({ // Initialize form validation
                rules: {
                    // Define rules for your form fields
                    'pay': {
                        required: true
                    }
                },
                messages: {
                    // Define messages for your form fields
                    'pay': {
                        required: "Please enter pay",
                    }

                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();

                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        success: function(response) {

                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 100);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            const fields = [
                "#basic-pay",
                "#da_percentage",
                "#hra",
                "#tpt",
                "#da_on_tpt",
                "#s_pay",
                "#spl_incentive",
                "#incentive",
                "#dis_alw",
                "#var_amount",
                "#arrs_pay_allowance",
                "#risk_alw",
                "#misc_1",
                "#misc_2",
                "#var_incr",
                "#cr_rent",
                "#g_pay",
                "#cr_elec",
                "#fpa",
                "#hindi",
                "#npa",
                "#deptn_alw",
                "#wash_alw",
                "#pua",
            ];

            function updateDAPercentage(basicPay, memberID) {
                $.ajax({
                    url: "{{ route('members.credit.da-percentage') }}",
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        basicPay: basicPay,
                        memberID: memberID
                    },
                    success: function(response) {
                        $('#da_percentage').val(response.daAmount);
                        $('#hra').val(response.hraAmount);
                        $('#tpt').val(response.tptAmount);
                        $('#da_on_tpt').val(response.tptDa);

                        // total amount calculation
                        let total = 0;
                        fields.forEach(field => {
                            const value = $(field).val();
                            total += Number(value) || 0;
                        });
                        total = total.toFixed(2);

                        $('#tot_credits').val(total);
                        var gross_pay = $('#tot_credits').val();

                        getALlTotal();

                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            }

            // Trigger the AJAX request when the page loads
            var basicPay = $('#basic-pay').val();
            updateDAPercentage(basicPay, "{{ $member->id }}");

            // Event listener for changes in the fields
            fields.forEach(field => {
                $(field).on("keyup", function() {
                    var basicPay = $('#basic-pay').val();
                    updateDAPercentage(basicPay, "{{ $member->id }}");
                });
            });

            getALlTotal();
        });
    </script>

    {{-- credit script end --}}

    {{-- debit script --}}
    <script>
        $(document).ready(function() {
            $('#member-debit-form').validate({ // Initialize form validation
                rules: {
                    // Define rules for your form fields
                    'pay': {
                        required: true
                    }
                },
                messages: {
                    // Define messages for your form fields
                    'pay': {
                        required: "Please enter pay",
                    }

                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 200);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>
    {{-- debit script end --}}

    {{-- recovery script --}}
    <script>
        $(document).ready(function() {
            $('#member-recovery-form').validate({ // Initialize form validation
                rules: {
                    // Define rules for your form fields
                    'v_incr': {
                        required: true
                    },
                    'noi': {
                        required: true
                    },
                    'total': {
                        required: true
                    }
                    //      'stop': {
                    //          required: true
                    //      }
                },
                messages: {
                    // Define messages for your form fields
                    'v_incr': {
                        required: "Please enter VIncr",
                    },
                    'noi': {
                        required: "Please enter NOI",
                    },
                    'total': {
                        required: "Please enter Total",
                    }
                    //      'stop': {
                    //          required: "Please enter Stop",
                    //      }
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {


                            $('#delete-recovery').attr('data-id', response.data.id);

                            // Update the data-route of #delete-recovery
                            // var deleteUrl = '/members/recovery-delete/' + response.data
                            //     .id; // Update this URL based on your route structure
                            // $('#delete-recovery').attr('href', deleteUrl);
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 200);


                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#delete-recovery', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                if (id !== '#') {
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                    deleteRecovery(id);
                } else {
                    console.log('Invalid ID');

                }
            });
        });

        function deleteRecovery(id) {
            // load
            var id = id;
            var route = "{{ route('members.recovery-delete', ['id' => ':id']) }}";
            route = route.replace(':id', id);

            $.ajax({
                url: route,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    toastr.success(response.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 200);
                    // remove value from form
                    $('#v_incr').val('');
                    $('#noi').val('');
                    $('#total').val('');
                    $('#stop').val('');
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                    // Optionally, remove the deleted item from the UI
                },
                error: function(xhr) {
                    // Handle errors
                    console.log(xhr);
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            var var_info = $('#v_incr').val();
            var noi = $('#noi').val();

            if (var_info != '' && noi != '') {
                var total = var_info * noi;
                $('#total').val(total);
            }
        });
    </script>
    {{-- recovery script end --}}

    {{-- core script --}}
    <script>
        $(document).ready(function() {
            $('#member-core-form').validate({ // Initialize form validation
                //  rules: {
                //      // Define rules for your form fields
                //      'v_incr': {
                //          required: true
                //      }
                //  },
                //  messages: {
                //      // Define messages for your form fields
                //      'v_incr': {
                //          required: "Please enter VIncr",
                //      }
                //  },
                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 200);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>
    {{-- core script end --}}

    {{-- personal script --}}
    <script>
        $(document).ready(function() {
            $('#member-personal-form').validate({
                //  rules: {
                //      // Define rules for your form fields
                //      'v_incr': {
                //          required: true
                //      }
                //  },
                //  messages: {
                //      // Define messages for your form fields
                //      'v_incr': {
                //          required: "Please enter VIncr",
                //      }
                //  },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 200);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>
    {{-- personal script end --}}

    {{-- loan script --}}
    <script>
        $(document).ready(function() {
            $('#member-loan-info-form').validate({
                rules: {
                    // Define rules for your form fields
                    'loan_name': {
                        required: true
                    },
                    'present_inst_no': {
                        required: true
                    },
                    'inst_amount': {
                        required: true,
                        number: true
                    },
                    'tot_no_of_inst': {
                        required: true,
                        number: true
                    },
                    'total_amount': {
                        required: true,
                        number: true
                    },

                },
                messages: {
                    // Define messages for your form fields
                    'loan_name': {
                        required: "Please enter loan name",
                    },
                    'present_inst_no': {
                        required: "Please enter present installment no",
                    },
                    'inst_amount': {
                        required: "Please enter installment amount",
                    },
                    'tot_no_of_inst': {
                        required: "Please enter total number of installment",
                    },

                    'total_amount': {
                        required: "Please enter total amount",
                        number: "Please enter valid number"
                    }
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Extract form data
                            var data = response.data;
                            var id = data.id;
                            // var route = '/members-policy-info-edit/' + data.id;
                            var route =
                                "{{ route('members.loan.edit', ['id' => ':id']) }}";
                            route = route.replace(':id', id);

                            // var route = '/members-loan-edit/' + data.id;
                            // Construct table row HTML
                            var newRow = '<tr class="edit-route-loan"  data-id="' + id +
                                '" data-route="' + route +
                                '">';
                            newRow += '<td>' + data.loan_name +
                                '</td>'; // Use loanName directly if it's a string, adjust accordingly
                            newRow += '<td>' + (data.present_inst_no ? data
                                .present_inst_no : 'N/A') + '</td>';
                            newRow += '<td>' + data.total_amount + '</td>';
                            newRow += '<td>' + new Date(data.created_at).toLocaleDateString(
                                'en-GB', {
                                    day: '2-digit',
                                    month: '2-digit',
                                    year: 'numeric'
                                }).split('/').join('-'); + '</td>';
                            newRow += '<td>' + (data.remark ? data.remark : 'N/A') +
                                '</td>';
                            newRow += '</tr>';

                            // Append new row to table
                            $('#loan-table tbody').append(newRow);

                            // Show success message if needed
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 200);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-route-loan', function() {
                var route = $(this).data('route');
                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#loan-form').html(response.view);
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        $('#offcanvasEdit').offcanvas('show');
                    },
                    error: function(xhr) {
                        // Handle errors
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        console.log(xhr);
                    }
                });
            });

            // Handle the form submission
            $(document).on('submit', '#member-edit-loan-form', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        // respobnse data replcae by id
                        var data = response.data;
                        var save = response.save;
                        console.log(save);
                        if (save == true) {
                            console.log(save);
                            var id = data.id;
                            var route =
                                "{{ route('members.loan.edit', ['id' => ':id']) }}";
                            route = route.replace(':id', id);

                            //construct table row html
                            var newRow = '<tr class="edit-route-loan" data-id="' +
                                id + '" data-route="' + route +
                                '">';
                            newRow += '<td>' + (data.loan_name ? data.loan_name : 'N/A') +
                                '</td>'; // Use loanName directly if it's a string, adjust accordingly
                            newRow += '<td>' + (data.inst_rate ? data.inst_rate : 'N/A') +
                                '</td>';
                            newRow += '<td>' + (data.total_amount ? data.total_amount : 'N/A') +
                                '</td>';
                            newRow += '<td>' + new Date(data.created_at).toLocaleDateString(
                                'en-GB', {
                                    day: '2-digit',
                                    month: '2-digit',
                                    year: 'numeric'
                                }).split('/').join('-'); + '</td>';
                            newRow += '<td>' + (data.remark ? data.remark : 'N/A') +
                                '</td>';
                            newRow += '</tr>';


                            // Append new row to table
                            $('#loan-table tbody').append(newRow);
                        } else {

                            var data = response.data;
                            var row = $('#loan-table tbody').find('tr[data-id="' + data.id +
                                '"]');
                            row.find('td:eq(0)').text(data.loan_name);
                            row.find('td:eq(1)').text(data.inst_rate);
                            row.find('td:eq(2)').text(data.total_amount);
                            row.find('td:eq(3)').text(new Date(data.created_at).getDate() +
                                '-' + (new Date(data.created_at).getMonth() + 1) + '-' +
                                new Date(data.created_at).getFullYear().toString().substr(-
                                    2));
                            row.find('td:eq(4)').text(data.remark);
                        }

                        toastr.success(response.message);
                        setTimeout(() => {
                            window.location.reload();
                        }, 200);

                    },
                    error: function(xhr) {
                        // Handle errors (e.g., display validation errors)
                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('[name="' + key + '"]').next('.text-danger').html(
                                value[0]);
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#loan-delete', function(e) {
                e.preventDefault();

                var id = $(this).data('id');


                if (id !== '#') {
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                    deleteLoan(id);
                } else {
                    console.log('Invalid ID');
                }
            });
        });

        function deleteLoan(id) {
            // load

            var id = id;
            var route = "{{ route('members.loan.delete', ['id' => ':id']) }}";
            route = route.replace(':id', id);

            $.ajax({
                url: route,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    toastr.success(response.message);

                    $('.edit-route-loan[data-id="' + id + '"]').remove();
                    $('#loan_name').val('');
                    $('#present_inst_no').val('');
                    $('#tot_no_of_inst').val('');
                    $('#remark').val('');
                    $('#inst_amount').val('');
                    $('#inst_rate').val('');
                    $('#total_amount').val('');
                    $('#balance').val('');
                    $('#member_loan_id').val('');
                    $('#penal_inst_rate').val('');
                    $('#start_date').val('');
                    $('#end_date').val('');
                    // edit-route-policy tr remove

                    $('#loan-delete').hide();
                    $('#exp-btn-update').text('Save');
                    // remove value from form
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                    // Optionally, remove the deleted item from the UI
                    setTimeout(() => {
                        window.location.reload();
                    }, 200);
                },
                error: function(xhr) {
                    // Handle errors
                    console.log(xhr);
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                }
            });
        }
    </script>
    {{-- loan script end --}}

    {{-- policy script --}}
    <script>
        $(document).ready(function() {
            $('#member-create-policy-form').validate({ // Initialize form validation
                rules: {
                    // Define rules for your form fields
                    'policy_name': {
                        required: true
                    },
                    'policy_no': {
                        required: true
                    },
                    'amount': {
                        required: true,
                        number: true
                    },

                },
                messages: {
                    // Define messages for your form fields
                    'policy_name': {
                        required: "Please enter policy name",
                    },
                    'policy_no': {
                        required: "Please enter policy no",
                    },
                    'amount': {
                        required: "Please enter amount",
                        number: "Please enter valid number"
                    }
                },

                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {

                            //extract from data
                            toastr.success(response.message);
                            var data = response.data;
                            var id = data.id;
                            // var route = '/members-policy-info-edit/' + data.id;
                            var route =
                                "{{ route('members.policy-info.edit', ['id' => ':id']) }}";
                            route = route.replace(':id', id);

                            //construct table row html
                            var newRow = '<tr class="edit-route-policy"  data-id="' + data
                                .id + '" data-route="' + route +
                                '">';
                            newRow += '<td>' + (data.policy_name ? data.policy_name :
                                    'N/A') +
                                '</td>'; // Use loanName directly if it's a string, adjust accordingly
                            newRow += '<td>' + (data.policy_no ? data.policy_no : 'N/A') +
                                '</td>';
                            newRow += '<td>' + (data.amount ? data.amount : 'N/A') +
                                '</td>';
                            newRow += '<td>' + (data.rec_stop ? data.rec_stop : 'N/A') +
                                '</td>';
                            newRow += '</tr>';

                            $('#policy-table tbody').append(newRow);
                            $('#no-policy').hide();
                            $('#policy_name').val('');
                            $('#policy_no').val('');
                            $('#amount').val('');
                            $('#rec_stop').val('');
                            // Append new row to table
                            setTimeout(() => {
                                window.location.reload();
                            }, 200);

                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-route-policy', function() {
                var route = $(this).data('route');

                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#policy-form').html(response.view);
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        $('#offcanvasEdit').offcanvas('show');
                    },
                    error: function(xhr) {
                        // Handle errors
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        console.log(xhr);
                    }
                });
            });

            // Handle the form submission
            $(document).on('submit', '#member-edit-policy-form', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        // response data replcae by id
                        toastr.success(response.message);
                        $('#policy-delete').attr('data-id', response.data.id);

                        var data = response.data;
                        var save = response.save;
                        console.log(save);
                        if (save == true) {
                            console.log(save);
                            var id = data.id;
                            // var route = '/members-policy-info-edit/' + data.id;
                            var route =
                                "{{ route('members.policy-info.edit', ['id' => ':id']) }}";
                            route = route.replace(':id', id);

                            //construct table row html
                            var newRow = '<tr class="edit-route-policy"  data-id="' + data
                                .id + '" data-route="' + route +
                                '">';
                            newRow += '<td>' + (data.policy_name ? data.policy_name :
                                    'N/A') +
                                '</td>'; // Use loanName directly if it's a string, adjust accordingly
                            newRow += '<td>' + (data.policy_no ? data.policy_no : 'N/A') +
                                '</td>';
                            newRow += '<td>' + (data.amount ? data.amount : 'N/A') +
                                '</td>';
                            newRow += '<td>' + (data.rec_stop ? data.rec_stop : 'N/A') +
                                '</td>';
                            newRow += '</tr>';

                            $('#policy-table tbody').append(newRow);
                            $('#no-policy').hide();

                            setTimeout(() => {
                                window.location.reload();
                            }, 200);

                        } else {
                            var id = data.id;
                            var row = $('#policy-table tbody').find('tr[data-id="' + id + '"]');
                            row.find('td:eq(0)').text(data.policy_name);
                            row.find('td:eq(1)').text(data.policy_no);
                            row.find('td:eq(2)').text(data.amount);
                            row.find('td:eq(3)').text(data.rec_stop);
                        }

                    },
                    error: function(xhr) {
                        // Handle errors (e.g., display validation errors)
                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('[name="' + key + '"]').next('.text-danger').html(
                                value[0]);
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#policy-delete', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                if (id !== '#') {

                    deletePolicy(id);
                } else {
                    console.log('Invalid ID');
                }
            });
        });

        function deletePolicy(id) {
            $('#loading').addClass('loading');
            $('#loading-content').addClass('loading-content');

            var id = id;
            var route = "{{ route('members.policy-info.delete', ['id' => ':id']) }}";
            route = route.replace(':id', id);

            $.ajax({
                url: route,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    toastr.success(response.message);

                    $('#policy_name').val('');
                    $('#policy_no').val('');
                    $('#amount').val('');
                    $('#rec_stop').val('');
                    $('#member_policy_id').val('');
                    // edit-route-policy tr remove
                    $('.edit-route-policy[data-id="' + id + '"]').remove();
                    $('#policy-delete').hide();
                    $('#policy-update').text('Save');

                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                    // Optionally, remove the deleted item from the UI
                    setTimeout(() => {
                        window.location.reload();
                    }, 200);
                },
                error: function(xhr) {
                    // Handle errors
                    console.log(xhr);
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                }
            });
        }
    </script>
    {{-- policy script end --}}

    {{-- expectation script --}}
    <script>
        $(document).ready(function() {
            $('#member-expectation-form').validate({ // Initialize form validation
                rules: {
                    // Define rules for your form fields
                    'rule_name': {
                        required: true
                    },
                    'percent': {
                        required: true,
                        number: true
                    },
                    'amount': {
                        required: true,
                        number: true
                    },

                },
                messages: {
                    // Define messages for your form fields
                    'rule_name': {
                        required: "Please enter rule name",
                    },
                    'percent': {
                        required: "Please enter percent",
                        number: "Please enter valid number"
                    },
                    'amount': {
                        required: "Please enter amount",
                        number: "Please enter valid number"
                    }
                },

                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            //extract from data
                            toastr.success(response.message);
                            var data = response.data;
                            var id = data.id;
                            var route =
                                "{{ route('members.expectation.edit', ['id' => ':id']) }}";
                            route = route.replace(':id', id);

                            //construct table row html
                            var newRow = '<tr class="edit-route-expectation" data-id="' +
                                id + '" data-route="' + route +
                                '">';
                            newRow += '<td>' + (data.rule_name ? data.rule_name : 'N/A') +
                                '</td>'; // Use loanName directly if it's a string, adjust accordingly
                            newRow += '<td>' + (data.percent ? data.percent : 'N/A') +
                                '</td>';
                            newRow += '<td>' + (data.amount ? data.amount : 'N/A') +
                                '</td>';
                            newRow += '<td>' + (data.remark ? data.remark : 'N/A') +
                                '</td>';
                            newRow += '</tr>';

                            $('#no-expectation').remove();
                            // Append new row to table
                            $('#expectation-table tbody').append(newRow);
                            setTimeout(() => {
                                window.location.reload();
                            }, 200);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // $('.exp_rule_create').change(function() {
            //     var rule_data = $(this).val();
            //     var rule_id = rule_data.split(',')[1].trim();

            //     $.ajax({
            //         url: "{{ route('members.expectation.get-rule-detail') }}",
            //         type: 'POST',
            //         data: {
            //             rule_id: rule_id
            //         },
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         success: function(response) {
            //             $('#exp_percent').val(response.data.percent);
            //             $('#exp_amount').val(response.data.amount);
            //             $('#exp_year').val(response.data.year);
            //             $('#exp_month').val(response.data.month);
            //         }
            //     });
            // });


        });
    </script>

    <script>
        $(document).ready(function() {
            $('#exp_rule_edit').change(function() {
              //  alert();

            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-route-expectation', function() {
                var route = $(this).data('route');


                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#expectation-form').html(response.view);
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        $('#offcanvasEdit').offcanvas('show');
                    },
                    error: function(xhr) {
                        // Handle errors
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        console.log(xhr);
                    }
                });
            });

            // Handle the form submission
            $(document).on('submit', '#member-edit-expectation-form', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {

                        toastr.success(response.message);

                        var data = response.data;
                        var save = response.save;

                        console.log(save);
                        if (save == true) {
                            console.log(save);
                            var id = data.id;
                            var route =
                                "{{ route('members.expectation.edit', ['id' => ':id']) }}";
                            route = route.replace(':id', id);

                            //construct table row html
                            var newRow = '<tr class="edit-route-expectation" data-id="' +
                                id + '" data-route="' + route +
                                '">';
                            newRow += '<td>' + (data.rule_name ? data.rule_name : 'N/A') +
                                '</td>'; // Use loanName directly if it's a string, adjust accordingly
                            newRow += '<td>' + (data.percent ? data.percent : 'N/A') +
                                '</td>';
                            newRow += '<td>' + (data.amount ? data.amount : 'N/A') +
                                '</td>';
                            newRow += '<td>' + (data.remark ? data.remark : 'N/A') +
                                '</td>';
                            newRow += '</tr>';

                            $('#no-expectation').remove();
                            // Append new row to table
                            $('#expectation-table tbody').append(newRow);

                        } else {


                            var id = data.id;
                            var row = $('#expectation-table tbody').find('tr[data-id="' + id +
                                '"]');
                            row.find('td:eq(0)').text(data.rule_name);
                            row.find('td:eq(1)').text(data.percent);
                            row.find('td:eq(2)').text(data.amount);
                            row.find('td:eq(3)').text(data.remark);

                        }

                        setTimeout(() => {
                            window.location.reload();
                        }, 800);

                    },
                    error: function(xhr) {
                        // Handle errors (e.g., display validation errors)
                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('[name="' + key + '"]').next('.text-danger').html(
                                value[0]);
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#expectation-delete', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                if (id !== '#') {

                    deleteExpectation(id);
                } else {
                    console.log('Invalid ID');
                }
            });
        });

        function deleteExpectation(id) {

            $('#loading').addClass('loading');
            $('#loading-content').addClass('loading-content');

            var id = id;
            var route = "{{ route('members.expectation-delete', ['id' => ':id']) }}";
            route = route.replace(':id', id);


            $.ajax({
                url: route,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    toastr.success(response.message);
                    $('.edit-route-expectation[data-id="' + id + '"]').remove();

                    $('#exp_rule_name').val('');
                    $('#exp_percent').val('');
                    $('#exp_amount').val('');
                    $('#exp_year').val('');
                    $('#exp_month').val('');
                    $('#exp_remark').val('');
                    $('#member_edit_exp_id').val('');


                    $('#expectation-delete').hide();
                    $('#button-update').text('Save');


                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                    // Optionally, remove the deleted item from the UI
                    setTimeout(() => {
                        window.location.reload();
                    }, 200);
                },
                error: function(xhr) {
                    // Handle errors
                    console.log(xhr);
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');


                }
            });
        }
    </script>
    {{-- expectation script end --}}

    {{-- original recovery script --}}
    <script>
        $(document).ready(function() {
            $('#member-original-recovery-form').validate({ // Initialize form validation
                //  rules: {
                //      // Define rules for your form fields
                //      'v_incr': {
                //          required: true
                //      }
                //  },
                //  messages: {
                //      // Define messages for your form fields
                //      'v_incr': {
                //          required: "Please enter VIncr",
                //      }
                //  },
                submitHandler: function(form) {
                    var formData = $(form).serialize();


                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 200);
                        },
                        error: function(xhr) {
                            $('.text-danger').html('');
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('[name="' + key + '"]').next('.text-danger').html(
                                    value[0]);
                            });
                        }
                    });
                }
            });
        });
    </script>
    {{-- original recovery script end --}}

    {{-- <script>
        $(document).ready(function() {
            $('#i_tax').change(function() {
                var i_tax = $(this).val();

                $.ajax({
                    url: "{{ route('members.debit.get-edu-cess') }}",
                    type: 'POST',
                    data: {
                        i_tax: i_tax
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        $('#ecess').val(response.edu_cal);
                    }
                });
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            const fields = [
                "#gpa_sub",
                "#gpa_adv",
                "#gpf_arr",
                "#cgegis",
                "#cghs",
                "#hba",
                "#hba_interest",
                "#car",
                "#car_interest",
                "#scooter",
                "#scooter_interest",
                "#comp_adv",
                "#comp_int",
                "#fadv",
                "#ltc",
                "#medi",
                "#tada",
                "#leave_rec",
                "#pension_rec",
                "#i_tax",
                "#ecess",
                "#pli",
                "#misc1",
                "#misc2",
                "#quarter_charge",
                "#cghs",
                "#cgeis_arr",
                "#penal_interest",
                "#nps_sub",
                "#nps_rec",
                "#nps_arr",
                "#eol",
                "#ccl",
                "#rent",
                "#lf_arr",
                "#elec",
                "#elec_arr",
                "#pc",
                "#water_arr",
                "#water",
                "#arrear_pay",
                "#npsg",
                "#npsg_arr",
                "#npsg_adj",
                "#ltc_rec",
                "#medical_rec",
                "#tada_rec",
                "#misc3",
                "#cda",
                "#furn",
                "#furn_arr",
                "#hra_rec",
                "#cmg",
                "#tpt_rec",
                "#cghs_arr",
                "#society",

            ];

            var tot_credits = parseInt($('#tot_credits').val()) || 0;


            function updateTotalDebit() {
                let total = 0;
                fields.forEach(field => {
                    // Check if the field exists in the DOM
                    if ($(field).length) {
                        const value = $(field).val();
                        // If the value is empty, null, undefined or NaN, use 0
                        total += (value && !isNaN(parseFloat(value))) ? parseFloat(value) : 0;
                    } else {
                        // Field doesn't exist, add 0
                        total += 0;
                    }
                });

                $('#tot_debits').val((total).toFixed(2));



                const netPay = Math.max(tot_credits - total, 0);
                $('#net_pay').val(netPay.toFixed(2));
                getALlTotal();
            }
            // Trigger the AJAX request when the page loads
            updateTotalDebit();

            // Event listener for changes in the fields
            fields.forEach(field => {
                $(field).on("keyup", function() {
                    updateTotalDebit();
                });
            });

            getALlTotal();
        });
    </script>



    {{-- call ajax  to check if credit is not add in current month debit tab will open with toaster message --}}
    <script>
        $(document).ready(function() {
            $("#debit-update").prop('disabled', false);
            $('#recovry-update').prop('disabled', false);

            $('.debit-recv').click(function() {
                var memberID = "{{ $member->id }}";
                $.ajax({
                    url: "{{ route('members.check-credit-available') }}",
                    type: 'POST',
                    data: {
                        memberID: memberID
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 'error') {
                            toastr.error(response.message);

                            //disable debit-button
                            //    $("#debit-update").prop('disabled', true);
                            //    $('#recovry-update').prop('disabled', true);
                        } else {
                            $("#debit-update").prop('disabled', false);
                            $('#recovry-update').prop('disabled', false);
                        }
                    }
                });
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            function updateEolHpl() {
                var memberID = "{{ $member->id }}";
                $.ajax({
                    url: "{{ route('members.eol-hpl') }}",
                    type: 'POST',
                    data: {
                        memberID: memberID
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        $('#eol').val(response.total_deduction);
                        $('#ccl').val(response.ccldeduction);
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            }

            // Trigger the AJAX request when the page loads
            updateEolHpl();
        });
    </script>


    <script>
        //get ifsc code from bank id
        $(document).ready(function() {
            $('#bank').change(function() {
                var bank_id = $(this).val();

                $.ajax({
                    url: "{{ route('members.core-info.get-ifsc') }}",
                    type: 'POST',
                    data: {
                        bank_id: bank_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#ifsc').val(response.ifsc.ifsc);
                    }
                });
            });
        });
    </script>
    <script>
        // if type i_tax then ecess will be 4% of i_tax

        $(document).ready(function() {
            $('.itax_core').on('keyup', function() {
                // alert('hi');
                var i_tax = $(this).val();
                var ecess = i_tax * 0.04;
                $('.ecess_core').val(ecess);
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            // Array of all input fields that should be included in the calculation
            const inputFields = [
                'ccs_sub',
                'mess',
                'security',
                'misc7',
                'ccs_rec',
                'asso_fee',
                'dbf',
                'misc8',
                'wel_sub',
                'ben',
                'med_ins',
                'wel_rec',
                'hdfc',
                'maf',
                'final_pay',
                'lic',
                'cort_atch',
                'ogpf',
                'ntp',
                'ptax'
            ];

            // Function to calculate the total
            function calculateOrgRecoTotal() {
                let total = 0;

                inputFields.forEach(fieldId => {
                    const field = $('#' + fieldId);
                    if (field.length && field.val().trim() !== '') {
                        const value = parseFloat(field.val()) || 0;
                        total += value;
                    }
                });

                // Update the tot_rec field with the calculated total
                const totRecField = $('#tot_rec');
                if (totRecField.length) {
                    totRecField.val(total.toFixed(2));
                }
                getALlTotal();
            }

            // Add event listeners to all input fields
            inputFields.forEach(fieldId => {
                if (fieldId !== 'tot_rec') { // Don't add listener to the total field
                    const field = $('#' + fieldId);
                    if (field.length) {
                        field.on('input', calculateOrgRecoTotal);
                    }
                }
            });

            // Calculate total on page load
            calculateOrgRecoTotal();
            getALlTotal();


        });
    </script>

    <script>
        //
        function calculateLoanTotal() {
            let total = 0;
            // Check if loan_inst_amounts elements exist
            if ($('.loan_inst_amounts').length > 0) {
                $('.loan_inst_amounts').each(function() {
                    let value = parseFloat($(this).val()) || 0; // Get value and convert to float
                    total += value; // Add to total
                });
                console.log("Total Loan Amounts: " + total);
            } else {
                console.log("No loan installment amounts found");
            }
            // Check if the target element exists before setting value
            if ($('#total_loan_inst_amount').length > 0) {
                $('#total_loan_inst_amount').val(total.toFixed(2)); // Set total in any input field
            }
            return total; // Return the total for use in other functions
        }
        // get updated allTotals
        function getALlTotal() {
            var total_loan_amounts = $('#total_loan_inst_amount').length ? (parseFloat($('#total_loan_inst_amount')
                .val()) || 0) : 0;
            var total_credits = $('#tot_credits').val();
            var total_debits = parseFloat($('#tot_debits').val()) + parseFloat(total_loan_amounts);

            var total_net_pay = total_credits - total_debits;
            var total_recovery = $('#tot_rec').val();
            var take_home = total_net_pay - total_recovery;
            // set values
            $("#total_gross_pay").val(total_credits);
            $('#total_debits').val(total_debits);
            $('#total_net_pay').val(total_net_pay.toFixed(2));
            $('#total_recovery').val(total_recovery);
            $('#take_home').val(take_home.toFixed(2));
        }
        $(document).ready(function() {

            calculateLoanTotal();
            getALlTotal();
        });
    </script>
@endpush
