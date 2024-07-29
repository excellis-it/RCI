@extends('frontend.layouts.master')
@section('title')
Newspaper Allowance
@endsection

@push('styles')
@endpush

@section('content')
<section id="loading">
    <div id="loading-content"></div>
</section>
<div class="container-fluid">
    <div class="breadcome-list">
        <div class="d-flex">
            <div class="arrow_left"><a href="{{ route('members.index') }}" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
            <div class="">
                <h3>Newspaper Allowance Generate</h3>
                <ul class="breadcome-menu mb-0">
                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                    <li><span class="bread-blod">Newspaper Allowance</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!--  Row 1 -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card w-100">
                <div class="card-body">
                    <div id="form">
                        <form action="{{ route('reports.newspaper-allowance-generate') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group col-md-12 mb-2">
                                                <div class="row align-items-center">


                                                    <div class="form-group col-md-3 mb-2">
                                                        <div class="col-md-12">
                                                            <label>Employee Status</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select name="e_status" class="form-select" id="e_status">
                                                                <option value="">Select Employee Status</option>
                                                                <option value="active">Active</option>
                                                                <option value="deputation">On Deputation</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="col-md-12">
                                                            <label>Employee</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select name="member_id" class="form-select" id="member_id">
                                                               
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-3 mb-2 total_allo" style="display:none;">
                                                        <div class="col-md-12">
                                                            <label>Total Allocation</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" name="total_amount" class="form-control" id="total_amount">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-2 mb-2 total_allo" style="display:none;">
                                                        <div class="col-md-12">
                                                            <label>Amount Claimed</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" name="amount" class="form-control" id="amount">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-7 mb-2 total_allo" style="display:none;">
                                                        <div class="col-md-12">
                                                            <label>Remarks</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="text" name="remarks" class="form-control" id="remarks">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- save cancel button design in right corner --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row justify-content-end">
                                        <div class="col-md-3">
                                            <div class="row justify-content-end">
                                                <div class="form-group col-md-6 mb-2">
                                                    <button type="submit" class="listing_add">Generate</button>
                                                </div>

                                                {{-- <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_exit">Cancel</button>
                                                    </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    $(document).ready(function() {
        $('#e_status').change(function() {
            var e_status = $(this).val();

            $.ajax({
                url: "{{ route('reports.get-all-members') }}",
                type: 'POST',
                data: {
                    e_status,
                    _token: '{{ csrf_token() }}'
                },
                success: ({
                    members
                }) => {
                    const memberDropdown = $('[name="member_id"]').empty().append('<option value="">Select Member</option>');
                    members.forEach(({
                        id,
                        name,
                        emp_id
                    }) => memberDropdown.append(`<option value="${id}">${name} (${emp_id})</option>`));
                },
                error: (xhr) => console.log(xhr)
            });
        });
    });
</script>

<script>
    // if choose education then call ajax and show children name1 and name2 box
    $(document).ready(function() {
        $('select[name="member_id"]').change(function() {
            var member_id = $(this).val();
            $('.total_allo').show();

            $.ajax({
                url: "{{ route('reports.member-newspaper-allocation') }}",
                type: 'POST',
                data: {
                    member_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $('#total_amount').val(response.newspaper_allo_amount);

                },
            });

        });
    });
</script>
@endpush