@if (count($au_statuses) > 0)
    @foreach ($au_statuses as $key => $au_status)
        <tr>
            <td> {{ ($au_statuses->currentPage()-1) * $au_statuses->perPage() + $loop->index + 1 }}</td>
            <td>{{ $au_status->status ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('au-status.edit', $au_status->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('au-status.delete', $au_status->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="3" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $au_statuses->firstItem() }} – {{ $au_statuses->lastItem() }} NC Status of
                    {{$au_statuses->total() }} NC Status)
                </div>
                <div>{!! $au_statuses->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="3" class="text-center">No NC Status Found</td>
    </tr>
@endif
