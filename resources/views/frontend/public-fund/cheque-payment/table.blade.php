
@if (count($chequePayments) > 0)
    @foreach ($chequePayments as $key => $chequePayment)
        <tr>
            <td> {{ ($chequePayments->currentPage()-1) * $chequePayments->perPage() + $loop->index + 1 }}</td>
            <td>{{ $chequePayment->sr_no }}</td>
            <td>{{ $chequePayment->vr_no }}</td>
            <td>{{ $chequePayment->vr_date }}</td>
            <td>{{ $chequePayment->amount }}</td>
            <td>{{ $chequePayment->name }}</td>
            <td>{{ $chequePayment->designation }}</td>
            <td>{{ $chequePayment->bill_ref }}</td>
            <td>{{ $chequePayment->cheque_no }}</td>
            <td>{{ $chequePayment->dv_no }}</td>
            
            <td class="sepharate"><a data-route="" href="{{route('cheque-payments.edit', $chequePayment->id)}}" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cheque-payments.delete', $chequePayment->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="12" class="text-left">
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
        <td colspan="12" class="text-center">No Cheque Payment Found</td>
    </tr>
@endif