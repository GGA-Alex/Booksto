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
                    <a href="{{ route('HomePage') }}">
                        <i class="las la-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('CategoryPage') }}">
                        <i class="ri-function-line"></i>
                        <span>Categorias</span>
                    </a>

                </li>
                @auth
                    <li>
                        <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span
                                class="ripple rippleEffect"></span><i
                                class="las la-user-tie iq-arrow-left"></i><span>Usuario</span><i
                                class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                            <li>
                                <a href="{{ route('orden.index') }}">
                                    <i class="las la-truck"></i>
                                    <span>Ordenes</span>
                                </a>

                            </li>
                            <li>
                                <a href="{{ route('profile.show') }}">
                                    <i class="las la-id-card-alt"></i>
                                    Perfil de usuario
                                </a>
                            </li>
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
                        <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span
                                class="ripple rippleEffect"></span><i
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
