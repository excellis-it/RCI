@if (isset($edit))
    <form action="{{ route('member-family.update', $member_fam_edit->id) }}" method="POST" id="member-family-edit-form">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="member_id" id="member_id">
                                    <option value="">Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}" {{ $member_fam_edit->member_id == $member->id ? 'selected' :''}}>{{ $member->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Parents :</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="father_mother_name" id="father_mother_name" value="{{ $member_fam_edit->father_mother_name }}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Spouse:</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="wife_hus_name" id="wife_hus_name" value="{{ $member_fam_edit->wife_hus_name}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dob" id="dob" value="{{ $member_fam_edit->dob}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Working status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="work_status" id="work_status">
                                    <option value="Working" {{ $member_fam_edit->work_status == 'Working' ? 'selected': ''}}>Working</option>
                                    <option value="Not-working" {{ $member_fam_edit->work_status == 'Not-working' ? 'selected': ''}}>Not Working</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Children (Elder):</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child1_name" value="{{ $member_fam_edit->child1_name}}" id="child1_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="child1_dob" value="{{ $member_fam_edit->child1_dob}}" id="child1_dob" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>School</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child1_scll_name" value="{{ $member_fam_edit->child1_scll_name}}" id="child1_scll_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Class</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child1_class" id="child1_class" value="{{ $member_fam_edit->child1_class}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Academic Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child1_academic_yr" id="child1_academic_yr" value="{{ $member_fam_edit->child1_academic_yr}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" min="0" class="form-control" name="child1_amount" id="child1_amount" value="{{ $member_fam_edit->child1_amount}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Children (Younger):</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child2_name" id="child2_name" value="{{ $member_fam_edit->child2_name}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="child2_dob" id="child2_dob" value="{{ $member_fam_edit->child2_dob}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>School</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child2_scll_name" value="{{ $member_fam_edit->child2_scll_name}}" id="child2_scll_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Class</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child2_class" id="child2_class" value="{{ $member_fam_edit->child2_class}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Academic Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child2_academic_yr" id="child2_academic_yr" value="{{ $member_fam_edit->child2_academic_yr}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" min="0" class="form-control" name="child2_amount" id="child2_amount" value="{{ $member_fam_edit->child2_amount}}" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Update</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@else
    <form action="{{ route('member-family.store') }}" method="POST" id="member-family-create-form">
        @csrf
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Member</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="member_id" id="member_id">
                                    <option value="">Select Member</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Parents :</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="father_mother_name" id="father_mother_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Spouse :</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="wife_hus_name" id="wife_hus_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Working status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="work_status" id="work_status">
                                    <option value="">Select Status</option>
                                    <option value="Working">Working</option>
                                    <option value="Not-working">Not Working</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Children (Elder):</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child1_name" id="child1_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="child1_dob" id="child1_dob" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>School</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child1_scll_name" id="child1_scll_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Class</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child1_class" id="child1_class" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Academic Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child1_academic_yr" id="child1_academic_yr" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" min="0" class="form-control"  name="child1_amount" id="child1_amount" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Children (Younger):</label>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child2_name" id="child2_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Dob</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="child2_dob" id="child2_dob" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>School</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child2_scll_name" id="child2_scll_name" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Class</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child2_class" id="child2_class" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Academic Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="child2_academic_yr" id="child2_academic_yr" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" min="0" class="form-control" name="child2_amount" id="child2_amount" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
@endif
