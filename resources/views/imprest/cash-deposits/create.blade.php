@php
    use App\Helpers\Helper;
@endphp
<div class=" row card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Create Cash Deposit</h5>

        <form method="POST" action="{{ route('cash-deposits.store') }}">
            @csrf

            <div class="row mb-3">
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="vr_no" class="form-label">VR No</label>
                        <input type="text" class="form-control @error('vr_no') is-invalid @enderror" id="vr_no"
                            name="vr_no" value="{{ $newVrNo }}" readonly>
                        @error('vr_no')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="vr_date" class="form-label">VR Date</label>
                        <input type="date" class="form-control @error('vr_date') is-invalid @enderror" id="vr_date"
                            name="vr_date" value="{{ old('vr_date', date('Y-m-d')) }}">
                        @error('vr_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="rct_no" class="form-label">Receipt No</label>
                        <input type="text" class="form-control @error('rct_no') is-invalid @enderror" id="rct_no"
                            name="rct_no" value="{{ old('rct_no') }}">
                        @error('rct_no')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="rct_date" class="form-label">Receipt Date</label>
                        <input type="date" class="form-control @error('rct_date') is-invalid @enderror"
                            id="rct_date" name="rct_date" value="{{ old('rct_date', date('Y-m-d')) }}">
                        @error('rct_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" step="any" step="0.01"
                            class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount"
                            value="{{ Helper::getImprestCashInHand() }}" max="{{ Helper::getImprestCashInHand() }}">
                        <small id="amountHelp" class="form-text text-muted">Maximum:
                            {{ Helper::getImprestCashInHand() }}</small><br>
                        <span id="amountError" class="text-danger" style="display: none;"></span>
                        @error('amount')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 mt-3">

                </div>
            </div>

            <div class="row d-flex justify-content-between mt-3">

                <div class="col-md-2">
                    <button type="reset" class="listing_exit">Back</button>
                </div>
                <div class="col-md-2 text-end">
                    <button type="submit" class="listing_add">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
