@extends('imprest.layouts.master')
@section('title')
CDA Receipt List
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
            <div class="arrow_left"><a href="{{ route('cda-receipt.index') }}" class="text-white"><i
                        class="ti ti-arrow-left"></i></a></div>
            <div class="">
                <h3>CDA Receipt Create</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">CDA Receipt Create</span></li>
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
                        @if(isset($edit))
                            <form action="{{ route('cda-receipt.update', $cdaReceipt->id) }}" method="POST" id="cda-receipt-edit-form">
                                @method('PUT')
                                @csrf

                                
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="row">
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Rct Vr. No</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="voucher_no" id="voucher_no" value="{{ $cdaReceipt->voucher_no }}"
                                                                placeholder="" readonly>
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Rct Vr. Date</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="voucher_date" id="voucher_date" value="{{ $cdaReceipt->voucher_date }}"
                                                                placeholder="" >
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>DV Date</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="dv_date" id="dv_date" value="{{ $cdaReceipt->dv_date }}"
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row justify-content-between">
                                    <div class="col-xl-8 mb-lg-3">
                                        <div class="row justify-content-end">
                                            <div class="form-group col-md-4">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Rct Vr. Amt</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="amount" id="amount" value="{{ $cdaReceipt->amount }}"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Details</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-inline">
                                                            @foreach ($cdaReceiptDetails as $key => $cdaReceiptDetail)
                                                                <div class="form-check form-check-inline ml-2">
                                                                    {{-- <input class="form-check-input" type="radio" name="details"
                                                                        id="inlineRadio{{ $key }}" value="{{ $cdaReceiptDetail->id }}" @if($cdaReceiptDetail->id == $cdaReceipt->details) checked @endif>
                                                                    <label class="form-check-label" for="inlineRadio{{ $key }}">{{ $cdaReceiptDetail->name }}</label> --}}
                                                                    <select>
                                                                        <option value="{{ $cdaReceiptDetail->id }}" @if($cdaReceiptDetail->id == $cdaReceipt->details) selected @endif>{{ $cdaReceiptDetail->name }}</option>
                                                                    </select>
                                                                </div>
                                                            @endforeach
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="row justify-content-end">
                                            <div class="form-group col-md-6 mb-2">
                                                <button type="submit" class="listing_add">Update</button>
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <button type="submit" class="listing_exit">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('cda-receipt.store') }}" method="POST" id="cda-receipt-create-form">
                                @csrf

                                
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="row">
                                            
                                            {{-- <div class="col-lg-4">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Rct Vr. No</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="voucher_no" id="voucher_no" value="{{ $cdaReceipt->voucher_no }}"
                                                                placeholder="" readonly>
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Rct Vr. Date</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="date" class="form-control" name="voucher_date" id="voucher_date" 
                                                                placeholder="" >
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>DV Date</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="date" class="form-control" name="dv_date" id="dv_date" 
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row justify-content-between">
                                    <div class="col-xl-8 mb-lg-3">
                                        <div class="row justify-content-end">
                                            <div class="form-group col-md-4">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Rct Vr. Amt</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="amount" id="amount" 
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-8">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Details</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-inline">
                                                            
                                                                <div class="form-check form-check-inline ml-2">
                                                                    
                                                                    <select name="details" class="form-control">
                                                                        @foreach ($cdaReceiptDetails as $key => $cdaReceiptDetail)    
                                                                        <option value="{{ $cdaReceiptDetail->id }}" >{{ $cdaReceiptDetail->details }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    
                                                                </div>
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="row justify-content-end">
                                            <div class="form-group col-md-6 mb-2">
                                                <button type="submit" class="listing_add">Add</button>
                                            </div>
                                            <div class="form-group col-md-6 mb-2">
                                                <button type="submit" class="listing_exit">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection