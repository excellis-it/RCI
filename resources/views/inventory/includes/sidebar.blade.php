<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img">
                <img src="{{ asset('frontend_assets/images/logo.png') }}" class="dark-logo" alt="">
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
               
            <ul id="sidebarnav">
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <!-- <li class="sidebar-item">
                    <a class="sidebar-link" href="index.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-aperture"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                    </a>
                </li> -->
                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('inventory/items*') ? 'active' : ''}}" href="{{route('items.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Item Codes</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('inventory/credit-vouchers*') ? 'active' : ''}}" href="{{route('credit-vouchers.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Credit Vouchers</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link {{Request::is('inventory/debit-vouchers*') ? 'active' : ''}}" href="{{route('debit-vouchers.index')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Debit Vouchers</span>
                    </a>
                </li>
            </ul>

            
            
        </nav>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
