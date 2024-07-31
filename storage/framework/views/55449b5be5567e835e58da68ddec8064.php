
    <?php if($dataPriority): ?>
            <?php $__currentLoopData = $dataPriority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($val->from_location); ?></td>
                    <td><?php echo e($val->to_location); ?></td>
                    <td><?php echo e($val->food_day); ?>DAY@ &#8377;<?php echo e($val->food_amount); ?></td>
                    <td><?php echo e($val->hotel_day); ?>DAY@ &#8377;<?php echo e($val->hotel_amount); ?></td>
                    <td>&#8377;<?php echo e($val->total_da); ?></td>
                    <td class="sepharate">
                       <a href="javascript:void(0);" id="delete" class="delete" data-route="<?php echo e(URL::to('/member-info/tada-advance/tada-priority-remove/'.$val->id.'/'.$tadaAdv->id)); ?>"><i class="ti ti-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php else: ?>
        <tr>
            <td colspan="7" class="text-center">No Data Found</td>
        </tr>
    <?php endif; ?>

<?php /**PATH C:\xampp52\htdocs\RCI\resources\views/frontend/member-info/tada-advance/table-priority.blade.php ENDPATH**/ ?>