<?php if(isset($edit)): ?>
    <form  action="<?php echo e(route('tada-plus.update', $data->id)); ?>" method="POST" id="tada-edit-form">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Claimed Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="claim_amount" id="claim_amount" value="<?php echo e($data->claim_amount); ?>"/>
                                <span class="text-danger"></span>
                            </div>

                        </div>
                    </div>

                   <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Pass Adv. Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="number" class="form-control" name="pass_amount" id="pass_amount" value="<?php echo e($data->pass_amount); ?>"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>MRO</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="mro" id="mro" value="<?php echo e($data->mro); ?>"/>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Due Amount</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="due_amount" id="due_amount" value="<?php echo e($data->due_amount); ?>"/>
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

<?php endif; ?>


<?php /**PATH C:\xampp53\htdocs\RCI\resources\views/frontend/member-info/tada-advance/form-plus.blade.php ENDPATH**/ ?>