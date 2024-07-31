<?php if(isset($edit)): ?>
    <form  action="<?php echo e(route('tada.update', $data->id)); ?>" method="POST" id="tada-edit-form">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Category</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    <?php if($category): ?>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($val->id); ?>" <?php echo e(($data->category_id == $val->id) ? 'selected' : ''); ?>><?php echo e($val->category); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Title</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="title" id="title" value="<?php echo e($data->title); ?>"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Purpose</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="purpose" id="purpose" value="<?php echo e($data->purpose); ?>"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Currency</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="currency" id="currency">
                                    <option value="1" <?php echo e(($data->currency == 1) ? 'selected' : ''); ?>>INR</option>
                                    <option value="2" <?php echo e(($data->currency == 2) ? 'selected' : ''); ?>>USD</option>
                                </select>
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
                                <input type="number" class="form-control" name="amount" id="amount" value="<?php echo e($data->amount); ?>"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Payment Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payment_type" id="payment_type">
                                    <option  value="">Select</option>
                                    <option <?php echo e(($data->payment_type == 'onetime') ? 'selected' : ''); ?> value="onetime">Onetime</option>
                                    <option <?php echo e(($data->payment_type == 'perday') ? 'selected' : ''); ?> value="perday">Per Day</option>
                                    <option <?php echo e(($data->payment_type == 'perkm') ? 'selected' : ''); ?> value="perkm">Per KM</option>
                                    <option <?php echo e(($data->payment_type == 'permonth') ? 'selected' : ''); ?> value="permonth">Per Month</option>
                                    <option <?php echo e(($data->payment_type == 'peryear') ? 'selected' : ''); ?> value="peryear">Per Year</option>
                                    <option <?php echo e(($data->payment_type == 'perweek') ? 'selected' : ''); ?> value="perweek">Per Week</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" <?php echo e(($data->status == 1) ? 'selected' : ''); ?>>Active</option>
                                    <option value="0" <?php echo e(($data->status == 0) ? 'selected' : ''); ?>>Inactive</option>
                                </select>
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
<?php else: ?>
    <form  action="<?php echo e(route('tada.store')); ?>" method="POST" id="tada-create-form">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Category</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">Select Category</option>
                                    <?php if($category): ?>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($val->id); ?>"><?php echo e($val->category); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>

                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Title</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="title" id="title"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Purpose</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="purpose" id="purpose"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Currency</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="currency" id="currency">
                                    <option value="1">INR</option>
                                    <option value="2">USD</option>
                                </select>
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
                                <input type="number" class="form-control" name="amount" id="amount"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-2 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Payment Type</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="payment_type" id="payment_type">
                                    <option value="">Select</option>
                                    <option value="onetime">Onetime</option>
                                    <option value="perday">Per Day</option>
                                    <option value="perkm">Per KM</option>
                                    <option value="permonth">Per Month</option>
                                    <option value="peryear">Per Year</option>
                                    <option value="perweek">Per Week</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
<?php endif; ?>
<?php /**PATH C:\xampp53\htdocs\RCI\resources\views/frontend/tada/tada-form.blade.php ENDPATH**/ ?>