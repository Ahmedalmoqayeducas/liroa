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
        <nav class="nav-menu float-right d-none d-lg-block">
            <ul>

                <!-- Menu Items -->
                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <a class="nav-link-23 {{ Route::currentRouteName() == 'home' ? 'text-light' : 'text-dark' }}"
                        href="{{ route('home') }}">
                        <h5>Home</h5>
                    </a>
                </li>

                <li class="{{ Route::currentRouteName() == 'activities' ? 'active' : '' }}">
                    <a class="nav-link-23 {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == 'activities' ? 'text-danger' : 'text-dark') }}"
                        href="{{ route('activities') }}">
                        <h5>Activities</h5>
                    </a>
                </li>

                <li class="{{ Route::currentRouteName() == 'team' ? 'active' : '' }}">
                    <a class="nav-link-23 {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == 'team' ? 'text-danger' : 'text-dark') }}"
                        href="{{ route('team') }}">
                        <h5>Team</h5>
                    </a>
                </li>

                <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                    <a class="nav-link-23 {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == 'about' ? 'text-danger' : 'text-dark') }}"
                        href="{{ route('about') }}">
                        <h5>About Us</h5>
                    </a>
                </li>
                <li class=" {{ Route::currentRouteName() == 'payment' ? 'active' : '' }}">
                    <a class="nav-link-23 {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == 'payment.form' ? 'text-danger' : 'text-dark') }}"
                        href="{{ route('createTransaction') }}">
                        <h5>payment</h5>
                    </a>
                </li>
                <!-- Dropdown Menu -->
                <li class="drop-down">
                    <a
                        class="  nav-link-23 {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == '' ? 'text-danger' : 'text-dark') }}">
                        <h5 style="display: inline-block;">Others</h5>
                        <i class="fas fa-chevron-down float-end mt-1"></i>
                    </a>

                    <ul class="dropdown-menu" style="position: relative; z-index: 9999;">
                        @foreach ($data as $page)
                            <li><a href="{{ route('pages.userShow', $page->id) }}">{{ $page->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <!-- Contact -->
                <li class="pl-2 {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                    <a class="nav-link-23 {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == 'contact' ? 'text-danger' : 'text-dark') }}"
                        href="{{ route('contact') }}">
                        <h5 class=" btn-danger rounded-pill px-4 py-2 " style="margin-top: -10px"> <i class="fas fa-phone"></i> Let's Talk </h5>
                    </a>
                </li>


            </ul>
        </nav>
        <button onclick="burgermToggle()"
            class="d-sm-none float-right btn {{ Route::currentRouteName() == 'home' ? 'text-light' : (Route::currentRouteName() == 'contact' ? 'text-danger' : 'text-dark') }}">
            <i class="fas fa-bars"></i> <!-- Font Awesome menu icon -->
        </button>
        <nav id="burgerm"
            class="bg-white d-none p-3 shadow-sm fusion-fullwidth fullwidth-box fusion-builder-row-6 fusion-flex-container">
            <ul class="list-unstyled">
                <!-- Menu Items -->
                <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <a class="nav-link-23 d-block  text-dark {{ Route::currentRouteName() == 'home' ? 'fw-bold' : '' }}"
                        href="{{ route('home') }}">
                        <i class="fas fa-home me-2"></i> <!-- Home icon -->
                        <h5 class="d-inline-block">Home</h5>
                    </a>
                </li>
                <hr class="">
                <li class="{{ Route::currentRouteName() == 'activities' ? 'active' : '' }}">
                    <a class="nav-link-23 d-block p-2 text-dark {{ Route::currentRouteName() == 'activities' ? 'fw-bold text-danger' : '' }}"
                        href="{{ route('activities') }}">
                        <i class="fas fa-running me-2"></i> <!-- Activities icon -->
                        <h5 class="d-inline-block">Activities</h5>
                    </a>
                </li>
                <hr class="my-2">
                <li class="{{ Route::currentRouteName() == 'team' ? 'active' : '' }}">
                    <a class="nav-link-23 d-block p-2 text-dark {{ Route::currentRouteName() == 'team' ? 'fw-bold text-danger' : '' }}"
                        href="{{ route('team') }}">
                        <i class="fas fa-users me-2"></i> <!-- Team icon -->
                        <h5 class="d-inline-block">Team</h5>
                    </a>
                </li>
                <hr class="my-2">
                <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                    <a class="nav-link-23 d-block p-2 text-dark {{ Route::currentRouteName() == 'about' ? 'fw-bold text-danger' : '' }}"
                        href="{{ route('about') }}">
                        <i class="fas fa-info-circle me-2"></i> <!-- About icon -->
                        <h5 class="d-inline-block">About Us</h5>
                    </a>
                </li>
                <hr class="my-2">
                <li class="{{ Route::currentRouteName() == 'payment' ? 'active' : '' }}">
                    <a class="nav-link-23 d-block p-2 text-dark {{ Route::currentRouteName() == 'payment.form' ? 'fw-bold text-danger' : '' }}"
                        href="{{ route('createTransaction') }}">
                        <i class="fas fa-credit-card me-2"></i> <!-- Payment icon -->
                        <h5 class="d-inline-block">Payment</h5>
                    </a>
                </li>
                <hr class="my-2">

                <!-- Contact -->
                <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                    <a class="nav-link-23 d-block p-2 text-dark {{ Route::currentRouteName() == 'contact' ? 'fw-bold text-danger' : '' }}"
                        href="{{ route('contact') }}">
                        <i class="fas fa-envelope me-2"></i> <!-- Contact icon -->
                        <h5 class="d-inline-block">Contact Us</h5>
                    </a>
                </li>
                <hr class="my-2">

                <!-- Dropdown Menu -->
                <li class="drop-down">
                    <a
                        class="nav-link-23 d-block p-2 text-dark {{ Route::currentRouteName() == '' ? 'fw-bold text-danger' : '' }}">
                        <i class="fas fa-ellipsis-h me-2"></i> <!-- Others icon -->
                        <h5 class="d-inline-block">Others</h5>
                        <i class="fas fa-chevron-down float-end mt-1"></i> <!-- Dropdown arrow -->
                    </a>
                    <ul class="pl-4 list-unstyled dropdown-content">
                        @foreach ($data as $page)
                            <li>
                                <a class="d-block p-2 text-dark" href="{{ route('pages.userShow', $page->id) }}">
                                    <i class="fas fa-file-alt me-2"></i> <!-- Page icon -->
                                    {{ $page->name }}
                                </a>
                            </li>
                            <hr class="my-1">
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
