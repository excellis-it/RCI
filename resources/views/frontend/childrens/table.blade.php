@if (count($childrens) > 0)
    @foreach ($childrens as $key => $children)
        <tr>
            <td> {{ ($childrens->currentPage()-1) * $childrens->perPage() + $loop->index + 1 }}</td>
            <td>Rs.{{ $children->amount ?? 'N/A'}}</td>
              <td>{{ $children->created_at ? date('d-m-Y', strtotime($children->created_at)) : 'N/A'}}</td>
            <td><span class="{{ ($children->status == 1) ? 'active_ss' : 'inactive_ss' }}">{{ ($children->status == 1) ? 'Active' : 'Inactive' }}</span></td>
            <td class="sepharate"><a data-route="{{route('childrens.edit', $children->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>

            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $childrens->firstItem() }} – {{ $childrens->lastItem() }} Children of
                    {{$childrens->total() }} Children)
                </div>
                <div>{!! $childrens->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="4" class="text-center">No Children Found</td>
    </tr>
@endif
