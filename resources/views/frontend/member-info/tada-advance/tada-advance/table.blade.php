
    @if($data)
            @foreach ($data as $key=>$val)

            @php
                $memberDt = DB::table('members')->where('id',$val->member_id)->get()->first();
                $projectDt = DB::table('projects')->where('id',$val->project_id)->get()->first();
            @endphp
                <tr>
                    <td>{{$key+1}}</td>
                    <td>@if(isset($memberDt)) <a href="{{URL::to('/member-info/tada-advance/tada-priority-table/'.$val->id)}}">{{$memberDt->name}} </a>@endif</td>
                    <td>@if(isset($memberDt)) <a href="{{URL::to('/member-info/tada-advance/tada-priority-table/'.$val->id)}}">{{$projectDt->name}}</a> @endif</td>
                    <td>{{$val->bill_no}}</td>
                    <td>@if($val->bill_date) {{date('jS F, Y',strtotime($val->bill_date))}} @endif</td>
                    <td>{{$val->amount_requested}}</td>
                    <td>{{$val->amount_allowed}}</td>
                    <td>{{$val->amount_disallowed}}</td>
                    <td>
                        @if($val->status==1)
                        <span class="active_ss">Accepted</span>
                        @else
                        <span class="inactive_ss">Pending</span>
                        @endif
                    </td>
                    <td class="sepharate">
                        <a data-route="{{route('tada-advance.edit', $val->id)}}" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                        &nbsp;<a href="{{URL::to('/member-info/tada-advance/report/'.$val->id)}}"  class="edit_pencil"><i class="ti ti-download"></i></a>

                        <a href="javascript:void(0);" id="delete" class="delete" data-route="{{route('tada-advance.delete', $val->id)}}"><i class="ti ti-trash"></i></a>
                    </td>
                </tr>
            @endforeach


        <tr class="toxic">
            <td colspan="10" class="text-left">
                <div class="d-flex justify-content-between">
                    <div class="">
                        (Showing {{ $data->firstItem() }} – {{ $data->lastItem() }} TA/DA of
                        {{$data->total() }} TA/DA)
                    </div>
                    <div>{!! $data->links() !!}</div>
                </div>
            </td>
        </tr>
    @else
        <tr>
            <td colspan="10" class="text-center">No Data Found</td>
        </tr>
    @endif

