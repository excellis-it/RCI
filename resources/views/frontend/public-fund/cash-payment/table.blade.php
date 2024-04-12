

@if (count($cashPayments) > 0)
    @foreach ($cashPayments as $key => $cashPayment)
        <tr>
            <td> {{ ($cashPayments->currentPage()-1) * $cashPayments->perPage() + $loop->index + 1 }}</td>
            <td>{{ $cashPayment->vr_no }}</td>
            <td>{{ $cashPayment->vr_date }}</td>
            <td>{{ $cashPayment->amount }}</td>
            <td>{{ $cashPayment->rct_no }}</td>
            <td>{{ $cashPayment->form }}</td>
            <td>{{ $cashPayment->details }}</td>
            <td>{{ $cashPayment->name }}</td>
            @foreach($paymentCategories as $paymentCategory)
                @if($paymentCategory->id == $cashPayment->category)
                    <td>{{ $paymentCategory->name }}</td>
                @else
                    <td></td>
                @endif
            @endforeach
            <td class="sepharate"><a data-route="" href="{{route('cash-payments.edit', $cashPayment->id)}}" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cash-payments.delete', $cashPayment->id)}}"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="4" class="text-left">
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
        <td colspan="10" class="text-center">No Cash Payment Found</td>
    </tr>
@endif