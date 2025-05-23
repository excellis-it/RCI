@extends('inventory.layouts.master')
@section('title')
    Transfer Voucher List
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
                    <h3>Transfer Voucher Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Transfer Voucher Listing</span></li>
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
                        <div id="code-form">
                            @include('inventory.transfer-vouchers.form')
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12 mb-4">
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
                                                <th>SL No.</th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="voucher_no"
                                                    style="cursor: pointer">Voucher Number<span id="voucher_no_id"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="voucher_date"
                                                    style="cursor: pointer">Voucher Date<span id="voucher_date_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    data-column_name="from_inv_number" style="cursor: pointer">From Inv.
                                                    No.<span id="from_inv_number_icon"></span> </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    data-column_name="to_inv_number" style="cursor: pointer">To Inv.
                                                    No.<span id="to_inv_number_icon"></span> </th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('inventory.transfer-vouchers.table')
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
    {{-- <script>
        $(document).on('click', '#delete', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this Transfer Vouchers!",
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
    </script> --}}
    <script>
        $(document).ready(function() {
            function fetch_data(page, sort_type, sort_by, query, date_entry) {
                $.ajax({
                    url: "{{ route('transfer-vouchers.fetch-data') }}",
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
            $('#transfer-voucher-create-form').submit(function(e) {
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

                        $('#code-form').html(response.view);
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
            $(document).on('submit', '#items-edit-form', function(e) {
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
        //  $(function() {
        // $('#from_inv_number').change(function() {
        //     var fromInvNumberId = $(this).val();
        //     $('#to_inv_number').empty(); // Clear existing options
        //     var selectedText = $(this).find('option:selected').text();
        //     var selectedValue = $(this).val();

        //     $('#from_inv_number option').each(function() {
        //         if ($(this).val() !== selectedValue) {
        //             $('#to_inv_number').append('<option value="' + $(this).val() + '">' + $(
        //                 this).text() + '</option>');
        //         }
        //     });


        //     $.ajax({
        //         url: "{{ route('debit-vouchers.get-items-by-inv-no') }}",
        //         type: 'POST',
        //         data: {
        //             inv_no: fromInvNumberId,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(response) {
        //             // console.log(response.creditVouchers[0]);
        //             // add options to select box
        //             var options = '<option value="">Select Item</option>';
        //             var itemType = ''; // Initialize itemType outside the loop

        //             $.each(response.creditVouchers, function(index, creditVoucher) {
        //                 console.log(creditVoucher);
        //                 var itemCode = creditVoucher.item_codes.code;
        //                 var itemName = creditVoucher.item_codes.item_name;
        //                 var itemCodeId = creditVoucher.item_code_id;
        //                 var totalQuantity = creditVoucher.total_quantity;
        //                 var itemType = creditVoucher.item_codes.item_type;
        //                 var itemDescription = creditVoucher.item_codes.description;


        //                 options +=
        //                     `<option value="${itemCodeId}" data-hidden-value="${totalQuantity}" data-item-type="${itemType}" data-item_desc="${itemDescription}">${itemName}(${totalQuantity})</option>`;
        //             });
        //             console.log(itemType);
        //             $('#item_code_id').html(options);

        //         },
        //         error: function(xhr) {
        //             console.log(xhr);
        //         }
        //     });
        // });
        //   });
    </script>

    <script>
        $(document).ready(function() {
            $('.print-route').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ route('reports.transfer-voucher') }}",
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
                        a.download = 'transfer-voucher-' + id + '.pdf';
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
        // $(document).on('change', '#strike_item_code', function() {
        //     var item_id = $('#strike_item_code').val();
        //     var selectedValue = $(this).find(':selected');

        //     $.ajax({
        //         url: "{{ route('conversions.item.details') }}",
        //         type: 'GET',
        //         data: {
        //             item_id: item_id
        //         },
        //         success: function(response) {
        //             $('#strike_c_nc').val(response.item_details.item_type);
        //             $('#strike_description').val(response.item_details.description);
        //             $('#strike_rate').val(response.item_details.item_price);
        //             $('#strike_ledger').val(response.inventory_number.inventory_number.number);

        //             var quantityDivSelectBox = [];
        //             quantityDivSelectBox.push('<option value="">Select Quantity</option>');
        //             for (var i = 1; i <= response.quantity; i++) {
        //                 quantityDivSelectBox.push('<option value="' + i + '">' + i + '</option>');
        //             }

        //             $('#strike_quantity').empty();
        //             $('#strike_quantity').append(quantityDivSelectBox.join(''));
        //         },
        //         error: function(xhr) {
        //             console.log(xhr);
        //         }
        //     });
        // });
    </script>

    <script>
        // $(document).on('change', '#brought_item_code', function() {
        //     var item_id = $('#brought_item_code').val();
        //     var selectedValue = $(this).find(':selected');

        //     $.ajax({
        //         url: "{{ route('conversions.item.details') }}",
        //         type: 'GET',
        //         data: {
        //             item_id: item_id
        //         },
        //         success: function(response) {
        //             $('#brought_c_nc').val(response.item_details.item_type);
        //             $('#brought_description').val(response.item_details.description);
        //             $('#brought_rate').val(response.item_details.item_price);
        //             $('#brought_ledger').val(response.inventory_number.inventory_number.number);

        //             var quantityDivSelectBox = [];
        //             quantityDivSelectBox.push('<option value="">Select Quantity</option>');
        //             for (var i = 1; i <= response.quantity; i++) {
        //                 quantityDivSelectBox.push('<option value="' + i + '">' + i + '</option>');
        //             }

        //             $('#brought_quantity').empty();
        //             $('#brought_quantity').append(quantityDivSelectBox.join(''));
        //         },
        //         error: function(xhr) {
        //             console.log(xhr);
        //         }
        //     });
        // });
    </script>

    <script>
        // $(document).ready(function() {
        //     $('#strike_quantity').change(function() {
        //         var quantity = $(this).val();
        //         var item_unit_price = $('#strike_rate').val() ?? 0;
        //         var total_price = quantity * item_unit_price;
        //         $('#strike_total_rate').val(total_price);
        //     });
        // });
    </script>

    <script>
        // $(document).ready(function() {
        //     $('#brought_quantity').change(function() {
        //         var quantity = $(this).val();
        //         var item_unit_price = $('#brought_rate').val() ?? 0;
        //         var total_price = quantity * item_unit_price;
        //         $('#brought_total_rate').val(total_price);
        //     });
        // });
    </script>

    <script>
        $(document).ready(function() {
            // On change of strike_item_code
            // $(document).on('change', '.strike_item_code', function() {
            //     var item_id = $(this).val();
            //     var $this = $(this);
            //     var selectedOption = $this.find('option:selected');
            //     var $row = $this.closest('.count-class'); // Get the closest row

            //     // AJAX call to get item details
            //     $.ajax({
            //         url: "{{ route('conversions.item.details') }}",
            //         type: 'GET',
            //         data: {
            //             item_id: item_id,
            //             _token: '{{ csrf_token() }}'
            //         },
            //         success: function(response) {
            //             // Set values in the respective fields within the current row
            //             $row.find('.strike_c_nc').val(response.item_details.item_type);
            //             $row.find('.strike_description').val(response.item_details.description);
            //             $row.find('.strike_more_rate').val(response.item_details.item_price);
            //             $row.find('.strike_ledger').val(response.inventory_number
            //                 .inventory_number.number);

            //             // Populate quantity select box
            //             var quantityDivSelectBox = [];
            //             quantityDivSelectBox.push('<option value="">Select Quantity</option>');
            //             for (var i = 1; i <= response.quantity; i++) {
            //                 quantityDivSelectBox.push('<option value="' + i + '">' + i +
            //                     '</option>');
            //             }

            //             $row.find('.strike_more_quantity').empty();
            //             $row.find('.strike_more_quantity').append(quantityDivSelectBox.join(
            //                 ''));
            //         },
            //         error: function(xhr) {
            //             console.log(xhr);
            //         }
            //     });
            // });

            // On change of strike_more_quantity
            // $(document).on('change', '.strike_more_quantity', function() {
            //     var quantity = $(this).val();
            //     var $row = $(this).closest('.count-class'); // Get the closest row again
            //     var item_unit_price = $row.find('.strike_more_rate').val() ?? 0;
            //     var total_price = quantity * item_unit_price;
            //     $row.find('.strike_total_rate').val(total_price);
            // });
        });
    </script>

    <script>
        $(document).ready(function() {
            // On change of strike_item_code
            // $(document).on('change', '.brought_item_code', function() {
            //     var item_id = $(this).val();
            //     var $this = $(this);
            //     var selectedOption = $this.find('option:selected');
            //     var $row = $this.closest('.count-class'); // Get the closest row

            //     // AJAX call to get item details
            //     $.ajax({
            //         url: "{{ route('conversions.item.details') }}",
            //         type: 'GET',
            //         data: {
            //             item_id: item_id,
            //             _token: '{{ csrf_token() }}'
            //         },
            //         success: function(response) {
            //             // Set values in the respective fields within the current row
            //             $row.find('.brought_c_nc').val(response.item_details.item_type);
            //             $row.find('.brought_description').val(response.item_details
            //                 .description);
            //             $row.find('.brought_rate').val(response.item_details.item_price);
            //             $row.find('.brought_ledger').val(response.inventory_number
            //                 .inventory_number.number);

            //             // Populate quantity select box
            //             var quantityDivSelectBox = [];
            //             quantityDivSelectBox.push('<option value="">Select Quantity</option>');
            //             for (var i = 1; i <= response.quantity; i++) {
            //                 quantityDivSelectBox.push('<option value="' + i + '">' + i +
            //                     '</option>');
            //             }

            //             $row.find('.brought_more_quantity').empty();
            //             $row.find('.brought_more_quantity').append(quantityDivSelectBox.join(
            //                 ''));
            //         },
            //         error: function(xhr) {
            //             console.log(xhr);
            //         }
            //     });
            // });

            // On change of strike_more_quantity
            // $(document).on('change', '.brought_more_quantity', function() {
            //     var quantity = $(this).val();
            //     var $row = $(this).closest('.count-class'); // Get the closest row again
            //     var item_unit_price = $row.find('.brought_rate').val() ?? 0;
            //     var total_price = quantity * item_unit_price;
            //     $row.find('.brought_total_rate').val(total_price);
            // });
        });
    </script>


    <script>
        // add new row
        $(document).ready(function() {
            $(document).on('click', '.add-more-trans', function() {
                var tr = $('#transaction_new_html').html();
                $('#trans_form_add_new_row').append(tr);
                setItemCodeList();
                return false;
            });

            $(document).on('click', '.trash', function() {
                $(this).closest('.new_html').remove();
                return false;
            });
        });
    </script>

    <script>
        // function setItemCodeList() {
        //     var itemOptions = $("#item_code_list").html();
        //     $('.item_code_list').each(function(index, element) {
        //         var $this = $(this);
        //         var selectedValue = $this.val();
        //         if (!selectedValue) {
        //             $this.html(itemOptions);
        //         } else {
        //             //  $this.val(selectedValue);
        //         }
        //     });
        // }
        function setItemCodeList() {
            var itemOptions = $("#item_code_list").html(); // Get all options
            var selectedValues = []; // Array to track selected items

            // Populate selectedValues array with current selections
            $('.item_code_list').each(function() {
                var value = $(this).val();
                if (value) {
                    selectedValues.push(value);
                }
            });

            $('.item_code_list').each(function(index, element) {
                var $this = $(this);
                var selectedValue = $this.val();

                if (!selectedValue) {
                    // Filter options to exclude already selected values
                    var filteredOptions = $(itemOptions).filter(function() {
                        return !selectedValues.includes($(this).val());
                    });

                    // Set the filtered options
                    $this.html(filteredOptions);
                } else {
                    // Preserve the current selected value
                    $this.html(itemOptions); // Reset to all options
                    $this.val(selectedValue); // Re-select the current value
                }
            });
        }

        $(document).ready(function() {



            $('#issuing_inv_no').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var divisionValue = selectedOption.data('division');
                $("#issuing_division").val(divisionValue);

                var invstock = selectedOption.data('invstock');
                console.log(invstock);

                if (invstock && invstock !== null && (invstock).length > 0) {
                    $('#item_code_list').append(
                        `<option selected disabled>Select Item</option>`
                    );
                    $.each(invstock, function(index, value) {
                        console.log('Index: ' + index + ', Value: ' + value.item_id);
                        var invstockString = JSON.stringify(value);
                        $('#item_code_list').append(
                            `<option value="${value.item_id}" data-stockdata='${invstockString}'>${value.item_code.code}</option>`
                        );
                    });
                    setItemCodeList();
                } else {
                    $("#item_code_list").empty();
                }
            });


            // $(".item_code_list").change(function(e) {
            //     e.preventDefault();
            //     var thisData = $(this).find('option:selected').data('crvdata');
            //     if (thisData) {
            //         console.log(thisData); // Access the ID from the data
            //     }
            //     var parentElement = $(this).closest('.new_html');
            //     parentElement.find('.item_code').val(thisData.item_code_id);
            //     parentElement.find('.item_description').val(thisData.description);
            //     parentElement.find('.item_quantity').val(thisData.quantity);
            //     parentElement.find('.item_rate').val(thisData.total_price);

            // });


            $('#receiving_inv_no').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var divisionValue = selectedOption.data('division');
                $("#receiving_division").val(divisionValue);
            });




        });

        $(document).on('change', '.item_code_list', function(e) {
            e.preventDefault();
            var thisData = $(this).find('option:selected').data('stockdata');
            if (thisData) {
                console.log(thisData); // Access the ID from the data
            }
            var parentElement = $(this).closest('.new_html');
            parentElement.find('.item_code').val(thisData.item_code.code);
            parentElement.find('.item_description').val(thisData.item_code.description);
            parentElement.find('.item_quantity').attr('max', thisData.quantity_balance);
            parentElement.find('.item_quantity_stock').text(thisData.quantity_balance);
            parentElement.find('.item_quantity').val(thisData.quantity_balance);

            parentElement.find('.item_rate').val(thisData.unit_price);

            // Calculate and set the initial total price
            calculateTotalPrice(parentElement, thisData);

            // Add input event for quantity changes
            parentElement.find('.item_quantity').on('input', function() {
                var max = parseFloat($(this).attr('max'));
                var value = parseFloat($(this).val());

                if (value > max) {
                    $(this).val(max);
                }

                // Recalculate total price when quantity changes
                calculateTotalPrice(parentElement, thisData);
            });
        });

        // Function to calculate total price based on quantity and other factors
        function calculateTotalPrice(parentElement, itemData) {
            var gstPercent = parseFloat(itemData.gst_percent) || 0;
            var discountPercent = parseFloat(itemData.discount_percent) || 0;
            var itemRate = parseFloat(itemData.unit_price) || 0;
            var quantity = parseFloat(parentElement.find('.item_quantity').val()) || 0;

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
            totalPrice = parseFloat(totalPrice.toFixed(5));

            parentElement.find('.item_total_price').val(totalPrice);
        }
    </script>

    <script>
        $(document).ready(function() {
            $(document).on("input", ".new_html .item_quantity[name='strike_quantity[]']", function() {
                var strikeQuantity = $(this).val();
                $(this).closest(".new_html").find(".item_quantity[name='brought_quantity[]']").val(
                    strikeQuantity);
            });
        });
    </script>
@endpush
