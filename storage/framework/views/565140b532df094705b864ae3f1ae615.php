<?php
use App\Helpers\Helper;
?>


<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <?php if(!isset(Helper::logo()->logo)): ?>
            <a href="#" class="text-nowrap logo-img">
                <img src="<?php echo e(asset('frontend_assets/images/logo.png')); ?>" class="dark-logo" alt="">
            </a>
            <?php else: ?>
                <a href="#" class="text-nowrap logo-img">
                    <img src="<?php echo e(Storage::url(Helper::logo()->logo)); ?>" class="dark-logo" alt="">
                </a>
            <?php endif; ?>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <!-- Sidebar Menu-->
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                        </a>
                    </li> 
                    
                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo e(Request::is('imprest/cda-receipts*') ? 'active' : ''); ?>"  href="<?php echo e(route('cda-receipts.index')); ?>" >
                            <span>
                                <i class="ti ti-brand-cashapp"></i>
                            </span>
                            <span class="hide-menu">CDA Receipt</span>
                        </a>
                        
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo e(Request::is('imprest/cda-bills*') ? 'active' : ''); ?>"  href="<?php echo e(route('cda-bills.index')); ?>" >
                            <span>
                                <i class="ti ti-brand-cashapp"></i>
                            </span>
                            <span class="hide-menu">CDA Bill</span>
                        </a>
                        
                    </li>


                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo e(Request::is('imprest/cash-withdrawals*') ? 'active' : ''); ?>"  href="<?php echo e(route('cash-withdrawals.index')); ?>" >
                            <span>
                                <i class="ti ti-brand-cashapp"></i>
                            </span>
                            <span class="hide-menu">Cash Withdrawal</span>
                        </a>
                        
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo e(Request::is('imprest/advance-settlement*') ? 'active' : ''); ?>"  href="<?php echo e(route('advance-settlement.index')); ?>" >
                            <span>
                                <i class="ti ti-brand-cashapp"></i>
                            </span>
                            <span class="hide-menu">Advance Settlement</span>
                        </a>
                        
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link <?php echo e(Request::is('imprest/advance-funds*') ? 'active' : ''); ?>"  href="<?php echo e(route('advance-funds.index')); ?>" >
                            <span>
                                <i class="ti ti-brand-cashapp"></i>
                            </span>
                            <span class="hide-menu">Advance Fund</span>
                        </a>
                        
                    </li>
                    
                    
                    
                    
    
                </ul>
            
        </nav>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/imprest/includes/sidebar.blade.php ENDPATH**/ ?>