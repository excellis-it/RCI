<?php if(isset($members_loans_info) && count($members_loans_info) > 0): ?>
    <?php $__currentLoopData = $members_loans_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="edit-route-loan" data-id="<?php echo e($loan_info->id); ?>" data-route="<?php echo e(route('members.loan.edit', $loan_info->id)); ?>">
            <td><?php echo e($loan_info->loan_name ?? 'N/A'); ?></td>
            <td><?php echo e($loan_info->inst_rate ?? 'N/A'); ?></td>
            <td><?php echo e($loan_info->total_amount ?? 'N/A'); ?></td>
            <td><?php echo e(date('d-m-Y', strtotime($loan_info->start_date)) ?? 'N/A'); ?></td>
            <td><?php echo e($loan_info->remark ?? 'N/A'); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
<?php /**PATH C:\xampp52\htdocs\RCI\resources\views/frontend/members/loan/table.blade.php ENDPATH**/ ?>