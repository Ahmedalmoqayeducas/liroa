<header id="header" class="fixed-top header-transparent d-sm-block d-inline" style="max-width: 100% !important;">
    <div class="container" style="max-width: 100% !important;">
        <!-- Logo -->
        <div class="logo float-left">
            <h1 class="text-white">
                <a href="{{ route('home') }}">
                    <img src=" {{ Route::currentRouteName() == 'home' ? asset('org/img/logo-avada-business-02.png') : asset('org/img/logo-avada-business-01.png') }}"
                        alt="Logo">
                </a>
            </h1>
        </div>
        <!-- Navigation Menu -->
        <nav class=" nav-menu float-right d-none d-lg-block">
            <ul>
                <!-- Menu Items -->
                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <a class=" {{ Route::currentRouteName() == 'home' ? 'text-light' : 'text-dark' }}"
                        href="{{ route('home') }}">
                        <span style="display: inline-block; font-size: medium; font-weight: bold;">Home</span>
                    </a>
                </li>

                <li class="{{ Route::currentRouteName() == 'activities' ? 'active' : '' }}">
                    <a class="
                     {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == 'activities' ? 'text-danger' : 'text-dark') }}"
                        href="{{ route('activities') }}">
                        <span style="display: inline-block; font-size: medium; font-weight: bold;">Activities</span>
                    </a>
                </li>

                <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                    <a class=" {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == 'about' ? 'text-danger' : 'text-dark') }}"
                        href="{{ route('about') }}">
                        <span style="display: inline-block; font-size: medium; font-weight: bold;">About </span>
                    </a>
                </li>
                <li class=" {{ Route::currentRouteName() == 'payment' ? 'active' : '' }}">
                    <a class=" {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == 'donation' ? 'text-danger' : 'text-dark') }}"
                        href="{{ route('createTransaction') }}">
                        <span style="display: inline-block; font-size: medium; font-weight: bold;">Donate </span>
                    </a>
                </li>
                {{-- <li class="drop-down">
                    <a
                        class="   {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == '' ? 'text-danger' : 'text-dark') }}">
                        <span style="display: inline-block; font-size: medium; font-weight: bold;">Expertise</span>
                        <i class="fas fa-chevron-down float-end mt-1"></i>
                    </a>
                    <ul class="dropdown-menu bg-primary" style="position: static; z-index: 9999;">
                        @foreach ($data['expertise'] as $page)
                            <li><a class="text-white" style="font-size: medium; font-weight: bold;"
                                    href="{{ route('pages.userShow', $page->id) }}">{{ $page->name }}</a></li>
                        @endforeach
                    </ul>
                </li> --}}
                <!-- Dropdown Menu -->
                {{-- <li class="drop-down">
                    <a
                        class="   {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == '' ? 'text-danger' : 'text-dark') }}">
                        <span style="display: inline-block; font-size: medium; font-weight: bold;">Projects</span>
                        <i class="fas fa-chevron-down float-end mt-1"></i>
                    </a>
                    <ul class="dropdown-menu bg-primary" style="position: relative; z-index: 9999;">
                        @foreach ($data['projects'] as $page)
                            <li><a class="text-white" style="font-size: medium; font-weight: bold;"
                                    href="{{ route('pages.userShow', $page->id) }}">{{ $page->name }}</a></li>
                        @endforeach
                    </ul>
                </li> --}}
                <!-- Contact -->
                <li class=" {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                    <a class=" {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == 'contact' ? 'text-danger' : 'text-dark') }}"
                        href="{{ route('contact') }}">
                        <h5 class=" btn-danger rounded-pill px-4 py-2 " style="margin-top: -10px"> Let's Talk <i
                                class="fas fa-phone"></i></h5>
                    </a>
                </li>
            </ul>
        </nav>
        <button type="button" onclick="burgermToggle()" class="pt-2 mobile-nav-toggle d-lg-none ">

            <i class= "{{ Route::currentRouteName() == 'home' ? 'text-white' : 'text-dark' }} fas fa-bars"></i>

        </button>


        <nav id="burgerm"
            class="float-left bg-white d-none p-3 shadow-sm fusion-fullwidth fullwidth-box fusion-builder-row-6 fusion-flex-container ">
            <ul class="list-unstyled">
                <!-- Menu Items -->
                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <a class=" d-block  text-dark {{ Route::currentRouteName() == 'home' ? 'fw-bold' : '' }}"
                        href="{{ route('home') }}">
                        <i class="fas fa-home me-2"></i> <!-- Home icon -->
                        <h6 class="d-inline-block">Home</h6>
                    </a>
                </li>
                <hr class="">
                <li class="{{ Route::currentRouteName() == 'activities' ? 'active' : '' }}">
                    <a class=" d-block p-2 text-dark {{ Route::currentRouteName() == 'activities' ? 'fw-bold text-danger' : '' }}"
                        href="{{ route('activities') }}">
                        <i class="fas fa-running me-2"></i> <!-- Activities icon -->
                        <h6 class="d-inline-block">Activities</h6>
                    </a>
                </li>
                <hr class="my-2">
                <li class="{{ Route::currentRouteName() == 'team' ? 'active' : '' }}">
                    <a class=" d-block p-2 text-dark {{ Route::currentRouteName() == 'team' ? 'fw-bold text-danger' : '' }}"
                        href="{{ route('team') }}">
                        <i class="fas fa-users me-2"></i> <!-- Team icon -->
                        <h6 class="d-inline-block">Team</h6>
                    </a>
                </li>
                <hr class="my-2">
                <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                    <a class=" d-block p-2 text-dark {{ Route::currentRouteName() == 'about' ? 'fw-bold text-danger' : '' }}"
                        href="{{ route('about') }}">
                        <i class="fas fa-info-circle me-2"></i> <!-- About icon -->
                        <h6 class="d-inline-block">About </h6>
                    </a>
                </li>
                <hr class="my-2">
                <li class="{{ Route::currentRouteName() == 'payment' ? 'active' : '' }}">
                    <a class=" d-block p-2 text-dark {{ Route::currentRouteName() == 'payment.form' ? 'fw-bold text-danger' : '' }}"
                        href="{{ route('createTransaction') }}">
                        <i class="fas fa-credit-card me-2"></i> <!-- Payment icon -->
                        <h6 class="d-inline-block">Payment</h6>
                    </a>
                </li>
                <hr class="my-2">

                <!-- Contact -->
                <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                    <a class=" d-block p-2 text-dark {{ Route::currentRouteName() == 'contact' ? 'fw-bold text-danger' : '' }}"
                        href="{{ route('contact') }}">
                        <i class="fas fa-envelope me-2"></i> <!-- Contact icon -->
                        <h6 class="d-inline-block">Contact </h6>
                    </a>
                </li>
                <hr class="my-2">

                <li class="drop-down">
                    <a
                        class="   {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == '' ? 'text-danger' : 'text-dark') }}">
                        <h6>Expertise</h6>

                    </a>

                    <ul class="dropdown-menu " style="position: relative; z-index: 9999;">
                        @foreach ($data['expertise'] as $page)
                            <li><a class="text-white" style="font-size: medium; font-weight: bold;"
                                    href="{{ route('pages.userShow', $page->id) }}">{{ $page->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <!-- Dropdown Menu -->
                <li class="drop-down">
                    <a
                        class="   {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == '' ? 'text-danger' : 'text-dark') }}">
                        <h6 style="display: inline-block;">Projects</h6>

                    </a>

                    <ul class="dropdown-menu" style="position: relative; z-index: 9999;">
                        @foreach ($data['projects'] as $page)
                            <li><a class="text-white" style="font-size: medium; font-weight: bold;"
                                    href="{{ route('pages.userShow', $page->id) }}">{{ $page->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>

    </div>
    <script>
        document.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        function burgermToggle() {
            burgerm = document.getElementById('burgerm');
            if (burgerm.classList.contains('d-none')) {
                burgerm.classList.remove('d-none')
            } else {
                burgerm.classList.add('d-none')
            }
        }
    </script>
</header>
