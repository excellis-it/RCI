@if (count($receipts) > 0)
    @foreach ($receipts as $key => $receipt)
        <tr>
            <td>{{ $receipt->vr_no ?? 'N/A' }}</td>
            <td>{{ $receipt->dv_no ?? 'N/A' }}</td>
            <td>{{ $receipt->category->name ?? 'N/A' }}</td>
            <td>{{ $receipt->vr_date ?? 'N/A' }}</td>
            <td>{{ $receipt->amount ?? 'N/A' }}</td>
            <td class="sepharate"><a data-route="{{ route('receipts.edit', $receipt->id) }}" href="#"
                    onclick="getEditForm({{ $receipt->id }})" class="edit_pencil"><i class="ti ti-pencil"></i></a>
                {{-- <a href="{{route('receipts.delete', ['vr_no' => $receipt->vr_no, 'vr_date' => $receipt->vr_date])}}" id="delete" class="delete" data-route="{{route('receipts.delete', ['vr_no' => $receipt->vr_no, 'vr_date' => $receipt->vr_date])}}"><i class="ti ti-trash"></i></a> --}}
                {{-- <a href="javascript:void(0);" id="delete" class="delete" data-bs-toggle="modal"
                    data-bs-target="#deleteModal-{{ $receipt->vr_no }}">

                </a> --}}
                <a href="javascript:void(0);" class="delete-receipt edit_pencil text-danger ms-2"
                    data-delete-url="{{ route('receipts.delete', ['vr_no' => $receipt->vr_no, 'vr_date' => $receipt->vr_date]) }}">
                    <i class="ti ti-trash"></i>
                </a>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.delete-receipt').forEach(function(button) {
                            button.addEventListener('click', function() {
                                const deleteUrl = this.dataset.deleteUrl;

                                Swal.fire({
                                    title: 'Are you sure want to delete?',
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Redirect to the delete URL
                                        window.location.href = deleteUrl;
                                    }
                                });
                            });
                        });
                    });
                </script>
            </td>
        </tr>
    @endforeach
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                    (Showing {{ $receipts->firstItem() }} – {{ $receipts->lastItem() }} Receipts of
                    {{ $receipts->total() }} Receipts)
                </div>
                <div>{!! $receipts->links() !!}</div>
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="7" class="text-center">No Receipts Found</td>
    </tr>
@endif
