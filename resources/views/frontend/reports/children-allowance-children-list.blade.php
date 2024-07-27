

{{-- form create --}}

@if(isset($edit))
    <div class="row">
        <div class="form-group col-md-2 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>1st Child:</label>
                </div>
            </div>
        </div>

        <div class="form-group col-md-2 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Name</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="child1_name" value="{{ $member_family->child1_name ?? ''}}" placeholder="" >
                    <span id="child1_name-error" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="form-group col-md-2 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>School/college</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="child1_scll_name" value="{{ $member_family->child1_scll_name  ?? ''}}" placeholder="" >
                    <span id="child1_scll_name-error" class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="children_id">Class/Dept.</label>
                <input type="text" class="form-control" name="child1_class">
                <span id="child1_class-error" class="text-danger"></span>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="children_id">Academic Year</label>
                <input type="text" class="form-control" name="child1_academic">
                <span id="child1_academic-error" class="text-danger"></span>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="children_id">Amount</label>
                <input type="text" class="form-control" name="child1_amount">
                <span id="child1_amount-error" class="text-danger"></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-2 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>2nd Child:</label>
                </div>
            </div>
        </div>

        <div class="form-group col-md-2 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Name</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="child2_name" value="{{ $member_family->child2_name ?? ''}}" placeholder="" >
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="form-group col-md-2 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>School/college</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="child2_scll_name" value="{{ $member_family->child2_scll_name  ?? ''}}" placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="children_id">Class/Dept.</label>
                <input type="text" class="form-control" name="child2_class">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="children_id">Academic Year</label>
                <input type="text" class="form-control" name="child2_academic">
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="children_id">Amount</label>
                <input type="text" class="form-control" name="child2_amount">
            </div>
        </div>
    </div>
@endif
