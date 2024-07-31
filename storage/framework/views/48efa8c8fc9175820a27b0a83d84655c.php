<?php $__env->startSection('title'); ?>
    Dashboard
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
                    <h3>Dashboard</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Dashboard</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--  Row 1 -->


    <div class="">
       
            <div class="card-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('cash-payments.index')); ?>">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Public Fund</h5> 
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo e(route('cda-receipts.index')); ?>">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Imprest</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Income tax</h5> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more cards as needed -->
        </div>
   
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/dashboard.blade.php ENDPATH**/ ?>