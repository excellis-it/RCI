@php
    use App\Helpers\Helper;
@endphp





<!--  Row 1 -->
<div class="row">


    <div class="container">
        <form action="{{ route('receipts.update', $receipt->id) }}" method="POST" id="receipts_edit_form">
            @csrf
            @method('PUT')
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="row">

                        <div class="form-group col-md-4 mb-2">
                            <label>Vr. Date</label>
                            <input type="date" class="form-control" name="vr_date" value="{{ $receipt->vr_date }}">
                            <span class="text-danger"></span>
                        </div>

                        <div class="form-group col-md-4 mb-2">
                            <label>DV No.</label>
                            <input type="text" class="form-control" name="dv_no" value="{{ $receipt->dv_no }}">
                            <span class="text-danger"></span>
                        </div>

                        <div class="form-group col-md-12 mb-4">
                            <label for="dynamic-fields">Edit Members</label>
                            <div id="dynamic-fields">
                                @foreach ($receipt->receiptMembers as $index => $member)
                                    <div class="dynamic-section row mb-3">
                                        <div class="col-md-2">
                                            <label>Sr No.</label>
                                            <input type="text" class="form-control sr-no" name="sr_no[]" readonly
                                                value="{{ $member->serial_no }}">
                                        </div>
                                        <div class="form-group col-md-2 mb-2">
                                            <label>Member</label>
                                            {{-- <select class="form-control vendor_id" name="member_id[]">
                                                <option value="">Select</option>
                                                @foreach ($members as $memberOption)
                                                    <option value="{{ $memberOption->id }}"
                                                        {{ $memberOption->id == $member->member_id ? 'selected' : '' }}>
                                                        {{ $memberOption->name }}
                                                    </option>
                                                @endforeach
                                            </select> --}}

                                            <select class="form-control vendor_id" name="member_id[]">

                                                <option value="{{ $member->member_id }}" selected>
                                                    {{ $member->member->name }}
                                                </option>

                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Amount</label>
                                            <input type="number" class="form-control" name="member_amount[]"
                                                value="{{ $member->amount }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Bill reference</label>
                                            <input type="text" class="form-control" name="bill_ref[]"
                                                value="{{ $member->bill_ref }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Cheque No.</label>
                                            <input type="text" class="form-control" name="cheq_no[]"
                                                value="{{ $member->cheq_no }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Cheque Date</label>
                                            <input type="date" class="form-control" name="cheq_date[]"
                                                value="{{ $member->cheq_date }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="form-group mb-2 col-md-4">
                            <label>Narration</label>
                            <textarea type="text" class="form-control" name="narration">{{ $receipt->narration }}</textarea>

                        </div>

                        {{-- <div class="form-group mb-2 col-md-4">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                @foreach ($paymentCategories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $receipt->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="col-md-12 mt-2 mb-2">
                            <div class="form-inline">
                                @foreach ($paymentCategories as $key => $category)
                                    <div class="form-check form-check-inline ml-2">
                                        <input class="form-check-input" type="radio" name="category"
                                            id="inlineRadio{{ $key }}" value="{{ $category->id }}"
                                            {{ $category->id == $receipt->category_id ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="inlineRadio{{ $key }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>




                        {{-- <div class="form-group mb-2 col-md-6">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('receipts.index') }}" class="btn btn-secondary">Cancel</a>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row justify-content-between mt-3">

                <div class="col-md-2 mb-2">
                    <a href="{{ route('receipts.index') }}" class="listing_exit">Back</a>
                </div>

                <div class="col-md-2 text-end mb-2">
                    <button type="submit" class="listing_add">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
