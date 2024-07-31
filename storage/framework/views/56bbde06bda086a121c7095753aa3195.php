

<?php if(isset($edit)): ?>

<form action="<?php echo e(route('members.loan.update')); ?>" id="member-edit-loan-form" method="post">
    <?php echo csrf_field(); ?>
   
    <div class="row">

        <input type="hidden" name="member_loan_id" id="member_loan_id" value="<?php echo e($member_loan->id); ?>" >
        <input type="hidden" name="member_id" id="member_id" value="<?php echo e($member_loan->member_id); ?>">
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan Name</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="loan_name" id="loan_name">
                            <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($loan->id); ?>"  <?php echo e(isset($member_loan->loan_id) && $loan->id == $member_loan->loan_id ? 'selected' : ''); ?>>
                                    <?php echo e($loan->loan_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Present InstNo</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="present_inst_no" id="present_inst_no"
                            value="<?php echo e($member_loan->present_inst_no); ?>" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Inst Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_amount" id="inst_amount" value="<?php echo e($member_loan->inst_amount); ?>"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Inst Rate</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_rate" id="inst_rate" value="<?php echo e($member_loan->inst_rate); ?>"
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
                        <label>Tot Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total_amount" id="total_amount" value="<?php echo e($member_loan->total_amount); ?>"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Balance</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="balance" id="balance" value="<?php echo e($member_loan->balance); ?>"
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
                        <label>Penal Inst Rate</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="penal_inst_rate" id="penal_inst_rate" value="<?php echo e($member_loan->penal_inst_rate); ?>"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Start Date</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo e($member_loan->start_date); ?>"
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
                        <label>End Date</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo e($member_loan->end_date); ?>"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot No of Inst</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_no_of_inst" id="tot_no_of_inst"
                            value="<?php echo e($member_loan->tot_no_of_inst); ?>" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remark" id="remark" value="<?php echo e($member_loan->remark); ?>"
                            placeholder="">
                        <span class="text-danger"></span>
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
                            <button type="submit" class="listing_add" id="exp-btn-update">Update</button>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="button" id="loan-delete"  class="delete-btn-1" data-id="<?php echo e(isset($member_loan->id) ? $member_loan->id :'#'); ?>">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<?php else: ?>

<form action="<?php echo e(route('members.loan.store')); ?>" id="member-loan-info-form" method="post">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="member_id" value="<?php echo e($member->id); ?>" >
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Loan Name</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="loan_name" id="loan_name">
                            <option value="">Select Loan</option>
                            <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($loan->id); ?>">
                                    <?php echo e($loan->loan_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Present InstNo</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="present_inst_no" id="present_inst_no"
                            value="" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
           
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Inst Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_amount" id="inst_amount" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Inst Rate</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="inst_rate" id="inst_rate" value=""
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
                        <label>Tot Amt</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="total_amount" id="total_amount" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Balance</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="balance" id="balance" value=""
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
                        <label>Penal Inst Rate</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="penal_inst_rate" id="penal_inst_rate"
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Start Date</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="start_date" id="start_date"
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
                        <label>End Date</label>
                    </div>
                    <div class="col-md-12">
                        <input type="date" class="form-control" name="end_date" id="end_date" 
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Tot No of Inst</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="tot_no_of_inst" id="tot_no_of_inst"
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
                        <label>Remarks</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="remark" id="remark" value=""
                            placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="row justify-content-end">
                <div class="form-group col-md-4 mb-2">
                    <a href="<?php echo e(route('members.create')); ?>"><button type="button"
                        class="another-btn">Another</button></a>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="submit" class="listing_add">Save</button>
                </div>
                <div class="form-group col-md-4 mb-2">
                    <button type="" class="listing_exit">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php endif; ?>
<?php /**PATH C:\xampp52\htdocs\RCI\resources\views/frontend/members/loan/form.blade.php ENDPATH**/ ?>