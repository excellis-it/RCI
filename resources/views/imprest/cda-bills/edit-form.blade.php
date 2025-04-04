<div class="row mt-2">
    <div class="col-lg-12">
        <h4>Edit CDA Bill</h4>
        <form id="cda-bill-edit-form" data-id="{{ $cdaBill->id }}" method="POST">
            @csrf

            <div class="row align-items-center">
                <div class="form-group col-md-4">
                    <label for="">CDA Bill No</label>
                    <input type="text" class="form-control" name="cda_bill_no" id="cda_bill_no"
                        value="{{ $cdaBill->cda_bill_no }}">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="">CDA Bill Date</label>
                    <input type="date" class="form-control" name="cda_bill_date" id="cda_bill_date"
                        value="{{ $cdaBill->cda_bill_date }}">
                    <span class="text-danger"></span>
                </div>
                <div class="form-group col-md-4 mt-4">
                    <button type="submit" class="listing_add">
                        Update
                    </button>
                    <button type="button" id="cancel-edit" class="listing_exit ms-3">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-12">
        <h5>CDA Bill Details</h5>
        <table class="table table-bordered">
            <tr>
                <th>Advance No</th>
                <td>{{ $cdaBill->adv_no }}</td>
                <th>Advance Date</th>
                <td>{{ $cdaBill->adv_date }}</td>
            </tr>
            <tr>
                <th>Advance Amount</th>
                <td>{{ $cdaBill->adv_amount }}</td>
                <th>Bill Amount</th>
                <td>{{ $cdaBill->bill_amount }}</td>
            </tr>
            <tr>
                <th>Project</th>
                <td>{{ $cdaBill->project->name ?? 'N/A' }}</td>
                <th>Variable Type</th>
                <td>{{ $cdaBill->variableType->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Cheque No</th>
                <td>{{ $cdaBill->chq_no ?? 'N/A' }}</td>
                <th>Cheque Date</th>
                <td>{{ $cdaBill->chq_date ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>
</div>
