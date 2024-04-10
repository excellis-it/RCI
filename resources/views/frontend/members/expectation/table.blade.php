@if(isset($member_expectations) && count($member_expectations) > 0)
    @foreach($member_expectations as $member_expectation)
        <tr class="edit-route-expectation" data-route="{{ route('members.expectation.edit', $member_expectation->id) }}">
            <td>{{ $member_expectation->rule_name ?? 'N/A' }}</td>
            <td>{{ $member_expectation->percent ?? 'N/A' }}</td>
            <td>{{ $member_expectation->amount ?? 'N/A' }}</td>
            <td>{{ $member_expectation->remark ?? 'N/A'}}</td> 
        </tr>
    @endforeach
@else
    <tr id="no-policy">
        <td colspan="5" class="text-center">No Expectation Info Found</td>
    </tr>    

@endif
