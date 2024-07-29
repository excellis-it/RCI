@extends('frontend.layouts.master')
@section('title')
    GPF Subscription Report Generate
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
                    <h3>Report Generate</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">GPF Subscription</span></li>
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
                            <form action="{{ route('reports.gpf-subscription-generate') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12 mb-2">
                                                    <div class="row align-items-center">
                                                        <!-- Existing fields -->
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Employee Status</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="e_status" class="form-select" id="e_status">
                                                                    <option value="">Select Employee Status</option>
                                                                    <option value="active">Active</option>
                                                                    <option value="deputation">On Deputation</option>
                                                                </select>
                                                                @if ($errors->has('e_status'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('e_status') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Members</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="member_id" class="form-select" id="member_id">
                                                                </select>
                                                                @if ($errors->has('member_id'))
                                                                    <div class="error" style="color:red;">
                                                                        {{ $errors->first('member_id') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- New fields for from year-month and to year-month -->
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>From Year-Month</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select name="from_year" class="form-select" id="from_year">
                                                                        @for ($year = now()->year; $year >= 2000; $year--)
                                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                                        @endfor
                                                                    </select>
                                                                    <select name="from_month" class="form-select" id="from_month">
                                                                        @for ($month = 1; $month <= 12; $month++)
                                                                            <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->format('F') }}</option>
                                                                        @endfor
                                                                    </select>
                                                                    @if ($errors->has('from_year') || $errors->has('from_month'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('from_year') }} {{ $errors->first('from_month') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>To Year-Month</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select name="to_year" class="form-select" id="to_year">
                                                                        @for ($year = now()->year; $year >= 2000; $year--)
                                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                                        @endfor
                                                                    </select>
                                                                    <select name="to_month" class="form-select" id="to_month">
                                                                        @for ($month = 1; $month <= 12; $month++)
                                                                            <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->format('F') }}</option>
                                                                        @endfor
                                                                    </select>
                                                                    @if ($errors->has('to_year') || $errors->has('to_month'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('to_year') }} {{ $errors->first('to_month') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Rest of the existing fields -->

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- save cancel button design in right corner --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row justify-content-end">
                                            <div class="col-md-3">
                                                <div class="row justify-content-end">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_add">Generate</button>
                                                    </div>
                                                    
                                                    {{-- <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_exit">Cancel</button>
                                                    </div> --}}
                                                </div>
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
            $('#e_status').change(function() {
                var e_status = $(this).val();

                $.ajax({
                    url: "{{ route('reports.get-all-members') }}",
                    type: 'POST',
                    data: { e_status, _token: '{{ csrf_token() }}' },
                    success: ({members}) => {
                        const memberDropdown = $('[name="member_id"]').empty().append('<option value="">Select Member</option>');
                        members.forEach(({id, name, emp_id}) => memberDropdown.append(`<option value="${id}">${name} (${emp_id})</option>`));
                    },
                    error: (xhr) => console.log(xhr)
                });
            });
        });
    </script>
@endpush
