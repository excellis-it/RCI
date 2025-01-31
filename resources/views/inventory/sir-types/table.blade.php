@if (count($sirtypes) > 0)
    @foreach ($sirtypes as $key => $sirtype)
        <tr>
            <td> {{ ($sirtype->currentPage() - 1) * $sirtype->perPage() + $loop->index + 1 }}</td>
            <td>{{ $sirtype->name ?? 'N/A' }}</td>
            <td><span
                    class="{{ $sirtype->status == 1 ? 'active_ss' : 'inactive_ss' }}">{{ $sirtype->status == 1 ? 'Active' : 'Inactive' }}</span>
            </td>
            <td class="sepharate"><a data-route="{{ route('uom.edit', $sirtype->id) }}" href="javascript:void(0);"
                    class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('item-code-types.delete', $uom->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $sirtypes->firstItem() }} – {{ $sirtypes->lastItem() }} of
                    {{ $sirtypes->total() }} sir types)
                </div>
                <div>{!! $sirtypes->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No sir types Found</td>
    </tr>
@endif
