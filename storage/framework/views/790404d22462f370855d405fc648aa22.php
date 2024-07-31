<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                    href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav quick-links d-none d-lg-flex">
            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)"
                    data-bs-toggle="dropdown">Administration<span class="mt-1"><i
                            class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('rules.index')); ?>">Rule Updation</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Exception</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Backup</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">CD Backup</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Installment Update</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('sections.index')); ?>">Section</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('designation-types.index')); ?>">Designation Type</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('categories.index')); ?>">Category Update</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('payscale-types.index')); ?>">PayScale Type</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('payscales.index')); ?>">PayScale Update</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('payband-types.index')); ?>">PayBand Type</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('paybands.index')); ?>">PayBand Update</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('designations.index')); ?>">Desig Update</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Pers Update</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('users.index')); ?>">New User</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('password')); ?>">Password Change</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Permission</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Updations<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Individual</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Negative Payment</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Attendence</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">QtrInfo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Computations<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Group Updation</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Pay Computation</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Floppy<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Bank</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">Bank Loan</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">LIC</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">ITAV</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">CDA Loan</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="">CDA</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link" href="">PayCertificate</a>
            </li>

            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Reports<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('reports.payslip')); ?>" target="_blank">Payslip</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('reports.annual-income-tax-report')); ?>" >Annual Income Tax</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                href="<?php echo e(route('reports.paybill')); ?>" target="_blank">Paybill</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                href="<?php echo e(route('reports.payroll')); ?>" target="_blank">Payroll</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                href="<?php echo e(route('reports.salary-certificate')); ?>" target="_blank">Salary Certificate</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                href="<?php echo e(route('reports.bonus-schedule')); ?>" target="_blank">Bonus & Dress Allowance</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                href="<?php echo e(route('reports.last-pay-certificate')); ?>" target="_blank">Last Pay Certificate</a>
                            </li>
                            
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('reports.pl-withdrawl')); ?>" target="_blank">PL Withdrawl</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>


            

            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Member Management<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('pay-commissions.index')); ?>">Pay Commisions</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('pm-levels.index')); ?>">PM Level</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('pm-index.index')); ?>">PM Index</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('divisions.index')); ?>">Divisions</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('groups.index')); ?>">Groups</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('cadres.index')); ?>">Cadres</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('fund-types.index')); ?>">Fund Types</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('quarters.index')); ?>">Quarters charge</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('ex-services.index')); ?>">Ex-Services</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('pgs.index')); ?>">Pgs</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('cgegis.index')); ?>">CGEGIS</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('cghs.index')); ?>">CGHS</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('banks.index')); ?>">Bank</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('policy.index')); ?>">Policy</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('loans.index')); ?>">Loans</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('dearness-allowance-percentages.index')); ?>">DA Percentages</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('hras.index')); ?>">HRA </a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('reset-employee-ids.index')); ?>">Reset Employee-Id</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('cities.index')); ?>">City</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('tptas.index')); ?>">TPT</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('grade-pays.index')); ?>">Grade Pay</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('income-taxes.index')); ?>">Income Tax</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('gpfs.index')); ?>">GPF</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('pension-rate.index')); ?>">Pension Rates</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('tada.index')); ?>">TA/DA Categorial Allowance</a>
                            </li>


                        </ul>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Member Info<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('member-income-taxes.index')); ?>">Member IT Exemption</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('leave-type.index')); ?>">Leave Type</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('member-alloted-leave.index')); ?>">Member Alloted Leave</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('member-leaves.index')); ?>">Member Leave</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('penal-interest.index')); ?>">Penal Interest</a>
                            </li>

                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('member-gpf.index')); ?>">GPF Management</a>
                            </li>
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('tada-advance.index')); ?>">TA/DA Advance</a>
                            </li>
                           <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="<?php echo e(route('tada-plus.index')); ?>">TA/DA Plus Claim</a>
                            </li>

                            

                        </ul>
                    </div>
                </div>
            </li>

            

            

        </ul>

        <div class="d-block d-lg-none">
            <img src="<?php echo e(asset('frontend_assets/images/logo.png')); ?>" class="dark-logo" width="" alt="">
        </div>

        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
            
            <li class="nav-item">
                <a class="fw-semibold bg-hover-primary text-decoration-none text-deger ps-3 d-none d-md-block"
                    href="<?php echo e(route('logout')); ?>">
                    <i class="ti ti-logout fs-4"></i> Logout
                </a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="user-profile-img">
                            <?php if(Auth::user()->profile_picture): ?>
                                <img src="<?php echo e(Storage::url(Auth::user()->profile_picture)); ?>" alt="user"
                                    class="rounded-circle" width="35" height="35" alt="">
                            <?php else: ?>
                                <img src="<?php echo e(asset('frontend_assets/images/user-1.jpg')); ?>" class="rounded-circle"
                                    width="35" height="35" alt="">
                            <?php endif; ?>

                        </div>
                    </div>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop1">
                    <div class="profile-dropdown position-relative" data-simplebar="">
                        <div class="py-3 px-7 pb-0">
                            <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                        </div>
                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                            <?php if(Auth::user()->profile_picture): ?>
                                <img src="<?php echo e(Storage::url(Auth::user()->profile_picture)); ?>" alt="user"
                                    class="rounded-circle" width="80" height="80">
                            <?php else: ?>
                                <img src="<?php echo e(asset('frontend_assets/images/user-1.jpg')); ?>" class="rounded-circle"
                                    width="80" height="80" alt="">
                            <?php endif; ?>
                            <div class="ms-3">
                                <h5 class="mb-1 fs-3"><?php echo e(Auth::user()->full_name); ?></h5>
                                <span class="mb-1 d-block text-dark">User</span>
                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                    <i class="ti ti-mail fs-4"></i> <?php echo e(Auth::user()->email); ?>

                                </p>
                            </div>
                        </div>
                        <div class="message-body">
                            <a href="<?php echo e(route('profile')); ?>" class="py-8 px-7 mt-8 d-flex align-items-center">
                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                    <img src="<?php echo e(asset('frontend_assets/images/icon-account.svg')); ?>" alt=""
                                        width="24" height="24">
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                    <span class="d-block text-dark">Account Settings</span>
                                </div>
                            </a>
                        </div>
                        <div class="message-body">
                            <a href="<?php echo e(route('password')); ?>" class="py-8 px-7 mt-8 d-flex align-items-center">
                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                    <img src="<?php echo e(asset('frontend_assets/images/icon-inbox.svg')); ?>" alt=""
                                        width="24" height="24">
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> Change Password </h6>
                                    
                                </div>
                            </a>
                        </div>
                        <div class="message-body">
                            <a href="<?php echo e(route('logo.dashboard')); ?>" class="py-8 px-7 mt-8 d-flex align-items-center">
                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                    <img src="<?php echo e(asset('frontend_assets/images/icon-inbox.svg')); ?>" alt=""
                                    width="24" height="24">
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> Change Logo </h6>
                                    
                                </div>
                            </a>
                        </div>
                        <div class="d-grid py-4 px-7 pt-8">
                            <a href="<?php echo e(route('logout')); ?>" class="btn btn-outline-primary">Log Out</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </nav>
</header>
<?php /**PATH C:\xampp53\htdocs\RCI\resources\views/frontend/includes/header.blade.php ENDPATH**/ ?>