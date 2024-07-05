@extends('frontend.layouts.master')
@section('title')
    Gpf List
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
                    <h3>Gpf Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Gpf Listing</span></li>
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
                            <h3>For Single Member GPF</h3>
                            @include('frontend.member-info.gpf.form')
                        </div>


                        {{-- check box for multiple member --}}
                        
                        <div class="container-fluid">
                            <!--  Row 1 -->
                            <div class="row">
                                <h3>For Multiple Member GPF</h3>
                                <div class="col-lg-12">

                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="container-fluid page__container">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 p-0">
                                                        <div class="table-responsive border-bottom" data-toggle="lists">


                                                            <table class="table mb-0 table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 50px; text-align: center;">
                                                                            <div class="">
                                                                                <input class="styled-checkbox" id="select-all" type="checkbox">
                                                                                <label for="select-all"></label>
                                                                            </div>
                                                                        </th>
                                                                        <th>Member</th>
                                                                        <th>Date</th>
                                                                        <th>Monthly Subscription</th>
                                                                        <th>Openning Balance</th>
                                                                        <th>Closing Balance</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="list">
                                                                   
                                                                    <tr>
                                                                        <td>
                                                                            <div class="">
                                                                                <input class="styled-checkbox row-checkbox" id="styled-checkbox-1" type="checkbox">
                                                                                <label for="styled-checkbox-1"></label>
                                                                            </div>
                                                                        </td>
                                                                        <td>trtyrt</td>
                                                                        <td>gdrfgd</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="">
                                                                                <input class="styled-checkbox row-checkbox" id="styled-checkbox-2" type="checkbox">
                                                                                <label for="styled-checkbox-2"></label>
                                                                            </div>
                                                                        </td>
                                                                        <td>example</td>
                                                                        <td>content</td>
                                                                    </tr>
                                                                    <!-- Add more rows as needed -->
                                                                </tbody>
                                                            </table>
                                                            

                                                            <span class="text-danger" id="permissions_msg"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <br>

                                        <div class="w-100 text-end">
                                            <button type="submit" class="print_btn">Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        {{-- member details --}}
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        //if member_id select then monthly_subscription will remove readonly
        $(document).on('change', '#member_id', function() {
            $('#monthly_subscription').removeAttr('readonly');
        });
    </script>
    <script>
        // check monthly_subscription min 6% of basic pay, max amount > basic pay
        $(document).on('keyup', '#monthly_subscription', function() {
            var monthly_subscription = $('#monthly_subscription').val();
            var member = $('#member_id').val();

            $.ajax({
                url: "{{ route('member-info.gpf.check-amount') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    member: member,
                    monthly_subscription: monthly_subscription
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $('#subscription_error_message').removeClass('is-invalid').addClass('is-valid')
                            .text('');
                        $('.gpf_sub_btn').attr('disabled', false);
                    } else {
                        $('#subscription_error_message').removeClass('is-valid').addClass('is-invalid');
                        var errorMessage = response.errors.join(' ');
                        $('.gpf_sub_btn').attr('disabled', true);
                        $('#subscription_error_message').text(errorMessage);
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#member-gpf-create-form').submit(function(e) {
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

                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
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
            $('#multiple-checkboxes').multiselect({
                includeSelectAllOption: true,
                enableFiltering: true, // Optional: Adds a search box within the dropdown
                nonSelectedText: 'Select member', // Text when no options are selected
                buttonWidth: '100%', // Adjust the button width
                numberDisplayed: 1 // Number of selected options displayed before '+ n more' is shown
            });
        });
    </script>

<script>
    $(document).ready(function() {
        // Handle click event on the header checkbox
        $('#select-all').on('click', function() {
            // Check or uncheck all row checkboxes based on header checkbox state
            $('.row-checkbox').prop('checked', this.checked);
        });

        // Handle click event on any row checkbox
        $('.row-checkbox').on('click', function() {
            // If all row checkboxes are checked, set header checkbox to checked
            if ($('.row-checkbox:checked').length == $('.row-checkbox').length) {
                $('#select-all').prop('checked', true);
            } else {
                // Otherwise, uncheck the header checkbox
                $('#select-all').prop('checked', false);
            }
        });
    });
</script>
@endpush
