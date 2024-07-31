<?php $__env->startSection('title'); ?>
    Members List
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
                    <h3>Member Create</h3>
                    <ul class="breadcome-menu mb-0">
                        <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                        <li><span class="bread-blod">Member Create</span></li>
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

                            <form action="<?php echo e(route('members.store')); ?>" method="POST" id="member-create-form">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Pers No</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="pers_no"
                                                                    id="pers_no" value="<?php echo e(old('pers_no') ?? ''); ?>"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Gender</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="gender" id="gender">
                                                                    <option value="">Select</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Name</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="name"
                                                                    id="name" value="<?php echo e(old('name') ?? ''); ?>"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
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
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PM Level</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="pm_level" id="pm_level">
                                                                    <option value="">Select</option>
                                                                    <?php $__currentLoopData = $pmLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pm_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($pm_level->id); ?>">
                                                                            <?php echo e($pm_level->value); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PM Index</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="pm_index" id="pm_index">
                                                                    <option value="">Select</option>
                                                                    <?php $__currentLoopData = $pmIndexes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pmIndex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($pmIndex->id); ?>">
                                                                            <?php echo e($pmIndex->value); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Basic</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="basic"
                                                                    id="basic" 
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="row">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Desig</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="desig"
                                                                    id="desig">
                                                                    <option value="">Select</option>
                                                                    <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($designation->id); ?>">
                                                                            <?php echo e($designation->full_name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="row">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Section</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="section"
                                                                    id="section" readonly>
                                                                <span class="text-danger"></span>
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
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Division</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="division"
                                                                    id="division">
                                                                    <option value="">Select</option>
                                                                    <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($division->id); ?>">
                                                                            <?php echo e($division->value); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Group</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="group"
                                                                    id="group">
                                                                    <option value="">Select</option>
                                                                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($group->id); ?>">
                                                                            <?php echo e($group->value); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Cadre</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="cadre"
                                                                    id="cadre">
                                                                    <option value="">Select</option>
                                                                    <?php $__currentLoopData = $cadres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cadre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($cadre->id); ?>">
                                                                            <?php echo e($cadre->value); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Category</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                
                                                                <input type="text" class="form-control" 
                                                                    id="category_value" readonly>
                                                                <input type="hidden" class="form-control" name="category" id="category">
                                                                <span class="text-danger"></span>
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
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Status</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="status"
                                                                    id="status">
                                                                    <option value="">Select</option>
                                                                    <option value="Yes">YES</option>
                                                                    <option value="No">NO</option>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>OLD BP</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="old_bp"
                                                                    id="old_bp" value="<?php echo e(old('old_bp') ?? ''); ?>"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>G.Pay</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" 
                                                                    id="g_pay_val" name="g_pay_val" value="<?php echo e(old('g_pay_val') ?? ''); ?>"
                                                                    placeholder="" readonly>
                                                                <input type="hidden" class="form-control" name="g_pay_id"
                                                                    id="g_pay_id" 
                                                                    placeholder="">    
                                                                
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PayBand</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input class="form-control" 
                                                                    id="pay_band_value" readonly>

                                                                <input type="hidden" class="form-control" name="pay_band"
                                                                    id="pay_band">    
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Fund Type</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="fund_type"
                                                                    id="fund_type">
                                                                    <option value="">Select</option>
                                                                    <?php $__currentLoopData = $fundTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fundType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($fundType->id); ?>">
                                                                            <?php echo e($fundType->value); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
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
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOB</label>
                                                            </div>
                                                            <?php
                                                                $maxDate = date('Y-m-d', strtotime('-18 years'));
                                                            ?>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control" name="dob"
                                                                    id="dob" value="<?php echo e(old('dob') ?? ''); ?>"
                                                                    placeholder="" max="<?php echo e($maxDate); ?>">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOJ Lab</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control" name="doj_lab"
                                                                    id="doj_lab" value="<?php echo e(old('doj_lab') ?? ''); ?>"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOJ Service1</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control"
                                                                    name="doj_service1" id="doj_service1"
                                                                    value="<?php echo e(old('doj_service1') ?? ''); ?>"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOP</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control" name="dop"
                                                                    id="dop" value="<?php echo e(old('dop') ?? ''); ?>"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Next Incr</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control"
                                                                    name="next_inr" id="next_inr"
                                                                    value="<?php echo e(old('next_inr') ?? ''); ?>" placeholder="">
                                                                <span class="text-danger"></span>
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
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Quater</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input class="form-control" name="quater_type"
                                                                    id="quater_type" readonly>
                                                                    
                                                                <span class="text-danger"></span>
                                                                <input type="hidden" name="quater" id="quater">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Quarter No</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    name="quater_no" id="quater_no"
                                                                    value="<?php echo e(old('quater_no') ?? ''); ?>" placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>DOJ Service2</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control"
                                                                    name="doj_service2" id="doj_service2"
                                                                    value="<?php echo e(old('doj_service2') ?? ''); ?>"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Adhar Number</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="adhar_number"
                                                                    id="adhar_number" >
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Gpf Number</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="gpf_number"
                                                                    id="gpf_number" >
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Appointment date</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="date" class="form-control"
                                                                    id="app_date" name="app_date">
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-12 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>CGEIS</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control" name="cgeis"
                                                                    id="cgeis" value="<?php echo e(old('cgeis') ?? ''); ?>"
                                                                    placeholder="">
                                                                <span class="text-danger"></span>
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
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Ex-Service</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="ex_service"
                                                                    id="ex_service">
                                                                    <option value="">Select</option>
                                                                    <?php $__currentLoopData = $exServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($exService->id); ?>">
                                                                            <?php echo e($exService->value); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>PG</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <select class="form-select" name="pg"
                                                                    id="pg">
                                                                    <option value="">Select</option>
                                                                    <?php $__currentLoopData = $pgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($pg->id); ?>">
                                                                            <?php echo e($pg->value); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4 mb-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>CGEGIS</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="text" class="form-control"
                                                                    id="cgegis_value" readonly>
                                                                <input type="hidden" class="form-control" name="cgegis"
                                                                    id="cgegis" >
                                                                <span class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <label>Paystop</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-inline">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="pay_stop" id="inlineRadio1"
                                                                            value="none">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio1">None</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="pay_stop" id="inlineRadio2"
                                                                            value="full-pay">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio2">Full Pay</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline ml-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="pay_stop" id="inlineRadio3"
                                                                            value="table-rec">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadio3">Table Rec</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                              

                                <div class="row mt-3">
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label for="PIS">City</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select name="member_city"  class="form-select" id="member_city">
                                                    <option value="">Select</option>
                                                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label for="PIS">Rent Payable</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select name="rent_or_not"  class="form-select" id="rent_or_not">
                                                    <option value="">Select</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label for="PIS">PRAN No.</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="pran_number"
                                                    id="pran_number" value="<?php echo e(old('pran_number') ?? ''); ?>"
                                                    placeholder="">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 mb-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <label for="PIS">Employment Status</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select class="form-select" name="e_status" id="e_status">
                                                    <option value="">Select</option>
                                                    <option value="active">Active</option>
                                                    <option value="deputation">On Deputation</option>
                                                    <option value="retired">Retired</option>
                                                    <option value="suspended">Suspended</option>
                                                    <option value="transferred">Transferred</option> 
                                                </select>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-3 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PIS">PIS</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="pis"
                                                            id="pis" value="<?php echo e(old('pis') ?? ''); ?>"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-9 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PM_Index">Address</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="pis_address"
                                                            id="pis_address" value="<?php echo e(old('pis_address') ?? ''); ?>"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-3 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PIS">SOS</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="sos"
                                                            id="sos" value="<?php echo e(old('sos') ?? ''); ?>"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-9 mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <label for="PM_Index">Address</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="sos_address"
                                                            id="sos_address" value="<?php echo e(old('sos_address') ?? ''); ?>"
                                                            placeholder="">
                                                        <span class="text-danger"></span>
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
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_add">Save</button>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-2">
                                                        <button type="submit" class="listing_exit">Cancel</button>
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
            var lastId = localStorage.getItem('lastId');
            if (lastId === null) {
                lastId = 1;
            } else {
                lastId = parseInt(lastId) + 1;
            }

            var randomId = 'RCI_CHESS' + String(lastId).padStart(4, '0');
            localStorage.setItem('lastId', lastId);
            document.getElementById('emp_id').value = randomId;
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#member-create-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();


                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {

                        //windows load with toastr message
                        // window.location.reload();
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

    
    <script>
        //grade pay found
        $(document).ready(function() {
            $('#pm_level').change(function() {
                var pm_level = $(this).val();
                
                $.ajax({
                    url: "<?php echo e(route('members.grade-pay')); ?>",
                    type: 'POST',
                    data: {
                        pm_level: pm_level
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#g_pay').val(response.grade_pay.id);
                        $('#g_pay_val').val(response.grade_pay.amount);
                        
                        $('#quater').val(response.quarter.id);
                        $('#quater_type').val(response.quarter.qrt_type);

                        $('#basic').val(response.basic_pay.basic);
                        
                    }
                });
            });
        });
    </script>

    <script>
        //cgegis found
        $(document).ready(function() {
            $('#group').change(function() {
                var group = $(this).val();
                
                $.ajax({
                    url: "<?php echo e(route('members.get-cgegis-value')); ?>",
                    type: 'POST',
                    data: {
                        group: group
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#cgegis_value').val(response.cgegis_value.value);
                        $('#cgegis').val(response.cgegis_value.id);
                        
                    }
                });
            });

            $('#desig').change(function() {
                var desig = $(this).val();
                
                $.ajax({
                    url: "<?php echo e(route('members.get-category-value')); ?>",
                    type: 'POST',
                    data: {
                        desig: desig
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#category_value').val(response.category_value.category);
                        $('#category').val(response.category_value.id);
                        $('#section').val(response.section.section.name);

                        $('#pay_band_value').val(response.payband_type.payband_type);
                        $('#pay_band').val(response.payband_type.id)
                    }
                });
            });
        });

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/members/form.blade.php ENDPATH**/ ?>