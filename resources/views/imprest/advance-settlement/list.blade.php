@extends('imprest.layouts.master')
@section('title')
    Advance Settlement List
@endsection

@push('styles')
    <style>
        .swal2-warning.swal2-icon-show .swal2-icon-content {
            font-size: 0.75em !important;
        }
    </style>
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
                    <h3>Advance Settlement Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Advance Settlement Listing</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row" id="advance-settlement-form">
            @include('imprest.advance-settlement.form')
        </div>

        <div class="row">
            {{-- <div class="col-md-12 text-end mb-3">
                <a class="print_btn" href="{{ route('advance-settlement.create') }}">Add Advance Settlement</a>
            </div> --}}
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-3 mb-2">
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
                                                <th class="sorting" data-sorting_type="desc" data-column_name="name"
                                                    style="cursor: pointer">Adv No<span id="name_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="emp_id"
                                                    style="cursor: pointer">Adv Date<span id="emp_id_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                {{-- <th class="sorting" data-sorting_type="desc" data-column_name="member_id"
                                                    style="cursor: pointer">Member Name<span id="emp_id_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th> --}}
                                                <th class="sorting" data-sorting_type="desc" data-column_name="adv_amount"
                                                    style="cursor: pointer">Adv Amount <span id="gender_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="bill_amount"
                                                    style="cursor: pointer">Bill Amount<span id="emp_id_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="balance"
                                                    style="cursor: pointer">Balance<span id="emp_id_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="pers_no"
                                                    style="cursor: pointer">Project <span id="pers_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="chq_no"
                                                    style="cursor: pointer">Cheque No <span id="pers_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>

                                                <th class="sorting" data-sorting_type="desc" data-column_name="chq_date"
                                                    style="cursor: pointer">Cheque Date <span id="pers_no_icon"><i
                                                            class="fa fa-arrow-down"></i></span> </th>
                                                <th>Variable Type </th>
                                                <th>Vr Date</th>
                                                <th>Actions</th>

                                                {{-- <th></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('imprest.advance-settlement.table')
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

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('advance-settlement.fetch-data') }}",
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
        // $(document).ready(function() {
        //     $('#advance-settlement-create-form').submit(function(e) {
        //         e.preventDefault();
        //         var formData = $(this).serialize();


        //         $.ajax({
        //             url: $(this).attr('action'),
        //             type: $(this).attr('method'),
        //             data: formData,
        //             success: function(response) {

        //                 //windows load with toastr message
        //                 window.location.reload();
        //             },
        //             error: function(xhr) {

        //                 // Handle errors (e.g., display validation errors)
        //                 //clear any old errors
        //                 $('.text-danger').html('');
        //                 var errors = xhr.responseJSON.errors;
        //                 $.each(errors, function(key, value) {
        //                     // Assuming you have a div with class "text-danger" next to each input
        //                     $('[name="' + key + '"]').next('.text-danger').html(value[
        //                         0]);
        //                 });
        //             }
        //         });
        //     });
        // });
    </script>

    <script>
        $(document).on('click', '#advance-sttl-delete', function() {
            //swal alert then call ajax
            var route = $(this).data('route');

            swal({
                    title: "Are you sure?",
                    text: "To delete this Advance Settlement!",
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
            $("#searchAdv-form").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: "post",
                    url: "{{ route('advance-settle-bills.get-adv') }}",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        // Clear previous error messages
                        $(".text-danger").text("");

                        if (response.isdata == 1) {
                            $("#advDataDiv").html(response.view);
                        } else {
                            // If no data found, display an error below the Adv No field
                            $("input[name='adv_no']").next(".text-danger").text(
                                "Adv No Not found");
                            $("input[name='adv_date']").next(".text-danger").text(
                                "Adv Date Not found");
                        }
                    },
                    error: function(xhr) {
                        // Handle server-side validation errors
                        $(".text-danger").text(""); // Clear previous error messages

                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                // Display errors below respective fields
                                $("input[name='" + key + "']").next(".text-danger")
                                    .text(value[0]);
                            });
                        }
                    }
                });
            });
        });
    </script>
    <script>
        // $(document).ready(function() {
        //     $("#bill_amount").keyup(function(e) {
        //         var this_adv_amount = parseFloat($(this).val()) || 0; // Ensure it's a number
        //         var main_cashinhand = parseFloat($("#main_cashinhand_balance").val()) || 0;

        //         if (this_adv_amount > main_cashinhand) {
        //             toastr.error('Cash In Hand Balance is Low');
        //             $("#save_settle_btn").attr('disabled', true);
        //             $(".advamnt_msg").text('Cash In Hand Balance is Low');
        //         } else {
        //             $("#save_settle_btn").removeAttr('disabled');
        //             $(".advamnt_msg").text('');
        //         }
        //     });
        // });
    </script>
    {{-- edit-advance-settlement --}}
    <script>
        $(document).ready(function() {
            $(".edit-advance-settlement").click(function() {

                var route = $(this).data('route');

                //show loading
                $("#loading").show();
                $("#loading-content").html(
                    '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
                );

                $.ajax({
                    url: route,
                    type: "get",
                    success: function(response) {
                        $("#loading").hide();
                        $("#loading-content").html('');
                        $("#advance-settlement-form").html(response.view);
                    },
                    error: function(xhr) {
                        $("#loading").hide();
                        $("#loading-content").html('');
                        toastr.error('Something went wrong');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(document).on("keyup", "#bill_amount", function() {
                let initialBalanceMain = parseFloat($("#main_amount").val());
                let payAmount = parseFloat($("#balance").val()); // Pay amount from response
                let initialBalance = parseFloat($("#balance").val()); // Initial balance from response
                let billAmount = $(this).val(); // Get the bill amount entered

                // Check if the input is empty
                if (billAmount.trim() === "") {
                    // Reset balance to the pay amount
                    $("#balance").val(initialBalanceMain.toFixed(2));
                    return;
                }

                // Convert bill amount to float
                billAmount = parseFloat(billAmount);

                // Validate the bill amount
                if (isNaN(billAmount)) {
                    billAmount = 0; // Handle invalid input
                }

                // Check if bill amount exceeds the pay amount
                if (billAmount > initialBalanceMain) {
                    // Display error message
                    // alert("The bill amount cannot be greater than the pay amount.");
                    toastr.error('The bill amount cannot be greater than the balance amount');
                    billAmount = initialBalanceMain; // Reset bill amount to the maximum allowable value
                    $(this).val(''); // Update the input field with the corrected value
                    $("#var_amount").val('');
                    $("#balance").val(initialBalanceMain);
                } else {

                    // Calculate the new balance
                    let newBalance = initialBalanceMain - billAmount;

                    // Update the balance field
                    $("#balance").val(newBalance.toFixed(2));
                    $("#var_amount").val(billAmount);

                }


                var this_adv_amount = parseFloat($(this).val()) || 0;
                var main_cashinhand = parseFloat($("#main_cashinhand_balance").val()) || 0;

                // if (this_adv_amount > main_cashinhand) {
                //     toastr.error('Cash In Hand Balance is Low');
                //     $("#save_settle_btn").attr('disabled', true);
                //     $(".advamnt_msg").text('Cash In Hand Balance is Low');
                // } else {
                //     $("#save_settle_btn").removeAttr('disabled');
                //     $(".advamnt_msg").text('');
                // }




            });


            $(document).on("keyup", "#var_amount", function() {
                let initialBalanceMain = parseFloat($("#main_amount").val());
                let payAmount = parseFloat($("#balance").val()); // Pay amount from response
                let initialBalance = parseFloat($("#balance").val()); // Initial balance from response
                let billAmount = $(this).val(); // Get the bill amount entered

                console.log(initialBalanceMain);

                // Check if the input is empty
                if (billAmount.trim() === "") {
                    // Reset balance to the pay amount
                    $("#balance").val(initialBalanceMain.toFixed(2));
                    return;
                }

                // Convert bill amount to float
                billAmount = parseFloat(billAmount);

                // Validate the bill amount
                if (isNaN(billAmount)) {
                    billAmount = 0; // Handle invalid input
                }

                // Check if bill amount exceeds the pay amount
                if (billAmount > initialBalanceMain) {
                    // Display error message
                    // alert("The bill amount cannot be greater than the pay amount.");
                    toastr.error('The bill amount cannot be greater than the balance amount');
                    billAmount = initialBalanceMain; // Reset bill amount to the maximum allowable value
                    $(this).val(''); // Update the input field with the corrected value
                    $("#bill_amount").val('');
                    $("#balance").val(initialBalanceMain);
                } else {

                    // Calculate the new balance
                    let newBalance = initialBalanceMain - billAmount;

                    // Update the balance field
                    $("#balance").val(newBalance.toFixed(2));
                    $("#bill_amount").val(billAmount);

                }


                var this_adv_amount = parseFloat($(this).val()) || 0;
                var main_cashinhand = parseFloat($("#main_cashinhand_balance").val()) || 0;

                // if (this_adv_amount > main_cashinhand) {
                //     toastr.error('Cash In Hand Balance is Low');
                //     $("#save_settle_btn").attr('disabled', true);
                //     $(".advamnt_msg").text('Cash In Hand Balance is Low');
                // } else {
                //     $("#save_settle_btn").removeAttr('disabled');
                //     $(".advamnt_msg").text('');
                // }




            });



        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("submit", "#advance-settlement-update-form", function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                // console.log(formData);
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {
                        toastr.success('Advance Settlement updated successfully');
                        //  window.history.back();
                        // $("#searchAdv-form").submit();
                        //  checkBalance();
                        setTimeout(() => {
                            window.location.reload();
                        }, 800);
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
@endpush
