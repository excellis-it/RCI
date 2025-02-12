@if (count($members) > 0)
    @foreach ($members as $key => $member)
        <tr>
            <td>{{ $member->name ?? 'N/A' }}</td>
            <td>{{ $member->emp_id ?? 'N/A' }}</td>
            <td>{{ $member->gender ?? 'N/A' }}</td>
            <td>{{ $member->pers_no ?? 'N/A' }}</td>
            <td>{{ $member->designation->designation_type ?? 'N/A' }}</td>
            {{-- <td>
                <p class="text-warning">
                    {!! empty($member->member_credit_info) ? 'Credit Info Not Updated <br>' : '' !!}
                    {!! empty($member->member_debit_info) ? 'Debit Info Not Updated <br>' : '' !!}
                    {!! empty($member->member_recovery_info) ? 'Recovery Info Not Updated <br>' : '' !!}
                    {!! empty($member->member_core_info) ? 'Core Info Not Updated <br>' : '' !!}
                    {!! empty($member->member_personal_info) ? 'Personal Info Not Updated <br>' : '' !!}
                </p>
            </td> --}}

            <td class="sepharate"><a href="{{ route('members.edit', $member->id) }}" class="edit_pencil edit-route"><i
                        class="ti ti-pencil"></i></a>

                <a type="button" class="edit_pencil ms-2" data-bs-toggle="modal"
                    data-bs-target="#infoModal_{{ $member->id }}" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Member Status Info">
                    <i class="fa fa-info" aria-hidden="true"></i>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="infoModal_{{ $member->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Status Info : {{ $member->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-warning">
                                    {!! empty($member->member_credit_info) ? 'Credit Info Not Updated <br>' : '' !!}
                                    {!! empty($member->member_debit_info) ? 'Debit Info Not Updated <br>' : '' !!}
                                    {!! empty($member->member_recovery_info) ? 'Recovery Info Not Updated <br>' : '' !!}
                                    {!! empty($member->member_core_info) ? 'Core Info Not Updated <br>' : '' !!}
                                    {!! empty($member->member_personal_info) ? 'Personal Info Not Updated <br>' : '' !!}
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('members.delete', $member->id)}}"><i class="ti ti-trash"></i></a> --}}
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $members->firstItem() }} – {{ $members->lastItem() }} Members of
                    {{ $members->total() }} Members)
                </div>
                <div>{!! $members->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="6" class="text-center">No Members Found</td>
    </tr>
@endif
