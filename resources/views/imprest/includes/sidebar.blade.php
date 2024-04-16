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
            <!-- Sidebar Menu-->
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span>
                                <i class="ti ti-brand-cashapp"></i>
                            </span>
                            <span class="hide-menu">CDA Receipt</span>
                        </a>
                        <ul class="collapse {{ Request::is('imprest/cda-receipts*') || Request::is('imprest/cda-receipts') ? 'show' : '' }}" id="collapseExample">
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('imprest/cda-receipts*') ? 'active' : '' }}" href="{{ route('cda-receipts.index') }}"  aria-expanded="false">
                                    <span>
                                        <i class="ti ti-cash-banknote"></i>
                                    </span>
                                    <span class="hide-menu">List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    
                    
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link " aria-expanded="false">
                            <span>
                                <i class="ti ti-brand-cashapp"></i>
                            </span>
                            <span class="hide-menu">Add Cash Payment</span>
                        </a>
                    </li>
    
                    <li class="sidebar-item">
                        <a class="sidebar-link {{Request::is('cheque-payments*') ? 'active' : ''}}" href="{{route('cheque-payments.index')}}" aria-expanded="false">
                            <span>
                                <i class="ti fa-money-bill-alt"></i> 
                            </span>
                            <span class="hide-menu">Add Cheque Payment</span>
                        </a>
                    </li> --}}
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link has-arrow {{ Request::is('cheque-payments*') ? 'active' : '' }}" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                            <span>
                                <i class="ti fa-money-bill-alt"></i>
                            </span>
                            <span class="hide-menu">Cheque</span>
                        </a>
                        <ul class="collapse {{ Request::is('cheque-payments*') ? 'show' : '' }}" id="collapseExample1">
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('cheque-payments*') ? 'active' : '' }}" href="{{ route('cheque-payments.index') }}"  aria-expanded="false">
                                    <span>
                                        <i class="ti fa-money-bill-alt"></i>
                                    </span>
                                    <span class="hide-menu">List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                     --}}
    
                </ul>
            
        </nav>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
