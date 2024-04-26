@extends('frontend.public-fund.layouts.master')
@section('title')
Cheque Payment Create
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
                <div class="arrow_left"><a href="{{ route('cash-payments.index') }}" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                @if(isset($edit))
                <div class="">
                    <h3>Cheque Payment Update</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Cheque Payment Update</span></li>
                    </ul>
                </div>
                @else
                <div class="">
                    <h3>Cheque Payment Create</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Cheque Payment Create</span></li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            @if(isset($edit))
                                <form action="{{ route('cheque-payments.update', $chequePayment->id) }}" method="POST" id="cheque-payment-edit-form">
                                    @method('PUT')
                                    @csrf

                                    
                                    <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Vr. No</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="vr_no" id="vr_no"
                                                            value="{{ $chequePayment->vr_no }}" placeholder="" readonly>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Vr. Date</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control" name="vr_date" id="vr_date"
                                                            value="{{ $chequePayment->vr_date }}" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Sr. No</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="sr_no" id="sr_no"
                                                            value="{{ $chequePayment->sr_no }}" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Amount</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="amount" id="amount"
                                                            value="{{ $chequePayment->amount }}" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="name"
                                                            id="name" value="{{ $chequePayment->name }}" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Desig</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="designation" id="designation" value="{{ $chequePayment->designation }}" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Bill Ref</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="bill_ref" id="bill_ref" value="{{ $chequePayment->bill_ref }}" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Bank A/C</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="bank_account" id="bank_account" value="{{ $chequePayment->bank_account }}" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DV No</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="dv_no" id="dv_no" value="{{ $chequePayment->dv_no }}" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-5">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Chq No</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="cheque_no" id="cheque_no" value="{{ $chequePayment->cheque_no }}" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Chq Date</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control" name="cheque_date" id="cheque_date" value="{{ $chequePayment->cheque_date }}" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Narration</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="narration"
                                                            id="narration" value="{{ $chequePayment->narration }}" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between mb-3">
                                        <div class="col-xl-7 mb-lg-3">
                                            <div class="form-group">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Category</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-inline">
                                                            @foreach($paymentCategories as $key => $paymentCategory)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="category" id="inlineRadio{{ $key }}" value="{{ $paymentCategory->id }}" @if($paymentCategory->id == $chequePayment->category) checked @endif>
                                                                    <label class="form-check-label"
                                                                        for="inlineRadio{{ $key }}">{{ $paymentCategory->name }}</label>
                                                                </div>
                                                            @endforeach
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
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
                                <form action="{{ route('cheque-payments.store') }}" method="POST" id="cheque-payment-create-form">
                                    @csrf

                                    {{-- @php 
                                        $constantString = $voucherText->voucher_no_text ?? 'RCI-CHESS-';
                                        
                                        if(isset($chequePayment))
                                        {
                                            $serial_no = Str::substr($chequePayment->vr_no, -1);
                                            $counter = $serial_no + 1;
                                            // dd($serial_no);
                                        } else {
                                            $counter = 1;
                                        }
                                            
                                        // $counter = 1;  
                                    @endphp --}}
                                    {{-- <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Vr. No</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="vr_no" id="vr_no"
                                                            value="{{ $constantString . $counter++ }}" placeholder="" readonly>
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Vr. Date</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control" name="vr_date" id="vr_date"
                                                            value="" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Sr. No</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="sr_no" id="sr_no"
                                                            value="" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Amount</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="amount" id="amount"
                                                            value="" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="name"
                                                            id="name" value="" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Desig</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="designation" id="designation" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Bill Ref</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="bill_ref" id="bill_ref" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Bank A/C</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="bank_account" id="bank_account" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DV No</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="dv_no" id="dv_no" value="" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-5">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Chq No</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="cheque_no" id="cheque_no" value="" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Chq Date</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="date" class="form-control" name="cheque_date" id="cheque_date" value="" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Narration</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="narration"
                                                            id="narration" value="" placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between mb-3">
                                        <div class="col-xl-7 mb-lg-3">
                                            <div class="form-group">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label>Category</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-inline">
                                                            @foreach($paymentCategories as $key => $paymentCategory)
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="category" id="inlineRadio{{ $key }}" value="{{ $paymentCategory->id }}">
                                                                    <label class="form-check-label"
                                                                        for="inlineRadio{{ $key }}">{{ $paymentCategory->name }}</label>
                                                                </div>
                                                            @endforeach
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="row justify-content-end">
                                                <div class="form-group col-md-6 mb-2">
                                                    <button type="submit" class="listing_add">Save</button>
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

@push('script')
<script>
    $(document).ready(function() {
        $('#cheque-payment-create-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
        

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                success: function(response) {
                   
                    //windows load with toastr message
                    window.location.reload();
                },
                error: function(xhr) {
                   
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