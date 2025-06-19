@if (count($receipts) > 0)
    @foreach ($receipts as $key => $receipt)
        <tr>
            <td>{{ $receipt->vr_no ?? 'N/A' }}</td>
            <td>{{ $receipt->dv_no ?? 'N/A' }}</td>
            <td>{{ $receipt->category->name ?? 'N/A' }}</td>
            <td>{{ $receipt->vr_date ?? 'N/A' }}</td>
            <td>
                @foreach ($receipt->receiptMembers as $rcMember)
                    <span>{{ $rcMember->member->name ?? 'N/A' }}</span><br>
                @endforeach
            </td>
            <td>
                @foreach ($receipt->receiptMembers as $rcMember)
                    <span>{{ $rcMember->member->desigs->designation ?? 'N/A' }}</span><br>
                @endforeach
            </td>
            {{-- <td>{{ $receipt->amount ?? 'N/A' }}</td> --}}
            <td>
                @foreach ($receipt->receiptMembers as $rcMember)
                    <span>{{ $rcMember->amount ?? 'N/A' }}</span><br>
                @endforeach
                <span>-------------</span><br>
                <span>Total : {{ formatIndianCurrency($receipt->amount, 2) ?? 'N/A' }}</span>

            </td>
            <td class="sepharate"><a data-route="{{ route('receipts.edit', $receipt->id) }}" href="#"
                    onclick="getEditForm({{ $receipt->id }})" class="edit_pencil"><i class="ti ti-pencil"></i></a>
                {{-- <a href="{{route('receipts.delete', ['vr_no' => $receipt->vr_no, 'vr_date' => $receipt->vr_date])}}" id="delete" class="delete" data-route="{{route('receipts.delete', ['vr_no' => $receipt->vr_no, 'vr_date' => $receipt->vr_date])}}"><i class="ti ti-trash"></i></a> --}}
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-bs-toggle="modal"
                    data-bs-target="#deleteModal-{{ $receipt->vr_no }}">

                </a> --}}
                <a href="javascript:void(0);" class="delete-receipt edit_pencil text-danger ms-2" id="delete"
                    data-route="{{ route('receipts.delete', $receipt->id) }}">
                    <i class="ti ti-trash"></i>
                </a>


            </td>
        </tr>
    @endforeach
    {{-- <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $receipts->firstItem() }} – {{ $receipts->lastItem() }} Receipts of
                    {{ $receipts->total() }} Receipts)
                </div>
                <div>{!! $receipts->links() !!}</div>

            </div>
        </td>
    </tr> --}}

    <tr class="toxic">
        <td colspan="8" class="text-left">


            <div class="d-flex align-items-center justify-content-between">
                <div>
                    Showing
                    @if ($receipts instanceof \Illuminate\Pagination\AbstractPaginator)
                        {{ $receipts->firstItem() }} – {{ $receipts->lastItem() }} Receipts of
                        {{ $receipts->total() }} Receipts
                    @else
                        {{ $receipts->count() }} Receipts
                    @endif
                </div>

                @if (isset($search) && $search == 1)
                @else
                    <div class="d-flex align-items-center">
                        <form method="GET" action="{{ route('receipts.index') }}" class="me-3 text-end">
                            <select name="limit" onchange="this.form.submit()" class="form-select form-select-sm">
                                <option value="10" {{ $limit == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ $limit == 20 ? 'selected' : '' }}>20</option>
                                <option value="50" {{ $limit == 50 ? 'selected' : '' }}>50</option>
                                <option value="100" {{ $limit == 100 ? 'selected' : '' }}>100</option>
                                <option value="All" {{ $limit == 'All' ? 'selected' : '' }}>All</option>
                            </select>
                        </form>

                        @if ($receipts instanceof \Illuminate\Pagination\AbstractPaginator)
                            <div class="mt-2">{!! $receipts->links() !!}</div>
                        @endif
                    </div>
                @endif

            </div>


        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Receipts Found</td>
    </tr>
@endif
