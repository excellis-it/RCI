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
                <th>Member</th>
                <th>Designation</th>
                <th>Amount</th>
                <th>Bill Ref</th>
                <th>Cheque No</th>
                <th>Cheque Date</th>

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
                        <td>
                            @foreach ($payments->chequePaymentMembers as $chqMember)
                                <span>{{ $chqMember->member->name ?? 'N/A' }}</span><br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($payments->chequePaymentMembers as $chqMember)
                                <span>{{ $chqMember->member->designation->designation_type ?? 'N/A' }}</span><br>
                            @endforeach
                        </td>
                        {{-- <td>{{ $payments->amount ?? 'N/A' }}</td> --}}
                        <td>
                            @foreach ($payments->chequePaymentMembers as $chqMember)
                                <span>{{ $chqMember->amount ?? 'N/A' }}</span><br>
                            @endforeach
                            <span>-------------</span><br>
                            <span>Total : {{ number_format($payments->amount, 2) ?? 'N/A' }}</span>

                        </td>
                        <td>{{ $payments->bill_ref ?? 'N/A' }}</td>
                        <td>{{ $payments->cheq_no ?? 'N/A' }}</td>
                        <td>{{ $payments->cheq_date ?? 'N/A' }}</td>

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




    {{-- <tr class="toxic">
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
    </tr> --}}

    <tr class="toxic">
        <td colspan="8" class="text-left">


            <div class="d-flex align-items-center justify-content-between">
                <div>
                    Showing
                    @if ($AllPayments instanceof \Illuminate\Pagination\AbstractPaginator)
                        {{ $AllPayments->firstItem() }} – {{ $AllPayments->lastItem() }} Payments of
                        {{ $AllPayments->total() }} Payments
                    @else
                        {{ $AllPayments->count() }} Payments
                    @endif
                </div>

                <div class="d-flex align-items-center">
                    <form method="GET" action="{{ url()->current() }}" class="me-3 text-end">
                        <select name="limit" onchange="this.form.submit()" class="form-select form-select-sm">
                            <option value="10" {{ $limit == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $limit == 20 ? 'selected' : '' }}>20</option>
                            <option value="50" {{ $limit == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $limit == 100 ? 'selected' : '' }}>100</option>
                            <option value="All" {{ $limit == 'All' ? 'selected' : '' }}>All</option>
                        </select>
                    </form>

                    @if ($AllPayments instanceof \Illuminate\Pagination\AbstractPaginator)
                        <div class="mt-2">{!! $AllPayments->links() !!}</div>
                    @endif
                </div>

            </div>


        </td>
    </tr>
@else
    <tr>
        <td colspan="9" class="text-center">No Payments No Found</td>
    </tr>
@endif
