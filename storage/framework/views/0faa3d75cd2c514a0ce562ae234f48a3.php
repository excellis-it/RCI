<?php if(count($leaves) > 0): ?>
    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e(($leaves->currentPage()-1) * $leaves->perPage() + $loop->index + 1); ?></td>
            <td><?php echo e($member->name ?? 'N/A'); ?></td>
            <td>
                Allotted
                <hr />
                Taken
                <hr />
                Remaining
            </td>
            <?php $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td>
                <?php echo e($allotedLeaves->where('member_id', $member->id)->where('leave_type_id', $leaveType->id)->first()->alloted_leaves ?? 0); ?>

                <hr />
                <?php echo e($leaves->where('member_id', $member->id)->where('leave_type_id', $leaveType->id)->where('status', 1)->sum('no_of_days') ?? 0); ?>

                <hr />
                <?php echo e((($allotedLeaves->where('member_id', $member->id)->where('leave_type_id', $leaveType->id)->first()->alloted_leaves ?? 0) - ($leaves->where('member_id', $member->id)->where('leave_type_id', $leaveType->id)->where('status', 1)->sum('no_of_days') ?? 0)) ?? 0); ?>

            </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td><?php echo e($leaves->where('member_id', $member->id)->where('status', 1)->sum('no_of_days') ?? 0); ?></td>
            
                
            </td>
        </tr>
    
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing <?php echo e($leaves->firstItem()); ?> – <?php echo e($leaves->lastItem()); ?> leaves of
                    <?php echo e($leaves->total()); ?> leaves)
                </div>
                <div><?php echo $leaves->links(); ?></div>
            </div>
        </td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="8" class="text-center">No leaves Found</td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/member-info/member-leave/table.blade.php ENDPATH**/ ?>