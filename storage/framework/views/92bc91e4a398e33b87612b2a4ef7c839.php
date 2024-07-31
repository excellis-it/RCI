<?php if(count($leaveTypes) > 0): ?>
    <?php $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e(($leaveTypes->currentPage()-1) * $leaveTypes->perPage() + $loop->index + 1); ?></td>
            <td><?php echo e($leaveType->leave_type ?? 'N/A'); ?></td>
            <td><?php echo e(Str::upper($leaveType->leave_type_abbr) ?? 'N/A'); ?></td>
            <td><span class="<?php echo e(($leaveType->status == 1) ? 'active_ss' : 'inactive_ss'); ?>"><?php echo e(($leaveType->status == 1) ? 'Active' : 'Inactive'); ?></span></td>
            <td class="sepharate"><a data-route="<?php echo e(route('leave-type.edit', $leaveType->id)); ?>" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing <?php echo e($leaveTypes->firstItem()); ?> – <?php echo e($leaveTypes->lastItem()); ?> Leave Types of
                    <?php echo e($leaveTypes->total()); ?> Leave Types)
                </div>
                <div><?php echo $leaveTypes->links(); ?></div>
            </div>
        </td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="5" class="text-center">No Leave Type Found</td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/member-info/leaveType/table.blade.php ENDPATH**/ ?>