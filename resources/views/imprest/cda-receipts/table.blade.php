

@if (count($cdaReceipts) > 0)
    @foreach ($cdaReceipts as $key => $cdaReceipt)
        <tr>
            <td> {{ ($cdaReceipts->currentPage()-1) * $cdaReceipts->perPage() + $loop->index + 1 }}</td>
            <td>{{ $cdaReceipt->voucher_no }}</td>
            <td>{{ $cdaReceipt->voucher_date }}</td>
            <td>{{ $cdaReceipt->dv_date }}</td>
            <td>{{ $cdaReceipt->amount }}</td>
            @foreach($cdaReceiptDetails as $cdaReceiptDetail)
                @if($cdaReceiptDetail->id == $cdaReceipt->details)
                    <td>{{ $cdaReceiptDetail->details }}</td>
                @else
                    <td></td>
                @endif
            @endforeach
            <td class="sepharate"><a data-route="" href="{{route('cash-payments.edit', $cdaReceipt->id)}}" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cash-payments.delete', $cdaReceipt->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cdaReceipts->firstItem() }} – {{ $cdaReceipts->lastItem() }} CDA Receipts of
                    {{$cdaReceipts->total() }} CDA Receipts)
                </div>
                <div>{!! $cdaReceipts->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="10" class="text-center">No CDA Receipt Found</td>
    </tr>
@endif