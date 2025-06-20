@if (count($member_allowances) > 0)
{{-- @dd( $member_allowances->first()) --}}
    @foreach ($member_allowances as $key => $member_allowance)
        <tr>
            <td> {{ ($member_allowances->currentPage()-1) * $member_allowances->perPage() + $loop->index + 1 }}</td>
            <td>{{ $member_allowance->member->name ?? 'N/A'}}</td>
            <td>{{ $member_allowances->first()?->year ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('child-allowance.edit', $member_allowance->member_id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>

            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $member_allowances->firstItem() }} – {{ $member_allowances->lastItem() }} Child Allowance of
                    {{$member_allowances->total() }} Child Allowance)
                </div>
                <div>{!! $member_allowances->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No Child Allowance Amount Found</td>
    </tr>
@endif
