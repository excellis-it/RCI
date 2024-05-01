@if (count($debitVouchers) > 0)
    @foreach ($debitVouchers as $key => $debitVoucher)
        <tr>
            <td> {{ ($debitVouchers->currentPage()-1) * $debitVouchers->perPage() + $loop->index + 1 }}</td>
            @if($debitVoucher->inv_no != null)
                @foreach($inventoryNumbers as $inventoryNumber)
                    @if($inventoryNumber->id == $debitVoucher->inv_no)
                        <td>{{ $inventoryNumber->number ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            @if($debitVoucher->item_id != null)
                @foreach($itemCodes as $item)
                    @if($item->id == $debitVoucher->item_id)
                        <td>{{ $item->code ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td>{{ $debitVoucher->quantity ?? 'N/A'}}</td>
            <td>{{ $debitVoucher->voucher_no ?? 'N/A'}}</td>
            <td>{{ $debitVoucher->voucher_date ?? 'N/A'}}</td>
            {{-- <td>{{ $debitVoucher->remarks ?? 'N/A'}}</td> --}}
            <td class="sepharate"><a data-route="{{route('debit-vouchers.edit', $debitVoucher->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('debit-vouchers.delete', $debitVoucher->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $debitVouchers->firstItem() }} – {{ $debitVouchers->lastItem() }} Debit Vouchers of
                    {{$debitVouchers->total() }} Debit Vouchers)
                </div>
                <div>{!! $debitVouchers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Debit Vouchers Found</td>
    </tr>
@endif