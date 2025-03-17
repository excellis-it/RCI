@extends('inventory.layouts.master')
@section('title')
    Members List
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
                <div class="arrow_left"><a href="{{ route('inventory-members.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Member update</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member update</span></li>
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

                            <form action="{{ route('inventory-members.update', $member->id) }}" method="POST"
                                id="member-update-form">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-4 mb-2">
                                        <label for="e_status">Employment Status</label>
                                        <select class="form-select" name="e_status" id="e_status">
                                            <option value="">Select</option>
                                            <option value="active" {{ $member->e_status == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="deputation"
                                                {{ $member->e_status == 'deputation' ? 'selected' : '' }}>On Deputation
                                            </option>
                                            <option value="contractual"
                                                {{ $member->e_status == 'contractual' ? 'selected' : '' }}>Contractual
                                            </option>
                                            <option value="retired" {{ $member->e_status == 'retired' ? 'selected' : '' }}>
                                                Retired</option>
                                            <option value="suspended"
                                                {{ $member->e_status == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                            <option value="transferred"
                                                {{ $member->e_status == 'transferred' ? 'selected' : '' }}>Transferred
                                            </option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="form-group col-md-4 mb-2">
                                        <label>Pers No</label>
                                        <input type="text" class="form-control" name="pers_no" id="pers_no"
                                            value="{{ old('pers_no', $member->pers_no) }}">
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="form-group col-md-4 mb-2">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', $member->name) }}">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Gender</label>
                                        <select class="form-select" name="gender" id="gender">
                                            <option value="">Select</option>
                                            <option value="Male" {{ $member->gender == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female" {{ $member->gender == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="Others" {{ $member->gender == 'Others' ? 'selected' : '' }}>
                                                Others</option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <label>Group</label>
                                        <select class="form-select" name="group" id="group">
                                            <option value="">Select</option>
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}"
                                                    {{ $member->group == $group->id ? 'selected' : '' }}>
                                                    {{ $group->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <label>Desig</label>
                                        <select class="form-select" name="desig" id="desig">
                                            <option value="">Select</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation->id }}"
                                                    {{ $member->desig == $designation->id ? 'selected' : '' }}>
                                                    {{ $designation->designation }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <label>Division</label>
                                        <select class="form-select" name="division" id="division">
                                            <option value="">Select</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}"
                                                    {{ $member->division == $division->id ? 'selected' : '' }}>
                                                    {{ $division->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4 mb-2">
                                        <label>Cadre</label>
                                        <select class="form-select" name="cadre" id="cadre">
                                            <option value="">Select</option>
                                            @foreach ($cadres as $cadre)
                                                <option value="{{ $cadre->id }}"
                                                    {{ $member->cadre == $cadre->id ? 'selected' : '' }}>
                                                    {{ $cadre->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="form-group col-md-4 mb-2">
                                        <label>DOB</label>
                                        @php $maxDate = date('Y-m-d', strtotime('-18 years')); @endphp
                                        <input type="date" class="form-control" name="dob" id="dob"
                                            value="{{ old('dob', $member->dob) }}" max="{{ $maxDate }}">
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="form-group col-md-4 mb-2">
                                        <label>DOJ Lab</label>
                                        <input type="date" class="form-control" name="doj_lab" id="doj_lab"
                                            value="{{ old('doj_lab', $member->doj_lab) }}">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>DOJ Service1</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" name="doj_service1"
                                                    id="doj_service1"
                                                    value="{{ old('doj_service1', $member->doj_service1) }}"
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label>DOP</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="date" class="form-control" name="dop" id="dop"
                                                    value="{{ old('dop', $member->dop) }}" placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-2">
                                        <label>Fund Type</label>
                                        <select class="form-select" name="fund_type" id="fund_type">
                                            <option value="">Select</option>
                                            <option value="NPS" {{ $member->fund_type == 'NPS' ? 'selected' : '' }}>NPS
                                            </option>
                                            <option value="GPF" {{ $member->fund_type == 'GPF' ? 'selected' : '' }}>GPF
                                            </option>
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <label>Category</label>
                                        <select class="form-select" name="category_id" id="category">
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $member->category == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>



                                <div class="row justify-content-between mt-3">
                                    <div class="form-group col-md-2 mb-2">
                                        <button type="submit" class="listing_add">Update</button>
                                    </div>
                                    <div class="form-group col-md-2 mb-2">
                                        <button type="reset" class="listing_exit">Cancel</button>
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
        $(document).ready(function() {
            var lastId = localStorage.getItem('lastId');
            if (lastId === null) {
                lastId = 1;
            } else {
                lastId = parseInt(lastId) + 1;
            }

            var randomId = 'RCI_CHESS' + String(lastId).padStart(4, '0');
            localStorage.setItem('lastId', lastId);
            document.getElementById('emp_id').value = randomId;
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $('#member-update-form').on('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission

                    let form = $(this);
                    let formData = form.serialize(); // Serialize form data

                    $('.text-danger').text(''); // Clear previous errors

                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                location.href = "{{route('inventory-members.index')}}"
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $('[name="' + key + '"]').next(
                                        '.text-danger').text(value[
                                        0]); // Show validation errors
                                });
                            } else {
                                toastr.error('Something went wrong! Please try again.');
                            }
                        }
                    });
                });
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#doj_lab').on('input', function() {
                var doj_lab = $(this).val();
                var doj_lab_year = new Date(doj_lab).getFullYear();
                if (doj_lab_year > 2004) {
                    $('#fund_type').val('NPS');
                    $('#nps_div').prop('hidden', false);
                    $('#gpf_div').prop('hidden', true);
                } else {
                    $('#fund_type').val('GPF');
                    $('#gpf_div').prop('hidden', false);
                    $('#nps_div').prop('hidden', true);
                }

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('input[name="nps_available"]').change(function() {
                if ($(this).val() === 'Yes') {
                    $('#nps_div').prop('hidden', false);
                    $('#gpf_div').prop('hidden', true);
                } else {
                    $('#nps_div').prop('hidden', true);
                    $('#gpf_div').prop('hidden', false);
                }
            });
        });
    </script>
@endpush
