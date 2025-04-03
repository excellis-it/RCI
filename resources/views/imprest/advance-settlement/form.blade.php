@if (isset($edit))
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <p>Advance Fund:</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                {{-- <th>Employee ID</th>
                                <th>Name</th> --}}
                                <th>Advance No</th>
                                <th>Advance Date</th>
                                <th>Advance Amount</th>
                                <th>Project</th>
                                <th>Cheque No</th>
                                <th>Cheque Date</th>
                                <th>Variable Type</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- <td>{{ $advance_settlement->emp_id ?? 'N/A' }}</td>
                                <td>{{ $advance_settlement->member->name ?? 'N/A' }}</td> --}}
                                <td>{{ $advance_funds->adv_no ?? 'N/A' }}</td>
                                <td>{{ $advance_funds->adv_date ?? 'N/A' }}</td>
                                <td>{{ $advance_funds->adv_amount ?? 'N/A' }}</td>
                                <td>{{ $advance_funds->project->name ?? 'N/A' }}</td>
                                <td>{{ $advance_funds->chq_no ?? 'N/A' }}</td>
                                <td>{{ $advance_funds->chq_date ?? 'N/A' }}</td>
                                <td>{{ isset($advance_funds->variableType) ? $advance_funds->variableType->name : 'N/A' }}
                                </td>

                            </tr>
                        </tbody>
                    </table>


                    <p>Advance Settlement History:</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>


                                <th>Advance No</th>
                                <th>Advance Date</th>
                                {{-- <th>Member Name</th> --}}
                                <th>Advance Amount</th>
                                <th>Bill Amount</th>
                                <th>Balance</th>
                                <th>Project</th>
                                <th>Cheque No</th>
                                <th>Cheque Date</th>
                                <th>Variable Type</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $advance_settlement->adv_no ?? 'N/A' }}</td>
                                <td>{{ $advance_settlement->adv_date ?? 'N/A' }}</td>
                                {{-- <td>{{ $advance_settlement->member->name ?? 'N/A' }}</td> --}}
                                <td>{{ $advance_settlement->adv_amount ?? 'N/A' }}</td>
                                <td>{{ $advance_settlement->bill_amount ?? 'N/A' }}</td>
                                <td>{{ $advance_settlement->balance ?? 'N/A' }}</td>
                                <td>{{ $advance_settlement->project->name ?? 'N/A' }}</td>
                                <td>{{ $advance_settlement->chq_no ?? 'N/A' }}</td>
                                <td>{{ $advance_settlement->chq_date ?? 'N/A' }}</td>
                                <td>{{ isset($advance_settlement->variableType) ? $advance_settlement->variableType->name : 'N/A' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>



                    <form action="{{ route('advance-settlement.update', $advance_settlement->id) }}" method="POST"
                        id="advance-settlement-update-form">
                        @csrf
                        @method('PUT')

                        <div class="row">



                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Adv amt</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" step="any" class="form-control" name="adv_amount"
                                            id="adv_amount" value="{{ $advance_settlement->adv_amount }}"
                                            placeholder="" readonly>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            {{-- adv_date --}}
                            {{-- <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Adv Date</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control" name="adv_date" id="adv_date"
                                            value="{{ $advance_settlement->adv_date }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Vr Amount</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="var_amount" id="var_amount"
                                            value="{{ $advance_settlement->var_amount }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Chq No</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="chq_no" id="chq_no"
                                            value="{{ $advance_settlement->chq_no }}" placeholder="">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Chq Date</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="date" class="form-control" name="chq_date" id="chq_date"
                                            value="{{ $advance_settlement->chq_date }}" placeholder="">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Firm</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="firm" id="firm"
                                            value="{{ $advance_settlement->firm }}" placeholder="">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Bill Amount</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="number" step="any" class="form-control" name="bill_amount"
                                            id="bill_amount" value="{{ $advance_settlement->bill_amount }}"
                                            placeholder="">
                                        <span class="text-danger advamnt_msg"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3 mb-2">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <label>Balance</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" id="main_amount" class="form-control" name="main_amount"
                                            value="{{ $advance_settlement->adv_amount }}">
                                        <input type="number" step="any" class="form-control" name="balance"
                                            id="balance" value="{{ $advance_settlement->balance }}" placeholder=""
                                            required readonly>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>



                        </div>






                        {{-- save cancel button design in right corner --}}


                        <div class="row justify-content-between mt-3">


                            <div class="form-group col-md-2 mb-2">
                                <a href="" type="reset" class="listing_exit">Back</a>
                            </div>
                            <div class="form-group col-md-2 mb-2">

                                <button type="submit" class="listing_add" id="save_settle_btn">Update</button>

                            </div>


                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div id="form">


                        <form action="" method="post" id="searchAdv-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-3 mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <label>Adv No</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="adv_no"
                                                value="{{ old('adv_no') ?? '' }}" placeholder="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <label>Adv Date</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="date" class="form-control" name="adv_date"
                                                value="{{ old('adv_date') ?? '' }}" placeholder="">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-3 mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <label></label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary" id="searchAdv"
                                                value="Search">

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </form>



                        <div id="advDataDiv">



                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
@endif
