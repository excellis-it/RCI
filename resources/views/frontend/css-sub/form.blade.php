<div class="card">
    <div class="card-body">
        <form id="saveCssSubForm">
            @csrf
            <input type="hidden" name="id" id="css_sub_id">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="pc_no" class="form-label">PC No.</label>
                    <input type="text" class="form-control" id="pc_no" name="pc_no"
                        placeholder="Enter PC Number">
                    <span class="text-danger error-text pc_no_error"></span>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="member_id" class="form-label">Member</label>
                    <select class="form-control" id="member_id" name="member_id">
                        <option value="" disabled>Select Member by PC No.</option>
                    </select>
                    <span class="text-danger error-text member_id_error"></span>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
                    <span class="text-danger error-text amount_error"></span>
                </div>
            </div>

            <div class="row mt-3 d-flex justify-content-between">
                <div class="col-md-2">
                    <div class="mb-1">
                        <a href="" class="listing_exit">Back</a>

                        <button type="button" id="cancelBtn" class="listing_exit" style="display:none;"
                            hidden>Cancel</button>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-1">
                        <button type="submit" id="saveBtn" class="listing_add">Add</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
