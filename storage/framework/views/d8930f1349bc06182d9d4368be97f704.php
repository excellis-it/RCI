<?php if(count($memberIncomeTaxes) > 0): ?>
    <?php $__currentLoopData = $memberIncomeTaxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $memberIncomeTax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e(($memberIncomeTaxes->currentPage()-1) * $memberIncomeTaxes->perPage() + $loop->index + 1); ?></td>
            <?php if($memberIncomeTax->member_id != null): ?>
                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($member->id == $memberIncomeTax->member_id): ?>
                        <td><?php echo e($member->name ?? 'N/A'); ?></td>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <td>N/A</td>
            <?php endif; ?>
            <td><?php echo e($memberIncomeTax->section ?? 'N/A'); ?></td>
            <td><?php echo e($memberIncomeTax->description ?? 'N/A'); ?></td>
            <td><?php echo e($memberIncomeTax->max_deduction ?? 'N/A'); ?></td>
            <td><?php echo e($memberIncomeTax->member_deduction ?? 'N/A'); ?></td>
            <td><?php echo e($memberIncomeTax->financial_year ?? 'N/A'); ?></td>
            <td class="sepharate"><a data-route="<?php echo e(route('member-income-taxes.edit', $memberIncomeTax->id)); ?>" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr class="toxic">
        <td colspan="8" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing <?php echo e($memberIncomeTaxes->firstItem()); ?> – <?php echo e($memberIncomeTaxes->lastItem()); ?> income Tax  exemption of
                    <?php echo e($memberIncomeTaxes->total()); ?> income Tax exemptions)
                </div>
                <div><?php echo $memberIncomeTaxes->links(); ?></div>
            </div>
        </td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="8" class="text-center">No income Tax exemption Found</td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/member-info/member-income-taxes/table.blade.php ENDPATH**/ ?>