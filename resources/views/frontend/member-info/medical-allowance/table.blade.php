
@if ($medical_allowances->count() > 0)
    @foreach ($medical_allowances as $key => $medical)
        <tr>
            <td>{{ ($medical_allowances->currentPage() - 1) * $medical_allowances->perPage() + $loop->index + 1 }}</td>
            <td>{{ $medical->bill_no ?? 'N/A' }}</td>
            <td>{{ $medical->bill_date ? date('d-m-Y', strtotime($medical->bill_date)) : 'N/A' }}</td>
            <td>{{ $medical->type ?? 'N/A' }}</td>
            <td>{{ $medical->type_number ?? 'N/A' }}</td>
            <td>{{ $medical->member->name ?? 'N/A' }}</td>
            <td>{{ $medical->treatment_for ?? 'N/A' }}</td>
            <td>{{ formatIndianCurrency($medical->amount_claimed ?? 0, 2) }}</td>
            <td>{{ formatIndianCurrency($medical->total_adv_amount_given ?? 0, 2) }}</td>
            <td>{{ formatIndianCurrency($medical->amount_passed ?? 0, 2) }}</td>
            <td>{{ formatIndianCurrency($medical->amount_disallowed ?? 0, 2) }}</td>
            <td class="sepharate">
                <a data-route="{{ route('member-medical-allowance.edit', $medical->id) }}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" class="delete" data-route="{{ route('member-medical-allowance.delete', $medical->id) }}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="12" class="text-left">
            <div class="d-flex justify-content-between">
                <div>
                    (Showing {{ $medical_allowances->firstItem() }} – {{ $medical_allowances->lastItem() }} of {{ $medical_allowances->total() }} Records)
                </div>
                <div>{!! $medical_allowances->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="12" class="text-center">No Medical Allowance Records Found</td>
    </tr>
@endif

