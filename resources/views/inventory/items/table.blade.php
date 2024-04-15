@if (count($items) > 0)
    @foreach ($items as $key => $item)
        <tr>
            <td>{{$item->item_code ?? 'N/A'}}</td>
            <td>{{$item->uom ?? 'N/A'}}</td>
            <td>{{$item->item_type ?? 'N/A'}}</td>
            <td class="sepharate"><a  href="{{ route('items.edit', $item->id)}}" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('items.delete', $item->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $items->firstItem() }} – {{ $items->lastItem() }} Items of
                    {{$items->total() }} Items)
                </div>
                <div>{!! $items->links() !!}</div>
            </div>
        </td>
    </tr>

@else
    <tr>
        <td colspan="6" class="text-center">No Items Found</td>
    </tr>
@endif
