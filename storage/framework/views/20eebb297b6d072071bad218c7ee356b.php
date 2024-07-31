<?php if(isset($member_expectations) && count($member_expectations) > 0): ?>
    <?php $__currentLoopData = $member_expectations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member_expectation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="edit-route-expectation" data-id='<?php echo e($member_expectation->id); ?>' data-route="<?php echo e(route('members.expectation.edit', $member_expectation->id)); ?>">
            <td><?php echo e($member_expectation->rule_name ?? 'N/A'); ?></td>
            <td><?php echo e($member_expectation->percent ?? 'N/A'); ?></td>
            <td><?php echo e($member_expectation->amount ?? 'N/A'); ?></td>
            <td><?php echo Str::limit($member_expectation->remark ?? 'N/A', 50, ' ...'); ?></td> 
            
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
<?php else: ?>
    <tr id="no-expectation">
        <td colspan="4" class="text-center">No Expectation Info Found</td>
    </tr>    

<?php endif; ?>
<?php /**PATH C:\xampp52\htdocs\RCI\resources\views/frontend/members/expectation/table.blade.php ENDPATH**/ ?>