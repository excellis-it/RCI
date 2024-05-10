@extends('inventory.layouts.master')
@section('title')
   Credit Vouchers
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
                    <h3>Credit Vouchers</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Credit Vouchers</span></li>
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
                            @include('inventory.credit-vouchers.form')
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
                                                <th class="sorting" data-sorting_type="desc" data-column_name="code"
                                                    style="cursor: pointer">Item Code <span id="code_icon"></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="voucher_no"
                                                    style="cursor: pointer">Voucher Number<span id="voucher_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="voucher_date"
                                                    style="cursor: pointer">Voucher Date<span id="voucher_date_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="inv_no"
                                                    style="cursor: pointer">Inv. No.<span id="inv_no_icon"></span> </th>
                                                {{-- <th class="sorting" data-sorting_type="desc" data-column_name="description"
                                                    style="cursor: pointer">Description<span id="description_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="uom" data-column_name="uom"
                                                    style="cursor: pointer">UOM<span id="uom_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th> --}}
                                                {{-- <th class="sorting" data-sorting_type="item_type" data-column_name="item_type"
                                                    style="cursor: pointer">Item Type<span id="item_type_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th> --}}
                                                <th class="sorting" data-sorting_type="desc" data-column_name="price"
                                                    style="cursor: pointer">Price <span id="price_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="quantity"
                                                    style="cursor: pointer">Quantity<span id="quantity_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                {{-- <th class="sorting" data-sorting_type="sono" data-column_name="sono"
                                                    style="cursor: pointer">Supply Order No. <span id="sono_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="rin" data-column_name="rin"
                                                    style="cursor: pointer">Receipt & Inspection Note<span id="rin_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th> --}}
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('inventory.credit-vouchers.table')
                                        </tbody>
                                        {{-- <tbody></tbody> --}}
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

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('credit-vouchers.fetch-data') }}",
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
            $('#credit-vouchers-create-form').submit(function(e) {
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
            $(document).on('submit', '#credit-vouchers-edit-form', function(e) {
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
        $(document).ready(function(){
            $('#item_code_id').change(function() {
                var item_code_id = $(this).val();
                $.ajax({ 
                    url: "{{ route('credit-vouchers.get-item-type')}}",
                    type: 'POST',
                    data: {
                        item_code_id: item_code_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#item_type').val(response.item_type);
                        $('#description').val(response.description);
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                 });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#inv_no').change(function(){
                var selectedValue = $(this).find(':selected');
                var inv_type = selectedValue.data('hidden-value');
                var hiddenDiv = $('#member_div');
                
                if (inv_type === 'Individual') {
                    hiddenDiv.prop('hidden', false); // Show the div
                } else {
                    hiddenDiv.prop('hidden', true); // Hide the div
                }
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            // Function to update difference
            function updateTotalPrice() {
                var price = parseInt($('#price').val());
                var tax = parseInt($('#tax').val());
                var total_price = price + (price * tax / 100);
                $('#total_price').val(total_price);
            }
        
            // Bind change event to input fields
            $('#price, #tax').keyup(updateTotalPrice);

        });
    </script>

    <script>
        $(document).ready(function(){
            $(document).on('keyup','#edit_tax, #edit_price', function(){
                console.log('Keyup event fired');
                // Your updateEditDifference() function logic here
                var price = parseInt($('#edit_price').val());
                var tax = parseInt($('#edit_tax').val());
                var total_price = price + (price * tax / 100);
                $('#edit_total_price').val(total_price);
            });
        });
    </script>
@endpush
