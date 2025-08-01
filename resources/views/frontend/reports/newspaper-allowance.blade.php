@extends('frontend.layouts.master')
@section('title')
Newspaper Allowance
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
            <div class="arrow_left"><a href="{{ route('members.index') }}" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
            <div class="">
                <h3>Newspaper Allowance Generate</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Newspaper Allowance</span></li>
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

                         <form action="{{ route('reports.newspaper-allowance-generate') }}" method="POST">
                            @csrf

                             <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label>Generate Data By:</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="generate_by" id="by_member"
                                                        value="member" {{ old('generate_by') == 'member' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="by_member">Member</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="generate_by" id="by_designation"
                                                        value="designation" {{ old('generate_by', 'designation') == 'designation' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="by_designation">designation</label>
                                                </div>

                                                 <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="generate_by" id="by_all"
                                                        value="all" {{ old('generate_by', 'all') == 'all' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="by_all">All</label>
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
                                                        <option value="active" {{ old('e_status') == 'active' ? 'selected' : '' }}>Active</option>
                                                        <option value="deputation" {{ old('e_status') == 'deputation' ? 'selected' : '' }}>On Deputation</option>
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

                                            <div class="form-group col-md-6 mb-2" id="designation_section"
                                                style="display: {{ old('generate_by', 'designation') == 'designation' ? 'block' : 'none' }};">
                                                <label for="designation">Designation</label>
                                                <select class="form-select select2" name="designation" id="designation">
                                                    <option value="">Select Designation</option>
                                                    @foreach ($designations as $designation)
                                                        <option value="{{ $designation->id }}" {{ old('designation') == $designation->id ? 'selected' : '' }}>
                                                            {{ $designation->designation }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('designation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                     <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Duration </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="duration" id="duration">
                                    <option value="">Select Duration</option>
                                    <option value="half_yearly">Half Yearly</option>
                                    <option value="quarterly">Quarterly</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2 news-year" >
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="year">
                                    <option value="">Select Year</option>
                                    @for ($i = date('Y'); $i >= 1950; $i--)
                                        <option value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group col-md-4 mb-2 news-month" >
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month </label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="month_duration" id="month">
                                    <option value="">Select Month</option>
                                    <option value="01-05">Jan-June</option>
                                    <option value="06-12">July-Dec</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                                                  <div class="form-group col-md-3 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Document Type</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-control" name="doc_type" id="doc_type">
                                                                    <option value="">Select Document Type</option>
                                                                    <option selected value="pdf"
                                                                        {{ old('doc_type') == 'pdf' ? 'selected' : '' }}>PDF
                                                                    </option>
                                                                    <option value="docx"
                                                                        {{ old('doc_type') == 'docx' ? 'selected' : '' }}>
                                                                        DOCX</option>
                                                                </select>
                                                            </div>
                                                            {{-- validation  --}}
                                                            @error('report_date')
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const memberSection = document.getElementById('member_section');
        const designationsection = document.getElementById('designation_section');
        const radios = document.querySelectorAll('input[name="generate_by"]');

        function toggleSections() {
            const selected = document.querySelector('input[name="generate_by"]:checked').value;

            if (selected === 'member') {
                memberSection.style.display = 'block';
                designationsection.style.display = 'none';
            } else if (selected === 'designation') {
                memberSection.style.display = 'none';
                designationsection.style.display = 'block';
            } else {
                memberSection.style.display = 'none';
                designationsection.style.display = 'none';
            }
        }

        // Initial toggle on page load
        toggleSections();

        // Add event listeners
        radios.forEach(radio => {
            radio.addEventListener('change', toggleSections);
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
                data: { e_status, _token: '{{ csrf_token() }}' },


                success: ({ members }) => {
                    // Reference the existing select element
                    const memberDropdown = $('#member_id');
                    memberDropdown.empty();
                    memberDropdown.append('<option value="">Select Member</option>');
                    members.forEach(({ id, name, emp_id }) => {
                        memberDropdown.append(`<option value="${id}">${name} (${emp_id})</option>`);
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
    <script>
        $(document).ready(function() {
            $('#duration').on('change', function() {
                var selected = $(this).val();

                if (selected === 'quarterly') {
                    $('#month').html(`
                    <option value="">Select Quarter</option>
                    <option value="01-03">Jan - Mar</option>
                    <option value="04-06">Apr - Jun</option>
                    <option value="07-09">Jul - Sep</option>
                    <option value="10-12">Oct - Dec</option>
                `);
                } else if (selected === 'half_yearly') {
                    $('#month').html(`
                    <option value="">Select Half-Year</option>
                    <option value="01-06">Jan - Jun</option>
                    <option value="07-12">Jul - Dec</option>
                `);
                }
            });

            // Trigger change if old value is present on page load
            $('#duration').trigger('change');
        });
    </script>
@endpush
