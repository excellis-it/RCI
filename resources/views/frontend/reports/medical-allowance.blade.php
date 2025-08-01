@extends('frontend.layouts.master')
@section('title')
Medical Allowance
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
                <h3>Medical Allowance Generate</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Medical Allowance</span></li>
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
                         <form action="{{ route('reports.medical-allowance-generate') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <!-- Generate By -->
                                        <div class="form-group col-md-12 mb-2">
                                            <label>Generate Data By:</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="generate_by" id="by_member"
                                                    value="member" {{ old('generate_by') == 'member' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="by_member">Member</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="generate_by" id="by_all"
                                                    value="all" {{ old('generate_by') == 'all' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="by_all">All</label>
                                            </div>
                                            @error('generate_by')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Employee Status -->
                                        <div class="form-group col-md-4 mb-2">
                                            <label>Employee Status</label>
                                            <select name="e_status" class="form-select" id="e_status">
                                                <option value="">Select Employee Status</option>
                                                <option value="active" {{ old('e_status') == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="deputation" {{ old('e_status') == 'deputation' ? 'selected' : '' }}>On Deputation</option>
                                            </select>
                                            @error('e_status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Member Selection -->
                                        <div class="form-group col-md-6 mb-2" id="member_section" style="display: {{ old('generate_by') == 'member' ? 'block' : 'none' }};">
                                            <label for="member_id">Member</label>
                                            <select class="form-select select2" name="member_id" id="member_id">
                                                <option value="">Select Member</option>
                                                {{-- You should populate this from controller --}}
                                            </select>
                                            @error('member_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Designation Selection -->


                                        <!-- Financial Year -->
                                        <div class="col-md-4">
                                            <label for="report_date">Report Date</label>
                                            <input type="date" name="report_date" class="form-control" id="report_date" value="{{old('report_date')}}">
                                            @error('report_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Senior A/c Officer Gde-I -->
                                        <div class="form-group col-md-4 mb-2 type-select">
                                            <label>Senior A/c Officer Gde-I Sign</label>
                                            <select name="senior_account_officer" class="form-select" id="senior_account_officer">
                                                <option value="">Select</option>
                                                @foreach ($senior_account_officers as $senior_account_officer)
                                                    <option value="{{ $senior_account_officer->id }}" {{ old('senior_account_officer') == $senior_account_officer->id ? 'selected' : '' }}>
                                                        {{ $senior_account_officer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                              @error('senior_account_officer')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
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
    // if choose education then call ajax and show children name1 and name2 box
    $(document).ready(function() {
        $('select[name="member_id"]').change(function() {
            var member_id = $(this).val();
            $('.total_allo').show();

            $.ajax({
                url: "{{ route('reports.member-newspaper-allocation') }}",
                type: 'POST',
                data: {
                    member_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $('#amount').val(response.newspaper_allo_amount.amount);
                    $('#remarks').val(response.newspaper_allo_amount.remarks);

                },
            });

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#member_id').change(function() {

                $('.cat_drop').hide();
                $('.month_drop').show();
                $('.emp_status').show();
                $('.member').show();
                $('.total_allo').show();

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
