<?php if(isset($edit)): ?>
   
        <form action="<?php echo e(route('members.expectation.update')); ?>" id="member-edit-expectation-form" method="post">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="member_expectation_id" id="member_edit_exp_id" value="<?php echo e($member_expectation->id); ?>">
            <input type="hidden" name="member_id" id="exp_member_id" value="<?php echo e($member_expectation->member_id); ?>">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Rule Name</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="rule_name" id="exp_rule_name"
                            value="<?php echo e($member_expectation->rule_name); ?>" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Percent </label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="percent" id="exp_percent"
                                    value="<?php echo e($member_expectation->percent); ?>" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="amount" id="exp_amount"
                                    value="<?php echo e($member_expectation->amount); ?>" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="year" id="exp_year">
                                    <option value="">Select</option>
                                    <?php for($i = date('Y'); $i >= 1950; $i--): ?>
                                        <option value="<?php echo e($i); ?>"
                                            <?php echo e($member_expectation->year == $i ? 'selected' : ''); ?>><?php echo e($i); ?>

                                        </option>
                                    <?php endfor; ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="month" id="exp_month">
                                    <option value="">Select</option>
                                    <option value="1" <?php echo e($member_expectation->month == 1 ? 'selected' : ''); ?>>January</option>
                                    <option value="2" <?php echo e($member_expectation->month == 2 ? 'selected' : ''); ?>>February</option>
                                    <option value="3" <?php echo e($member_expectation->month == 3 ? 'selected' : ''); ?>>March</option>
                                    <option value="4" <?php echo e($member_expectation->month == 4 ? 'selected' : ''); ?>>April</option>
                                    <option value="5" <?php echo e($member_expectation->month == 5 ? 'selected' : ''); ?>>May</option>
                                    <option value="6" <?php echo e($member_expectation->month == 6 ? 'selected' : ''); ?>>June</option>
                                    <option value="7" <?php echo e($member_expectation->month == 7 ? 'selected' : ''); ?>>July</option>
                                    <option value="8" <?php echo e($member_expectation->month == 8 ? 'selected' : ''); ?>>August</option>
                                    <option value="9" <?php echo e($member_expectation->month == 9 ? 'selected' : ''); ?>>September</option>
                                    <option value="10" <?php echo e($member_expectation->month == 10 ? 'selected' : ''); ?>>October</option>
                                    <option value="11" <?php echo e($member_expectation->month == 11 ? 'selected' : ''); ?>>November</option>
                                    <option value="12" <?php echo e($member_expectation->month == 12 ? 'selected' : ''); ?>>December</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Remark</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remark" id="exp_remark" value="<?php echo e($member_expectation->remark); ?>"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="row justify-content-end">
                        <div class="col-md-9">
                            <div class="row justify-content-end">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="row justify-content-end">
                        <div class="col-md-9">
                            <div class="row justify-content-end">
                                <div class="form-group col-md-3 mb-2">
                                    <a href="<?php echo e(route('members.create')); ?>"><button type="button"
                                        class="another-btn">Another</button></a>
                                </div>
                                <div class="form-group col-md-3 mb-2">
                                    <button type="submit" class="listing_add" id="button-update">Update</button>
                                </div>
                                <div class="form-group col-md-3 mb-2">
                                    <button type="button" id="expectation-delete" class="delete-btn-1" data-id="<?php echo e(isset($member_expectation->id) ? $member_expectation->id :'#'); ?>">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        
 
<?php else: ?>

    <form action="<?php echo e(route('members.expectation.store')); ?>" id="member-expectation-form" method="post">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="member_id" value="<?php echo e($member->id); ?>">

        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Rule Name</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="rule_name" id="exp_rule_name">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Percent </label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="percent" id="exp_percent" value=""
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Amount</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="amount" id="exp_amount" 
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Year</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="year" id="exp_year">
                                <option value="">Select</option>
                                <?php for($i = date('Y'); $i >= 1950; $i--): ?>
                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>

                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Month</label>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" name="month" id="exp_month">
                                <option value="">Select</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Remark</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control" name="remark" id="exp_remark">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-9">
                        <div class="row justify-content-end">
                            <div class="form-group col-md-3 mb-2">
                                <a href="<?php echo e(route('members.create')); ?>"><button type="button"
                                    class="another-btn">Another</button></a>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="submit" class="listing_add">Save</button>
                            </div>
                            <div class="form-group col-md-3 mb-2">
                                <button type="reset" class="listing_exit">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


<?php endif; ?>
<?php /**PATH C:\xampp52\htdocs\RCI\resources\views/frontend/members/expectation/form.blade.php ENDPATH**/ ?>