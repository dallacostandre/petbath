<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>PetBath - Sistema para PetShop 2022</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('../assets-2/images/favicon.png') }}">
    <link href="{{ asset('assets-2/libs/chartist/dist/chartist.min.css') }}"" rel=" stylesheet">
    <link href="{{ asset('assets-2/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-2/dist/css/style-customized.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font-awesome-pro/css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/font-awesome-pro/css/regular.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/font-awesome-pro/css/all.css') }}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('cssExtras')
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full"
        data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand" style="display: flex;">
                        <a href="{{ url('/') }}" class="logo">
                            <b class="logo-icon">
                                <img src="{{ url('assets-2/images/logo_pet_roxa.png') }}" alt="homepage"
                                    class="dark-logo" />
                                <img src="{{ url('assets-2/images/logo_pet_roxa.png') }}" alt="homepage"
                                    class="light-logo" style="width: 15%;" />
                            </b>
                            <span class="logo-text">
                                <span style="color: white">{{ auth()->user()->name }}</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 me-1"></i>
                                    <div class="ms-1 d-none d-sm-block">
                                        <span>Pesquisar</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Pesquisar &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti-user me-1 ms-1"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/editar-perfil') }}">
                                    <i class="ti-user me-1 ms-1"></i>
                                    Editar Perfil</a>
                                <a class="dropdown-item" href="{{ url('/financeiro') }}">
                                    <i class="ti-wallet me-1 ms-1"></i>
                                    Relatório Financeiro
                                </a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @component('dashboard.componentes.aside')
        @endcomponent

        @yield('content')

        <footer class="footer text-center">

        </footer>
    </div>
    </div>

    <script src="{{ asset('assets-2/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets-2/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets-2/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets-2/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets-2/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets-2/dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets-2/dist/js/mask.js') }}"></script>
    <script src="{{ asset('assets-2/dist/js/sweet.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('assets-2/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets-2/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('assets-2/dist/js/pages/dashboards/dashboard1.js') }}"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    @yield('scriptExtras')



</body>

</html>
