@push('styles')
    <style>
        .no-border-bottom {
            border-top: transparent !important;
            border-bottom: transparent !important;
        }
    </style>
@endpush

@if (count($AllPayments) > 0)

    <table class="table">
        <thead class="text-white fs-4 bg_blue">
            <tr>
                <th>Receipt No</th>
                <th>VR No</th>
                <th>VR Date</th>
                <th>Amount</th>
                <th>Bill Ref</th>
                <th>Cheque No</th>
                <th>Cheque Date</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($AllPayments->groupBy('cheq_no') as $cheqNo => $groupedPayments)
                <tr>
                    <td colspan="9" class="table-group-title">
                        <strong>Cheque No: {{ $cheqNo ?? 'N/A' }}</strong>
                    </td>
                </tr>
                @foreach ($groupedPayments as $payments)
                    <tr>
                        <td>{{ $payments->receipt_no ?? 'N/A' }}</td>
                        <td>{{ $payments->vr_no ?? 'N/A' }}</td>
                        <td>{{ $payments->vr_date ?? 'N/A' }}</td>
                        <td>{{ $payments->amount ?? 'N/A' }}</td>
                        <td>{{ $payments->bill_ref ?? 'N/A' }}</td>
                        <td>{{ $payments->cheq_no ?? 'N/A' }}</td>
                        <td>{{ $payments->cheq_date ?? 'N/A' }}</td>
                        <td>{{ $payments->created_at->format('Y-m-d') ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex">
                                <a data-route="{{ route('cheque-payments.edit', $payments->id) }}" href="#"
                                    onclick="getEditForm({{ $payments->vr_no }}, '{{ $payments->vr_date }}')"
                                    class="edit_pencil"><i class="ti ti-pencil"></i></a>
                                <a href="javascript:void(0);" class="delete-cheque edit_pencil text-danger ms-2"
                                    id="delete" data-route="{{ route('cheque-payments.delete', $payments->id) }}">
                                    <i class="ti ti-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>




    <tr class="toxic">
        <td colspan="9" class="text-left">
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
