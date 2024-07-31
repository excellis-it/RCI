<?php $__env->startSection('title'); ?>
   Member Alloted Leaves List
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Member Alloted Leaves Listing</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Alloted Leaves Listing</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->
        
        <div class="row">
            <div class="col-md-12 text-end mb-3">
                <a class="print_btn" href="<?php echo e(route('member-leaves.leave-list')); ?>">Add/Edit member leave</a>
            </div>
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-md-6">
                              <h4>Emplyoee Leave Chart</h4>
                            </div>
                            <?php $currentYear = date('Y') ?>
                            <div class="col-md-3 col-lg-2">
                              <select class="form-control" aria-label="Year" id="year_search">
                                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($year); ?>" <?php if($year == $currentYear): ?>
                                        selected
                                        
                                    <?php endif; ?>><?php echo e($year); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            </div>
                          </div> 
                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">
                                
                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody margin_hr" id="member_leave_table">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>
                                                <th>ID</th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="member_id"
                                                    style="cursor: pointer">Member Name </th>
                                                <th></th>
                                                <?php $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <th class="sorting" data-sorting_type="desc" data-column_name="leave_type"
                                                        style="cursor: pointer"><?php echo e(Str::upper($leaveType->leave_type_abbr)); ?></th>
                                                    
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <th>Total Approved Leave</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll" >
                                            <?php echo $__env->make('frontend.member-info.member-leave.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                    <input type="hidden" name="hidden_column_name" id="hidden_column_name"
                                        value="id" />
                                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="desc" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
   

<script>
    $(document).on('change', '#year_search', function() {
        var year = $('#year_search').val();
        $.ajax({
            url: "<?php echo e(route('member-leaves.year-search')); ?>",
            type: 'POST',
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                year: year
            },
            header:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')    
            },
            success: function(response) {
                
                $('tbody').html(response.data);
            },
            error: function(xhr) {
                console.log(xhr);
            }
        });
    });
</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/member-info/member-leave/list.blade.php ENDPATH**/ ?>