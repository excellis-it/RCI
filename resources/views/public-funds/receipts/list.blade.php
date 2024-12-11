@extends('frontend.public-fund.layouts.master')
@section('title')
    Receipts List
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@php
    use App\Helpers\Helper;
@endphp

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3> Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Receipts </span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-start mb-3">
                <h5>Cash In Bank - {{ Helper::bankPayments() }}</h5>
            </div>
            <div class="col-md-6 text-end mb-3">
                <h5> Cash In hand - {{ Helper::cashPayments() }}</h5>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            @include('public-funds.receipts.form')
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-3 mb-2 mt-4">
                                        <div class="position-relative">
                                            <input type="text" class="form-control search_table" value=""
                                                id="search" placeholder="Search">
                                            <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>
                                                <th>ID</th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="receipt_no"
                                                    style="cursor: pointer">Receipt No.<span id="receipt_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="receipt_type"
                                                    style="cursor: pointer">Mode <span id="receipt_type_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="vr_no"
                                                    style="cursor: pointer">Vr No.<span id="vr_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="vr_no"
                                                    style="cursor: pointer">Vr Date.<span id="vr_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="amount"
                                                    style="cursor: pointer">Amount <span id="amount_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('public-funds.receipts.table')
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                    <input type="hidden" name="hidden_column_name" id="hidden_column_name"
                                        value="id" />
                                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('receipts.fetch-data') }}",
                    data: {
                        page: page,
                        sortby: sort_by,
                        sorttype: sort_type,
                        query: query
                    },
                    success: function(data) {
                        $('tbody').html(data.data);
                    }
                });
            }

            $(document).on('keyup', '#search', function() {
                var query = $('#search').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                fetch_data(page, sort_type, column_name, query);
            });

            $(document).on('click', '.sorting', function() {
                var column_name = $(this).data('column_name');
                var order_type = $(this).data('sorting_type');
                var reverse_order = '';
                if (order_type == 'asc') {
                    $(this).data('sorting_type', 'desc');
                    reverse_order = 'desc';
                    // clear_icon();
                    $('#' + column_name + '_icon').html(
                        '<i class="fa fa-arrow-down"></i>');
                }
                if (order_type == 'desc') {
                    // alert(order_type);
                    $(this).data('sorting_type', 'asc');
                    reverse_order = 'asc';
                    // clear_icon();
                    $('#' + column_name + '_icon').html(
                        '<i class="fa fa-arrow-up"></i>');
                }
                $('#hidden_column_name').val(column_name);
                $('#hidden_sort_type').val(reverse_order);
                var page = $('#hidden_page').val();
                var query = $('#search').val();
                fetch_data(page, reverse_order, column_name, query);
            });

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#search').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query);
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#receipts-create-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();


                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {

                        //windows load with toastr message
                        window.location.reload();
                    },
                    error: function(xhr) {

                        // Handle errors (e.g., display validation errors)
                        //clear any old errors
                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Assuming you have a div with class "text-danger" next to each input
                            $('[name="' + key + '"]').next('.text-danger').html(value[
                                0]);
                        });
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-route', function() {
                var route = $(this).data('route');
                $('#loading').addClass('loading');
                $('#loading-content').addClass('loading-content');
                $.ajax({
                    url: route,
                    type: 'GET',
                    success: function(response) {
                        $('#form').html(response.view);
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
            $(document).on('submit', '#public-vendor-edit-form', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // Handle errors (e.g., display validation errors)
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Assuming you have a span with class "text-danger" next to each input
                            $('#' + key + '-error').html(value[0]);
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $('#mode').change(function() {
            if ($(this).val() == 'cheque') {
                $('.cash-form').hide();
                $('.cash-details').hide();
                $('.cheque-sr-no').show();
                $('.cheque-vendor-desig').show();
                $('.cheque-bill-ref').show();
                $('.cheque-bank-acc').show();
                $('.cheque-dv-no').show();
                $('.cheque-chq-no').show();
                $('.cheque-date-no').show();
                $('.cheque-narration').show();
            } else if ($(this).val() == 'cash') {
                $('.cash-form').show();
                $('.cash-details').show();
                $('.cheque-sr-no').hide();
                $('.cheque-vendor-desig').hide();
                $('.cheque-bill-ref').hide();
                $('.cheque-bank-acc').hide();
                $('.cheque-dv-no').hide();
                $('.cheque-chq-no').hide();
                $('.cheque-date-no').hide();
                $('.cheque-narration').hide();
            } else {
                $('.cash-form').hide();
                $('.cash-details').hide();
                $('.cheque-sr-no').hide();
                $('.cheque-vendor-desig').hide();
                $('.cheque-bill-ref').hide();
                $('.cheque-bank-acc').hide();
                $('.cheque-dv-no').hide();
                $('.cheque-chq-no').hide();
                $('.cheque-date-no').hide();
                $('.cheque-narration').hide();
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            $('#vendor_id').change(function() {
                var vendor_id = $(this).val();

                if (vendor_id != '') {
                    $('.cheque-vendor-name').show();
                    $('.cheque-vendor-desig').show();
                    $('.cheque-bank-acc').show();
                }


                // if(vendor_id == 'Other')
                // {
                //     $('.cheque-vendor-desig').show();
                // }else{
                //     $('.cheque-vendor-desig').hide();
                // }
            });
        });
    </script>

<script>
    $(document).ready(function() {
        let sectionIndex = 1;

        // Add new section
        $('#add-section').on('click', function() {
            sectionIndex++;
            let newSection = `
            <div class="dynamic-section row mb-3">
                <div class="col-md-2">
                    <label>Sr No.</label>
                    <input type="text" class="form-control sr-no" name="sr_no[]" readonly value="${sectionIndex}">
                </div>

                <div class="form-group col-md-2 mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <label>Member</label>
                                        </div>
                                        <div class="col-md-12">
                                            <select class="js-example-basic-singleabc form-control vendor_id" name="vendor_id">
                                                <option value="">Select</option>
                                                @foreach($members as $member)
                                                    <option value="{{ $member->id }}">{{ $member->name }} </option>
                                                @endforeach
                                                <option value="Other">Other</option>
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                <div class="form-group col-md-4 mb-2 cheque-vendor-name">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Member Name</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control member_name" name="member_name" id="member_name">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2 cheque-vendor-desig">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Desig.</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control desig" name="desig" id="desig">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 mb-2 cheque-bank-acc">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Bank Acc</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="bank_acc" id="bank_acc">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount[]" placeholder="Enter amount">
                </div>
                <div class="col-md-2">
                    <label>Bill reference</label>
                    <input type="text" class="form-control" name="desig[]" placeholder="Enter designation">
                </div>
                <div class="col-md-2">
                    <label>Cheque No.</label>
                    <input type="text" class="form-control" name="cheq_no[]" placeholder="Enter cheque number">
                </div>
                <div class="col-md-2">
                    <label>Cheque Date</label>
                    <input type="date" class="form-control" name="cheq_date[]">
                </div>
            </div>
            `;
            $('#dynamic-fields').append(newSection);
        });

        // Remove last section only
        $(document).on('click', '.remove-section', function() {
            let sections = $('.dynamic-section');
            if (sections.length > 1) {
                sections.last().remove();
                updateSerialNumbers();
            }
        });

        // Update Sr No
        function updateSerialNumbers() {
            $('.sr-no').each(function(index) {
                $(this).val(index + 1);
            });
        }
    });
</script>



<script>
    $(document).ready(function() {
        $(document).on('change', '.vendor_id', function() {
            var vendor_id = $(this).val();
           // alert(vendor_id);
            var row = $(this).closest('.dynamic-section'); // Target the specific row
            var mode = $('#mode').val(); // If mode is needed, you can handle it dynamically

            if (!isNaN(vendor_id) && vendor_id !== '') {
                // Call AJAX
                $.ajax({
                    url: "{{ route('receipts.get-vendor-desig') }}",
                    type: 'GET',
                    data: {
                        member_id: vendor_id
                    },
                    success: function(response) {
                        // Update fields within the specific row
                        row.find('.member_name').val(response.data.name);
                        row.find('.desig').val(response.data.desig);
                    },
                    error: function(xhr) {
                        // Handle errors
                        console.log(xhr);
                    }
                });
            } else {
                // Clear fields within the specific row
                row.find('.member-name').val('');
                row.find('.desig').val('');
            }
        });
    });
</script>

@endpush
