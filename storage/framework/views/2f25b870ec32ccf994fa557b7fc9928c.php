
    <?php if($data): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php
                $memberDt = DB::table('members')->where('id',$val->member_id)->get()->first();
                $projectDt = DB::table('projects')->where('id',$val->project_id)->get()->first();
            ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php if(isset($memberDt)): ?> <a href="<?php echo e(URL::to('/member-info/tada-advance/tada-priority-table/'.$val->id)); ?>"><?php echo e($memberDt->name); ?> </a><?php endif; ?></td>
                    <td><?php if(isset($memberDt)): ?> <a href="<?php echo e(URL::to('/member-info/tada-advance/tada-priority-table/'.$val->id)); ?>"><?php echo e($projectDt->name); ?></a> <?php endif; ?></td>
                    <td><?php echo e($val->bill_no); ?></td>
                    <td><?php if($val->bill_date): ?> <?php echo e(date('jS F, Y',strtotime($val->bill_date))); ?> <?php endif; ?></td>
                    <td><?php echo e($val->amount_requested); ?></td>
                    <td><?php echo e($val->amount_allowed); ?></td>
                    <td><?php echo e($val->amount_disallowed); ?></td>
                    <td>
                        <?php if($val->status==1): ?>
                        <span class="active_ss">Accepted</span>
                        <?php else: ?>
                        <span class="inactive_ss">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td class="sepharate">
                        <a data-route="<?php echo e(route('tada-advance.edit', $val->id)); ?>" href="javascript:void(0);" class="edit_pencil edit-route"><i class="ti ti-pencil"></i></a>
                        &nbsp;<a href="<?php echo e(URL::to('/member-info/tada-advance/report/'.$val->id)); ?>"  class="edit_pencil"><i class="ti ti-download"></i></a>

                        <a href="javascript:void(0);" id="delete" class="delete" data-route="<?php echo e(route('tada-advance.delete', $val->id)); ?>"><i class="ti ti-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <tr class="toxic">
            <td colspan="10" class="text-left">
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
            <td colspan="10" class="text-center">No Data Found</td>
        </tr>
    <?php endif; ?>

<?php /**PATH C:\xampp53\htdocs\RCI\resources\views/frontend/member-info/tada-advance/table.blade.php ENDPATH**/ ?>