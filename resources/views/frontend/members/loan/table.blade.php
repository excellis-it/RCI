@if(isset($members_loans_info) && count($members_loans_info) > 0)
    @foreach($members_loans_info as $loan_info)
        <tr class="edit-route" data-route="{{ route('members.loan.edit', $loan_info->id) }}">
            <td>{{ $loan_info->loan_name }}</td>
            <td>{{ $loan_info->present_inst_no }}</td>
            <td>{{ $loan_info->total_amount }}</td>
            <td>{{ date('d-m-Y', strtotime($loan_info->created_at)) }}</td>
            <td>{{ $loan_info->remark }}</td>
        </tr>
    @endforeach

@endif
