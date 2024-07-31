<?php if(isset($edit)): ?>
    <form action="<?php echo e(route('project.update', $project->id)); ?>" method="POST" id="project-edit-form">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="project_name" id="project_name" value="<?php echo e($project->name ?? ''); ?>"
                                    placeholder="">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="1" <?php echo e(($project->status == 1) ? 'selected' : ''); ?>>Active</option>
                                    <option value="0" <?php echo e(($project->status == 0) ? 'selected' : ''); ?>>Inactive</option>
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
    <form action="<?php echo e(route('project.store')); ?>" method="POST" id="project-create-form">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-7 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Project Name</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="project_name" id="project_name" >
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-5 mb-2">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <label>Status</label>
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" name="status" id="status">
                                    <option value="">Select Status</option>
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
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/imprest/projects/form.blade.php ENDPATH**/ ?>