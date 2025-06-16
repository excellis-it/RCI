@if (count($advance_settlements) > 0)
    @foreach ($advance_settlements as $key => $advance_settlement)
        <tr>

            <td>{{ $advance_settlement->adv_no }}</td>
            <td>{{ $advance_settlement->adv_date }}</td>
            {{-- <td>{{ $advance_settlement->member->name ?? 'N/A' }}</td> --}}
            <td>{{ $advance_settlement->adv_amount }}</td>
            <td>{{ $advance_settlement->bill_amount ?? 'N/A' }}</td>
            <td>{{ $advance_settlement->balance ?? 'N/A' }}</td>
            <td>{{ $advance_settlement->project->name ?? 'N/A' }}</td>
            <td>{{ $advance_settlement->chq_no ?? 'N/A' }}</td>
            <td>{{ $advance_settlement->chq_date ?? 'N/A' }}</td>
            <td>{{ $advance_settlement->variableType->name ?? 'N/A' }}</td>
            <td>{{ $advance_settlement->var_date ?? 'N/A' }}</td>
            {{-- <td>
                <a href="javascript:void(0);" class="delete-advance-settlement edit_pencil text-danger ms-2"
                    id="advance-sttl-delete"
                    data-route="{{ route('advance-settlement.delete', $advance_settlement->id) }}">
                    <i class="ti ti-trash"></i>
            </td> --}}
            {{-- add a edit button --}}
            <td class="sepharate" style="cursor: pointer; position: relative;">
                <!-- Three Dots Icon -->
                <div class="dots-toggle">
                    <i class="ti ti-dots-vertical"></i>
                </div>

                <!-- Action Buttons (Initially Hidden) -->
                <div class="action-buttons d-none">
                   <div class="d-flex">
                    <a href="javascript:void(0);" class="edit-advance-settlement edit_pencil ms-2"
                    data-route="{{ route('advance-settlement.edit', $advance_settlement->id) }}">
                    <i class="ti ti-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="delete-advance-settlement edit_pencil text-danger ms-2 advance-sttl-delete"
                    data-route="{{ route('advance-settlement.delete', $advance_settlement->id) }}">
                    <i class="ti ti-trash"></i>
                </a>
                   </div>
                </div>
            </td>



        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="11" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $advance_settlements->firstItem() }} – {{ $advance_settlements->lastItem() }} Advance
                    Settlement of
                    {{ $advance_settlements->total() }} Advance Settlement)
                </div>
                <div>{!! $advance_settlements->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="10" class="text-center">No Advance Settlement Found</td>
    </tr>
@endif
