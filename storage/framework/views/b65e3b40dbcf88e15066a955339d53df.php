<?php if(count($members) > 0): ?>
    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($member->name ?? 'N/A'); ?></td>
            <td><?php echo e($member->emp_id ?? 'N/A'); ?></td>
            <td><?php echo e($member->gender ?? 'N/A'); ?></td>
            <td><?php echo e($member->pers_no ?? 'N/A'); ?></td>
            <td><?php echo e($member->designation->designation_type ?? 'N/A'); ?></td>
            <td class="sepharate"><a  href="<?php echo e(route('members.edit', $member->id)); ?>" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr class="toxic">
        <td colspan="6" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing <?php echo e($members->firstItem()); ?> – <?php echo e($members->lastItem()); ?> Members of
                    <?php echo e($members->total()); ?> Members)
                </div>
                <div><?php echo $members->links(); ?></div>
            </div>
        </td>
    </tr>

<?php else: ?>
    <tr>
        <td colspan="6" class="text-center">No Members Found</td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\xampp52\htdocs\RCI\resources\views/frontend/members/table.blade.php ENDPATH**/ ?>