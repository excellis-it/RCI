@if ($receipt_data)
    <div class="container mt-2">
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
                    <td>{{ $receipt_data->receipt_no ?? 'N/A' }}</td>
                    <td>{{ $receipt_data->vr_no ?? 'N/A' }}</td>
                    <td>{{ $receipt_data->vr_date ?? 'N/A' }}</td>

                    <td>{{ $receipt_data->dv_no ?? 'N/A' }}</td>
                    <td>{{ $receipt_data->category->name ?? 'N/A' }}</td>
                    <td>{{ $receipt_data->narration ?? 'N/A' }}</td>

                    <td><button id="toggle-table" class="btn btn-primary mb-3 btn-sm">Show Details</button></td>
                </tr>
            </tbody>
        </table>
        <br>


        <div id="dynamic-fields-members" style="display: none">
            <table class="table table-bordered">

                <thead class="table-light">
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
        $('#toggle-table').click(function() {
            // Toggle visibility of the table
            $('#dynamic-fields-members').toggle();

            // Toggle button text between 'Show Details' and 'Hide'
            if ($('#dynamic-fields-members').is(':visible')) {
                $('#toggle-table').text('Hide');
            } else {
                $('#toggle-table').text('Show Details');
            }
        });
    });
</script>
