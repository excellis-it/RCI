
    <?php if($data): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($val->from_location); ?></td>
                    <td><?php echo e($val->to_location); ?></td>
                    <td><?php echo e(date('jS F, Y h:ia',strtotime($val->dep_datetime))); ?></td>
                    <td><?php echo e($val->distance); ?></td>
                    <td><?php echo e($val->con_mode); ?></td>
                    <td><?php echo e(date('jS F, Y h:ia',strtotime($val->arrival_datetime))); ?></td>
                    <td><?php echo e($val->amount); ?></td>
                    <td class="sepharate">
                       <a href="javascript:void(0);" id="delete" class="delete" data-route="<?php echo e(URL::to('/member-info/tada-advance/tada-journey-remove/'.$val->id.'/'.$tadaAdv->id)); ?>"><i class="ti ti-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php else: ?>
        <tr>
            <td colspan="7" class="text-center">No Data Found</td>
        </tr>
    <?php endif; ?>

<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/member-info/tada-advance/table-journey.blade.php ENDPATH**/ ?>