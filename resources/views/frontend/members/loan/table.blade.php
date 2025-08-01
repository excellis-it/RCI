@if (isset($members_loans_info) && count($members_loans_info) > 0)
    @foreach ($members_loans_info as $loan_info)
        <tr class="edit-route-loan" data-id="{{ $loan_info->id }}"
            data-route="{{ route('members.loan.edit', $loan_info->id) }}">
            <td>{{ $loan_info->loan_name ?? 'N/A' }}</td>
            <td>{{ round($loan_info->total_amount, 2) ?? 'N/A' }}</td>
            <td>{{ round($loan_info->inst_amount, 2) ?? 'N/A' }}</td>
            <td>{{ $loan_info->balance ?? '0' }}</td>
            {{-- <td>{{ $loan_info->interst_percentage ?? '0' }}</td> --}}
            <td>{{ $loan_info->total_interest ?? '0' }}</td>

            <td>{{ date('d-m-Y', strtotime($loan_info->start_date)) ?? 'N/A' }}</td>
            <td>{{ $loan_info->remark ?? 'N/A' }}</td>
        </tr>
    @endforeach

@endif
