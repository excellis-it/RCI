<div class=" mt-3" hidden>
    <p>Advance Fund History:</p>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>ADV NO.</th>
                <th>ADV DATE.</th>
                <th>ADV AMT</th>
                <th>PROJECT</th>
                <th>CHQ NO. </th>
                <th>CHQ DATE</th>
                <th>VARIABLE TYPE</th>
            </tr>
        </thead>
        <tbody>
            @if (count($member_funds) > 0)
                @foreach ($member_funds as $key => $advance_fund)
                    <tr>
                        <td>{{ $advance_fund->adv_no ?? 'N/A' }}</td>
                        <td>{{ $advance_fund->adv_date ?? 'N/A' }}</td>
                        <td>{{ $advance_fund->adv_amount ?? 'N/A' }}</td>
                        <td>{{ $advance_fund->project->name ?? 'N/A' }}</td>
                        <td>{{ $advance_fund->chq_no ?? 'N/A' }}</td>
                        <td>{{ $advance_fund->chq_date ?? 'N/A' }}</td>
                        <td>{{ $advance_fund->variableType->name ?? 'N/A' }}</td>


                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="text-center">No Advance Funds Found</td>
                </tr>
            @endif

    </table>
</div>
