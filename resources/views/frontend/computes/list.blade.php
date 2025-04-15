@extends('frontend.layouts.master')
@section('title')
    Compute List
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
                    <h3>Compute </h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Compute </span></li>
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
                            <form action="{{ route('computes.store') }}" method="POST" id="income-tax-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">

                                            <!-- Selection Type (Member or Category) -->
                                            <div class="form-group col-md-12 mb-2">
                                                <label>Generate Data By:</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="generate_by" id="by_member" value="member" checked>
                                                    <label class="form-check-label" for="by_member">Member</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="generate_by" id="by_category" value="category">
                                                    <label class="form-check-label" for="by_category">Category</label>
                                                </div>
                                            </div>

                                            <!-- Month Dropdown -->
                                            <div class="form-group col-md-6 mb-2">
                                                <label for="month">Month</label>
                                                <select class="form-select" name="month" id="month">
                                                    <option value="">Select Month</option>
                                                    @foreach (range(1, 12) as $m)
                                                        <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}">
                                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>

                                            <!-- Year Dropdown -->
                                            <div class="form-group col-md-6 mb-2">
                                                <label for="year">Year</label>
                                                <select class="form-select" name="year" id="year">
                                                    <option value="">Select Year</option>
                                                    @php $currentYear = date('Y'); @endphp
                                                    @for ($i = $currentYear; $i >= 2000; $i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>

                                            <!-- Member Selection -->
                                            <div class="form-group col-md-6 mb-2" id="member_section">
                                                <label for="member_id">Member</label>
                                                <select class="form-select" name="member_id" id="member_id">
                                                    <option value="">Select Member</option>
                                                    @foreach ($members as $member)
                                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>

                                            <!-- Category Selection -->
                                            <div class="form-group col-md-6 mb-2" id="category_section" style="display: none;">
                                                <label for="category_id">Category</label>
                                                <select class="form-select" name="category_id" id="category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3 d-flex">
                                    <div class="col-md-2">
                                        <a href="{{ route('computes.index') }}" class="listing_exit">Exit</a>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="listing_add">Generate</button>
                                    </div>
                                </div>
                            </form>


                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                <div class="row justify-content-end">
                                    <div class="col-md-5 col-lg-3 mb-2">
                                        {{-- <div class="position-relative">
                                            <input type="text" class="form-control search_table" value=""
                                                id="search" placeholder="Search">
                                            <span class="table_search_icon"><i class="fa fa-search"></i></span>
                                        </div> --}}
                                    </div>
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
    document.addEventListener('DOMContentLoaded', function () {
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

        byMember.addEventListener('change', toggleFields);
        byCategory.addEventListener('change', toggleFields);
    });
</script>
<script>
    $(document).ready(function() {
        $('#income-tax-form').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            $('#loading').addClass('loading');
            $('#loading-content').addClass('loading-content');
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                success: function(response) {
                    //windows load with toastr message
                    if (response.status == true) {
                        $('.text-danger').html('');
                        window.location.reload();
                    } else {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                        $('.text-danger').html('');
                        toastr.error(response.message);
                    }

                },
                error: function(xhr) {
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
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
