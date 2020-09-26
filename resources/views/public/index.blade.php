
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Meftah Agency</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/img/favicon.png') }} rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel=apple-touch-icon">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/nivo-slider/css/nivo-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

<style>

    #logo-site{

        width: 146px;
        height: 40px !important;
        margin: 10px 10px 10px 10px !important;
    }

</style>
<link rel="icon"
  type="image/png"
  href="../img/logo2.png">
</head>

<body data-spy="scroll" data-target="#navbar-example">
<div id="app">


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
          {{-- <img id="logo-site" src="img/logo2.png" alt=""> --}}
         <h1 class="text-light"><a href="index.html"><span>M</span>Ftah-Agency</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

    <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><router-link :to="{ name:'public' }">Acceuil</router-link></li>
          <li ><router-link to="/blog">Blog</router-link></li>
          <li> <router-link to="/allArticles">Articles</router-link></a></li>
        @guest
                 <li><a href="{{ route('login') }}">se connecter <i class="fas fa-sign-in-alt"></i></a></li>
                 @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('s\'inscrire') }}</a>
                    </li>
                @endif
        @else
        <li class="drop-down"><a href="">ajouter</a>
            <ul>
              <li><router-link to="/ajouterAnnonce">ajouter annonce</router-link></li>
              <li><router-link to="/ajouterblog">ajouter Blog</router-link></li>

            </ul>
          </li>

        <li class="drop-down"><a id="navbarDropdown" style="color: #fff">{{ Auth::user()->name }}</a>

<ul>
              <li>  <a class="" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}

                </a>
                <li><router-link to="/EspaceUser" >Mon Espace</router-link></li></li>
            </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


        </li>
    @endguest
        </ul>
    </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Slider Section ======= -->
{{--  --}}
<br><br><br><br>

  <div id="main">
    <public-main></public-main>
  </div><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>M</span>ftahAgency</h2>
                </div>

                <p>MeftahAgency est le site n°1 d'achat et de vente de biens immobiliers  au Maroc. MeftahAgency Immobilier  est un nouvel espace qui propose des projets d’immobiliers  finis ou en construction à Casablanca, Marrakech, Rabat et presque toutes les grandes villes au Maroc. </p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> +123 456 789</p>
                  <p><span>Email:</span> contact@example.com</p>
                  <p><span>Working Hours:</span> 9am-5pm</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="{{ asset('assets/img/portfolio/1.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/2.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/3.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/4.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/5.jpg') }}" alt=""></a>
                  <a href="#"><img src="{{ asset('assets/img/portfolio/6.jpg') }}" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>MeftahAgency</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
            -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->
</div>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <script type="application/javascript" src="{{asset("js/app.js")}}"></script>
  <!-- Vendor JS Files -->
  <script  src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script  src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script  src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script  src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script  src="{{ asset('assets/vendor/appear/jquery.appear.js') }}"></script>
  <script  src="{{ asset('assets/vendor/knob/jquery.knob.js') }}"></script>
  <script  src="{{ asset('assets/vendor/parallax/parallax.js') }}"></script>
  <script  src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>
  <script  src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script  src="{{ asset('assets/vendor/nivo-slider/js/jquery.nivo.slider.js') }}"></script>
  <script   src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script   src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
        offset: 120,
        duration:1000,
    });
  </script>
  <!-- Template Main JS File -->
<script   src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>
