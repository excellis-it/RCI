

{{-- form create --}}

@if(isset($edit))
    <div class="row">
        <div class="form-group col-md-3">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>1st Child:</label>
                </div>
            </div>
        </div>

        <div class="form-group col-md-3 mb-2">
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

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Dob</label>
                <input type="date" class="form-control" name="child1_dob" value="{{ $member_family->child1_dob  ?? ''}}">
                <span id="child1_dob-error" class="text-danger"></span>
            </div>
        </div>

        <div class="form-group col-md-3 mb-2">
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

        <div class="col-md-3">
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Class/Dept.</label>
                <input type="text" class="form-control" name="child1_class" value="{{ $member_family->child1_class ?? ''}}">
                <span id="child1_class-error" class="text-danger"></span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Academic Year</label>
                <input type="text" class="form-control" name="child1_academic" value="{{ $member_family->child1_academic_yr ?? ''}}">
                <span id="child1_academic-error" class="text-danger"></span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Amount</label>
                <input type="text" class="form-control" name="child1_amount" value="{{ $member_family->child1_amount ?? ''}}">
                <span id="child1_amount-error" class="text-danger"></span>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="form-group col-md-3 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>2nd Child:</label>
                </div>
            </div>
        </div>

        <div class="form-group col-md-3 mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Name</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="child2_name" value="{{ $member_family->child2_name ?? ''}}"  placeholder="" >
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Dob</label>
                <input type="date" class="form-control" name="child2_dob" value="{{ $member_family->child2_dob  ?? ''}}">
                <span id="child2_dob-error" class="text-danger"></span>
            </div>
        </div>

        <div class="form-group col-md-3 mb-2">
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

        <div class="form-group col-md-3 mb-2">
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Class/Dept.</label>
                <input type="text" class="form-control" name="child2_class" value="{{ $member_family->child2_class ?? ''}}">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Academic Year</label>
                <input type="text" class="form-control" name="child2_academic" value="{{ $member_family->child2_academic_yr ?? ''}}">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="children_id">Amount</label>
                <input type="text" class="form-control" name="child2_amount" value="{{ $member_family->child2_amount ?? ''}}">
            </div>
        </div>
    </div>
@endif
