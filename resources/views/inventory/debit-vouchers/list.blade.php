@extends('inventory.layouts.master')
@section('title')
    Debit Vouchers
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
                    <h3>Debit Vouchers</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Debit Vouchers</span></li>
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
                            @include('inventory.debit-vouchers.form')
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-2 mb-2 mt-4">
                                        <div class="position-relative">
                                            <input type="date" class="form-control search_table ps-3 date-entry"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-lg-3 mb-2 mt-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control search_table" value=""
                                                        id="search" placeholder="Search">
                                                    <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="refresh-btn">
                                                    <a href=""><span><i class="fa fa-refresh"
                                                                aria-hidden="true"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>
                                                <th>ID</th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="voucher_no"
                                                    style="cursor: pointer">Voucher Number<span id="voucher_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="voucher_date"
                                                    style="cursor: pointer">Voucher Date<span id="voucher_date_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    data-column_name="voucher_type" style="cursor: pointer">Voucher
                                                    Type<span id="voucher_type_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-column_name="inv_no" style="cursor: pointer">
                                                    Inv.
                                                    No.<span id="inv_no_icon"></span> </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('inventory.debit-vouchers.table')
                                        </tbody>
                                        {{-- <tbody></tbody> --}}
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
        function updateItemDropdowns() {
            var selectedItems = [];
            $('.item_code_id').each(function() {
                var selectedValue = $(this).val();
                if (selectedValue) {
                    selectedItems.push(selectedValue);
                }
            });

            $('.item_code_id').each(function() {
                var currentDropdown = $(this);
                currentDropdown.find('option').each(function() {
                    var optionValue = $(this).val();
                    if (selectedItems.includes(optionValue) && optionValue !== currentDropdown.val()) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });
            });
        }
        $(document).on('click', '#delete', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this Items!",
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

            function fetch_data(page, sort_type, sort_by, query, date_entry) {
                $.ajax({
                    url: "{{ route('debit-vouchers.fetch-data') }}",
                    data: {
                        page: page,
                        sortby: sort_by,
                        sorttype: sort_type,
                        query: query,
                        date_entry: date_entry
                    },
                    success: function(data) {
                        $('tbody').html(data.data);
                    }
                });
            }

            function getFilters() {
                return {
                    query: $('#search').val(),
                    column_name: $('#hidden_column_name').val(),
                    sort_type: $('#hidden_sort_type').val(),
                    page: $('#hidden_page').val(),
                    date_entry: $('.date-entry').val()
                };
            }

            function applyFilters() {
                var filters = getFilters();
                fetch_data(filters.page, filters.sort_type, filters.column_name, filters.query,
                    filters.date_entry);
            }

            $('#search').on('keyup', function() {
                $('#hidden_page').val(1); // Reset to first page
                applyFilters();
            });

            $('.date-entry').on('change', function() {
                $('#hidden_page').val(1); // Reset to first page
                applyFilters();
            });

            $(document).on('keyup', '#search', function() {
                var query = $('#search').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                var date_entry = $('.date-entry').val();
                fetch_data(page, sort_type, column_name, query, date_entry);
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
                var date_entry = $('.date-entry').val();
                fetch_data(page, reverse_order, column_name, query, date_entry);
            });

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#search').val();
                var date_entry = $('.date-entry').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query, date_entry);
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#debit-vouchers-create-form').submit(function(e) {
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
            $(document).on('submit', '#debit-vouchers-edit-form', function(e) {
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
                            // $('#' + key + '-error').html(value[0]);
                            $('[name="' + key + '"]').next('.text-danger').html(value[
                                0]);
                        });
                    }
                });
            });
        });
    </script>




    <script>
        // add new row
        $(document).ready(function() {
            $(document).on('click', '#add-row', function() {
                var tr = $('#debit_new_html').html();
                $('#debit_form_add_new_row').append(tr);
                updateItemDropdowns();

                if ($('#voucher_date_1').val() != '') {
                    $('.voucher-date').each(function() {
                        $(this).val($('#voucher_date_1').val());
                    });
                }
                if ($('#inv_no_1').val() != '') {
                    var inv_no = $('#inv_no_1').val();

                    // Set the value for each .inv_no element
                    $('.inv_no').each(function() {
                        $(this).val(inv_no);
                    });

                    // Enable the item code input
                    $('#item_code_id').prop('disabled', false);
                    $('.item_code').val('');
                    // Make the AJAX call
                    $.ajax({
                        url: "{{ route('debit-vouchers.get-items-by-inv-no') }}",
                        type: 'POST',
                        data: {
                            inv_no: inv_no,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // var options = '<option value="">Select Item</option>';
                            // $.each(response.creditVouchers, function(index, creditVoucher) {
                            //     var itemCode = creditVoucher.item_codes.code;
                            //     var itemCodeId = creditVoucher.item_code_id;
                            //     var totalQuantity = creditVoucher.total_quantity;

                            //     options +=
                            //         `<option value="${itemCodeId}" data-hidden-value="${totalQuantity}" >${itemCode}(${totalQuantity})</option>`;
                            // });
                            // var $row = $(this).closest('.count-class');
                            // $row.find('#item_code_id').html(options);
                            // $('.item_code_id').html(options);
                        },
                        error: function(xhr) {
                            console.log(xhr);
                        }
                    });
                }
                if ($('#voucher_no_1').val() != '') {
                    $('.voucher-no').each(function() {
                        $(this).val($('#voucher_no_1').val());
                    });
                }
                if ($('#voucher_type_1').val() != '') {
                    $('.voucher-type').each(function() {
                        $(this).val($('#voucher_type_1').val());
                    });
                }
                return false;
            });

            $(document).on('click', '.trash', function() {
                $(this).closest('.new_html').remove();
                updateItemDropdowns();
                return false;
            });
        });
    </script>
    <script>
        $(document).on('change', '#inv_no_1', function() {
            var inv_no = $(this).val();
            $('#item_code_id_1').prop('disabled', false);
            $('.inv_no').each(function() {
                $(this).val(inv_no);
            });
            // var $row = $(this).closest('.count-class');
            $('.item_code').val('');
            $.ajax({
                url: "{{ route('debit-vouchers.get-items-by-inv-no') }}",
                type: 'POST',
                data: {
                    inv_no: inv_no,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // console.log(response.creditVouchers[0]);
                    // add options to select box
                    var options = '<option value="">Select Item</option>';
                    var itemType = ''; // Initialize itemType outside the loop

                    $.each(response.invStocks, function(index, invStocks) {
                        // console.log(creditVoucher);
                        var itemCode = invStocks.item_code.code;
                        var itemName = invStocks.item_code.item_name;
                        var itemCodeId = invStocks.item_id;
                        var totalQuantity = invStocks.quantity_balance;
                        var unitPrice = 0;
                        var totalPrice = totalQuantity * unitPrice;
                        var itemType = invStocks.item_code.nc_status.status;
                        var itemDescription = invStocks.item_code.description;


                        options +=
                            `<option value="${itemCodeId}" data-hidden-value="${totalQuantity}" data-item-code="${itemCode}" data-item-quantity="${totalQuantity}" data-item-type="${itemType}" data-item-desc="${itemDescription}" data-item-price="${totalPrice}">${itemCode}</option>`;
                    });
                    console.log(itemType);
                    $('#item_code_id_1').html(options);
                    $('.item_code_id').html(options);
                    // if (itemType) {
                    //     $('#item_type_1').val(itemType);
                    //     $('.item-type').each(function() {
                    //         $(this).val(itemType);
                    //     });
                    // }
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });

        // $(document).on('keyup', '#voucher_no_1', function() {
        //     var voucher_no = $(this).val();
        //     $('.voucher-no').each(function() {
        //         $(this).val(voucher_no);
        //     });
        // });

        // $(document).on('change', '#voucher_date_1', function() {
        //     var voucher_date = $(this).val();
        //     $('.voucher-date').each(function() {
        //         $(this).val(voucher_date);
        //     });
        // });

        // $(document).on('change', '#voucher_type_1', function() {
        //     var voucher_type = $(this).val();
        //     $('.voucher-type').each(function() {
        //         $(this).val(voucher_type);
        //     });
        // });
        function getVoucherType(getval) {
            var selectedValue = $(getval).find(':selected');
            var voucherType = selectedValue.val();
            $('.voucher-type').each(function() {
                $(this).val(voucherType);
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.print-route').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('reports.debit-voucher') }}",
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
                        // Get current date
                        var currentDate = new Date();
                        var day = String(currentDate.getDate()).padStart(2, '0');
                        var month = String(currentDate.getMonth() + 1).padStart(2,
                            '0'); // Months are zero-based
                        var year = currentDate.getFullYear();

                        // Format the date as 'YYYY-MM-DD'
                        var formattedDate = day + '-' + month + '-' + year;
                        var url = window.URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.href = url;
                        a.download = 'debit-voucher-' + id + '-' + formattedDate + '.pdf';
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
        $(document).ready(function() {
            // $(document).on('change', '.item_code_id', function() {
            //     var itemCodeId = $(this).val();
            //     var $row = $(this).closest('.count-class');

            //     if (itemCodeId) {
            //         $.ajax({
            //             url: "{{ route('debit-vouchers.get-item-details') }}",
            //             type: 'POST',
            //             data: {
            //                 item_code_id: itemCodeId,
            //                 _token: '{{ csrf_token() }}'
            //             },
            //             success: function(response) {
            //                 if (response.item) {
            //                     $row.find('.item_code').val(response.item.code);
            //                 }

            //             },
            //             error: function(xhr) {
            //                 console.error(xhr.responseText);
            //                 alert('Failed to fetch item details.');
            //             }
            //         });
            //     } else {
            //         $row.find('.item_code').val('');
            //     }





            // });

        });
    </script>

    <script>
        $(document).on('change', '.item_code_id', function(e) {
            e.preventDefault();

            //  `<option value="${itemCodeId}" data-hidden-value="${totalQuantity}" data-item-quantity="${totalQuantity}" data-item-type="${itemType}" data-item-desc="${itemDescription}" data-item-price="${totalPrice}">${itemCode}</option>`;


            var itemcode = $(this).find('option:selected').data('item-code');
            var quantity = $(this).find('option:selected').data('item-quantity');
            var type = $(this).find('option:selected').data('item-type');
            var desc = $(this).find('option:selected').data('item-desc');
            var price = $(this).find('option:selected').data('item-price');

            console.log(price);

            var parentElement = $(this).closest('.new_html');
            parentElement.find('.item-code-no').val(desc);
            parentElement.find('.item-desc').val(desc);
            parentElement.find('.item-quantity').val(quantity);
            parentElement.find('.item-quantity').attr('max', quantity);
            parentElement.find('.init-item-quantity').val(quantity);
            parentElement.find('.item-quantity').attr('max', quantity);
            parentElement.find('.item-price').val(price);
            parentElement.find('.init-item-price').val(price);
            parentElement.find('.item-type').val(type);

            updateItemDropdowns();
        });
    </script>
    <script>
        function checkMax(input) {
            // if (input.value > input.max) {
            //     input.value = input.max;
            //     console.log('big : ' + input.value);
            // }
            const max = parseInt(input.max, 10); // Get the max value
            if (parseInt(input.value, 10) > max) {
                input.value = max; // Reset to max if the value exceeds the limit
            }
        }
    </script>
    <script>
        // $(document).on('keyup', '.item-quantity', function() {
        //     // console.log('hello');
        //     const $row = $(this).closest('.new_html'); // Get the current row
        //     const quantity = parseFloat($(this).val()); // Get the entered quantity
        //     init - item - quantity
        //     const initialPrice = parseFloat($row.find('.init-item-price').val()); // Get the initial price

        //     if (quantity > 0) {
        //         // Calculate the price per quantity
        //         const updatedPrice = initialPrice / quantity;
        //         $row.find('.item-price').val(updatedPrice.toFixed(2)); // Update the price field
        //     } else {
        //         // Reset the price if quantity is invalid
        //         $row.find('.item-price').val('');
        //     }
        // });
    </script>

    <script>
        // $(document).on('keyup', '.item-quantity', function() {
        //     console.log('hello');
        //     const $row = $(this).closest('.new_html'); // Get the current row
        //     const enteredQuantity = parseFloat($(this).val()); // Get the entered quantity
        //     const initialQuantity = parseFloat($row.find('.init-item-quantity').val()); // Get the initial quantity
        //     const initialPrice = parseFloat($row.find('.init-item-price').val()); // Get the initial price

        //     if (enteredQuantity > 0 && initialQuantity > 0) {
        //         // Calculate the price based on the entered quantity and initial quantity
        //         const updatedPrice = (initialPrice / initialQuantity) * enteredQuantity;
        //         $row.find('.item-price').val(updatedPrice.toFixed(2)); // Update the price field
        //     } else {
        //         // Reset the price if the quantity is invalid
        //         $row.find('.item-price').val('');
        //     }
        // });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('keyup change', '.item-unit-price, .item-quantity', function() {
                let row = $(this).closest('.new_html');
                let quantity = parseFloat(row.find('.item-quantity').val()) || 0;
                let unitPrice = parseFloat(row.find('.item-unit-price').val()) || 0;
                let totalPrice = quantity * unitPrice;
                row.find('.item-price').val(totalPrice.toFixed(2));
            });

            // trigger the item-unit-price
            $('.item-unit-price').trigger('change');
        });
    </script>
@endpush
