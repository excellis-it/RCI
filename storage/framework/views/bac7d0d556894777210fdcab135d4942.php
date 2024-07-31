<?php if(count($projects) > 0): ?>
    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e((($projects->currentPage()-1) * $projects->perPage() + $loop->index + 1) ?? 0); ?></td>
            <td><?php echo e($project->name ?? 'N/A'); ?></td>
            <td><span class="<?php echo e(($project->status == 1) ? 'active_ss' : 'inactive_ss'); ?>"><?php echo e(($project->status == 1) ? 'Active' : 'Inactive'); ?></span></td>
            <td class="sepharate">
                <a data-route="<?php echo e(route('project.edit', $project->id)); ?>" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr class="toxic">
        <td colspan="4" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing <?php echo e($projects->firstItem()); ?> – <?php echo e($projects->lastItem()); ?> Projects of
                    <?php echo e($projects->total()); ?> Projects)
                </div>
                <div><?php echo $projects->links(); ?></div>
            </div>
        </td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="4" class="text-center">No Project Found</td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/imprest/projects/table.blade.php ENDPATH**/ ?>