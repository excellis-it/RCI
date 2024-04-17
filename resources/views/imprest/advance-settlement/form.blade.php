
    <form action="" method="POST" id="cda-bills-create-form">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="adv_no" id="adv_no"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="adv_date" id="adv_date"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Adv Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="adv_amount" id="adv_amount"
                                     placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project</label>
                            </div>
                            <div class="col-md-12">
                                <select name="project_id" id="project_id" class="form-control">
                                    <option value="">Select Project</option>
                                    
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="var_date" id="var_date"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="var_amount" id="var_amount"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Vr Type</label>
                            </div>
                            <div class="col-md-12">
                                <select name="var_type_id" id="var_type_id" class="form-control">
                                    <option value="">Select</option>
                                    
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col-md-8">
                <div class="row align-items-end">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="chq_no" id="chq_no"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Chq Dt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="chq_date" id="chq_date"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-end">
                        <div class="me-2 mb-2">
                            <button type="submit" class="listing_add">Save</button>
                        </div>
                        <div class="me-2 mb-2">
                            <button type="reset" class="listing_exit">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

