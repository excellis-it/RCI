

<form id="search_receipt_form" method="POST">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">

                    @csrf
                    <div class="col-md-4">
                        <label for="">Vr. No</label>
                        <input type="number" class="form-control" name="vr_no" id="vr_no"
                            placeholder="Enter Vr. No">
                        <span class="text-danger"></span>
                    </div>
                    <div class="col-md-4">
                        <label for="">Vr. Date</label>
                        <input type="date" class="form-control" name="vr_date" id="vr_date"
                            placeholder="Enter Vr. Date">
                        <span class="text-danger"></span>
                    </div>
                    <div class="col-md-4">
                        <label for="">&nbsp;</label>
                        <button type="submit" class="btn btn-primary" id="search_vr">
                            Search
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<div id="receipt_data">

</div>

<form action="{{ route('cheque-payments.store') }}" method="POST" id="cheque-payment-create-form">
    @csrf

    <div class="row">
        <div class="col-12">
            <div class="form-group mb-2">
                <div class="row align-items-center">

                    @csrf

                    <input type="hidden" value="" name="receipt_no" id="create_receipt_no">
                    <input type="hidden" value="" name="vr_no" id="create_vr_no">
                    <input type="hidden" value="" name="vr_date" id="create_vr_date">
                    <div class="col-md-3">
                        <label for="">Amount</label>
                        <input type="number" id="pay_amount" class="form-control" name="amount" required readonly>
                        <span class="text-danger"></span>
                    </div>
                    <div class="col-md-3">
                        <label for="">Bill Ref</label>
                        <input type="text" class="form-control" name="bill_ref"
                            >
                        <span class="text-danger"></span>
                    </div>

                    <div class="col-md-3">
                        <label for="">Cheque No.</label>
                        <input type="number" class="form-control" name="cheq_no"
                            >
                        <span class="text-danger"></span>
                    </div>

                    <div class="col-md-3">
                        <label for="">Cheque Date</label>
                        <input type="date" class="form-control" name="cheq_date"
                            >
                        <span class="text-danger"></span>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <br>
    <div class="row">
        <div class="col-md-2 ml-auto">
            <div class="mb-1">
                <button type="submit" class="listing_add">Add</button>
            </div>
            <div class="mb-1">
                <a href="" class="listing_exit">Back</a>
            </div>
        </div>
    </div>
</form>






