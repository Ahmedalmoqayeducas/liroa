<!DOCTYPE html>
<!-- Template Name: DashCode - HTML, React, Vue, Tailwind Admin Dashboard Template Author: Codeshaper Website: https://codeshaper.net Contact: support@codeshaperbd.net Like: https://www.facebook.com/Codeshaperbd Purchase: https://themeforest.net/item/dashcode-admin-dashboard-template/42600453 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. -->
<html lang="zxx" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>{{ __('dashboard.thumbnail') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('dashboard/images/logo/favicon.svg') }}">
    <!-- BEGIN: Google Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- END: Google Font -->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('dashboard/css/sidebar-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/SimpleBar.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/toastr/toastr.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('dashboard/css/rt-plugins.css') }}"> --}}
    <link rel="stylesheet"
        href="{{ asset('dashboard/sweetalert2/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }} ">
    <!-- END: Theme CSS-->
    <script src="{{ asset('dashboard/js/settings.js') }}" sync></script>
    @yield('style')
</head>

<body class=" font-inter dashcode-app" id="body_class">
    <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
    <main class="app-wrapper">
        <!-- BEGIN: Sidebar -->
        @include('components.dashboard.sidebar')
        <!-- End: Sidebar -->
        <!-- BEGIN: Settings -->
        @include('components.dashboard.settings')
        <!-- End: Settings -->
        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <!-- BEGIN: Header -->
                @include('components.dashboard.header')
                <!-- END: Header -->
                @include('components.dashboard.content')
            </div>

            <!-- BEGIN: Footer For Desktop and tab -->
            @include('components.dashboard.footer')
            <!-- END: Footer For Desktop and tab -->
            <div
                class="bg-white bg-no-repeat custom-dropshadow footer-bg dark:bg-slate-700 flex justify-around items-center backdrop-filter backdrop-blur-[40px] fixed left-0 bottom-0 w-full z-[9999] bothrefm-0 py-[12px] px-4 md:hidden">
                <a href="chat.html">
                    <div>
                        <span
                            class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white text-slate-900 ">
                            <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
                            <span
                                class="absolute right-[5px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center justify-center rounded-full text-white z-[99]">
                                10
                            </span>
                        </span>
                        <span class="block text-[11px] text-slate-600 dark:text-slate-300">
                            {{ __('dashboard.messages') }}
                        </span>
                    </div>
                </a>
                <a href="profile.html"
                    class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700 h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
                    <div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
                        <img src="{{ asset('dashboard/images/users/user-1.jpg') }}" alt=""
                            class="w-full h-full rounded-full border-2 border-slate-100">
                    </div>
                </a>
                <a href="#">
                    <div>
                        <span
                            class=" relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white text-slate-900">
                            <iconify-icon icon="heroicons-outline:bell"></iconify-icon>
                            <span
                                class="absolute right-[17px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center justify-center rounded-full text-white z-[99]">
                                2
                            </span>
                        </span>
                        <span class=" block text-[11px] text-slate-600 dark:text-slate-300">
                            {{ __('dashboard.notifications') }}
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <!-- scripts -->
    <!-- Core Js -->
    <script src="{{ asset('dashboard/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/popper.js') }}"></script>
    <script src="{{ asset('dashboard/js/tw-elements-1.0.0-alpha13.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/SimpleBar.js') }}"></script>
    <script src="{{ asset('dashboard/js/iconify.js') }}"></script>
    <!-- Jquery Plugins -->

    <!-- app js -->
    <script src="{{ asset('dashboard/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('dashboard/js/app.js') }}"></script>
    <script src="{{ asset('dashboard/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('dashboard/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('dashboard/axios/dist/axios.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
