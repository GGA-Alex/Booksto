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
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('bookstore/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('bookstore/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('bookstore/css/responsive.css') }}">
    @livewireStyles
</head>

<body class="sidebar-main-active right-column-fixed">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('layouts\Booksto - Layouts\sidebarUser')
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
            <div class="container-fluid checkout-content">
                <div class="row">
                    <div id="cart" class="card-block show p-0 col-12">
                        @yield('content')
                    </div>
                </div>
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
</body>

</html>
