@extends('frontend.layouts.master')
@section('title')
    Paybill Report Generate
@endsection

@push('styles')
    <style>
        .toggle-status {
            display: inline-block;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 6px 14px;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }

        .toggle-status.bg-success {
            background-color: #28a745 !important;
            color: white;
        }

        .toggle-status.bg-danger {
            background-color: #dc3545 !important;
            color: white;
        }

        .toggle-status:hover {
            opacity: 0.85;
            box-shadow: 0 0 0.25rem rgba(0, 0, 0, 0.2);
            transform: scale(1.02);
        }
    </style>
@endpush

@section('content')
    <div id="loaderOverlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
    background: rgba(255, 255, 255, 0.7); z-index: 9999; justify-content: center; align-items: center;">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div style="margin-left: 10px; font-size: 1.2rem;">Generating Paybill PDF...</div>
    </div>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="{{ route('members.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Report Generate</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Paybill</span></li>
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
                            <form id="paybillForm">
                                {{-- <form id="" action="{{ route('reports.paybill-generate') }}" method="POST"> --}}
                                @csrf

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label>Generate Data By:</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="generate_by"
                                                        id="by_member" value="member"
                                                        {{ old('generate_by') == 'member' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="by_member">Member</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="generate_by"
                                                        id="by_category" value="category"
                                                        {{ old('generate_by', 'category') == 'category' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="by_category">Category</label>
                                                </div>

                                                @error('generate_by')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Employee Status</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="e_status" class="form-select" id="e_status">
                                                        <option value="">Select Employee Status</option>
                                                        <option value="active"
                                                            {{ old('e_status') == 'active' ? 'selected' : '' }}>Active
                                                        </option>
                                                        <option value="deputation"
                                                            {{ old('e_status') == 'deputation' ? 'selected' : '' }}>On
                                                            Deputation</option>
                                                    </select>
                                                    @if ($errors->has('e_status'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('e_status') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2" id="member_section"
                                                style="display: {{ old('generate_by') == 'member' ? 'block' : 'none' }};">
                                                <label for="member_id">Member</label>
                                                <select class="form-select select2" name="member_id" id="member_id">
                                                    <option value="">Select Member</option>

                                                </select>
                                                @error('member_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>DV NO.</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" name="dv_number" id=""
                                                        class="form-control" value="{{ old('dv_number') }}">
                                                    @if ($errors->has('dv_number'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('dv_number') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2" id="category_section"
                                                style="display: {{ old('generate_by', 'category') == 'category' ? 'block' : 'none' }};">
                                                <label for="category">Category</label>
                                                <select class="form-select select2" name="category" id="category">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category') == $category->id ? 'selected' : '' }}>
                                                            {{ $category->category }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Year</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="year" class="form-select" id="report_year">
                                                            <option value="">Select Year</option>
                                                            @for ($i = date('Y'); $i >= 1958; $i--)
                                                                <option value="{{ $i }}"
                                                                    {{ old('year') == $i ? 'selected' : '' }}>
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                        @error('year')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-4">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Month</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="month" class="form-select" id="report_month">
                                                            <option value="">Select Month</option>
                                                            {{-- The options for month will likely be populated via JavaScript after a year is selected.
                                                                However, you can still use old('month') to select the previously chosen month. --}}
                                                            @if (old('month'))
                                                                <option value="{{ old('month') }}" selected>
                                                                    {{-- You'll need to convert the month number to a name if you want to display it --}}
                                                                    {{ date('F', mktime(0, 0, 0, old('month'), 10)) }}
                                                                </option>
                                                            @endif
                                                        </select>
                                                        @if ($errors->has('month'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('month') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3 mb-2">
                                                <div class="col-md-12">
                                                    <label>A/c Off Sign</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select class="form-control" name="account_officer_sign"
                                                        id="account_officer_sign">
                                                        <option value="">Select Accountant</option>
                                                        @foreach ($accountants as $accountant)
                                                            <option value="{{ $accountant->id }}"
                                                                {{ old('account_officer_sign') == $accountant->id ? 'selected' : '' }}>
                                                                {{ $accountant->user_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- validation  --}}
                                                @error('account_officer_sign')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label></label>
                                        <div class="form-group mb-2">
                                            <button type="submit" class="listing_add">Generate</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                                <th>DV Number</th>
                                                <th>Status</th>
                                                <th>Generate By</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                                <th>Member/Category</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            @include('frontend.reports.paybill-table')
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
    </div>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '#delete', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this paybill.",
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
        $(document).on('click', '.toggle-status', function() {
            const span = $(this);
            const id = span.data('id');

            $.ajax({
                url: "{{ route('paybill-trackings.toggleStatus') }}",
                method: 'POST',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    toastr.success('Status updated successfully');

                    span
                        .text(response.label)
                        .attr('title', 'Click to mark as ' + (response.label === 'Paid' ? 'Unpaid' :
                            'Paid'))
                        .removeClass('bg-success bg-danger')
                        .addClass(response.class === 'bg-success' ? 'bg-success' : 'bg-danger');
                },
                error: function() {
                    toastr.error('Failed to update status.');
                }
            });
        });
    </script>

    <script>
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        tooltipTriggerList.forEach(el => {
            new bootstrap.Tooltip(el);
        });
    </script>


    <script>
        $(document).ready(function() {

            function fetch_data(page, sort_type, sort_by, query) {
                $.ajax({
                    url: "{{ route('paybill.fetch-data') }}",
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
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('paybillForm');
            const loader = document.getElementById('loaderOverlay');

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                loader.style.display = 'flex';

                // Clear previous errors
                document.querySelectorAll('.text-danger').forEach(el => el.remove());

                const formData = new FormData(form);

                fetch("{{ route('reports.paybill-generate') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: formData
                    })
                    .then(async response => {
                        if (response.status === 422) {
                            const data = await response.json();
                            showValidationErrors(data.errors);
                            throw new Error("Validation failed");
                        }

                        if (!response.ok) {
                            const data = await response.json();
                            throw new Error(data.message || 'Failed to generate PDF');
                        }

                        return response.blob();
                    })
                    .then(blob => {
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');

                        // Generate filename in JS to avoid Blade syntax inside <script>
                        const now = new Date();
                        const fileName =
                            `Paybill-${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}.pdf`;

                        a.href = url;
                        a.download = fileName;
                        document.body.appendChild(a);
                        a.click();
                        a.remove();
                        window.URL.revokeObjectURL(url);


                    })
                    .catch(error => {
                        if (error.message !== "Validation failed") {
                            alert("Failed to generate PDF: " + error.message);
                        }
                    })
                    .finally(() => {
                        loader.style.display = 'none';
                    });
            });

            function showValidationErrors(errors) {
                for (const [field, messages] of Object.entries(errors)) {
                    const input = document.querySelector(`[name="${field}"]`);
                    if (input) {
                        const errorDiv = document.createElement('div');
                        errorDiv.classList.add('text-danger');
                        errorDiv.innerText = messages[0];
                        const formGroup = input.closest('.form-group') || input.parentElement;
                        formGroup.appendChild(errorDiv);
                    }
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select an option',
                allowClear: true,
                theme: 'bootstrap4',
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const byMember = document.getElementById('by_member');
            const byCategory = document.getElementById('by_category');
            const memberSection = document.getElementById('member_section');
            const categorySection = document.getElementById('category_section');

            function toggleFields() {
                if (byMember.checked) {
                    memberSection.style.display = 'block';
                    categorySection.style.display = 'none';
                } else {
                    memberSection.style.display = 'none';
                    categorySection.style.display = 'block';
                }
            }

            // Initial check on page load using PHP-injected old value
            @if (old('generate_by') === 'member')
                byMember.checked = true;
            @else
                byCategory.checked = true;
            @endif
            toggleFields();

            // Add event listeners
            byMember.addEventListener('change', toggleFields);
            byCategory.addEventListener('change', toggleFields);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#report_year').change(function() {
                var year = $(this).val();
                var currentDate = new Date();
                var monthDropdown = $('#report_month');

                if (year == currentDate.getFullYear()) {
                    var currentMonth = currentDate.getMonth() + 1;
                    var endMonth = (year == currentDate.getFullYear()) ? currentMonth : 12;

                    monthDropdown.empty();
                    for (var month = 1; month <= endMonth; month++) {
                        var option = $('<option></option>');
                        option.val(month);
                        option.text(new Date(year, month - 1).toLocaleString('default', {
                            month: 'long'
                        }));
                        monthDropdown.append(option);
                    }

                } else {
                    monthDropdown.empty();
                    for (var month = 1; month <= 12; month++) {
                        var option = $('<option></option>');
                        option.val(month);
                        option.text(new Date(year, month - 1).toLocaleString('default', {
                            month: 'long'
                        }));
                        monthDropdown.append(option);
                    }
                }

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#e_status').change(function() {
                var e_status = $(this).val();

                $.ajax({
                    url: "{{ route('reports.get-all-members') }}",
                    type: 'POST',
                    data: {
                        e_status,
                        _token: '{{ csrf_token() }}'
                    },


                    success: ({
                        members
                    }) => {
                        // Reference the existing select element
                        const memberDropdown = $('#member_id');
                        memberDropdown.empty();
                        memberDropdown.append('<option value="">Select Member</option>');
                        members.forEach(({
                            id,
                            name,
                            emp_id
                        }) => {
                            memberDropdown.append(
                                `<option value="${id}">${name} (${emp_id})</option>`
                            );
                        });

                        var select_box_element = document.querySelector('.search-select-box');
                        dselect(select_box_element, {
                            search: true
                        });
                    },

                    error: (xhr) => console.log(xhr)
                });
            });
        });
    </script>
@endpush
