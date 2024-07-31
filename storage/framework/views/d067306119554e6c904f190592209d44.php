<?php if(isset($member_policies) && count($member_policies) > 0): ?>
    <?php $__currentLoopData = $member_policies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member_policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="edit-route-policy" data-id="<?php echo e($member_policy->id); ?>" data-route="<?php echo e(route('members.policy-info.edit', $member_policy->id)); ?>">
            <td><?php echo e($member_policy->policy_name ?? 'N/A'); ?></td>
            <td><?php echo e($member_policy->policy_no ?? 'N/A'); ?></td>
            <td><?php echo e($member_policy->amount ?? 'N/A'); ?></td>
            <td><?php echo e($member_policy->rec_stop ?? 'N/A'); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <tr id="no-policy">
        <td colspan="4" class="text-center">No Policy Info Found</td>
    </tr>

<?php endif; ?>
<?php /**PATH C:\xampp52\htdocs\RCI\resources\views/frontend/members/policy-info/table.blade.php ENDPATH**/ ?>