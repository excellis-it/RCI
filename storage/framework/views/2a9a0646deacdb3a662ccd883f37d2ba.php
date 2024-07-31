
    <?php if($data): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php
                $cat = DB::table('categories')->where('id',$val->category_id)->get()->first();
            ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($cat->category); ?></td>
                    <td><?php echo e($val->title); ?></td>
                    <td><?php echo e($val->purpose); ?></td>
                    <td><?php if($val->currency==1): ?> &#8377;<?php else: ?> &#36;<?php endif; ?><?php echo e($val->amount); ?>/- <?php if($val->currency==1): ?> INR <?php else: ?> USD <?php endif; ?>  <strong><?php echo e($val->payment_type); ?></strong></td>
                    <td>
                        <?php if($val->status==1): ?>
                        <span class="active_ss">Active</span>
                        <?php else: ?>
                        <span class="inactive_ss">Inactive</span>
                        <?php endif; ?>
                    </td>
                    <td class="sepharate"><a data-route="<?php echo e(route('tada.edit', $val->id)); ?>" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                        <a href="javascript:void(0);" id="delete" class="delete" data-route="<?php echo e(route('tada.delete', $val->id)); ?>"><i class="ti ti-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <tr class="toxic">
            <td colspan="7" class="text-left">
                <div class="d-flex justify-content-between">
                    <div class="">
                        (Showing <?php echo e($data->firstItem()); ?> – <?php echo e($data->lastItem()); ?> TA/DA of
                        <?php echo e($data->total()); ?> TA/DA)
                    </div>
                    <div><?php echo $data->links(); ?></div>
                </div>
            </td>
        </tr>
    <?php else: ?>
        <tr>
            <td colspan="7" class="text-center">No Data Found</td>
        </tr>
    <?php endif; ?>

<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/tada/tada-table.blade.php ENDPATH**/ ?>