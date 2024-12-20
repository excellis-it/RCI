@if ($receipt_data)
    <input type="hidden" value="" name="receipt_no[]" id="create_receipt_no_{{ $receipt_data->id }}">
    <input type="hidden" value="" name="vr_no[]" id="create_vr_no_{{ $receipt_data->id }}">
    <input type="hidden" value="" name="vr_date[]" id="create_vr_date_{{ $receipt_data->id }}">
    <input type="hidden" class="form-control rct-chqno-in" name="cheq_no[]" id="cheq_no_{{ $receipt_data->id }}">
    <input type="hidden" class="form-control rct-chqdt-in" name="cheq_date[]" id="cheq_date_{{ $receipt_data->id }}">
    <input type="hidden" name="is_paid[]" id="create_ispaid_{{ $receipt_data->id }}">
    <div id="rcpt_div_{{ $receipt_data->id }}" class="border border-1 border-dark p-2 mb-2 fnd_receipts">
        <div class=" mt-2">
            <table class="table table-responsive mb-0 pb-0">
                <thead>
                    <tr>
                        <th>Receipt No</th>
                        <th>VR. No</th>
                        <th>VR. Date</th>
                        <th>DV No.</th>
                        <th>Category</th>
                        <th>Narration</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $receipt_data->receipt_no ?? 'N/A' }}</td>
                        <td>{{ $receipt_data->vr_no ?? 'N/A' }}</td>
                        <td>{{ $receipt_data->vr_date ?? 'N/A' }}</td>

                        <td>{{ $receipt_data->dv_no ?? 'N/A' }}</td>
                        <td>{{ $receipt_data->category->name ?? 'N/A' }}</td>
                        <td>{{ $receipt_data->narration ?? 'N/A' }}</td>

                        <td><button type="button" data-bs-toggle="modal"
                                data-bs-target="#rcpt_modal_{{ $receipt_data->id }}"
                                class="btn btn-primary mb-3 btn-sm">Show Details</button></td>
                    </tr>
                </tbody>
            </table>

            <div id="rct_input_div_{{ $receipt_data->id }}">



                <table class="table table-responsive mt-0 pt-0">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Bill Amount<span class="text-danger">*</span></th>
                            <th>Balance</th>
                            <th>Bill Ref</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <input type="number" id="pay_amount_{{ $receipt_data->id }}" class="form-control"
                                    name="rc_amount[]" required readonly></td>
                            <td><input type="number" id="bill_amount_{{ $receipt_data->id }}"
                                    class="form-control bill-amount" name="amount[]">

                                <span class="text-danger"></span>
                            </td>
                            <td>
                                <input type="hidden" id="main_amount_{{ $receipt_data->id }}" class="form-control"
                                    name="main_amount[]" required>
                                <input type="number" id="balance_{{ $receipt_data->id }}" class="form-control"
                                    name="balance[]" required readonly>
                            </td>
                            <td><input type="text" class="form-control" name="bill_ref[]"
                                    id="bill_ref_{{ $receipt_data->id }}"></td>
                        </tr>
                    </tbody>
                </table>

            </div>



            <div class="modal fade" id="rcpt_modal_{{ $receipt_data->id }}" tabindex="-1" data-bs-backdrop="static"
                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">
                                Vr No. - {{ $receipt_data->vr_no ?? 'N/A' }} <br> Vr Date -
                                {{ $receipt_data->vr_date ?? 'N/A' }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div id="dynamic-fields-members">
                                <table class="table table-responsive">

                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Member</th>
                                            <th>Designation</th>
                                            <th>Bank Account</th>
                                            <th>Amount</th>
                                            <th>Bill Reference</th>
                                            <th>Cheque No.</th>
                                            <th>Cheque Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($receipt_data->receiptMembers as $index => $member)
                                            @php
                                                $memberCoreInfo = \App\Models\MemberCoreInfo::where(
                                                    'member_id',
                                                    $member->member_id,
                                                )
                                                    ->orderBy('id', 'desc')
                                                    ->first();
                                                $memberName =
                                                    $members->firstWhere('id', $member->member_id)->name ?? 'N/A';
                                                $memberDesign =
                                                    $members->firstWhere('id', $member->member_id)->designation
                                                        ->designation_type ?? 'N/A';
                                                $bankAccountNo = $memberCoreInfo ? $memberCoreInfo->bank_acc_no : 'N/A';
                                            @endphp
                                            <tr>
                                                <td>{{ $member->serial_no }}</td>
                                                <td>{{ $memberName }}</td>
                                                <td>{{ $memberDesign }}</td>
                                                <td>{{ $bankAccountNo }}</td>
                                                <td>{{ $member->amount }}</td>
                                                <td>{{ $member->bill_ref }}</td>
                                                <td>{{ $member->cheq_no }}</td>
                                                <td>{{ $member->cheq_date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>

                        </div>
                    </div>
                </div>
            </div>







        </div>


    </div>

@endif
