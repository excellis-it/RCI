@if (count($members) > 0)
    @foreach ($members as $key => $member)
        <tr>
            <td>{{ $member->name ?? 'N/A' }}</td>
            <td>{{ $member->emp_id ?? 'N/A' }}</td>
            <td>{{ $member->gender ?? 'N/A' }}</td>
            <td>{{ $member->pers_no ?? 'N/A' }}</td>
            <td>{{ $member->desigs->designation ?? 'N/A' }}</td>
            <td>{{ $member->fund_type ?? 'N/A' }}</td>
            <td>{{ $member->memberCategory->category ?? 'N/A' }}</td>

            <td class="sepharate"><a href="{{ route('members-income-tax.edit', $member->id) }}" class="edit_pencil edit-route"><i
                        class="ti ti-pencil"></i></a>

            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $members->firstItem() }} – {{ $members->lastItem() }} Members of
                    {{ $members->total() }} Members)
                </div>
                <div>{!! $members->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No Members Found</td>
    </tr>
@endif
