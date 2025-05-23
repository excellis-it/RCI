<!DOCTYPE html>
<html lang="en">

    <head>
        <!--  Title -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ env('APP_NAME') }} | @yield('title')</title>
        <!--  Required Meta Tag -->

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="handheldfriendly" content="true">
        <meta name="MobileOptimized" content="width">
        <meta name="description" content="RCI">
        <meta name="author" content="Swarnadwip Nath">
        <meta name="keywords" content="RCI">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--  Favicon -->
        <!-- <link rel="shortcut icon" type="image/png" href="favicon.ico"> -->
        <!-- Owl Carousel  -->
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/owl.carousel.min.css') }}">

        <!-- Core Css -->
        <link id="themeColors" rel="stylesheet" href="{{ asset('frontend_assets/css/style.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web_assets/css/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web_assets/css/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('web_assets/css/font-awesome.min.css') }}">
        @stack('styles')
    </head>

    <body>

        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical"
            data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
            <!-- Sidebar Start -->
            @include('frontend.public-fund.includes.sidebar')

            <!--  Sidebar End -->
            <!--  Main wrapper -->
            <div class="body-wrapper">
                <!--  Header Start -->
                @include('frontend.public-fund.includes.header')

                <!--  Header End -->
                @yield('content')

            </div>
            <div class="dark-transparent sidebartoggler"></div>
        </div>
        @include('frontend.public-fund.includes.footer')


        <!--  Import Js Files -->
        <script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/bootstrap.bundle.min.js') }}"></script>
        <!--  core files -->
        <script src="{{ asset('frontend_assets/js/app.min.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/app.init.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/app-style-switcher.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/sidebarmenu.js') }}"></script>
        <script src="{{ asset('frontend_assets/js/custom.js') }}"></script>
        <!--  current page js files -->
        <script src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
        <!-- <script src="js/apexcharts.min.js"></script> -->
        <!-- <script src="js/dashboard.js"></script> -->
        <script src="{{ asset('web_assets/js/toastr.min.js') }}"></script>
        <script src="{{ asset('web_assets/js/toastr.min.js') }}"></script>
        <script src="{{ asset('web_assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('web_assets/js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('web_assets/js/select2.min.js') }}"></script>
        <script>
            window.addEventListener('load', () => {
                // $('.select23').select2();
            });
        </script>
        <script>
            @if (Session::has('message'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('message') }}");
            @endif

            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ session('error') }}");
            @endif

            @if (Session::has('info'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.info("{{ session('info') }}");
            @endif

            @if (Session::has('warning'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.warning("{{ session('warning') }}");
            @endif
        </script>
        @stack('scripts')
    </body>

</html>
