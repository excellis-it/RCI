<?php if(isset($edit)): ?>
    <form action="<?php echo e(route('member-gpf.update', $member_gpf->id)); ?>" method="POST" id="gpfs-edit-form">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Members</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="" id="member_id" disabled>
                                    <option value="">Select member</option>
                                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($member->id); ?>"<?php echo e($member_gpf->member_id == $member->id ? 'selected' : ''); ?>><?php echo e($member->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden"  value="<?php echo e($member_gpf->member_id); ?>" name="member_id">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Finantial Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="finantial_year" value="<?php echo e($member_gpf->finantial_year); ?>" placeholder="yyyy - yyyy" style="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                            <select name="year" class="form-select" id="year">
                                <option value="">Select Year</option>
                                <?php for($i = date('Y'); $i >= 1950; $i--): ?>
                                    <option value="<?php echo e($i); ?>" <?php echo e($member_gpf->year == $i ? 'selected' :''); ?>>
                                        <?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <select name="month" class="form-select" id="month">
                                    <option value="Jan" <?php echo e($member_gpf->month == "Jan" ? 'selected': ""); ?>>Jan</option>
                                    <option value="Feb" <?php echo e($member_gpf->month == "Feb" ? 'selected': ""); ?>>Feb</option>
                                    <option value="March" <?php echo e($member_gpf->month == "March" ? 'selected': ""); ?>>March</option>
                                    <option value="April" <?php echo e($member_gpf->month == "April" ? 'selected': ""); ?>>April</option>
                                    <option value="May" <?php echo e($member_gpf->month == "May" ? 'selected': ""); ?>>May</option>
                                    <option value="June" <?php echo e($member_gpf->month == "June" ? 'selected': ""); ?>>June</option>
                                    <option value="July" <?php echo e($member_gpf->month == "July" ? 'selected': ""); ?>>July</option>
                                    <option value="Aug" <?php echo e($member_gpf->month == "Aug" ? 'selected': ""); ?>>Aug</option>
                                    <option value="Sept" <?php echo e($member_gpf->month == "Sept" ? 'selected': ""); ?>>Sept</option>
                                    <option value="Oct" <?php echo e($member_gpf->month == "Oct" ? 'selected': ""); ?>>Oct</option>
                                    <option value="Nov" <?php echo e($member_gpf->month == "Nov" ? 'selected': ""); ?>>Nov</option>
                                    <option value="Dec" <?php echo e($member_gpf->month == "Dec" ? 'selected': ""); ?>>Dec</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Monthly Subscription</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="monthly_subscription" value="<?php echo e($member_gpf->monthly_subscription); ?>" id="monthly_subscription" >
                                <span class="text-danger" id="subscription_error_message"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Openning Balance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo e($member_gpf->openning_balance); ?>" name="openning_balance" id="" placeholder="" style="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Closing Balance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo e($member_gpf->closing_balance); ?>" name="closing_balance" id="" placeholder="" style="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add gpf_sub_btn">Update</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
<?php else: ?>
    <form action="<?php echo e(route('member-gpf.store')); ?>" method="POST" id="member-gpf-create-form">
        <?php echo csrf_field(); ?>
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Members</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="member_id" id="member_id" >
                                    <option value="">Select member</option>
                                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($member->id); ?>"><?php echo e($member->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Finantial Year</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="finantial_year"  placeholder="yyyy - yyyy" style="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Year</label>
                            </div>
                            <div class="col-md-12">
                            <select name="year" class="form-select" id="year">
                                <option value="">Select Year</option>
                                <?php for($i = date('Y'); $i >= 1950; $i--): ?>
                                    <option value="<?php echo e($i); ?>">
                                        <?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Month</label>
                            </div>
                            <div class="col-md-12">
                                <select name="month" class="form-select" id="month">
                                    <option value="">Select Month</option>
                                    <option value="Jan">Jan</option>
                                    <option value="Feb">Feb</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="Aug">Aug</option>
                                    <option value="Sept">Sept</option>
                                    <option value="Oct">Oct</option>
                                    <option value="Nov">Nov</option>
                                    <option value="Dec">Dec</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Monthly Subscription</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="monthly_subscription" id="monthly_subscription" readonly>
                                <span class="text-danger" id="subscription_error_message"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Openning Balance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="openning_balance" id="" placeholder="" style="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-8 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Closing Balance</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="closing_balance" id="" placeholder="" style="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="mb-1">
                    <button type="submit" class="listing_add gpf_sub_btn">Add</button>
                </div>
                <div class="mb-1">
                    <a href="" class="listing_exit">Back</a>
                </div>
            </div>
        </div>
    </form>
<?php endif; ?>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/member-info/gpf/form.blade.php ENDPATH**/ ?>