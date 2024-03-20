@if (count($cadres) > 0)
    @foreach ($cadres as $key => $cadre)
        <tr>
            <td> {{ ($cadres->currentPage()-1) * $cadres->perPage() + $loop->index + 1 }}</td>
            <td>{{ $cadre->value ?? 'N/A'}}</td>
            <td><span class="{{ ($cadre->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($cadre->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('cadres.edit', $cadre->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cadres.delete', $cadre->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cadres->firstItem() }} – {{ $cadres->lastItem() }} cadre of
                    {{$cadres->total() }} cadre)
                </div>
                <div>{!! $cadres->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No cadre Found</td>
    </tr>
@endif
