@extends('layouts.app')

@section('content')

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top data-navbar-on-scroll nav-header">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="{{asset('assets/img/logo.png')}}" width="200" alt="">
            <!-- <span class="text-primary fs-3 ms-2 fw-bolder">Mars</span><span class="fw-thin text-300 fs-3">Game</span> -->
          </a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse pt-4 pt-lg-0" id="navbarSupportedContent">

              <ul class="list-unstyled list-inline my-2" style="margin-left: auto;margin-left: auto;">
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-facebook-square fa-2x text-white"></i></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-instagram fa-2x text-white"></i></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-twitter-square fa-2x text-white"> </i></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-linkedin fa-2x text-white"></i></a></li>
              </ul>

            <ul class="navbar-nav ms-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
              <li class="nav-item px-2"><a class="nav-link text-white" aria-current="page" href="/#">Inicio</a></li>
              <li class="nav-item px-2"><a class="nav-link text-white" href="/#participar">Participar</a></li>
              <li class="nav-item px-2"><a class="nav-link text-white" href="/#promociones">Promociones</a></li>
              <li class="nav-item px-2"><a class="nav-link text-white" href="/#contact">Contáctanos</a></li>
            </ul>
            <button class="btn btn-sm d-flex" type="button" style="font-size: 20px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
              <i class="fas fa-shopping-cart text-primary text-white"> </i>
              <span class="badge rounded-pill bg-danger" style="font-size: 8px;float: right;display:block;position:relative;">
                0
              </span>
            </button>
            <div class="d-flex mt-2 align-items-center mt-lg-0">
              <div class="dropdown">
                  @auth
                  <button class="btn btn-sm d-flex" style="font-size: 20px;" type="submit" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- <i class="fas fa-user text-primary text-white"> </i> -->
                    <img class="imgclass" src="storage/{{ Auth::user()->avatar }}" alt="" style="width: 40px;border-radius: 60px;border:1px solid white">
                  </button>
                  @else
                  <a href="/login" class="btn btn-primary rounded-pill" style="padding: 10px 20px !important;background-color: white;color: 2D2E83;border-color: white;">Iniciar sesión</a>
                  @endauth
                <ul class="dropdown-menu dropdown-menu-lg-end p-0 rounded" aria-labelledby="dropdownMenuButton2" style="top:55px;">
                  @auth
                  <li><a class="dropdown-item" href="/perfil">Mi Cuenta </a></li>
                  <!-- <li><a class="dropdown-item" href="#">Mis jugadas</a></li>
                  <li><a class="dropdown-item" href="#">Mis movimientos</a></li>
                  <li><a class="dropdown-item" href="#">Puntos acumulados</a></li>
                  <li><a class="dropdown-item" href="#">Mis premios</a></li> -->
                  @else
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                  <li><a class="dropdown-item" href="/register">Registrarme</a></li>
                  @endauth

                  @auth
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        🚪 Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                  @endauth
                </ul>
              </div>

            </div>
          </div>
        </div>
    </nav>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                  <div class="col-lg-4">
                    <img class="imgclass" src="storage/{{ Auth::user()->avatar }}" alt="" style="border-radius: 23px;">
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">
                      <span>Cambiar Foto</span>
                      <h4>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h4>
                      <p>You Haven't Gone Live yet. Go Live By Touching The Button Below.</p>
                      <div class="btn btn-primary rounded-pill">
                        <a href="password/reset">Cambiar contraseña</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <ul>
                      <li>Premios ganados <span>3</span></li>
                      <li>Puntos acumulados <span>16</span></li>
                      <li>Saldo actual <span>S/. 0.00</span></li>
                      <li>Codigo usuario <span>0012</span></li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="clips">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="heading-section">
                            <h4>Mis Jugadas</h4>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <div class="item">
                            <div class="thumb">
                              <img class="imgclass" src="{{asset('assets1/images/clip-01.jpg')}}" alt="" style="border-radius: 23px;">
                              <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="down-content">
                              <h4 class="text-white">First Clip</h4>
                              <span><i class="fa fa-eye"></i> 250</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <div class="item">
                            <div class="thumb">
                              <img class="imgclass" src="{{asset('assets1/images/clip-02.jpg')}}" alt="" style="border-radius: 23px;">
                              <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="down-content">
                              <h4 class="text-white">Second Clip</h4>
                              <span><i class="fa fa-eye"></i> 183</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <div class="item">
                            <div class="thumb">
                              <img class="imgclass" src="{{asset('assets1/images/clip-03.jpg')}}" alt="" style="border-radius: 23px;">
                              <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="down-content">
                              <h4 class="text-white">Third Clip</h4>
                              <span><i class="fa fa-eye"></i> 141</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <div class="item">
                            <div class="thumb">
                              <img class="imgclass" src="{{asset('assets1/images/clip-04.jpg')}}" alt="" style="border-radius: 23px;">
                              <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="down-content">
                              <h4 class="text-white">Fourth Clip</h4>
                              <span><i class="fa fa-eye"></i> 91</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="main-button">
                            <a href="#">Load More Clips</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4>Mis Movimientos</h4>
              </div>
              <div class="item">
                <ul>
                  <li><img src="{{asset('assets1/images/game-01.jpg')}}" alt="" class="templatemo-item imgclass"></li>
                  <li><h4>Dota 2</h4><span>Sandbox</span></li>
                  <li><h4>Date Added</h4><span>24/08/2036</span></li>
                  <li><h4>Hours Played</h4><span>634 H 22 Mins</span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                </ul>
              </div>
              <div class="item">
                <ul>
                  <li><img src="{{asset('assets1/images/game-02.jpg')}}" alt="" class="templatemo-item imgclass"></li>
                  <li><h4>Fortnite</h4><span>Sandbox</span></li>
                  <li><h4>Date Added</h4><span>22/06/2036</span></li>
                  <li><h4>Hours Played</h4><span>745 H 22 Mins</span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                </ul>
              </div>
              <div class="item last-item">
                <ul>
                  <li><img src="{{asset('assets1/images/game-03.jpg')}}" alt="" class="templatemo-item imgclass"></li>
                  <li><h4>CS-GO</h4><span>Sandbox</span></li>
                  <li><h4>Date Added</h4><span>21/04/2022</span></li>
                  <li><h4>Hours Played</h4><span>632 H 46 Mins</span></li>
                  <li><h4>Currently</h4><span>Downloaded</span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>


  @include('layouts.footer')

      @include('layouts.offcanvas')

    <!-- Bootstrap core CSS -->
    <!-- <link href="vendor1/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Additional CSS Files -->
    <!-- <link rel="stylesheet" href="{{asset('assets1/css/fontawesome.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('assets1/css/templatemo-cyborg-gaming.css')}}"> -->
    <!-- <!-- <link rel="stylesheet" href="{{asset('assets1/css/owl.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('assets1/css/animate.css')}}"> -->
    <!-- <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/> -->

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
    <!-- <script src="{{asset('vendor1/bootstrap/js/bootstrap.min.js')}}"></script> -->

    <!-- <script src="{{asset('assets1/js/isotope.min.js')}}"></script> -->
    <script src="{{asset('assets1/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets1/js/tabs.js')}}"></script>
    <script src="{{asset('assets1/js/popup.js')}}"></script>
    <script src="{{asset('assets1/js/custom.js')}}"></script>
  @endsection
