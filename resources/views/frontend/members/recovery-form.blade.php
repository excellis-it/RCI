<form action="{{ route('members.recovery.update') }}" id="member-recovery-form" method="post">
    @csrf

    <input type="hidden" name="member_id" value="{{ $member->id }}">
    <input type="hidden" name="current_year" value="{{ $currentYear }}">
    <input type="hidden" name="current_month" value="{{ $currentMonth }}">

    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>V.Incr</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="v_incr" id="v_incr"
                            value="{{ $member_recovery->v_incr ?? ($member_var_info->var_incr ?? (old('v_incr') ?? '')) }}"
                            placeholder="" required>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @dd( $member_var_info) --}}
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>NOI
                            {{-- <span class="float-end">
                            (Pending : {{ $member_recovery->noi_pending ?? 0 }})
                        </span> --}}
                        </label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="noi" id="noi"
                            value="{{ $member_recovery->noi ?? ($member_var_info->noi ?? (old('noi') ?? '')) }}"
                            placeholder="" required>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Total</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total" id="total"
                            value="{{ $member_recovery->total ?? (old('total') ?? '') }}" placeholder="" required>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Stop Date</label>
                    </div>
                    <div class="col-md-12">
                        @php
                            $stopValue = old('stop') ?? ($member_recovery->stop ?? '');
                            $stopDate = null;

                            if ($stopValue && preg_match('/^\d{4}-\d{2}-\d{2}$/', $stopValue)) {
                                $stopDate = \Carbon\Carbon::parse($stopValue)->format('Y-m-d');
                            }
                        @endphp

                        <input type="date" name="stop" id="stop" class="form-control"
                            value="{{ $stopDate }}">

                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-3 mb-2">
                            <button type="submit" class="listing_add">Save</button>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <a class="delete_acma" id="delete-recovery"
                                data-id="{{ isset($member_recovery->id) ? $member_recovery->id : '#' }}">
                                <button type="button" class="delete-btn-1">Delete</button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-8">
                    <div class="row justify-content-end">
                        <div class="form-group col-md-3 mb-2">
                            <a href="{{ route('members.create') }}"><button type="button"
                                    class="another-btn">Another</button></a>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="submit" class="listing_add">Update</button>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="reset" class="listing_exit">Exit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
    <script>
    $(document).ready(function () {
        function calculateTotal() {
            let noi = parseFloat($("#noi").val()) || 1;
            let v_incr = parseFloat($("#v_incr").val()) || 0;
            let total = v_incr * noi;
            $("#total").val(total.toFixed(2)); // Optional: format to 2 decimal places
        }

        // Listen for keyup on both inputs
        $(document).on('keyup', '#noi, #v_incr', function (e) {
            calculateTotal();
        });
    });
</script>

@endpush
