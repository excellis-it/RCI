@extends('inventory.layouts.master')
@section('title')
    SIR List
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
                    <h3>STORES INWARD REGISTER (SIR) Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">STORES INWARD REGISTER (SIR) Listing</span></li>
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
                            @include('inventory.sirs.form')
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
                                                <th>Sl no</th>
                                                <th>SIR No.</th>
                                                <th>SIR Date</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('inventory.sirs.table')
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
                    url: "{{ route('sir.fetch-data') }}",
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
            $('#sir-create-form').submit(function(e) {
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
            $(document).on('submit', '#sir-edit-form', function(e) {
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
        // $(document).ready(function(){

        //     function updateEditDifference() {
        //         alert('test');
        //         var received = parseInt($('#edit_received_quantity').val());
        //         var accepted = parseInt($('#edit_accepted_quantity').val());
        //         var difference = received - accepted;
        //         $('#edit_rejected_quantity').val(difference);
        //     }

        //     // $('#edit_received_quantity, #edit_accepted_quantity').on('keyup', updateEditDifference);
        // });
        $(document).ready(function() {
            $(document).on('keyup', '#edit_received_quantity, #edit_accepted_quantity', function() {
                console.log('Keyup event fired');
                // Your updateEditDifference() function logic here
                var received = parseInt($('#edit_received_quantity').val());
                var accepted = parseInt($('#edit_accepted_quantity').val());
                var difference = received - accepted;
                $('#edit_rejected_quantity').val(difference);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Open modal on button click
            $(document).on('click', '#add-supply-order-btn', function() {
                $('#addSupplyOrderModal').modal('show');
            });

            // Handle form submission
            $(document).on('submit', '#add-supply-order-form', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('supply_orders.model-store') }}", // Update to your route
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#supply_order_no').append(
                                `<option value="${response.supply_order.id}">${response.supply_order.order_number}</option>`
                            );
                            $('#addSupplyOrderModal').modal('hide');
                            $('#add-supply-order-form')[0].reset();
                            toastr.success('Supply order number added successfully');
                        }
                    },
                    error: function(response) {
                        let errors = response.responseJSON.errors;
                        $('#error-order-number').text(errors.order_number ? errors.order_number[
                            0] : '');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Set up CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Open modal on button click
            $(document).on('click', '#add-supplier-btn', function() {
                $('#addSupplierModal').modal('show');
            });

            // Handle form submission
            $(document).on('submit', '#add-supplier-form', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('vendors.model-store') }}", // Adjust this to your store route
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#supplier_id').append(
                                `<option value="${response.vendor.id}">${response.vendor.name} (${response.vendor.phone})</option>`
                            );
                            $('#addSupplierModal').modal('hide');
                            $('#add-supplier-form')[0].reset();
                            toastr.success('Supplier added successfully');
                        }
                    },
                    error: function(response) {
                        let errors = response.responseJSON.errors;
                        $('#error-name').text(errors.name ? errors.name[0] : '');
                        $('#error-phone').text(errors.phone ? errors.phone[0] : '');
                        $('#error-email').text(errors.email ? errors.email[0] : '');
                        $('#error-address').text(errors.address ? errors.address[0] : '');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.add-more-rin').click(function() {
                var newRow = `
           <div class="new_html">
            <hr />
            <div class="col-md-12 count-class">
                <div class="row item-row">
                    <div class="form-group col-md-4 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>Item Code (Demand No.)</label>
                                            </div>
                                            <div class="col-md-12">

                                                <input type="text" name="item_id[]" id="item_id"
                                                    class="form-control item_id">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>


                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Description</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control description" name="description[]" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Received Quantity</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control rcv_quantity" name="received_quantity[]">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Remarks</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="remarks[]" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Unit Cost</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control units_cost" name="unit_cost[]" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>



                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Unit Cost</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control total_cost" name="total_cost[]"  placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                           <div class="col-md-12 d-flex justify-content-between">
                                <label>Discount  <select class="discount_type" name="discount_type[]" id="discount_type">
                                    <option value="percentage">Percentage (%)</option>
                                    <option value="fixed">Fixed Amount</option>
                                </select></label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control disc_percent" name="disc_percent[]" id="disc_percent" placeholder="">
                                  <input type="hidden" class="form-control discount_amount" name="discount_amount[]" id="discount_amount" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>GST</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select gst_percent" name="gst[]">
                                    <option value="">Select GST</option>
                                    @foreach ($gsts as $gst)
                                        <option value="{{ $gst->gst_percent }}">{{ $gst->gst_percent }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>GST Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control gst_amount" name="gst_amount[]" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Total Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control total_amount" name="total_amount[]" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>NC Status</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select nc_status" name="nc_status[]" id="nc_status">

                                            <option value="">Select</option>
                                            @foreach ($nc_statuses as $status)
                                                <option value="{{ $status->status }}">
                                                    {{ $status->status }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 mb-2" hidden>
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>A/U Status</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-select au_status" name="au_status[]" id="au_status">
                                            <option value="">Select</option>
                                            @foreach ($au_statuses as $status)
                                                <option value="{{ $status->status }}">
                                                    {{ $status->status }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="row">
                    <div class="col-md-2 ms-auto">
                        <label>&nbsp;</label>
                        <button type="button" class="listing_add w-100 trash form-control add-more">
                            <i class="fa fa-cross">x</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        `;
                $('#credit_form_add_new_row').append(newRow);
            });

            // Remove dynamically added rows
            $(document).on('click', '.trash', function() {
                $(this).closest('.new_html').remove();
                return false;
            });


            $(document).on('change', '.item_id', function() {
                var item_code_id = $(this).val();
                var $this = $(this); // Reference to the selected item

                // Get the row containing this item
                var $row = $this.closest('.new_html');

                $.ajax({
                    url: "{{ route('sir.get-item-description') }}",
                    type: 'POST',
                    data: {
                        id: item_code_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        // Update the description in the same row
                        $row.find('.description').val(response.description);
                        $row.find('.nc_status').val(response.nc_status);
                        $row.find('.au_status').val(response.au_status);
                        //   $row.find('.units_cost').val(response.price);
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            });


        });
    </script>
    <script>
        $(document).ready(function() {
            function calculateTotalCost($row) {

                document.querySelectorAll('.disc_percent').forEach(input => {
                    input.addEventListener('input', function() {
                        if (parseFloat(this.value) > 100) {
                            this.value = 100;
                        }
                    });
                });

                var received = parseFloat($row.find('.rcv_quantity').val()) || 0;
                var unitCost = parseFloat($row.find('.units_cost').val()) || 0;
                var discPercent = parseFloat($row.find('.disc_percent').val()) || 0;
                var gstPercent = parseFloat($row.find('.gst_percent').val()) || 0;
                var discountType = $row.find('.discount_type').val() || 0; // Get the selected discount type

                var totalCost = unitCost * received;
                $row.find('.total_cost').val(totalCost.toFixed(2));

                var discountedCost = totalCost; // Start with the total cost

                // Apply discount based on discount type
                if (discountType === 'percentage') {
                    discountedCost = totalCost - (totalCost * (discPercent / 100));
                    var discount = (totalCost * (discPercent / 100));
                } else if (discountType === 'fixed') {
                    discountedCost = totalCost - discPercent;
                    var discount = discPercent;
                }
                $row.find('.discount_amount').val(discount.toFixed(2));
                // Calculate GST on the discounted amount
                var gstAmount = (discountedCost * gstPercent / 100).toFixed(2);
                $row.find('.gst_amount').val(gstAmount);

                // Calculate total amount after GST
                var totalAmount = (discountedCost + parseFloat(gstAmount)).toFixed(2);
                $row.find('.total_amount').val(totalAmount);


            }

            // Event listener for changes in received quantity, unit cost, discount, or GST percentage
            $(document).on('input', '.rcv_quantity, .units_cost, .disc_percent, .gst_percent, .discount_type',
                function() {
                    var $row = $(this).closest('.new_html');
                    calculateTotalCost($row);
                });
        });
    </script>
    <script>
        document.querySelectorAll('.disc_percent').forEach(input => {
            input.addEventListener('input', function() {
                if (parseFloat(this.value) > 100) {
                    this.value = 100;
                }
            });
        });
    </script>
@endpush
