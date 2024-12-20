@if (count($AllPayments) > 0)
    @foreach ($AllPayments as $key => $payments)
        <tr>
            <td>{{ $payments->receipt_no ?? 'N/A' }}</td>
            <td>{{ $payments->vr_no ?? 'N/A' }}</td>
            <td>{{ $payments->vr_date ?? 'N/A' }}</td>
            <td>{{ $payments->amount ?? 'N/A' }}</td>
            <td>{{ $payments->bill_ref ?? 'N/A' }}</td>
            <td>{{ $payments->cheq_no ?? 'N/A' }}</td>
            <td>{{ $payments->cheq_date ?? 'N/A' }}</td>
            <td>{{ $payments->created_at->format('Y-m-d') ?? 'N/A' }}</td>

            {{-- <td class="sepharate"><a data-route="{{ route('cheque-payments.edit', $payments->id) }}"
                    class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a> --}}
            {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('cash-payments.delete', $cashPayment->id)}}"><i class="ti ti-trash"></i></a> --}}
            {{-- <td class="sepharate"><a
                    href="{{ route('cheque-payments.get-receipt-report', ['vr_no' => $payments->vr_no, 'vr_date' => $payments->vr_date]) }}"
                    class="edit_pencil "><i class="ti ti-file text-danger"></i></a>
            </td> --}}
            <td class="sepharate"><a data-route="{{ route('cheque-payments.edit', $payments->id) }}"
                href="#" onclick="getEditForm({{ $payments->vr_no }}, '{{ $payments->vr_date }}')" class="edit_pencil"><i class="ti ti-pencil"></i></a>

                {{-- <a href="{{route('cheque-payments.delete',['vr_no' => $payments->vr_no, 'vr_date' => $payments->vr_date])}}" id="delete" class="delete" data-route="{{route('cheque-payments.delete',['vr_no' => $payments->vr_no, 'vr_date' => $payments->vr_date])}}"><i class="ti ti-trash"></i></a> --}}

                <a href="javascript:void(0);" class="delete-cheque edit_pencil text-danger ms-2" id="delete"
                    data-route="{{ route('cheque-payments.delete', $payments->id) }}">
                    <i class="ti ti-trash"></i>
                </a>


            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $AllPayments->firstItem() }} – {{ $AllPayments->lastItem() }} Payments No
                    of
                    {{ $AllPayments->total() }} Payments No)
                </div>
                <div>{!! $AllPayments->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="9" class="text-center">No Payments No Found</td>
    </tr>
@endif
