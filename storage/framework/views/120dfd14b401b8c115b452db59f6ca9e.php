<?php $__env->startSection('title'); ?>
    Payslip Report Generate
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
                <div class="arrow_left"><a href="<?php echo e(route('members.index')); ?>" class="text-white"><i
                            class="ti ti-arrow-left"></i></a></div>
                <div class="">
                    <h3>Report Generate</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Payslip</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div id="form">
                            <form action="<?php echo e(route('reports.payslip-generate')); ?>" method="POST" >
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-12 mb-2">
                                                    <div class="row align-items-center">
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Employee Status</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="e_status" class="form-select" id="e_status">
                                                                    <option value="">Select Employee Status</option>
                                                                    <option value="active">Active</option>
                                                                    <option value="deputation">On Deputation</option>
                                                                </select>
                                                                <?php if($errors->has('e_status')): ?>
                                                                    <div class="error" style="color:red;">
                                                                        <?php echo e($errors->first('e_status')); ?></div>
                                                                <?php endif; ?>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="col-md-12">
                                                                <label>Members</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select name="member_id" class="form-select">
                                                                </select>
                                                                <?php if($errors->has('member_id')): ?>
                                                                    <div class="error" style="color:red;">
                                                                        <?php echo e($errors->first('member_id')); ?></div>
                                                                <?php endif; ?>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Year</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select name="year" class="form-select" id="report_year">
                                                                        <option value="">Select Year</option>
                                                                        <?php for($i = date('Y'); $i >= 1950; $i--): ?>
                                                                            <option value="<?php echo e($i); ?>">
                                                                                <?php echo e($i); ?></option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                    <?php if($errors->has('year')): ?>
                                                                        <div class="error" style="color:red;">
                                                                            <?php echo e($errors->first('year')); ?></div>
                                                                    <?php endif; ?>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-3 mb-2">
                                                            <div class="row align-items-center">
                                                                <div class="col-md-12">
                                                                    <label>Month</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <select name="month" class="form-select" id="report_month">
                                                                        <option value="">Select Month</option>
                                                                    </select>
                                                                    <?php if($errors->has('month')): ?>
                                                                        <div class="error" style="color:red;">
                                                                            <?php echo e($errors->first('month')); ?></div>
                                                                    <?php endif; ?>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row justify-content-end">
                                            <div class="col-md-3">
                                                <div class="row justify-content-end">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_add">Generate</button>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    
    <script>
        $(document).ready(function() {
            $('#report_year').change(function() {
                var year = $(this).val();
                var currentDate = new Date();
                var monthDropdown = $('#report_month');

                if(year == currentDate.getFullYear()) {
                    var currentMonth = currentDate.getMonth() + 1;
                    var endMonth = (year == currentDate.getFullYear()) ? currentMonth : 12;

                    monthDropdown.empty();
                    for (var month = 1; month <= endMonth; month++) {
                        var option = $('<option></option>');
                        option.val(month);
                        option.text(new Date(year, month - 1).toLocaleString('default', { month: 'long' }));
                        monthDropdown.append(option);
                    }

                } else {
                    monthDropdown.empty();
                    for (var month = 1; month <= 12; month++) {
                        var option = $('<option></option>');
                        option.val(month);
                        option.text(new Date(year, month - 1).toLocaleString('default', { month: 'long' }));
                        monthDropdown.append(option);
                    }
                }
                
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#e_status').change(function() {
                var e_status = $(this).val();

                $.ajax({
                    url: "<?php echo e(route('reports.get-all-members')); ?>",
                    type: 'POST',
                    data: { e_status, _token: '<?php echo e(csrf_token()); ?>' },
                    success: ({members}) => {
                        const memberDropdown = $('[name="member_id"]').empty().append('<option value="">Select Member</option>');
                        members.forEach(({id, name, emp_id}) => memberDropdown.append(`<option value="${id}">${name} (${emp_id})</option>`));
                    },
                    error: (xhr) => console.log(xhr)
                });
            });
        });
    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/reports/payslip.blade.php ENDPATH**/ ?>