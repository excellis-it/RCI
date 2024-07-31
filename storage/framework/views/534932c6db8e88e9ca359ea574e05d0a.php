<?php $__env->startSection('title'); ?>
   TA/DA Journey Details
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<link rel="stylesheet" href="<?php echo e(asset('frontend_assets/css/jquery.datetimepicker.css')); ?>">
<?php $__env->startSection('content'); ?>

    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="container-fluid">
        <div class="breadcome-list">
            <div class="d-flex">
                <div class="arrow_left"><a href="" class="text-white"><i class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Detail Journey of <?php if(isset($member)): ?> <?php echo e($member->name); ?> <?php endif; ?> /<?php if(isset($tadaAdv)): ?> <?php echo e($tadaAdv->bill_no); ?> <?php endif; ?></h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><a href="<?php echo e(URL::to('/member-info/tada-advance')); ?>"><span class="bread-blod">TA/DA Advance</span></a></li>

                    </ul>


                </div>
            </div>
        </div>
        <!--  Row 1 -->

        <div class="row">
            <?php if($tadaAdv->status==1): ?>
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <?php if($data->count() > 0 ): ?>
                        <h4><a href="<?php echo e(URL::to('/member-info/tada-advance/report-journey/'.$tadaAdv->id)); ?>"><i class="ti ti-download"></i> Download Report</a></h4>
                        <?php endif; ?>
                        <div id="form">
                            <?php echo $__env->make('frontend.member-info.tada-advance.form-journey', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4">

                                <div class="table-responsive rounded-2">
                                    <table class="table customize-table mb-0 align-middle bg_tbody">
                                        <thead class="text-white fs-4 bg_blue">
                                            <tr>
                                                <th>ID</th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="percentage"
                                                    style="cursor: pointer">From <span id="percentage_icon"><i class="fa fa-arrow-down"></i></span>
                                                </th>
                                                <th class="sorting" data-sorting_type="desc" data-column_name="year"
                                                    style="cursor: pointer">To <span id="year_icon"><i class="fa fa-arrow-down"></i></span>
                                                </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    style="cursor: pointer">Dept. Timing
                                                </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    style="cursor: pointer">Distance in KM
                                                </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    style="cursor: pointer">Conveyance Mode
                                                </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    style="cursor: pointer">Arrival Date
                                                </th>
                                                <th class="sorting" data-sorting_type="desc"
                                                    style="cursor: pointer">Amount
                                                </th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody_height_scroll">
                                            <?php echo $__env->make('frontend.member-info.tada-advance.table-journey', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
          <?php else: ?>
            <h3 style="color:red"> Requisition is Pending</h3>
          <?php endif; ?>

        </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('frontend_assets/js/jquery.datetimepicker.full.js')); ?>"></script>

<script>
    jQuery(document).ready(function () {
        'use strict';
        jQuery('#arrival_datetime, #dep_datetime').datetimepicker();
    });
</script>
    <script>
        $(document).on('click', '#delete', function(e) {
            swal({
                    title: "Are you sure?",
                    text: "To delete this row!",
                    type: "warning",
                    confirmButtonText: "Yes",
                    showCancelButton: true
                })
                .then((result) => {
                    if (result.value) {
                        window.location = $(this).data('route');
                    } else if (result.dismiss === 'cancel') {
                        swal(
                            'Cancelled',
                            'Your stay here :)',
                            'error'
                        )
                    }
                })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#tada-create-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();


                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {

                        //windows load with toastr message
                        window.location.reload();
                    },
                    error: function(xhr) {

                        // Handle errors (e.g., display validation errors)
                        //clear any old errors
                        $('.text-danger').html('');
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            // Assuming you have a div with class "text-danger" next to each input
                            $('[name="' + key + '"]').next('.text-danger').html(value[
                                0]);
                        });
                    }
                });
            });
        });



    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp53\htdocs\RCI\resources\views/frontend/member-info/tada-advance/list-journey.blade.php ENDPATH**/ ?>