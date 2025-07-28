@extends('frontend.layouts.master')
@section('title')
    Last Pay Certificate Generate
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
                        <li><span class="bread-blod">Last Pay Certificate</span></li>
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
                            <form action="{{ route('reports.last-pay-certificate-generate') }}" method="POST">
                                @csrf

                                <div class="row">
                                    {{-- Member Selection --}}
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="member_id">Members</label>
                                        <select name="member_id" id="member_id" class="form-select search-select-box">
                                            <option value="">Select Member</option>
                                            @foreach ($members as $member)
                                                <option value="{{ $member->id }}"
                                                    {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                                    {{ $member->name }} ({{ $member->emp_id }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('member_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Proceeding To --}}
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="proceeding_to">Proceeding To</label>
                                        <input type="text" name="proceeding_to" id="proceeding_to" class="form-control"
                                            placeholder="Enter proceeding location" value="{{ old('proceeding_to') }}">
                                        @error('proceeding_to')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Authority for Transfer & Date --}}
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="transfer_authority">Authority for Transfer & Date</label>
                                        <input type="text" name="transfer_authority" id="transfer_authority"
                                            class="form-control" placeholder="e.g. Admin Order dated..."
                                            value="{{ old('transfer_authority') }}">
                                        @error('transfer_authority')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Date upto and for which paid --}}
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="paid_upto_date">Date upto and for which paid</label>
                                        <input type="date" name="paid_upto_date" id="paid_upto_date" class="form-control"
                                            value="{{ old('paid_upto_date') }}">
                                        @error('paid_upto_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Date of Strike of Strength --}}
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="strike_strength_date">Date of Strike of Strength</label>
                                        <input type="date" name="strike_strength_date" id="strike_strength_date"
                                            class="form-control" value="{{ old('strike_strength_date') }}">
                                        @error('strike_strength_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- A/c Officer Sign --}}
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="account_officer_sign">A/c Off Sign</label>
                                        <select name="account_officer_sign" id="account_officer_sign" class="form-control">
                                            <option value="">Select Accountant</option>
                                            @foreach ($accountants as $accountant)
                                                <option value="{{ $accountant->id }}"
                                                    {{ old('account_officer_sign') == $accountant->id ? 'selected' : '' }}>
                                                    {{ $accountant->user_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('account_officer_sign')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Notes --}}
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="note">Notes</label>
                                        <textarea name="note" id="note" class="form-control" rows="5" placeholder="Enter any note...">{{ old('note') }}</textarea>
                                        @error('note')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Submit --}}
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Generate</button>
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
        var select_box_element = document.querySelector('.search-select-box');
        dselect(select_box_element, {
            search: true
        });
    </script>
@endpush
