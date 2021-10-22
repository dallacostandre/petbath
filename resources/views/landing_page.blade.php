<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <!-- Site Metas -->
    <meta name="keywords" content="sistema para petshop, sistema para banho e tosa, software para banho e tosa" />
    <meta name="description" content="" />
    <meta name="author" content="PetBath" />

    <title>PetBath - Gestão para PetShop</title>

    <!-- font awesome style -->
    <link href="{{url('lp/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- lightbox -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet" />
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ urL('lp/css/bootstrap.css') }}" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Poppins:400,700|Roboto:400,700&display=swap"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ urL('lp/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ url('lp/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        {{-- <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="" />
            <span>
              Petlor
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
              <li class="nav-item active">
                <a class="nav-link" href="index.html"> Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gallery.html"> Gallery </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pr-lg-0" href="contact.html"> Contact us</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header> --}}
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section position-relative">
            <div class="slider_bg_box">
                <img src="{{ url('lp/images/sistema_para_pet_shop.jpg') }}" alt="">
            </div>
            <div class="container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-7 col-lg-6">
                                    <div class="detail-box">
                                        <h1>
                                            Em breve um sistema exclusivo focado para <strong> Banho e Tosa</strong>.
                                        </h1>
                                        <p>
                                            Entre em contato conosco pelo email<strong> <br> <a href="mailto:ontato@sistemaparapetshop.com">contato@sistemaparapetshop.com</a></strong>
                                        </p>
                                        <div class="btn-box">
                                            <a href="https://wa.me/+554792533566" class="btn-2">
                                             Enviar Mensagem
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>

    <script src="{{ url('lp/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('lp/bootstrap.js') }}"></script>
    <!-- lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js  "></script>
    <!-- custom js -->
    <script src="{{ 'lp/js/custom.js' }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>
