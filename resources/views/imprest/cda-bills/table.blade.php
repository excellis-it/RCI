@if (count($advance_settels) > 0)
    <table class="table table-bordered mt-2">
        <thead>
            <tr>


                <th>Adv No</th>
                <th>Adv Date</th>
                <th hidden>Member Name</th>
                <th>Amount</th>
                <th>Bill Amount</th>
                <th>Project</th>
                <th>Cheque No</th>
                <th>Cheque Date</th>
                <th>Variable Type</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @if (count($advance_settels) > 0)
                @foreach ($advance_settels as $key => $advance_settel)
                    <tr>


                        <td>{{ $advance_settel->adv_no ?? 'N/A' }}
                            <input type="hidden" name="settle_id[]" value="{{ $advance_settel->id }}">
                            <input type="hidden" name="adv_no[]" value="{{ $advance_settel->adv_no }}">
                        </td>
                        <td>{{ $advance_settel->adv_date ?? 'N/A' }}
                            <input class="bill_adv_date_input" type="hidden" name="adv_date[]" value="{{ $advance_settel->adv_date }}">
                        </td>

                        <td hidden>{{ $advance_settel->member->name ?? 'N/A' }}
                            <input type="hidden" name="member_id[]" value="{{ $advance_settel->member_id }}">
                        </td>
                        <td>{{ $advance_settel->adv_amount ?? 'N/A' }}
                            <input type="hidden" name="adv_amount[]" value="{{ $advance_settel->adv_amount }}">
                        </td>
                        <td>{{ $advance_settel->bill_amount ?? 'N/A' }}
                            <input type="hidden" name="bill_amount[]" value="{{ $advance_settel->bill_amount }}">
                        </td>

                        <td>{{ $advance_settel->project->name ?? 'N/A' }}
                            <input type="hidden" name="project_id[]" value="{{ $advance_settel->project_id }}">
                        </td>
                        <td>{{ $advance_settel->chq_no ?? 'N/A' }}
                            <input type="hidden" name="chq_no[]" value="{{ $advance_settel->chq_no }}">
                        </td>
                        <td>{{ $advance_settel->chq_date ?? 'N/A' }}
                            <input type="hidden" name="chq_date[]" value="{{ $advance_settel->chq_date }}">
                        </td>
                        <td>{{ $advance_settel->variableType->name ?? 'N/A' }}
                            <input type="hidden" name="variable_id[]" value="{{ $advance_settel->var_type_id }}">
                        </td>
                        <td><input class="bill_check_input" type="checkbox" name="bills[]" value="{{ $advance_settel->id }}" id="">
                        </td>


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
