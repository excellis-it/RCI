@if (count($certificateIssueVouchers) > 0)
    @foreach ($certificateIssueVouchers as $key => $certificateIssueVoucher)
        <tr>
            <td> {{ ($certificateIssueVouchers->currentPage() - 1) * $certificateIssueVouchers->perPage() + $loop->index + 1 }}
            </td>

            <td>{{ $certificateIssueVoucher->member->name ?? 'N/A' }}</td>
            <td>{{ $certificateIssueVoucher->item->code ?? 'N/A' }}</td>
            <td>{{ $certificateIssueVoucher->price ?? 'N/A' }}</td>
            <td>{{ $certificateIssueVoucher->item_type ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{ route('rins.edit', $certificateIssueVoucher->id) }}"
                    href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $certificateIssueVouchers->firstItem() }} – {{ $certificateIssueVouchers->lastItem() }}
                    Voucher of
                    {{ $certificateIssueVouchers->total() }} Vouchers)
                </div>
                <div>{!! $certificateIssueVouchers->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="8" class="text-center">No Vouchers Found</td>
    </tr>
@endif
