 @if ($landline_allowances->count() > 0)
            @foreach ($landline_allowances as $landline_allowance)
                <tr>
                    <td>{{ ($landline_allowances->currentPage() - 1) * $landline_allowances->perPage() + $loop->index + 1 }}</td>
                    <td>{{ $landline_allowance->member->name ?? 'N/A' }}</td>
                    <td>{{ formatIndianCurrency($landline_allowance->landline_amount, 2) }}</td>
                    <td>{{ formatIndianCurrency($landline_allowance->mobile_amount, 2) }}</td>
                    <td>{{ formatIndianCurrency($landline_allowance->broadband_amount, 2) }}</td>
                    <td>{{ formatIndianCurrency($landline_allowance->entitle_amount, 2) }}</td>
                    <td>{{ $landline_allowance->month }}</td>
                    <td>{{ $landline_allowance->year }}</td>
                    <td>
                        <a data-route="{{ route('member-mobile-allowance.edit', $landline_allowance->id) }}"
                           href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
            <tr class="toxic">
                <td colspan="9" class="text-left">
                    <div class="d-flex justify-content-between">
                        <div>
                            Showing {{ $landline_allowances->firstItem() }} – {{ $landline_allowances->lastItem() }} of
                            {{ $landline_allowances->total() }} Member Allowances
                        </div>
                        <div>{!! $landline_allowances->links() !!}</div>
                    </div>
                </td>
            </tr>
        @else
            <tr>
                <td colspan="9" class="text-center">No Member Landline Allowance Found</td>
            </tr>
        @endif
