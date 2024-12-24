@if ($advance_settels)

    <p>CDA Bill:</p>
    <table class="table table-bordered">
        <thead>
            <tr>


                <th>Advance No</th>
                <th>Advance Date</th>
                <th>Name</th>
                <th>Advance Amount</th>
                <th>Bill Amount</th>
                <th>Balance</th>
                <th>Project</th>
                <th>Cheque No</th>
                <th>Cheque Date</th>
                <th>Variable Type</th>
                <th>Firm</th>

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
                        <td>{{ $advance_settel->bill_amount ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->balance ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->project->name ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->chq_no ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->chq_date ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->variableType->name ?? 'N/A' }}</td>
                        <td>{{ $advance_settel->firm ?? 'N/A' }}</td>

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

<form action="">
    <div class="row">
        <div class="col-md-1">
            <div class="row justify-content-end">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-12 mb-2">
                            <button type="submit" class="listing_add">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
