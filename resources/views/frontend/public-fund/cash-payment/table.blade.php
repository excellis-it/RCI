

@if (count($cashPayments) > 0)
    @foreach ($cashPayments as $key => $cashPayment)
        <tr>
            <td>{{ $cashPayment->vr_no ?? 'N/A'}}</td>
            <td>{{ $cashPayment->vr_date ?? 'N/A'}}</td>
            <td>{{ $cashPayment->amount ?? 'N/A'}}</td>
            <td>{{ $cashPayment->rct_no ?? 'N/A'}}</td>
            <td>{{ $cashPayment->form ?? 'N/A'}}</td>
            <td>{{ $cashPayment->details ?? 'N/A'}}</td>
            <td>{{ $cashPayment->name ?? 'N/A'}}</td>
           
            <td class="sepharate"><a data-route="{{route('cash-payments.edit', $cashPayment->id)}}"  class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cash-payments.delete', $cashPayment->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $cashPayments->firstItem() }} – {{ $cashPayments->lastItem() }} Cash Payments of
                    {{$cashPayments->total() }} Cash Payments)
                </div>
                <div>{!! $cashPayments->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No Cash Payment Found</td>
    </tr>
@endif