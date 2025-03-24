@if (isset($css_subs) && count($css_subs) > 0)
    @foreach ($css_subs as $css_sub)
        <tr>
            <td>{{ $css_sub->id }}</td>
            <td>{{ $css_sub->pc_no }}</td>
            <td>{{ $css_sub->member ? $css_sub->member->name : 'N/A' }}</td>
            <td>{{ $css_sub->amount }}</td>
            <td class="sepharate">
                <button type="button" class="edit_pencil edit-btn border-0" value="{{ $css_sub->id }}"><i
                        class="ti ti-pencil"></i></button>
                {{-- <button type="button" class="delete delete-btn border-0" value="{{ $css_sub->id }}"><i
                        class="ti ti-trash"></i></button> --}}
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="5">
            <div class="d-flex justify-content-center">
                {{ $css_subs->links() }}
            </div>
        </td>
    </tr>
@else
    <tr>
        <td colspan="5" class="text-center">No CSS Subs found</td>
    </tr>
@endif
