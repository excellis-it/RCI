<?php if(isset($edit)): ?>

    <form action="<?php echo e(route('cda-receipts.update',$cdaReceipt->id)); ?>" method="POST" id="cda-receipt-edit-form">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>

        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Rct Vr. Date</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" 
                                        name="voucher_date" id="voucher_date" value="<?php echo e($cdaReceipt->voucher_date); ?>" placeholder="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>DV Date</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" 
                                        name="dv_date" id="dv_date" value="<?php echo e($cdaReceipt->dv_date); ?>" placeholder="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rct Vr. Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo e($cdaReceipt->amount); ?>" name="vr_amount" id="vr_amount"
                                    placeholder="">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Details</label>
                            </div>
                            <div class="col-md-12">

                                <select name="details" class="form-select">
                                    <option value="" selected>Select</option>
                                    <?php $__currentLoopData = $cdaReceiptDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cdaReceiptDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cdaReceiptDetail->id); ?> " <?php echo e(isset($cdaReceipt->details) && $cdaReceiptDetail->id == $cdaReceipt->details ? 'selected' : ''); ?>>
                                            <?php echo e($cdaReceiptDetail->details); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="col-md-6">
                    <div class="mb-1">
                        <button type="submit" class="listing_add">Update</button>
                    </div>
                    <div class="mb-1">
                        <a href="" class="listing_exit">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php else: ?>
    <form action="<?php echo e(route('cda-receipts.store')); ?>" method="POST" id="cda-receipt-create-form">
        <?php echo csrf_field(); ?>


        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>Rct Vr. Date</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" 
                                        name="voucher_date" id="voucher_date" placeholder="">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <label>DV Date</label>
                                </div>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" 
                                        name="dv_date" id="dv_date" placeholder="">
                                        <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Rct Vr. Amt</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="vr_amount" id="vr_amount"
                                    placeholder="">
                                    <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Details</label>
                            </div>
                            <div class="col-md-12">

                                <select name="details" class="form-select">
                                    <option value="" selected>Select</option>
                                    <?php $__currentLoopData = $cdaReceiptDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cdaReceiptDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cdaReceiptDetail->id); ?>">
                                            <?php echo e($cdaReceiptDetail->details); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="col-md-6">
                    <div class="mb-1">
                        <button type="submit" class="listing_add">Add</button>
                    </div>
                    <div class="mb-1">
                        <a href="" class="listing_exit">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php endif; ?>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/imprest/cda-receipts/form.blade.php ENDPATH**/ ?>