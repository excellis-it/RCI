@extends('frontend.public-fund.layouts.master')
@section('title')
    Receipts Edit
@endsection

@push('styles')
@endpush

@php
    use App\Helpers\Helper;
@endphp

@section('content')
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="{{ route('receipts.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3> Edit</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Receipts </span></li>
                    </ul>
                </div>
            </div>
        </div>


        <!--  Row 1 -->
        <div class="row">


            <div class="container">
                <form action="{{ route('receipts.update', $receipt->id) }}" method="POST" id="receipts-edit-form">
                    @csrf
                    @method('PUT')
                    <div class="row align-items-center">
                        <div class="col-md-10">
                            <div class="row">

                                <div class="form-group col-md-4 mb-2">
                                    <label>Vr. Date</label>
                                    <input type="date" class="form-control" name="vr_date"
                                        value="{{ $receipt->vr_date }}">
                                    <span class="text-danger"></span>
                                </div>

                                <div class="form-group col-md-4 mb-2">
                                    <label>DV No.</label>
                                    <input type="text" class="form-control" name="dv_no" value="{{ $receipt->dv_no }}">
                                    <span class="text-danger"></span>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <label for="dynamic-fields">Edit Members</label>
                                    <div id="dynamic-fields">
                                        @foreach ($receipt->receiptMembers as $index => $member)
                                            <div class="dynamic-section row mb-3">
                                                <div class="col-md-2">
                                                    <label>Sr No.</label>
                                                    <input type="text" class="form-control sr-no" name="sr_no[]" readonly
                                                        value="{{ $member->serial_no }}">
                                                </div>
                                                <div class="form-group col-md-2 mb-2">
                                                    <label>Member</label>
                                                    <select class="form-control vendor_id" name="member_id[]">
                                                        <option value="">Select</option>
                                                        @foreach ($members as $memberOption)
                                                            <option value="{{ $memberOption->id }}"
                                                                {{ $memberOption->id == $member->member_id ? 'selected' : '' }}>
                                                                {{ $memberOption->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Amount</label>
                                                    <input type="text" class="form-control" name="member_amount[]"
                                                        value="{{ $member->amount }}">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Bill reference</label>
                                                    <input type="text" class="form-control" name="bill_ref[]"
                                                        value="{{ $member->bill_ref }}">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Cheque No.</label>
                                                    <input type="text" class="form-control" name="cheq_no[]"
                                                        value="{{ $member->cheq_no }}">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Cheque Date</label>
                                                    <input type="date" class="form-control" name="cheq_date[]"
                                                        value="{{ $member->cheq_date }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                                <div class="form-group mb-2 col-md-4">
                                    <label>Narration</label>
                                    <textarea type="text" class="form-control" name="narration">{{ $receipt->narration }}</textarea>
                                    <span class="text-danger"></span>
                                </div>

                                <div class="form-group mb-2 col-md-4">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        @foreach ($paymentCategories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $receipt->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-2 col-md-6">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('receipts.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
