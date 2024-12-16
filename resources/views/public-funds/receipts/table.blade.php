@if (count($receipts) > 0)
    @foreach ($receipts as $key => $receipt)
        <tr>
            <td>{{ $receipt->vr_no ?? 'N/A' }}</td>
            <td>{{ $receipt->dv_no ?? 'N/A' }}</td>
            <td>{{ $receipt->category->name ?? 'N/A' }}</td>
            <td>{{ $receipt->vr_date ?? 'N/A' }}</td>
            <td>{{ $receipt->amount ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{ route('receipts.edit', $receipt->id) }}"
                    href="#" onclick="getEditForm({{$receipt->id}})" class="edit_pencil"><i class="ti ti-pencil"></i></a>
                    {{-- <a href="{{route('receipts.delete', ['vr_no' => $receipt->vr_no, 'vr_date' => $receipt->vr_date])}}" id="delete" class="delete" data-route="{{route('receipts.delete', ['vr_no' => $receipt->vr_no, 'vr_date' => $receipt->vr_date])}}"><i class="ti ti-trash"></i></a> --}}
                    <a href="javascript:void(0);" id="delete" class="delete" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$receipt->vr_no}}">
                        <i class="ti ti-trash"></i>
                    </a>

                    <div class="modal fade" id="deleteModal-{{$receipt->vr_no}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md"> <!-- Adjust modal size dynamically -->
                            <div class="modal-content bg-danger">
                                <div class="modal-header">
                                    <h5 class="modal-title text-white">Are you sure want to delete?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer d-flex flex-wrap justify-content-between">
                                    <button type="button" class="btn btn-light w-100 mb-2" data-bs-dismiss="modal" style="max-width: 200px;">Cancel</button>
                                    <a href="{{ route('receipts.delete', ['vr_no' => $receipt->vr_no, 'vr_date' => $receipt->vr_date]) }}"
                                       class="btn btn-dark w-100" style="max-width: 200px;">Confirm</a>
                                </div>
                            </div>
                        </div>

                    </div>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $receipts->firstItem() }} – {{ $receipts->lastItem() }} Receipts of
                    {{ $receipts->total() }} Receipts)
                </div>
                <div>{!! $receipts->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Receipts Found</td>
    </tr>
@endif
