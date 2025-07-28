@extends('frontend.layouts.master')
@section('title')
    Income Tax Report Generate
@endsection

@push('styles')
@endpush

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
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
                        <li><span class="bread-blod">Income Tax</span></li>
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

                              <form id="annualTaxForm" >
                                 {{-- <form id="" action="{{ route('reports.annual-income-tax-report-generate') }}" method="post"> --}}
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

                                            <div class="form-group col-md-6 mb-2" id="member_section"
                                                style="display: {{ old('generate_by') == 'member' ? 'block' : 'none' }};">
                                                <label for="member_id">Member</label>
                                                <select class="form-select select2" name="member_id" id="member_id">
                                                    <option value="">Select Member</option>

                                                </select>
                                                @error('member_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 mb-2" id="category_section"
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
                                                <div class="col-md-12">
                                                    <label>Year</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="report_year" id="report_year" class="form-select">
                                                        <option value="">Select Year</option>
                                                        @foreach ($financialYears as $financialYear)
                                                            <option value="{{ $financialYear }}">
                                                                {{ $financialYear }}
                                                            </option>

                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('report_year'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('report_year') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                        <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Recovery From</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="recovery_from" id="recovery_from" class="form-select">
                                                       <option value="">Select Month</option>
                                                        <option value="7" {{ old('recovery_from') == '7' ? 'selected' : '' }}>Aug</option>
                                                        <option value="6" {{ old('recovery_from') == '6' ? 'selected' : '' }}>Sep</option>
                                                        <option value="5" {{ old('recovery_from') == '5' ? 'selected' : '' }}>Oct</option>
                                                        <option value="4" {{ old('recovery_from') == '4' ? 'selected' : '' }}>Nov</option>
                                                        <option value="3" {{ old('recovery_from') == '3' ? 'selected' : '' }}>Dec</option>
                                                        <option value="2" {{ old('recovery_from') == '2' ? 'selected' : '' }}>Jan</option>
                                                        <option value="1" {{ old('recovery_from') == '1' ? 'selected' : '' }}>Feb</option>
                                                    </select>
                                                    @if ($errors->has('recovery_from'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('recovery_from') }}</div>
                                                    @endif
                                                </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('annualTaxForm');
            const loader = document.getElementById('loaderOverlay');

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                loader.style.display = 'flex';

                // Clear previous errors
                document.querySelectorAll('.text-danger').forEach(el => el.remove());

                const formData = new FormData(form);

                fetch("{{ route('reports.annual-income-tax-report-generate') }}", {
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
                            `income-tax-${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}.pdf`;

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
