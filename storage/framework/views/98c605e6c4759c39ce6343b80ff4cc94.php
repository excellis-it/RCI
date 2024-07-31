<form action="<?php echo e(route('members.core-info.update')); ?>"
id="member-core-form" method="post">
<?php echo csrf_field(); ?>

<input type="hidden" name="member_id" value="<?php echo e($member->id); ?>">
<div class="row">
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Bank A/c No.</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="bank_acc_no" id="bank_acc_no"
                        value="<?php echo e($member_core->bank_acc_no ?? (old('bank_acc_no') ?? '')); ?>"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>CCM Mem No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="ccs_mem_no" id="ccs_mem_no"
                        value="<?php echo e($member_core->ccs_mem_no ?? (old('ccs_mem_no') ?? '')); ?>"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>FPA</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="fpa" id="fpa"
                        value="<?php echo e($member_core->fpa ?? (old('fpa') ?? '')); ?>"
                        placeholder="">
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
                    <label>Bank</label>
                </div>
                <div class="col-md-12">
                    <select class="form-select" name="bank"
                        id="bank">
                        <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($bank->id); ?>"
                                <?php echo e(isset($member_core->bank) && $bank->id == $member_core->bank ? 'selected' : ''); ?>>
                                <?php echo e($bank->bank_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>GPF Sub</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="gpf_sub" id="gpf_sub"
                        value="<?php echo e($member_core->gpf_sub ?? (old('gpf_sub') ?? '')); ?>"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>2 Add</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="add2" id="add2"
                        value="<?php echo e($member_core->add2 ?? (old('add2') ?? '')); ?>"
                        placeholder="">
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
                    <label>GPF A/c No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="gpf_acc_no" id="gpf_acc_no"
                        value="<?php echo e($member_core->gpf_acc_no ?? (old('gpf_acc_no') ?? '')); ?>"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>I.Tax</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="i_tax" id="i_tax"
                        value="<?php echo e($member_core->i_tax ?? (old('i_tax') ?? '')); ?>"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>PRAN No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="pran_no" id="pran_no"
                        value="<?php echo e($member_core->pran_no ?? (old('pran_no') ?? '')); ?>"
                        placeholder="">
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
                    <label>PAN No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="pan_no" id="pan_no"
                        value="<?php echo e($member_core->pan_no ?? (old('pan_no') ?? '')); ?>"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Ecess</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="ecess" id="ecess"
                        value="<?php echo e($member_core->ecess ?? (old('ecess') ?? '')); ?>"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-2">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <label>Ben A/C No</label>
                </div>
                <div class="col-md-12">
                    <input type="text" class="form-control"
                        name="ben_acc_no" id="ben_acc_no"
                        value="<?php echo e($member_core->ben_acc_no ?? (old('ben_acc_no') ?? '')); ?>"
                        placeholder="">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>DCMAF No</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"
                                name="dcmaf_no" id="dcmaf_no"
                                value="<?php echo e($member_core->dcmaf_no ?? (old('dcmaf_no') ?? '')); ?>"
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
                            <label>S.Pay</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"
                                name="s_pay" id="s_pay"
                                value="<?php echo e($member_core->s_pay ?? (old('s_pay') ?? '')); ?>"
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="row justify-content-end">
            <div class="col-md-6">
                <div class="row justify-content-end">
                    <div class="form-group col-md-3 mb-2">
                        <a href="<?php echo e(route('members.create')); ?>"><button type="button"
                            class="another-btn">Another</button></a>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <button type="submit"
                            class="listing_add">Update</button>
                    </div>
                    <div class="form-group col-md-3 mb-2">
                        <button type="reset"
                            class="listing_exit">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form><?php /**PATH C:\xampp52\htdocs\RCI\resources\views/frontend/members/core-form.blade.php ENDPATH**/ ?>