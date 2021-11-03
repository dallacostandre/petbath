<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Bath Pet - Gestão para Banho & Tosa</title>
    <meta name="description" content="Sistema para gerenciamento de petshops com foco em banho e tosa.">
    <meta name="robots" content="all">
    <meta name="author" content="Creatif Digital">
    <meta name="keywords"
        content="sistema para pet shop, sistema pet shop, software para pet shop, programa para pet shop, sistema para banho e tosa, software petshop">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" /> --}}
    <!-- CSS Files -->
    <link href="{{ asset('../assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />

    <link href="{{ asset('../assets/font-awesome-pro/css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/font-awesome-pro/css/regular.css') }}" rel="stylesheet" />
    <link href="{{ asset('../assets/font-awesome-pro/css/all.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <meta name="google-site-verification" content="lT3OPUbB3Ptqvk5xG_OrHRgkiJeSBPZ0K-efVaZNeqg" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-16TDNEJNYX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-16TDNEJNYX');
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="original" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <img src="../assets/img/topo_logo_sistema.png" width="100%"
                        style="background-color: white!important;">
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            <i class="fas fa-paw fa-2x"></i>
                            <p> &nbsp;&nbsp; Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/agendamento') }}">
                            <i class="far fa-clipboard-list-check fa-2x "></i>
                            <p> &nbsp;&nbsp; Agendamento</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/clientes') }}">
                            <i class="fal fa-users fa-2x"></i>
                            <p> &nbsp;&nbsp; Clientes</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/servicos-e-produtos') }}">
                            <i class="fas fa-dog fa-2x"></i>
                            <p> &nbsp;&nbsp; Produtos & Serviços</p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fal fa-comment-alt-dollar fa-2x"></i>
                            Financeiro
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/fluxo-de-caixa') }}">
                                <p>
                                    <i class="fal fa-user"></i>
                                    Fluxo de Caixa
                                </p>
                            </a>
                            <a class="dropdown-item" href="{{ url('/configuracoes') }}">
                                <p>
                                    <i class="fal fa-user"></i>
                                    P.D.V.
                                </p>
                            </a>
                            <a class="dropdown-item" href="{{ url('/configuracoes') }}">
                                <p>
                                    <i class="fal fa-user"></i>
                                    Relatórios
                                </p>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/leva-e-tras') }}">
                            <i class="fas fa-car fa-2x "></i>
                            <p> &nbsp;&nbsp; Leva & Trás</p>
                        </a>
                    </li>
                    <li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fal fa-user-cog fa-2x"></i>
                            Configurações
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/configuracoes') }}">
                                <p>
                                    <i class="fal fa-user"></i>
                                    Configuração de Perfil
                                </p>
                            </a>
                            <a class="dropdown-item" href="{{ url('/configuracoes') }}">
                                <p>
                                    <i class="fal fa-user"></i>
                                    Configuração de Layout
                                </p>
                            </a>
                            <a class="dropdown-item" href="{{ url('/configuracoes') }}">
                                <p>
                                    <i class="fal fa-user"></i>
                                    Configuração de Notificação
                                </p>
                            </a>
                            <a class="dropdown-item" href="{{ url('/configuracoes') }}">
                                <p>
                                    <i class="fal fa-user"></i>
                                    Plano & Assinatura
                                </p>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            {{-- <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li> --}}
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Account</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li> --}}
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </li>



                        </ul>
                    </div>
                </div>
            </nav>
