@if (count($creditVouchers) > 0)
    @foreach ($creditVouchers as $key => $creditVoucher)
        <tr>
            <td> {{ ($creditVouchers->currentPage()-1) * $creditVouchers->perPage() + $loop->index + 1 }}</td>
            @if($creditVoucher->item_code_id != null)
                @foreach($itemCodes as $item)
                    @if($item->id == $creditVoucher->item_code_id)
                        <td>{{ $item->item_code ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td>{{ $creditVoucher->voucher_no ?? 'N/A'}}</td>
            <td>{{ $creditVoucher->voucher_date ?? 'N/A'}}</td>
            @if($creditVoucher->inv_no != null)
                @foreach($inventoryNumbers as $inventoryNumber)
                    @if($inventoryNumber->id == $creditVoucher->inv_no)
                        <td>{{ $inventoryNumber->number ?? 'N/A'}}</td>
                    @endif
                @endforeach
            @else
                <td>N/A</td>
            @endif
            <td>{{ $creditVoucher->description ?? 'N/A'}}</td>
            <td>{{ $creditVoucher->uom ?? 'N/A'}}</td>
            <td>{{ $creditVoucher->item_type ?? 'N/A'}}</td>
            <td>{{ $creditVoucher->price ?? 'N/A'}}</td>
            <td>{{ $creditVoucher->quantity ?? 'N/A'}}</td>
            <td>{{ $creditVoucher->supply_order_no ?? 'N/A'}}</td>
            <td>{{ $creditVoucher->rin ?? 'N/A'}}</td>
            <td class="sepharate"><a data-route="{{route('credit-vouchers.edit', $creditVoucher->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('credit-vouchers.delete', $creditVoucher->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $creditVouchers->firstItem() }} – {{ $creditVouchers->lastItem() }} Credit Vouchers of
                    {{$creditVouchers->total() }} Credit Vouchers)
                </div>
                <div>{!! $creditVouchers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="13" class="text-center">No Credit Vouchers Found</td>
    </tr>
@endif
