<?php if(count($member_gpfs) > 0): ?>
    <?php $__currentLoopData = $member_gpfs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $member_gpf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(($member_gpfs->currentPage()-1) * $member_gpfs->perPage() + $loop->index + 1); ?></td>
            <td><?php echo e($member_gpf->member->name ?? 'N/A'); ?></td>
            <td><?php echo e($member_gpf->month ?? 'N/A'); ?>,<?php echo e($member_gpf->year ?? 'N/A'); ?></td>
            <td><?php echo e($member_gpf->monthly_subscription ?? 'N/A'); ?></td>
            <td><?php echo e($member_gpf->openning_balance ?? 'N/A'); ?></td>
            <td><?php echo e($member_gpf->closing_balance ?? 'N/A'); ?></td>
            <td class="sepharate">
                <a data-route="<?php echo e(route('member-gpf.edit', $member_gpf->id)); ?>" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
            </td>
        </tr>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr class="toxic">
        <td colspan="7" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing <?php echo e($member_gpfs->firstItem()); ?> – <?php echo e($member_gpfs->lastItem()); ?> attendances of
                    <?php echo e($member_gpfs->total()); ?> attendances)
                </div>
                <div><?php echo $member_gpfs->links(); ?></div>
            </div>
        </td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="7" class="text-center">No attendances Found</td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/member-info/gpf/table.blade.php ENDPATH**/ ?>