@if (count($inventory_members) > 0)
    @foreach ($inventory_members as $key => $member)
        <tr>
            <td>{{ $member->name ?? 'N/A' }}</td>
            <td>{{ $member->emp_id ?? 'N/A' }}</td>
            <td>{{ $member->gender ?? 'N/A' }}</td>
            <td>{{ $member->pers_no ?? 'N/A' }}</td>
            <td>{{ $member->desigs->designation ?? 'N/A' }}</td>
            <td>{{ $member->fund_type ?? 'N/A' }}</td>
            <td>{{ $member->memberCategory->category ?? 'N/A' }}</td>
            <td class="sepharate"><a href="{{ route('inventory-members.edit', $member->id) }}" class="edit_pencil edit-route"><i
                        class="ti ti-pencil"></i></a>

                <a type="button" class="delete_member delete" data-route="{{ route('inventory-members.delete', $member->id) }}"><i
                        class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $inventory_members->firstItem() }} – {{ $inventory_members->lastItem() }} Members of
                    {{ $inventory_members->total() }} Members)
                </div>
                <div>{!! $inventory_members->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No Members Found</td>
    </tr>
@endif
