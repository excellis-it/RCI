
@if (count($chequePayments) > 0)
    @foreach ($chequePayments as $key => $chequePayment)
        <tr>
            
            <td>{{ $chequePayment->sr_no ?? 'N/A'}}</td>
            <td>{{ $chequePayment->vr_no ?? 'N/A'}}</td>
            <td>{{ $chequePayment->vr_date ?? 'N/A'}}</td>
            <td>{{ $chequePayment->amount ?? 'N/A'}}</td>
            <td>{{ $chequePayment->name ?? 'N/A'}}</td>
            
            
            <td class="sepharate"><a data-route="{{route('cheque-payments.edit', $chequePayment->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cheque-payments.delete', $chequePayment->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing {{ $chequePayments->firstItem() }} – {{ $chequePayments->lastItem() }} Cheque Payments of
                    {{$chequePayments->total() }} Cheque Payments)
                </div>
                <div>{!! $chequePayments->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Cheque Payment Found</td>
    </tr>
@endif