@extends('frontend.layouts.master')
@section('title')
    RECOVERY SCHEDULE NPS Generate
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
                <div class="arrow_left"><a href="{{ route('members.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>RECOVERY SCHEDULE NPS Generate</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">RECOVERY SCHEDULE NPS </span></li>
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
                            <form action="{{ route('reports.recovery-nps-report-generate') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            {{-- <div class="form-group col-md-4 mb-2">
                                                <div class="col-md-12">
                                                    <label>Category</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <select name="category" class="form-select" id="category">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->category }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('category'))
                                                        <div class="error" style="color:red;">
                                                            {{ $errors->first('category') }}</div>
                                                    @endif

                                                </div>
                                            </div> --}}

                                            <div class="form-group col-md-4 mb-2 ">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Year</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="year" class="form-select" id="report_year">
                                                            <option value="">Select Year</option>
                                                            @for ($i = date('Y'); $i >= 1950; $i--)
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                        @if ($errors->has('year'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('year') }}</div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Month</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <select name="month" class="form-select" id="report_month">
                                                            <option value="">Select Month</option>
                                                        </select>
                                                        @if ($errors->has('month'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('month') }}</div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row justify-content-end">
                                            <div class="form-group col-md-12 mb-2">
                                                <button type="submit" class="listing_add mt-3">Generate</button>
                                            </div>
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
@endpush
