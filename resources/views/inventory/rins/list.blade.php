@extends('inventory.layouts.master')
@section('title')
    RIN List
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
                    <h3>RIN Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">RIN Listing</span></li>
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
                            @include('inventory.rins.form')
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
                                                <th>SL No.</th>
                                                <th>Rin No.</th>
                                                <th>Rin Date</th>
                                                {{-- <th class="sorting" data-sorting_type="desc" data-column_name="item_id"
                                                style="cursor: pointer"> Item Code <span id="item_id_icon"></span> </th>
                                            <th>Received Quantity</th>
                                            <th>Accepted Quantity</th>
                                            <th>Rejected Quantity</th>
                                            <th class="sorting" data-sorting_type="desc" data-column_name="nc_status"
                                                style="cursor: pointer">C/NC/NCF <span id="nc_status_icon"></span> </th>
                                            <th>A/U</th> --}}

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('inventory.rins.table')
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

    <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true"
        style="top: 60px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSupplierModalLabel">Add Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-supplier-form">
                        <div class="form-group mb-3">
                            <label for="supplier-name">Name</label>
                            <input type="text" class="form-control" id="supplier-name" name="name">
                            <span class="text-danger" id="error-name"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="supplier-phone">Phone</label>
                            <input type="text" class="form-control" id="supplier-phone" name="phone">
                            <span class="text-danger" id="error-phone"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="supplier-email">Email</label>
                            <input type="email" class="form-control" id="supplier-email" name="email">
                            <span class="text-danger" id="error-email"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="supplier-address">Address</label>
                            <textarea class="form-control" id="supplier-address" name="address"></textarea>
                            <span class="text-danger" id="error-address"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSupplyOrderModal" tabindex="-1" aria-labelledby="addSupplyOrderModalLabel"
        aria-hidden="true" style="top: 60px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSupplyOrderModalLabel">Add Supply Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-supply-order-form">
                        <div class="form-group mb-3">
                            <label for="supply-order-number">Order Number</label>
                            <input type="text" class="form-control" id="supply-order-number" name="order_number">
                            <span class="text-danger" id="error-order-number"></span>
                        </div>


                        <div class="form-group mb-3">
                            <label for="supply-order-number">Date</label>
                            <input type="date" class="form-control" id="supply-order-date" name="date"
                                value="{{ date('Y-m-d') }}">
                            <span class="text-danger" id="error-order-number"></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addSIRModal" tabindex="-1" aria-labelledby="addSIRModalLabel" aria-hidden="true"
        style="top: 60px;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSupplyOrderModalLabel">Add SIR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="getSirFromDiv">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '#delete', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this Inventory Type",
                    type: "warning",
                    confirmButtonText: "Yes",
                    showCancelButton: true
                })
                .then((result) => {
                    if (result.value) {
                        window.location = $(this).data('route');
                    } else if (result.dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            'Your stay here :)',
                            'error'
                        )
                    }
                })
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
                            $('#vendor_id').append(
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

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('rins.fetch-data') }}",
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
            $('#rins-create-form').submit(function(e) {
                e.preventDefault();

                var $row = $(this).closest('.new_html');
                calculateTotalCost($row);

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        // Reload the page with a success message
                        toastr.success('RIN successfully created!');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // Clear any previous errors
                        $('.text-danger').html('');

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            var errors = xhr.responseJSON.errors;

                            $.each(errors, function(key, value) {
                                // Handle nested field errors like `field_name.*`
                                var fieldName = key.replace(/\.\d+/, '[]');
                                var errorField = $('[name="' + fieldName + '"]');

                                if (errorField.length) {
                                    errorField.closest('.form-group').find(
                                        '.text-danger').html(value[0]);
                                }
                            });
                        } else {
                            toastr.error('An unexpected error occurred.');
                        }
                    }
                });
            });
            $(document).on('click', '.add-more-rin', function() {
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
                                <input type="text" class="form-control item_id" name="item_id[]" placeholder="">
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
                                <input type="text" value="0" class="form-control rcv_quantity" name="received_quantity[]">
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
                                <input type="text" value="0.00" class="form-control units_cost" name="unit_cost[]" placeholder="">
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
                                <input type="text" value="0.00" class="form-control total_cost" name="total_cost[]"  placeholder="">
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
                                <input type="text" value="0.00" class="form-control disc_percent" name="disc_percent[]" id="disc_percent" placeholder="">
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
                                <input type="text" value="0.00" class="form-control gst_amount" name="gst_amount[]" placeholder="">
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
                                <input type="text" value="0.00" class="form-control total_amount" name="total_amount[]" placeholder="" readonly>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Round Figure Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control round_amount" name="round_amount[]"
                                id="round_amount">
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
                                <select class="form-select" name="nc_status[]">
                                    <option value="">Select NC Status</option>
                                     @if (count($nc_statuses) > 0)
                                            @foreach ($nc_statuses as $nc_status)
                                                <option value="{{ $nc_status['status'] }}">{{ $nc_status['status'] }}
                                                </option>
                                            @endforeach
                                        @endif
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>UOM</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="uom[]">
                                    <option value="">Select UOM</option>
                                    @foreach ($uoms as $uom)
                                        <option value="{{ $uom->id }}">{{ $uom->name }}</option>
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
                                <select class="form-select" name="au_status[]">
                                    <option value="">Select A/U Status</option>
                                      @if (count($au_statuses) > 0)
                                        @foreach ($au_statuses as $au_status)
                                            <option value="{{ $au_status['status'] }}">{{ $au_status['status'] }}
                                            </option>
                                        @endforeach
                                        @endif
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Damage Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="damage_status[]" id="damage_status">
                                    <option value="">Select Damage Status</option>
                                    <option value="1" >Damaged
                                    </option>
                                    <option value="0" >Not Damaged
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
                            <i class="fas fa-minus-circle"></i>
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
            $(document).on('submit', '#rins-edit-form', function(e) {
                e.preventDefault();

                var $row = $(this).closest('.new_html');
                calculateTotalCost($row);

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
        $(document).ready(function() {
            // Handle item code change event dynamically
            $(document).on('change', '.item_id', function() {
                var item_code_id = $(this).val();
                var $this = $(this); // Reference to the selected item

                // Get the row containing this item
                var $row = $this.closest('.count-class');

                $.ajax({
                    url: "{{ route('rins.get-item-description') }}",
                    type: 'POST',
                    data: {
                        id: item_code_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Update the description in the same row
                        $row.find('.description').val(response.description);
                        // $row.find('.units_cost').val(response.price);
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            });

            // Handle "Add More" functionality
            $(document).on('click', '.add-more', function() {
                // Clone the first row of fields
                var $clone = $('#rins_new_html .new_html').first().clone();
                $clone.find('input, select').val(''); // Clear input fields in the cloned row
                $clone.appendTo('#rins_new_html').show(); // Append the new row to the form and display it
            });
        });
    </script>


    {{-- <script>
        $('#gst').change(function() {
            var gst = parseFloat($(this).val()); // Get the GST value
            var total_unit_cost = parseFloat($('#total_cost').val()); // Get the total cost

            if (!isNaN(gst) && !isNaN(total_unit_cost)) {
                // Calculate the total amount
                var gst_amount = (total_unit_cost * gst / 100);
                var total_amount = total_unit_cost + (total_unit_cost * gst / 100);

                // Display the total amount (you can choose your target element)
                $('#total_amount').val(total_amount.toFixed(2));
                $('#gst_amount').val(gst_amount.toFixed(2));
            }
        });
    </script> --}}
    {{-- <script>
        $(document).ready(function() {
            // Function to update difference
            function updateDifference() {
                var received = parseInt($('#received_quantity').val());
                var accepted = parseInt($('#accepted_quantity').val());
                var difference = received - accepted;
                $('#rejected_quantity').val(difference);
            }

            // Bind change event to input fields
            $('#received_quantity, #accepted_quantity').keyup(updateDifference);

        });
    </script> --}}

    <script>
        // add new row
        // $(document).ready(function() {
        //     $(document).on('click', '.add-more-rin', function() {
        //         var tr = $('#rins_new_html').html();
        //         $('#credit_form_add_new_row').append(tr);

        //         if ($('#voucher_date_1').val() != '') {
        //             $('.voucher-date').each(function() {
        //                 $(this).val($('#voucher_date_1').val());
        //             });
        //         }

        //         if ($('#rin1').val() != '') {
        //             $('.rin').each(function() {
        //                 $(this).val($('#rin1').val());
        //             });
        //         }
        //         return false;
        //     });

        //     $(document).on('click', '.trash', function() {
        //         $(this).closest('.new_html').remove();
        //         return false;
        //     });
        // });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit_rin_add', function() {
                var tr = $('#rins_edit_html').html();
                $('#credit_form_edit_new_row').append(tr);

                if ($('#voucher_date_1').val() != '') {
                    $('.voucher-date').each(function() {
                        $(this).val($('#voucher_date_1').val());
                    });
                }

                if ($('#rin1').val() != '') {
                    $('.rin').each(function() {
                        $(this).val($('#rin1').val());
                    });
                }
                return false;
            });

            $(document).on('click', '.trash', function() {
                $(this).closest('.new_html').remove();
                return false;
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.del-rin', function() {
                var rowCount = $('.row-item-rin').length;
                if (rowCount > 1) {
                    $(this).closest('.row-item-rin').remove();
                } else {
                    alert("At least one row must remain.");
                }
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            function getTotalCost() {
                var received = parseInt($('#received_quantity').val()) || 0;
                var unit_cost = parseInt($('#unit_cost').val()) || 0;
                var totalCost = received * unit_cost;
                $('#total_cost').val(totalCost);
            }
            $('#received_quantity').keyup(getTotalCost);

        });
    </script> --}}
    <script>
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
            discount = parseFloat(discount) || 0;
            $row.find('.discount_amount').val(discount.toFixed(2));
            // Calculate GST on the discounted amount
            var gstAmount = (discountedCost * gstPercent / 100).toFixed(2);
            $row.find('.gst_amount').val(gstAmount);

            // Calculate total amount after GST
            var totalAmount = (discountedCost + parseFloat(gstAmount)).toFixed(2);
            $row.find('.total_amount').val(totalAmount);

            // Round the total amount to 2 decimal places
            var roundedTotalAmount = (Math.round(totalAmount * 10) / 10).toFixed(2);
            $row.find('.round_amount').val(roundedTotalAmount);
        }

        $(document).ready(function() {
            // Event listener for changes in received quantity, unit cost, discount, or GST percentage
            $(document).on('input', '.rcv_quantity, .units_cost, .disc_percent, .gst_percent, .discount_type',
                function() {
                    var $row = $(this).closest('.new_html');
                    calculateTotalCost($row);
                    let roundSettle = $row.find(".round_settle_amount");
                    roundSettle.trigger('keyup');
                });
        });
    </script>


    <script>
        $(document).ready(function() {
            $(document).on('change', '#item_id', function() {
                var item_code_id = $(this).val();
                $.ajax({
                    url: "{{ route('rins.get-item-description') }}",
                    type: 'POST',
                    data: {
                        id: item_code_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#description').val(response.description);
                        $('#unit_cost').val(response.price);
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
            // Event listener for SIR dropdown change
            $(document).on('change', 'select[name="sir_no"]', function() {
                let sirId = $(this).val();

                if (sirId) {
                    $.ajax({
                        url: '{{ route('rins.get-sir-details') }}', // Update to match your POST route
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr(
                                'content'), // Include CSRF token
                            sir_id: sirId
                        },
                        success: function(data) {
                            // Populate fields with the returned data

                            // Check if 'sir_date' is set and assign value
                            $('#sir_date').val(data.sirDetails.sir_date || '');

                            // Check if 'inventory_number' exists and use number or ID
                            $('#inventory_code').val(data.sirDetails.inventory_number?.number ||
                                '');
                            $('#inventory_no').val(data.sirDetails.inventory_number?.id || '');

                            // Check if group_name or division exists and concatenate them
                            let groupName = data.sirDetails.inventory_number?.group?.value ||
                                '';
                            let division = data.sirDetails.inventory_number?.division || '';
                            $('#group_name').val(groupName + (groupName && division ? ' / ' :
                                '') + division);

                            // Check if project exists
                            $('#project_number').val(data.sirDetails.inventory_number?.project
                                ?.project_code || '');

                            // Handle conditional readonly attribute for demand_date, demand_no, invoice_no, invoice_date
                            if (data.sirDetails.demand_date) {
                                $('#demand_date').val(data.sirDetails.demand_date || '');
                            } else {
                                $('#demand_date').val('');
                                $('#demand_date').removeAttr("readonly");
                            }

                            if (data.sirDetails.demand_no) {
                                $('#demand_no').val(data.sirDetails.demand_no || '');
                            } else {
                                $('#demand_no').val('');
                                $('#demand_no').removeAttr("readonly");
                            }

                            if (data.sirDetails.invoice_no) {
                                $('#invoice_no').val(data.sirDetails.invoice_no || '');
                            } else {
                                $('#invoice_no').val('');
                                $('#invoice_no').removeAttr("readonly");
                            }

                            if (data.sirDetails.invoice_date) {
                                $('#invoice_date').val(data.sirDetails.invoice_date || '');
                            } else {
                                $('#invoice_date').val('');
                                $('#invoice_date').removeAttr("readonly");
                            }

                            // Check if supplier exists and update fields, else provide select option
                            if (data.sirDetails.supplier?.id) {
                                $('#supply_order_field').html(`
                                <div class="col-md-12 d-flex justify-content-between">
                                    <label>Supplier Detail</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control supplier" name="supplier" readonly
                                    id="supplier" placeholder="">
                                <input type="hidden" class="form-control vendor_id" name="vendor_id" id="vendor_id"
                                    placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            `);
                                $('#supplier').val(data.sirDetails.supplier?.name || '');
                                $('#vendor_id').val(data.sirDetails.supplier?.id || '');
                            } else {
                                $('#supply_order_field').html(`
                                <div class="col-md-12 d-flex justify-content-between">
                                    <label>Supplier Detail</label>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-select" name="vendor_id" id="vendor_id">
                                        <option value="">Select Supplier</option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">
                                                {{ $vendor->name }} ({{ $vendor->phone }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger"></span>
                                </div>
                            `);
                            }

                            if (data.sirDetails.supply_order?.id) {
                                $('#supply_order_number_field').html(`
                                <div class="col-md-12 d-flex justify-content-between">
                                    <label>Supply Order No</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control supplier_order_number"
                                    name="supplier_order_number" readonly id="supplier_order_number" placeholder="">
                                <input type="hidden" class="form-control supply_order_no" name="supply_order_no"
                                    id="supply_order_no" placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            `);
                                $('#supplier_order_number').val(data.sirDetails.supply_order
                                    ?.order_number || '');
                                $('#supply_order_no').val(data.sirDetails.supply_order?.id ||
                                    '');
                            } else {
                                $('#supply_order_number_field').html(`
                               <div class="col-md-12 d-flex justify-content-between">
                                <label>Supply Order No</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="supply_order_no" id="supply_order_no">
                                    <option value="">Select Supply Order No</option>
                                    @foreach ($supply_orders as $supply_order)
                                        <option value="{{ $supply_order->id }}">
                                            {{ $supply_order->order_number }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                            `);
                            }

                            if (data.sirDetails.inspection_authority?.id) {
                                $('#inspection_authority_field').html(`
                                <div class="col-md-12 d-flex justify-content-between">
                                    <label>Inspection Authority</label>
                                </div>
                                <div class="col-md-12">
                                   <input type="text" class="form-control inspection_authority_name"
                                    name="inspection_authority_name" readonly id="inspection_authority_name"
                                    placeholder="">
                                <input type="hidden" class="form-control authority_id" name="authority_id"
                                    id="authority_id" placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            `);
                                $('#inspection_authority_name').val(
                                    (data.sirDetails.inspection_authority?.first_name ||
                                        '') + ' ' + (
                                        data.sirDetails
                                        .inspection_authority?.last_name || '')
                                );
                                $('#authority_id').val(data.sirDetails.inspection_authority
                                    ?.id || '');
                            } else {
                                $('#inspection_authority_field').html(`
                               <div class="col-md-12">
                                <label>Inspection Authority</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="authority_id" id="authority_id">
                                    <option value="">Select Inspection Authority</option>
                                    @foreach ($authorities as $authority)
                                        <option value="{{ $authority->id }}" >
                                            {{ $authority->user_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                            `);
                            }
                            $("#store_received_date").val(data.sirDetails.store_received_date);

                            // Check if inspection authority exists and update fields

                            $('#authority_designation').val(data.sirDetails.inspection_authority
                                ?.designation || '').change();
                            $('#credit_form_add_new_row').html(data.view);
                        },
                        error: function(xhr) {
                            alert('Failed to fetch SIR details.');
                            console.error(xhr);
                        }
                    });
                } else {
                    // Clear fields if no SIR is selected
                    $('#sir_date, #inventory_code, #inventory_no, #contract_authority, #invoice_no, #invoice_date, #supplier, #vendor_id, #supplier_order_number, #supply_order_no, #inspection_authority_name, #authority_id')
                        .val('');
                    $('#authority_designation').val('').change();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#add-sir-btn', function() {
                $('#addSIRModal').modal('show');
                $.ajax({
                    type: "post",
                    url: "{{ route('rins.get-sir-form') }}",
                    data: {
                        getForm: 1
                    },
                    dataType: "text",
                    success: function(response) {
                        $("#getSirFromDiv").html(response);
                    }
                });
            });


            $(document).on('submit', '#add-sir-form', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'), // Update to your route
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#sir_no').append(
                                `<option value="${response.sirData.id}">${response.sirData.sir_no}</option>`
                            );
                            $('#addSIRModal').modal('hide');
                            $('#add-sir-form')[0].reset();
                            toastr.success('SIR added successfully');
                        }
                    },
                    error: function(response) {
                        let errors = response.responseJSON.errors;
                        // Clear all previous errors
                        $('#add-sir-form .text-danger').text('');

                        // Loop through the errors and display them
                        for (const [key, messages] of Object.entries(errors)) {
                            let errorSpan = $(`#add-sir-form [name="${key}"]`).siblings(
                                '.text-danger');
                            if (errorSpan.length) {
                                errorSpan.text(messages[
                                    0]); // Show the first error message for the field
                            }
                        }
                    }
                });
            });


        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on("change", ".round_off", function() {
                //$row
                let roundOff = $(this).val();
                //  console.log(roundOff);
                let parent = $(this).closest(".new_html");
                let totalAmount = parseFloat(parent.find(".total_amount").val()) || 0.0;
                //  console.log(totalAmount);
                let roundSettle = parent.find(".round_settle_amount");
                let roundFigure = parent.find(".round_amount");

                if (roundOff == 1 || roundOff == 2) {
                    parent.find(".round_settle_amount").closest(".form-group").show();
                    parent.find(".round_amount").closest(".form-group").show();
                    if (roundOff == 1) {
                        parent.find("#round_off_to_selectd_id").text("Round Off Amount");
                    } else if (roundOff == 2) {
                        parent.find("#round_off_to_selectd_id").text("Round To Amount");
                    }
                } else {
                    parent.find(".round_settle_amount").closest(".form-group").hide();
                    roundSettle.val("");
                    roundFigure.val(totalAmount.toFixed(2));
                }
                roundSettle.trigger('keyup'); // Trigger keyup event to recalculate
            });

            $(document).on("keyup", ".round_settle_amount", function() {
                let parent = $(this).closest(".new_html");
                let roundOff = parent.find(".round_off").val();

                let totalAmount = parseFloat(parent.find(".total_amount").val()) || 0.0;
                let settleAmount = parseFloat($(this).val()) || 0.0;
                let roundFigure = parent.find(".round_amount");
                console.log(totalAmount);

                if (roundOff == 1) { // Round Off
                    roundFigure.val((totalAmount - settleAmount).toFixed(2));
                } else if (roundOff == 2) { // Round To
                    roundFigure.val((totalAmount + settleAmount).toFixed(2));
                }
            });
        });

        function roundAmountCalc() {

        }
    </script>
@endpush
