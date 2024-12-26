@if (count($nc_statuses) > 0)
    @foreach ($nc_statuses as $key => $nc_status)
        <tr>
            <td> {{ ($nc_statuses->currentPage()-1) * $nc_statuses->perPage() + $loop->index + 1 }}</td>
            <td>{{ $nc_status->status ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('nc-status.edit', $nc_status->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('nc-status.delete', $nc_status->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="3" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $nc_statuses->firstItem() }} – {{ $nc_statuses->lastItem() }} NC Status of
                    {{$nc_statuses->total() }} NC Status)
                </div>
                <div>{!! $nc_statuses->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="3" class="text-center">No NC Status Found</td>
    </tr>
@endif
