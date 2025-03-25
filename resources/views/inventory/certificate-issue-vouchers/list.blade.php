@extends('inventory.layouts.master')
@section('title')
    Certificate Issue Voucher List
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
                    <h3>Certificate Issue Voucher Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Certificate Issue Voucher Listing</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="d-flex justify-content-end mb-3">
            <!-- Modal trigger button -->
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalId">
                Import CSV
            </button>

            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">


                    <div class="modal-content">
                        <form action="" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">
                                    Import CSV Data
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div>
                                    <p>Download CSV Format : <a href=""
                                            class="btn btn-primary btn-sm">file_name.csv</a></p>

                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Upload CSV File</label>
                                    <input type="file" class="form-control" name="csv_file" id=""
                                        aria-describedby="helpId" placeholder="" />
                                    <small id="helpId" class="form-text text-muted"></small>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger me-3" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-primary" disabled>Import</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            @include('inventory.certificate-issue-vouchers.form')
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
                                                <th class="sorting" data-sorting_type="desc" data-column_name="item_code"
                                                    style="cursor: pointer">Voucher No <span id="item_code_icon"></span>
                                                </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="item_code"
                                                    style="cursor: pointer">Voucher Date <span id="item_code_icon"></span>
                                                </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="inv_no"
                                                    style="cursor: pointer">Inv No <span id="inv_no_icon"></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="name"
                                                    style="cursor: pointer">Inv Holder Name <span id="name_icon"></span>
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('inventory.certificate-issue-vouchers.table')
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                    <input type="hidden" name="hidden_column_name" id="hidden_column_name"
                                        value="id" />
                                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type"
                                        value="desc" />
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

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('certificate-issue-vouchers.fetch-data') }}",
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
            $('#certificate-issue-vouchers-create-form').submit(function(e) {
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
            $(document).on('submit', '#certificate-issue-vouchers-edit-form', function(e) {
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
        // $(document).on('change', '#item_id', function() {
        //     var item_id = $('#item_id').val();
        //     $.ajax({
        //         url: "{{ route('certificate-issue-vouchers.get-item-type') }}",
        //         type: 'GET',
        //         data: {
        //             item_id: item_id
        //         },
        //         success: function(response) {
        //             $('#item_type').val(response.item_type);
        //             $('#description').val(response.item_description);
        //             $('#item_price').val(response.item_price);
        //         },
        //         error: function(xhr) {
        //             console.log(xhr);
        //         }
        //     });
        // });
    </script>

    <script>
        $(document).ready(function() {
            // $('#item_id').change(function() {
            //     var selectedValue = $(this).find(':selected');
            //     var quantity = selectedValue.data('hidden-value');
            //     // var quantityDiv = $('#quantity');

            //     var quantityDivSelectBox = [];
            //     quantityDivSelectBox.push('<option value="">Select Quantity</option>');
            //     for (var i = 1; i <= quantity; i++) {
            //         quantityDivSelectBox.push('<option value="' + i + '">' + i + '</option>');
            //     }

            //     $('#quantity').empty();
            //     $('#quantity').append(quantityDivSelectBox.join(''));

            // });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.print-route').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('reports.certificate-issue-voucher') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    xhrFields: {
                        responseType: 'blob' // Important for handling binary data
                    },
                    success: function(blob) {
                        // alert('Success');
                        var url = window.URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = 'Certified-issue-voucher' + id + '.pdf';
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                    },
                    error: function(xhr, status, error) {
                        console.error('There was an error with your request:', error);
                    }
                });
            });
        });
    </script>

    <script>
        // $(document).ready(function() {
        //     // $('#quantity').change(function() {
        //     //     var quantity = $(this).val();
        //     //     var item_unit_price = $('#item_price').val() ?? 0;
        //     //     var total_price = quantity * item_unit_price;
        //     //     $('#total_price').val(total_price);
        //     // });
        // });
    </script>

    <script>
        var select_box_element = document.querySelector('.search-select-box');
        dselect(select_box_element, {
            search: true
        });
    </script>

    <script>
        // inventory no to get inventory holder name ajax
        $(document).ready(function() {
            $('#inv_no').change(function() {
                var inventory_no = $(this).val();
                // $.ajax({
                //     url: "{{ route('certificate-issue-vouchers.get-inventory-holder') }}",
                //     type: 'POST',
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     data: {
                //         inventory_no: inventory_no
                //     },

                //     success: function(response) {
                //         $('#inventory_holder').val(response.inventoryHolder.member.user_name);
                //     },
                //     error: function(xhr) {
                //         console.log(xhr);
                //     }
                // });
                var holdername = $(this).find(':selected').data('holder-name');
                $('.inventory_holder').val(holdername);
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
                        $row.find('.item_price').val(response.price);

                        var selectedOption = $this.find('option:selected');
                        var quantity = selectedOption.data('hidden-value');
                        var quantityOptions = [];
                        quantityOptions.push('<option value="">Select Quantity</option>');
                        for (var i = 1; i <= quantity; i++) {
                            quantityOptions.push('<option value="' + i + '">' + i +
                                '</option>');
                        }
                        $row.find('.quantity').empty().append(quantityOptions.join(''));

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

    <script>
        // quantity change event
        // $(document).ready(function() {
        //     $(document).on('change', '.quantity', function() {
        //         var quantity = $(this).val();
        //         var item_price = $(this).closest('.count-class').find('.item_price').val();
        //         var total_price = quantity * item_price;
        //         $(this).closest('.count-class').find('.total_price').val(total_price);
        //     });
        // });
    </script>

    <script>
        $(document).ready(function() {
            // Track selected items to prevent duplicate selection
            let selectedItems = [];

            // Fetch items when inventory number changes
            $(document).on('change', '#inv_no', function() {
                const invNo = $(this).val();
                if (invNo) {
                    // Clear previous selections when inventory changes
                    selectedItems = [];

                    $.ajax({
                        url: "{{ route('certificate-issue-vouchers.get-items-by-inv-no') }}",
                        type: 'POST',
                        data: {
                            inv_no: invNo,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Clear all item dropdowns
                            $('.item_code_id').empty().append(
                                '<option value="">Select</option>');

                            if (response.invStocks && response.invStocks.length > 0) {
                                $.each(response.invStocks, function(index, item) {
                                    var invstockString = JSON.stringify(item);
                                    const optionHtml = `<option value="${item.item_id}"
                                        data-hidden-value="${item.quantity_balance}"
                                        data-description="${item.item_code.description || ''}"
                                        data-price="${item.unit_price || 0.00}"
                                        data-stockdata='${invstockString}'
                                        >
                                        ${item.item_code?.code || 'Unknown'} (${item.quantity_balance})
                                    </option>`;

                                    // Append to all item dropdowns
                                    $('.item_code_id').append(optionHtml);
                                });
                            }

                            // Store inventory items for future use
                            window.inventoryItems = response.invStocks;
                        },
                        error: function(xhr) {
                            console.log(xhr);
                        }
                    });
                } else {
                    // Clear all dropdowns when no inventory is selected
                    $('.item_code_id').empty().append('<option value="">Select</option>');
                    window.inventoryItems = [];
                }
            });

            // Function to update a specific dropdown based on currently selected items
            function updateDropdown($dropdown) {
                const currentValue = $dropdown.val();

                // Store original options
                if (!$dropdown.data('original-options') && window.inventoryItems) {
                    const originalOptions = '<option value="">Select</option>' +
                        window.inventoryItems.map(item => {
                            const invstockString = JSON.stringify(item);
                            return `<option value="${item.item_id}"
                                data-hidden-value="${item.quantity_balance}"
                                data-description="${item.item_code.description || ''}"
                                data-price="${item.unit_price || 0.00}"
                                data-stockdata='${invstockString}'>
                                ${item.item_code?.code || 'Unknown'} (${item.quantity_balance})
                            </option>`;
                        }).join('');

                    $dropdown.data('original-options', originalOptions);
                }

                // Reset dropdown to original state
                if ($dropdown.data('original-options')) {
                    $dropdown.html($dropdown.data('original-options'));
                }

                // Disable already selected items
                selectedItems.forEach(function(itemId) {
                    if (itemId !== currentValue) {
                        $dropdown.find(`option[value="${itemId}"]`).prop('disabled', true);
                    }
                });

                // Restore previously selected value if it exists
                if (currentValue && $dropdown.find(`option[value="${currentValue}"]`).length) {
                    $dropdown.val(currentValue);
                }
            }

            // When an item is selected in any dropdown
            $(document).on('change', '.item_code_id', function() {
                const $this = $(this);
                const itemId = $this.val();
                const previousValue = $this.data('previous-value');

                var thisData = $(this).find('option:selected').data('stockdata');
                if (thisData) {
                    console.log(thisData); // Access the ID from the data
                }

                // Remove the previous value from selectedItems if it exists
                if (previousValue) {
                    const index = selectedItems.indexOf(previousValue);
                    if (index > -1) {
                        selectedItems.splice(index, 1);
                    }
                }

                // Add the new value to selectedItems if it's not empty
                if (itemId) {
                    selectedItems.push(itemId);
                    $this.data('previous-value', itemId);
                }

                // Update all other dropdowns to reflect the new selection state
                $('.item_code_id').each(function() {
                    updateDropdown($(this));
                });

                // Get item details
                if (!itemId) return;

                // Get the row containing this item
                var $row = $this.closest('.count-class');
                var parentElement = $(this).closest('.count-class');
                if (!$row.length) {
                    // For the first row which might not have .count-class
                    $row = $this.closest('.row');
                }

                // Find selected option
                var $selectedOption = $this.find('option:selected');
                var description = $selectedOption.data('description') || '';
                var price = $selectedOption.data('price') || 0;
                var quantity = $selectedOption.data('hidden-value') || 0;

                // Update fields in this row
                $row.find('.description').val(description);
                $row.find('.item_price').val(price);

                // Build quantity dropdown
                var $quantitySelect = $row.find('.quantity');
                $quantitySelect.empty().append('<option value="">Select Quantity</option>');
                for (var i = 1; i <= quantity; i++) {
                    $quantitySelect.append('<option value="' + i + '">' + i + '</option>');
                }


                calculateTotalPrice(parentElement, thisData);

                // Add input event for quantity changes
                parentElement.find('.quantity').on('input', function() {
                    var max = parseFloat($(this).attr('max'));
                    var value = parseFloat($(this).val());

                    if (value > max) {
                        $(this).val(max);
                    }

                    // Recalculate total price when quantity changes
                    calculateTotalPrice(parentElement, thisData);

                });


                parentElement.find('.item_price').on('input', function() {

                    calculateTotalPrice(parentElement, thisData);

                });


            });

            // Modify add-more-civ click handler to respect selected items
            $(document).on('click', '.add-more-civ', function() {
                var tr = $('#civ_new_html').html();
                $('#credit_form_add_new_row').append(tr);

                // Set date and other fields for the new row if they exist in the first row
                if ($('#voucher_date').val() != '') {
                    $('.voucher-date').each(function() {
                        $(this).val($('#voucher_date').val());
                    });
                }

                // Update the new dropdown to exclude already selected items
                const $newDropdown = $('.item_code_id').last();
                updateDropdown($newDropdown);

                return false;
            });

            // When removing a row, update the selectedItems array
            $(document).on('click', '.trash', function() {
                const $row = $(this).closest('.new_html');
                const itemId = $row.find('.item_code_id').val();

                // Remove this item ID from the selectedItems array
                if (itemId) {
                    const index = selectedItems.indexOf(itemId);
                    if (index > -1) {
                        selectedItems.splice(index, 1);
                    }
                }

                $row.remove();

                // Update all dropdowns after removal to make the item available again
                $('.item_code_id').each(function() {
                    updateDropdown($(this));
                });

                return false;
            });

            // quantity change event - update calculated price
            // $(document).on('change', '.quantity', function() {
            //     var quantity = $(this).val();
            //     var $row = $(this).closest('.count-class');
            //     if (!$row.length) {
            //         // For the first row which might not have .count-class
            //         $row = $(this).closest('.row');
            //     }

            //     var item_price = $row.find('.item_price').val() || 0;
            //     var total_price = quantity * item_price;
            //     $row.find('.total_price').val(total_price.toFixed(2));
            // });
        });
    </script>
    <script>
        function calculateTotalPrice(parentElement, itemData) {
            var gstPercent = parseFloat(itemData.gst_percent) || 0;
            var discountPercent = parseFloat(itemData.discount_percent) || 0;
            var itemRateInput = parentElement.find('.item_price');
            var itemRate = parseFloat(itemRateInput.val()) || 0;
          //  var itemRate = parseFloat(itemData.unit_price) || 0;
            var quantity = parseFloat(parentElement.find('.quantity').val()) || 0;

            parentElement.find('.item_gst_percent').text(gstPercent);
            parentElement.find('.item_discount_percent').text(discountPercent);

            // Calculate subtotal
            var subtotal = itemRate * quantity;

            // Apply discount first
            var discountAmount = subtotal * (discountPercent / 100);
            var afterDiscount = subtotal - discountAmount;

            // Then apply GST on the discounted amount
            var gstAmount = afterDiscount * (gstPercent / 100);
            var totalPrice = afterDiscount + gstAmount;

            // Round to 2 decimal places for currency
            totalPrice = parseFloat(totalPrice.toFixed(2));

            parentElement.find('.total_price').val(totalPrice);

            console.log('totalPrice: ', totalPrice);
        }
    </script>
@endpush
