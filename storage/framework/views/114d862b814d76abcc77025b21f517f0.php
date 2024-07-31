

<?php if(count($cdaReceipts) > 0): ?>
    <?php $__currentLoopData = $cdaReceipts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cdaReceipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            
            <td><?php echo e($cdaReceipt->voucher_no); ?></td>
            <td><?php echo e(date('d M, Y', strtotime($cdaReceipt->voucher_date))); ?></td>
            <td><?php echo e(date('d M, Y', strtotime($cdaReceipt->dv_date))); ?></td>
            <td><?php echo e($cdaReceipt->amount); ?></td>
            
            <td class="sepharate"><a data-route="<?php echo e(route('cda-receipts.edit', $cdaReceipt->id)); ?>" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr class="toxic">
        <td colspan="5" class="text-left">
            <div class="d-flex justify-content-between">
                <div class="">
                     (Showing <?php echo e($cdaReceipts->firstItem()); ?> – <?php echo e($cdaReceipts->lastItem()); ?> CDA Receipts of
                    <?php echo e($cdaReceipts->total()); ?> CDA Receipts)
                </div>
                <div><?php echo $cdaReceipts->links(); ?></div>
            </div>
        </td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="5" class="text-center">No CDA Receipt Found</td>
    </tr>
<?php endif; ?><?php /**PATH C:\xampp82\htdocs\RCI\resources\views/imprest/cda-receipts/table.blade.php ENDPATH**/ ?>