@if (count($conversionVouchers) > 0)
    @foreach ($conversionVouchers as $key => $conversionVoucher)
        <tr>
            <td>{{ ($conversionVouchers->currentPage()-1) * $conversionVouchers->perPage() + $loop->index + 1 }}</td>
            <td>{{ $conversionVoucher->itemCode->code }}</td>
            <td>{{ $conversionVoucher->voucher_no }}</td>
            <td>{{ $conversionVoucher->voucher_date }}</td>
            <td>{{ $conversionVoucher->inventoryNumber->number }}</td>
            <td>{{ $conversionVoucher->quantity }}</td>
            
            <td class="sepharate"><a data-route="{{route('conversion-vouchers.edit', $conversionVoucher->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('conversion-vouchers.delete', $conversionVoucher->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $conversionVouchers->firstItem() }} – {{ $conversionVouchers->lastItem() }} Conversion Vouchers of
                    {{$conversionVouchers->total() }} Conversion Vouchers)
                </div>
                <div>{!! $conversionVouchers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Conversion Vouchers Found</td>
    </tr>
@endif