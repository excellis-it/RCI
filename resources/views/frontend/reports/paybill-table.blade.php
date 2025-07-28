 @if ($paybills->count() > 0)
     @foreach ($paybills as $paybill)
         <tr>
             <td>{{ ($paybills->currentPage() - 1) * $paybills->perPage() + $loop->index + 1 }}</td>
             <td>{{ $paybill->dv_number }}</td>
             <td>
                 <span class="toggle-status badge {{ $paybill->status ? 'bg-success' : 'bg-danger' }}"
                     data-id="{{ $paybill->id }}" title="Click to change status">
                     <i class="bi {{ $paybill->status ? 'bi-check-circle-fill' : 'bi-x-circle-fill' }}"></i>
                     {{ $paybill->status ? 'Paid' : 'Unpaid' }}
                 </span>

             </td>

             <td>{{ ucfirst($paybill->generate_by) }}</td>
             <td>{{ $paybill->month }}</td>
             <td>{{ $paybill->year }}</td>
             <td>
                 @if ($paybill->generate_by === 'member')
                     Member ID: {{ $paybill->member->name ?? 'N/A' }}
                 @else
                     Category: {{ $paybill->categoryData->category ?? 'N/A' }}
                 @endif
             </td>
             <td class="sepharate">
                 <a href="javascript:void(0);" id="delete" class="delete"
                     data-route="{{ route('paybill-trackings.delete', $paybill->id) }}"><i class="ti ti-trash"></i></a>
             </td>
         </tr>
     @endforeach
     <tr class="toxic">
         <td colspan="10" class="text-left">
             <div class="d-flex justify-content-between">
                 <div>
                     (Showing {{ $paybills->firstItem() }} – {{ $paybills->lastItem() }} of {{ $paybills->total() }}
                     records)
                 </div>
                 <div>{!! $paybills->links() !!}</div>
             </div>
         </td>
     </tr>
 @else
     <tr>
         <td colspan="10" class="text-center">No Paybill Tracking Records Found</td>
     </tr>
 @endif
