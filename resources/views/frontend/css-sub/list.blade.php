@extends('frontend.layouts.master')
@section('title')
    CSS List
@endsection

@push('styles')
    <style>
        .error-text {
            font-size: 12px;
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
                <div class="arrow_left"><a href="{{ route('dashboard') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>CSS</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="{{ route('dashboard') }}">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">CSS</span></li>
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
                            @include('frontend.css-sub.form')
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
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
                                                <th>ID</th>
                                                <th>PC No</th>
                                                <th>Member Name</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll" id="css_subs_table">
                                            @include('frontend.css-sub.table')
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
            // PC Number keyup event to find matching member
            $('#pc_no').on('keyup', function() {
                let pc_no = $(this).val().trim();

                // Clear member dropdown
                $('#member_id').empty().append('<option value="" disabled>Select Member</option>');

                // Only proceed if PC number has content
                if (pc_no !== '') {
                    $.ajax({
                        url: "{{ route('css-subs.find-member') }}",
                        type: "GET",
                        data: {
                            pc_no: pc_no
                        },
                        success: function(response) {
                            if (response.success) {
                                if (response.member) {
                                    // Add the matched member to dropdown and select it
                                    $('#member_id').append(
                                        `<option value="${response.member.id}" selected>${response.member.name}</option>`
                                    );
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error finding member:", xhr.responseText);
                        }
                    });
                }
            });

            // Form submit for creating/updating CSS Sub
            $('#saveCssSubForm').on('submit', function(e) {
                e.preventDefault();

                let form = this;
                let formData = new FormData(form);
                let url = "{{ route('css-subs.store') }}";
                let method = "POST";

                // If we're updating an existing record
                if ($('#css_sub_id').val()) {
                    url = "{{ route('css-subs.update') }}";
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(response) {
                        if (response.status == 400) {
                            $.each(response.errors, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $('#saveCssSubForm')[0].reset();
                            $('#css_sub_id').val('');
                            $('#saveBtn').text('Save');
                            $('#cancelBtn').hide();

                            // Refresh the table with latest data
                            fetchCssSubs();

                            // Show success message
                            toastr.success(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        toastr.error('An error occurred. Please try again.');
                    }
                });
            });

            // Handle edit button click
            $(document).on('click', '.edit-btn', function() {
                let css_sub_id = $(this).val();
                console.log("Editing CSS Sub with ID: " + css_sub_id); // Debug log

                $.ajax({
                    url: "{{ route('css-subs.edit', ':id') }}".replace(':id', css_sub_id),
                    type: "GET",
                    success: function(response) {
                        if (response.status == 200) {
                            $('#css_sub_id').val(response.css_sub.id);
                            $('#pc_no').val(response.css_sub.pc_no);

                            // Clear member dropdown and add the current member
                            $('#member_id').empty().append(
                                '<option value="" disabled>Select Member</option>');

                            // Fetch the member details for this CSS Sub
                            $.ajax({
                                url: "{{ route('css-subs.find-member') }}",
                                type: "GET",
                                data: {
                                    pc_no: response.css_sub.pc_no
                                },
                                success: function(memberResponse) {
                                    if (memberResponse.success && memberResponse
                                        .member) {
                                        // Add the member to the dropdown
                                        $('#member_id').append(
                                            `<option value="${memberResponse.member.id}" selected>${memberResponse.member.name}</option>`
                                        );
                                    } else {
                                        // If no member found, but we have a member_id, fetch that member directly
                                        if (response.css_sub.member_id) {
                                            $.ajax({
                                                url: "{{ route('members.show', '') }}/" +
                                                    response.css_sub
                                                    .member_id,
                                                type: "GET",
                                                success: function(
                                                    memberData) {
                                                    if (memberData
                                                        .status == 200
                                                    ) {
                                                        $('#member_id')
                                                            .append(
                                                                `<option value="${memberData.member.id}" selected>${memberData.member.name}</option>`
                                                            );
                                                    }
                                                },
                                                error: function(xhr) {
                                                    console.error(
                                                        "Error fetching member details:",
                                                        xhr
                                                        .responseText
                                                    );
                                                }
                                            });
                                        }
                                    }

                                    // Set the member_id value whether we found a matching member or not
                                    $('#member_id').val(response.css_sub.member_id);
                                    $('#amount').val(response.css_sub.amount);
                                },
                                error: function(xhr) {
                                    console.error(
                                        "Error finding member by PC number:",
                                        xhr.responseText);
                                    // Still set the member_id value
                                    $('#member_id').val(response.css_sub.member_id);
                                    $('#amount').val(response.css_sub.amount);
                                }
                            });

                            $('#saveBtn').text('Update');
                            $('#cancelBtn').show();

                            // Scroll to form
                            $('html, body').animate({
                                scrollTop: $("#form").offset().top - 100
                            }, 500);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error details:", xhr.responseText);
                        toastr.error(
                            'An error occurred while fetching the CSS Sub. Please try again.'
                        );
                    }
                });
            });

            // Handle delete button click
            $(document).on('click', '.delete-btn', function() {
                let css_sub_id = $(this).val();

                if (confirm('Are you sure you want to delete this CSS Sub?')) {
                    $.ajax({
                        url: "{{ route('css-subs.destroy', '') }}/" + css_sub_id,
                        type: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status == 200) {
                                fetchCssSubs();
                                toastr.success(response.message);
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            toastr.error('An error occurred. Please try again.');
                        }
                    });
                }
            });

            // Cancel edit operation
            $('#cancelBtn').on('click', function() {
                $('#saveCssSubForm')[0].reset();
                $('#css_sub_id').val('');
                $('#saveBtn').text('Save');
                $(this).hide();
                $('span.error-text').text('');

                // Clear member dropdown when canceling
                $('#member_id').empty().append('<option value="">Select Member</option>');
            });

            // Handle search functionality
            $('#search').on('keyup', function() {
                fetchCssSubs(1, $(this).val());
            });

            // Function to fetch CSS Subs with pagination and search
            function fetchCssSubs(page = 1, search = '') {
                $.ajax({
                    url: "{{ route('css-subs.fetch-data') }}?page=" + page + "&search=" + search,
                    type: "GET",
                    success: function(data) {
                        $('#css_subs_table').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        toastr.error('Failed to load CSS Subs. Please refresh the page.');
                    }
                });
            }

            // Handle pagination clicks
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let search = $('#search').val();

                fetchCssSubs(page, search);
            });
        });
    </script>
@endpush
