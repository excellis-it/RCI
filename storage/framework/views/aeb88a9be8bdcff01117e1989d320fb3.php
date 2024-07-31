<form action="<?php echo e(route('members.personal.update')); ?>" id="member-personal-form" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="member_id" value="<?php echo e($member->id); ?>">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="basic" id="basic"
                                    value="<?php echo e($member_personal->basic ?? ($member->basic ?? '')); ?>" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>G.pay</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="g_pay" id="g_pay"
                                    value="<?php echo e($member_personal->g_pay ?? ($member->gPay->amount ?? '')); ?>" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Cadre</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="cadre" id="cadre">
                                    <option value="">Select</option>
                                    <?php $__currentLoopData = $cadres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cadre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cadre->id); ?>"
                                            <?php echo e((isset($member_personal->cadre) || isset($member->cadre)) && ($cadre->id == ($member_personal->cadre ?? $member->cadre ?? null)) ? 'selected' : ''); ?>>
                                            <?php echo e($cadre->value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOB</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dob" id="dob"
                                    value="<?php echo e($member_personal->dob ?? ($member->dob) ?? ''); ?>" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Next Incr</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="next_inr" id="next_inr"
                                    value="<?php echo e($member_personal->next_inr ?? ($member->next_inr) ?? ''); ?>" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Ex-Service</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="ex_service" id="ex_service">
                                    <?php $__currentLoopData = $exServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exService->id); ?>"
                                            <?php echo e((isset($member_personal->ex_service) || isset($member->ex_service)) && ($exService->id == ($member_personal->ex_service ?? $member->ex_service ?? null)) ? 'selected' : ''); ?>>
                                            <?php echo e($exService->value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PayBand</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payband" id="payband">
                                    <?php $__currentLoopData = $paybands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payband): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($payband->id); ?>"
                                            <?php echo e((isset($member_personal->payband) || isset($member->payband)) && ($payband->id == ($member_personal->payband ?? $member->payband ?? null)) ? 'selected' : ''); ?>>
                                            <?php echo e($payband->payband_type); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Level</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pm_level" id="pm_level">
                                    <?php $__currentLoopData = $pmLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($pmLevel->id); ?>"
                                            <?php echo e((isset($member_personal->pm_level) || isset($member->pm_level)) && ($pmLevel->id == ($member_personal->pm_level ?? $member->pm_level ?? null)) ? 'selected' : ''); ?>>
                                            <?php echo e($pmLevel->value); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>EMP-ID</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="emp_id" id="emp_id"
                                    value="<?php echo e($member_personal->emp_id ?? ($member->emp_id ?? '')); ?>" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="gender" id="gender">
                                    <option value="Male"
                                        <?php echo e((isset($member_personal->gender) || isset($member->gender)) &&
                                            (($member_personal->gender ?? null) == 'Male' || ($member->gender ?? null) == 'Male')
                                           ? 'selected'
                                           : ''); ?>>
                                        Male</option>
                                    <option value="Female"
                                        <?php echo e((isset($member_personal->gender) || isset($member->gender)) &&
                                            (($member_personal->gender ?? null) == 'Female' || ($member->gender ?? null) == 'Female')
                                           ? 'selected'
                                           : ''); ?>>
                                        Female</option>
                                    <option value="Others"
                                        <?php echo e((isset($member_personal->gender) || isset($member->gender)) &&
                                            (($member_personal->gender ?? null) == 'Others' || ($member->gender ?? null) == 'Others')
                                           ? 'selected'
                                           : ''); ?>>
                                        Others</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="">Select</option>
                                    <option value="Yes"
                                        <?php echo e((isset($member_personal->status) || isset($member->status)) &&
                                            (($member_personal->status ?? null) == 'Yes' || ($member->status ?? null) == 'Yes')
                                           ? 'selected'
                                           : ''); ?>>
                                        Yes</option>
                                    <option value="No"
                                        <?php echo e((isset($member_personal->status) || isset($member->status)) &&
                                            (($member_personal->status ?? null) == 'No' || ($member->status ?? null) == 'No')
                                           ? 'selected'
                                           : ''); ?>>
                                        No</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOJ Lab</label>
                            </div>
                            <div class="col-md-12">
                                <input type="Date" class="form-control" name="doj_lab" id="doj_lab"
                                    value="<?php echo e($member_personal->doj_lab ?? ($member->doj_lab ?? '')); ?>" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quater</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="quater" id="quater">
                                    <option value="">Select</option>
                                    <?php $__currentLoopData = $quaters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quater): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($quater->id); ?>"
                                            <?php echo e((isset($member_personal->quater) || isset($member->quater)) && ($quater->id == ($member_personal->quater ?? $member->quater ?? null)) ? 'selected' : ''); ?>>
                                            <?php echo e($quater->qrt_type); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PH</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="ph" id="ph">
                                    <option value="">Select</option>
                                    <?php $__currentLoopData = $pgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($pg->id); ?>"
                                            <?php echo e(isset($member_personal->ph) && $pg->id == $member_personal->ph ? 'selected' : ''); ?>>
                                            <?php echo e($pg->value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Old Basic</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="old_basic" id="old_basic"
                                    value="<?php echo e($member_personal->old_basic ?? ($member->old_bp ?? '')); ?>"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>PM Index</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="pm_index" id="pm_index">
                                    <option value="">Select</option>
                                    <?php $__currentLoopData = $pmIndexes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmIndex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($pmIndex->id); ?>"
                                            <?php echo e((isset($member_personal->pm_index) || isset($member->pm_index)) && ($pmIndex->id == ($member_personal->pm_index ?? $member->pm_index ?? null)) ? 'selected' : ''); ?>>
                                            <?php echo e($pmIndex->value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Name</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="name" id="name"
                            value="<?php echo e($member_personal->name ?? ($member->name ?? '')); ?>" placeholder="">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <label>Desig</label>
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="desig" id="desig">
                            <option value="">Select</option>
                            <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($designation->id); ?>"
                                    <?php echo e((isset($member_personal->desig) || isset($member->desig)) && ($designation->id == ($member_personal->desig ?? $member->desig ?? null)) ? 'selected' : ''); ?>>
                                    <?php echo e($designation->designation); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Category</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="category" id="category">
                                    <option value="">Select</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"
                                            <?php echo e((isset($member_personal->category) || isset($member->category)) && ($category->id == ($member_personal->category ?? $member->category ?? null)) ? 'selected' : ''); ?>>
                                            <?php echo e($category->category); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Employment Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="e_status" id="e_status">
                                    <option value="">Select</option>
                                    <option value="active" <?php echo e((isset($member_personal->e_status) || isset($member->e_status)) &&
                                        (($member_personal->e_status ?? null) == 'active' || ($member->e_status ?? null) == 'active')
                                       ? 'selected'
                                       : ''); ?>>Active</option>
                                    <option value="deputation" <?php echo e((isset($member_personal->e_status) || isset($member->e_status)) &&
                                        (($member_personal->e_status ?? null) == 'deputation' || ($member->e_status ?? null) == 'deputation')
                                        ? 'selected'
                                        : ''); ?>>On Deputation</option>
                                    <option value="retired" <?php echo e((isset($member_personal->e_status) || isset($member->e_status)) &&
                                        (($member_personal->e_status ?? null) == 'retired' || ($member->e_status ?? null) == 'retired')
                                       ? 'selected'
                                       : ''); ?>>Retired</option>
                                    <option value="suspended" <?php echo e((isset($member_personal->e_status) || isset($member->e_status)) &&
                                        (($member_personal->e_status ?? null) == 'suspended' || ($member->e_status ?? null) == 'suspended')
                                       ? 'selected'
                                       : ''); ?>>Suspended</option>
                                    <option value="transferred" <?php echo e((isset($member_personal->e_status) || isset($member->e_status)) &&
                                        (($member_personal->e_status ?? null) == 'transferred' || ($member->e_status ?? null) == 'transferred')
                                       ? 'selected'
                                       : ''); ?>>Transferred</option> 
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>DOJ Service</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="doj_service" id="doj_service"
                                    value="<?php echo e($member_personal->doj_service ?? ($member->doj_service1 ?? '')); ?>"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Quater No</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="quater_no" id="quater_no"
                                    value="<?php echo e($member_personal->quater_no ?? ($member->quater_no ?? '')); ?>"
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
                                <label>DOP</label>
                            </div>
                            <div class="col-md-12">
                                <input type="date" class="form-control" name="dop" id="dop"
                                    value="<?php echo e($member_personal->dop ?? ($member->dop ?? '')); ?>" placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Fund Type</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="fund_type" id="fund_type"
                                    value="<?php echo e($member_personal->fund_type ?? ($member->fund_type ?? '')); ?>"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-2">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>CGEGIS</label>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" name="cgegis" id="cgegis">
                                <option value="">Select</option>
                                <?php $__currentLoopData = $cgegises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cgegis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cgegis->id); ?>"
                                        <?php echo e((isset($member_personal->cgegis) || isset($member->cgegis)) && ($cgegis->id == ($member_personal->cgegis ?? $member->cgegis ?? null)) ? 'selected' : ''); ?>>
                                        <?php echo e($cgegis->value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cgegis_text" id="cgegis_text"
                                value="<?php echo e($member_personal->cgegis_text ?? ($member->cgegis_text ?? '')); ?>"
                                placeholder="">
                            <span class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <label>Paystop</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pay_stop" id="inlineRadio1"
                                    value="none"
                                    <?php echo e((isset($member_personal->pay_stop) || isset($member->pay_stop)) &&
                                    (($member_personal->pay_stop ?? null) == 'none' || ($member->pay_stop ?? null) == 'none')
                                   ? 'checked'
                                   : ''); ?>>
                                <label class="form-check-label" for="inlineRadio1">None</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pay_stop" id="inlineRadio2"
                                    value="full-pay"
                                    <?php echo e((isset($member_personal->pay_stop) || isset($member->pay_stop)) &&
                                    (($member_personal->pay_stop ?? null) == 'Full Pay' || ($member->pay_stop ?? null) == 'Full Pay')
                                   ? 'checked'
                                   : ''); ?>>
                                <label class="form-check-label" for="inlineRadio2">Full Pay</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pay_stop" id="inlineRadio3"
                                    value="table-rec"
                                    <?php echo e((isset($member_personal->pay_stop) || isset($member->pay_stop)) &&
                                    (($member_personal->pay_stop ?? null) == 'table-rec' || ($member->pay_stop ?? null) == 'table-rec')
                                   ? 'checked'
                                   : ''); ?>>
                                <label class="form-check-label" for="inlineRadio3">Table Rce</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-2">
                        <button type="submit" class="listing_add">Save &
                            Update</button>
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
                            <button type="submit" class="listing_add">Update</button>
                        </div>
                        <div class="form-group col-md-3 mb-2">
                            <button type="" class="listing_exit">Exit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/members/personal-form.blade.php ENDPATH**/ ?>