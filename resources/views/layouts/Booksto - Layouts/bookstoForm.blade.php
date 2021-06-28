<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Booksto</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('bookstore/images/favicon.ico') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bookstore/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bookstore/css/dataTables.bootstrap4.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('bookstore/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('bookstore/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('bookstore/css/responsive.css') }}">
    @livewireStyles
</head>

<body class="sidebar-main-active right-column-fixed">
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
                <a href="{{ route('HomePage') }}" class="header-logo">
                    <img src="{{ asset('bookstore/images/logo.png') }}" class="img-fluid rounded-normal" alt="">
                    <div class="logo-title">
                        <span class="text-primary text-uppercase">Booksto</span>
                    </div>
                </a>
                <div class="iq-menu-bt-sidebar">
                    <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="las la-bars"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar-scrollbar">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li>
                        <li>
                            <a href="{{ route('HomePage') }}"><i class="las la-home"></i><span>Inicio</span></a>
                        </li>
                        <li>
                            <a href="{{ route('CategoryPage') }}">
                                <i class="ri-function-line"></i>
                                <span>Categorias</span>
                            </a>

                        </li>
                        @auth
                            <li>
                                <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse"
                                    aria-expanded="false"><span class="ripple rippleEffect"></span><i
                                        class="las la-user-tie iq-arrow-left"></i><span>Usuario</span><i
                                        class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                                    <li><a href="{{ route('profile.show') }}"><i class="las la-id-card-alt"></i>Perfil de
                                            usuario</a></li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                <i class="las la-sign-out-alt"></i> Cerrar sesión
                                            </a>
                                        </li>

                                    </form>
                                </ul>
                            </li>
                        @endauth
                        @guest
                            <li>
                                <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse"
                                    aria-expanded="false"><span class="ripple rippleEffect"></span><i
                                        class="las la-user-tie iq-arrow-left"></i><span>Usuario</span><i
                                        class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                                    <li><a href="{{ route('login') }}"><i class="las la-sign-in-alt"></i><span>Iniciar
                                                sesión</span></a></li>
                                    <li><a href="{{ route('register') }}"><i
                                                class="ri-login-circle-line"></i><span>Registrarse</span></a></li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-menu-bt d-flex align-items-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="las la-bars"></i></div>
                        </div>
                        <div class="iq-navbar-logo d-flex justify-content-between">
                            <a href="{{ route('HomePage') }}" class="header-logo">
                                <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                                <div class="logo-title">
                                    <span class="text-primary text-uppercase">Booksto</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @yield('pageName')
                    @livewire('drop-down-cart')
                </nav>
            </div>
        </div>
        <!-- TOP Nav Bar END -->

        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        @livewireScripts
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('bookstore/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bookstore/js/popper.min.js') }}"></script>
    <script src="{{ asset('bookstore/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bookstore/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bookstore/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('bookstore/js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('bookstore/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('bookstore/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('bookstore/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('bookstore/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('bookstore/js/apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('bookstore/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('bookstore/js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('bookstore/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('bookstore/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('bookstore/js/smooth-scrollbar.js') }}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ asset('bookstore/js/lottie.js') }}"></script>
    <!-- am core JavaScript -->
    <script src="{{ asset('bookstore/js/core.js') }}"></script>
    <!-- am charts JavaScript -->
    <script src="{{ asset('bookstore/js/charts.js') }}"></script>
    <!-- am animated JavaScript -->
    <script src="{{ asset('bookstore/js/animated.js') }}"></script>
    <!-- am kelly JavaScript -->
    <script src="{{ asset('bookstore/js/kelly.js') }}"></script>
    <!-- am maps JavaScript -->
    <script src="{{ asset('bookstore/js/maps.js') }}"></script>
    <!-- am worldLow JavaScript -->
    <script src="{{ asset('bookstore/js/worldLow.js') }}"></script>
    <!-- Style Customizer -->
    <script src="{{ asset('bookstore/js/style-customizer.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('bookstore/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('bookstore/js/custom.js') }}"></script>
    <!-- Raphael-min JavaScript -->
    <script src="{{ asset('bookstorejs/raphael-min.js') }}"></script>
    <!-- Morris JavaScript -->
    <script src="{{ asset('bookstorejs/morris.js') }}"></script>
    <!-- Morris min JavaScript -->
    <script src="{{ asset('bookstorejs/morris.min.js') }}"></script>
    <!-- Flatpicker Js -->
    <script src="{{ asset('bookstorejs/flatpickr.js') }}"></script>
    <!-- Style Customizer -->
    <script src="{{ asset('bookstorejs/style-customizer.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('bookstorejs/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('bookstorejs/custom.js') }}"></script>
</body>

</html>
