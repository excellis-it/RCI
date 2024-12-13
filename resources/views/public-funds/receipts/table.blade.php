@if (count($receipts) > 0)
    @foreach ($receipts as $key => $receipt)
        <tr>
            <td> {{ ($receipts->currentPage() - 1) * $receipts->perPage() + $loop->index + 1 }}</td>
            <td>{{ $receipt->receipt_no ?? 'N/A' }}</td>
            <td>{{ $receipt->category->name ?? 'N/A' }}</td>
            <td>{{ $receipt->vr_no ?? 'N/A' }}</td>
            <td>{{ $receipt->vr_date ?? 'N/A' }}</td>
            <td>{{ $receipt->amount ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{ route('receipts.edit', $receipt->id) }}"
                    href="#" onclick="getEditForm({{$receipt->id}})" class="edit_pencil"><i class="ti ti-pencil"></i></a>
                    <a href="{{route('receipts.delete', ['vr_no' => $receipt->vr_no, 'vr_date' => $receipt->vr_date])}}" id="delete" class="delete" data-route="{{route('receipts.delete', ['vr_no' => $receipt->vr_no, 'vr_date' => $receipt->vr_date])}}"><i class="ti ti-trash"></i></a>
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
