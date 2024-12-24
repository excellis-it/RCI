@if ($receipt_data2)
    <div class=" mt-2">
        <table class="table table-responsive">
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
                    <td>{{ $receipt_data2->receipt_no ?? 'N/A' }}</td>
                    <td>{{ $receipt_data2->vr_no ?? 'N/A' }}</td>
                    <td>{{ $receipt_data2->vr_date ?? 'N/A' }}</td>

                    <td>{{ $receipt_data2->dv_no ?? 'N/A' }}</td>
                    <td>{{ $receipt_data2->category->name ?? 'N/A' }}</td>
                    <td>{{ $receipt_data2->narration ?? 'N/A' }}</td>

                    <td><button id="toggle-table2" class="btn btn-primary mb-3 btn-sm">Show Details</button></td>
                </tr>
            </tbody>
        </table>
        <br>


        <div id="dynamic-fields-members2" style="display: none">
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
                    @foreach ($receipt_data2->receiptMembers as $index => $member)
                        @php
                            $memberCoreInfo = \App\Models\MemberCoreInfo::where('member_id', $member->member_id)
                                ->orderBy('id', 'desc')
                                ->first();
                            $memberName = $members->firstWhere('id', $member->member_id)->name ?? 'N/A';
                            $memberDesign =
                                $members->firstWhere('id', $member->member_id)->designation->designation_type ?? 'N/A';
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
        </table>
    </div>

    <br>
@else
    <tr>
        <td colspan="5" class="text-center">No Receipt No Found</td>
    </tr>
@endif

<script>
    $(document).ready(function() {
        $('#toggle-table2').click(function() {
            // Toggle visibility of the table
            $('#dynamic-fields-members2').toggle();

            // Toggle button text between 'Show Details' and 'Hide'
            if ($('#dynamic-fields-members2').is(':visible')) {
                $('#toggle-table2').text('Hide');
            } else {
                $('#toggle-table2').text('Show Details');
            }
        });
    });
</script>



<form action="{{ route('cheque-payments.update') }}" method="POST" id="edit-form">
    @csrf
    @method('post')
    <div class="row">
        <div class="col-12">
            <div class="form-group mb-2">
                <div class="row align-items-center">

                    @csrf
                    <input type="hidden" value="{{ $chequePayment->id }}" name="chid">

                    <div class="col-md-3">
                        <label for="">Bill Amount</label>
                        <input type="number" class="form-control" value="{{ $chequePayment->amount }}" required
                            readonly>
                        <span class="text-danger"></span>
                    </div>
                    <div class="col-md-3">
                        <label for="">Bill Ref<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="bill_ref"
                            value="{{ $chequePayment->bill_ref ?? '' }}">
                        <span class="text-danger"></span>
                    </div>

                    <div class="col-md-3">
                        <label for="">Cheque No.<span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="cheq_no"
                            value="{{ $chequePayment->cheq_no ?? '' }}" required>
                        <span class="text-danger"></span>
                    </div>

                    <div class="col-md-3">
                        <label for="">Cheque Date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="cheq_date"
                            value="{{ $chequePayment->cheq_date ?? '' }}" required>
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
                <button type="submit" class="listing_add">Update</button>
            </div>
            {{-- <div class="mb-1">
                <a href="" class="listing_exit">Back</a>
            </div> --}}
        </div>
    </div>
</form>
