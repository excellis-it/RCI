
                        @if(isset($edit))
                            <form action="{{ route('cash-payments.update', $cashPayment->id) }}" method="POST" id="cash-payment-edit-form">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Vr. Date</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="date" class="form-control" value="{{ $cashPayment->vr_date }}" name="vr_date" id="vr_date" 
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Amount</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" value="{{ $cashPayment->amount }}" name="amount" id="amount" 
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Vr No</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" value="{{ $cashPayment->vr_no }}" 
                                                                placeholder="" readonly>
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Rct No</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" value="{{ $cashPayment->rct_no }}" name="rct_no" id="rct_no" 
                                                        placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Form</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" value="{{ $cashPayment->form }}" name="form" id="form" 
                                                        placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Details</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" value="{{ $cashPayment->details }}" name="details" id="details" 
                                                        placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group ">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" value="{{ $cashPayment->name }}"  name="name" id="name" 
                                                        placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row justify-content-between">
                                    <div class="col-xl-7 mb-lg-3">
                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Category</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-inline">
                                                        @foreach ($paymentCategories as $key => $paymentCategory)
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio" name="category"
                                                                    id="inlineRadio{{ $key }}" value="{{ $paymentCategory->id }}" {{ $cashPayment->category == $paymentCategory->id ? 'checked':'' }}>
                                                                <label class="form-check-label" for="inlineRadio{{ $key }}">{{ $paymentCategory->name }}</label>
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
                                                <button type="reset" class="listing_exit">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('cash-payments.store') }}" method="POST" id="cash-payment-create-form">
                                @csrf

                                
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Vr. Date</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="date" class="form-control" name="vr_date" id="vr_date" value=""
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <label>Amount</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" name="amount" id="amount" value=""
                                                                placeholder="">
                                                            <span class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Rct No</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="rct_no" id="rct_no" value=""
                                                        placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Form</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="form" id="form" value=""
                                                        placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Details</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="details" id="details" value=""
                                                        placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                
                                    <div class="col-lg-6">
                                        <div class="form-group ">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="name" id="name" value=""
                                                        placeholder="">
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-xl-7 mb-lg-3">
                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <label>Category</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-inline">
                                                        @foreach ($paymentCategories as $key => $paymentCategory)
                                                            <div class="form-check form-check-inline ml-2">
                                                                <input class="form-check-input" type="radio" name="category"
                                                                    id="inlineRadio{{ $key }}" value="{{ $paymentCategory->id }}">
                                                                <label class="form-check-label" for="inlineRadio{{ $key }}">{{ $paymentCategory->name }}</label>
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
                    
