@if (count($ItemCodeNames) > 0)
    @foreach ($ItemCodeNames as $key => $ItemCodeName)
        <tr>
            <td> {{ ($ItemCodeNames->currentPage() - 1) * $ItemCodeNames->perPage() + $loop->index + 1 }}</td>
            <td>{{ $ItemCodeName->item_code ?? 'N/A' }}</td>
            <td>{{ $ItemCodeName->name ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{ route('item-code-names.edit', $ItemCodeName->id) }}"
                    href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('item-code-names.delete', $ItemCodeName->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $ItemCodeNames->firstItem() }} – {{ $ItemCodeNames->lastItem() }} Item Code
                    Name of
                    {{ $ItemCodeNames->total() }} Item Code Name)
                </div>
                <div>{!! $ItemCodeNames->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Item Code Name Found</td>
    </tr>
@endif
