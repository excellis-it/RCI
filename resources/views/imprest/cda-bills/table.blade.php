@if (count($advance_settels) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>


                <th>Adv No</th>
                <th>Adv Date</th>
                <th>Member Name</th>
                <th>Amount</th>
                <th>Adv Settlement Balance</th>
                <th>Project</th>
                <th>Cheque No</th>
                <th>Cheque Date</th>
                <th>Variable Type</th>

            </tr>
        </thead>
        <tbody>
            @if (count($advance_settels) > 0)
                @foreach ($advance_settels as $key => $advance_settel)
                    <tr>


                        <td>{{ $advance_settel->adv_no ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->adv_date ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->member->name ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->adv_amount ?? 'N/A' }}</td>

                        <td>Settled</td>
                        <td>{{ $advance_settel->project->name ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->chq_no ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->chq_date ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->variableType->name ?? 'N/A' }}</td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="11" class="text-center">No Advance Settlement Found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endif
