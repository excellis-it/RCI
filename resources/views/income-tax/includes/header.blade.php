<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav quick-links d-none d-lg-flex">
            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Manage Income Tax<span
                        class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="position-relative p-7 h-100">
                        <ul class="">
                            <li class="mb-2">
                                <a class="fw-semibold text-dark bg-hover-primary text-decoration-none"
                                    href="{{ route('arrears-name.index') }}">Arrears Names</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>

            {{-- <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link {{ Route::is('arrears.index') ? 'active' : '' }}" href="{{ route('arrears.index') }}"> Arrears</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
                <a class="nav-link {{ Route::is('rents.index') ? 'active' : '' }}" href="{{ route('rents.index') }}"> Rents</a>
            </li> --}}


        </ul>

        <div class="d-block d-lg-none">
            <img src="{{ asset('frontend_assets/images/logo.png') }}" class="dark-logo" width="" alt="">
        </div>

        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

            <li class="nav-item">
                <a class="fw-semibold bg-hover-primary text-decoration-none text-deger ps-3 d-none d-md-block"
                    href="{{ route('logout') }}">
                    <i class="ti ti-logout fs-4"></i> Logout
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="d-flex align-items-center">
                        <div class="user-profile-img">
                            @if (Auth::user()->profile_picture)
                                <img src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="user"
                                    class="rounded-circle" width="35" height="35" alt="">
                            @else
                                <img src="{{ asset('frontend_assets/images/user-1.jpg') }}" class="rounded-circle"
                                    width="35" height="35" alt="">
                            @endif

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
                            @if (Auth::user()->profile_picture)
                                <img src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="user"
                                    class="rounded-circle" width="80" height="80">
                            @else
                                <img src="{{ asset('frontend_assets/images/user-1.jpg') }}" class="rounded-circle"
                                    width="80" height="80" alt="">
                            @endif
                            <div class="ms-3">
                                <h5 class="mb-1 fs-3">{{ Auth::user()->full_name }}</h5>
                                <span class="mb-1 d-block text-dark">User</span>
                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                    <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                </p>
                            </div>
                        </div>
                        <div class="message-body">
                            <a href="{{ route('profile') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                    <img src="{{ asset('frontend_assets/images/icon-account.svg') }}" alt=""
                                        width="24" height="24">
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                    <span class="d-block text-dark">Account Settings</span>
                                </div>
                            </a>
                        </div>
                        <div class="message-body">
                            <a href="{{ route('password') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                    <img src="{{ asset('frontend_assets/images/icon-inbox.svg') }}" alt=""
                                        width="24" height="24">
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> Change Password </h6>
                                    {{-- <span class="d-block text-dark">Account Settings</span> --}}
                                </div>
                            </a>
                        </div>
                        <div class="message-body">
                            <a href="{{ route('logo.dashboard') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                    <img src="{{ asset('frontend_assets/images/icon-inbox.svg') }}" alt=""
                                        width="24" height="24">
                                </span>
                                <div class="w-75 d-inline-block v-middle ps-3">
                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> Change Logo </h6>
                                    {{-- <span class="d-block text-dark">Account Settings</span> --}}
                                </div>
                            </a>
                        </div>
                        <div class="d-grid py-4 px-7 pt-8">
                            <a href="{{ route('logout') }}" class="btn btn-outline-primary">Log Out</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

    </nav>
</header>
