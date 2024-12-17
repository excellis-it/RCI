@if (isset($advance_bills) && count($advance_bills) > 0)
    <form action="{{ route('cda-receipts.store') }}" method="POST" id="cda-receipt-create-form">
        @csrf



        <table class="table ">
            <thead class="">
                <tr>

                    <th>CDA Bill No</th>
                    <th>CDA Bill Date</th>
                    <th>Adv No</th>
                    <th>Adv Date</th>
                    <th>Member Name</th>
                    <th>Amount</th>


                    <th>Project</th>
                    <th>Cheque No</th>
                    <th>Cheque Date</th>
                    <th>Variable Type</th>

                </tr>
            </thead>
            <tbody>
                @if (count($advance_bills) > 0)
                    @foreach ($advance_bills as $key => $advance_bill)
                        <input type="hidden" value="{{ $advance_bill->cda_bill_id }}" name="bill_id[]">
                        <tr>
                            <td>{{ $advance_bill->cda_bill_no }}</td>
                            <td>{{ $advance_bill->cda_bill_date }}</td>

                            <td>{{ $advance_bill->adv_no ?? 'N/A' }}</td>
                            <td>{{ $advance_bill->adv_date ?? 'N/A' }}</td>
                            <td>{{ $advance_bill->member->name ?? 'N/A' }}</td>
                            <td>{{ $advance_bill->adv_amount ?? 'N/A' }}</td>


                            <td>{{ $advance_bill->project->name ?? 'N/A' }}</td>
                            <td>{{ $advance_bill->chq_no ?? 'N/A' }}</td>
                            <td>{{ $advance_bill->chq_date ?? 'N/A' }}</td>
                            <td>{{ $advance_bill->variableType->name ?? 'N/A' }}</td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="11" class="text-center">No Advance Settlement Found</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Rct Vr. No</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="rct_vr_no" id="rct_vr_no"
                                        placeholder="" required>
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
                                    <input type="date" class="form-control" name="rct_vr_date" id="rct_vr_date"
                                        placeholder="" required>
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
                                    <input type="text" class="form-control" name="dv_no" id="dv_no"
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
                                    <label>DV Date</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" name="dv_date" id="dv_date"
                                        placeholder="" required>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rct Vr. Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="rct_vr_amount" id="rct_vr_amount"
                                    placeholder="" required>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Details</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="remark" id="remark" placeholder="">

                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-left mt-3">
                <div class="col-md-2">
                    <div class="mb-1">
                        <button type="submit" class="listing_add">Add</button>
                    </div>
                    {{-- <div class="mb-1">
                        <a href="" class="listing_exit">Back</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </form>
@else
    <center>
        <p>No Bills Found</p>
    </center>
@endif
