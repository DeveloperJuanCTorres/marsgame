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
            @auth
            <button class="btn btn-sm d-flex p-2" type="button" style="font-size: 20px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotificacion" aria-controls="offcanvasNotificacion">
              <i class="fa fa-bell text-white"> </i>
              <span class="badge rounded-pill bg-danger" style="font-size: 8px;float: right;display:block;position:relative;">
              0
              </span>
            </button>             
            @endauth 
            <button class="btn btn-sm d-flex p-2" type="button" style="font-size: 20px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
              <i class="fas fa-shopping-cart text-white"> </i>
              <span class="badge rounded-pill bg-danger" style="font-size: 8px;float: right;display:block;position:relative;">
              {{Cart::getContent()->count()}}
              </span>
            </button> 
            <div class="d-flex mt-2 align-items-center mt-lg-0">
              <div class="dropdown">
                  @auth
                  <button class="btn btn-sm d-flex" style="border: 1px solid white;border-radius: 25px;" type="submit" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- <i class="fas fa-user text-primary text-white"> </i> -->
                    <img class="imgclass" src="storage/{{ Auth::user()->avatar }}" alt="" style="width: 30px;border-radius: 60px;">
                    <span class="text-white text-justify-center px-2" style="display: block;margin-top: auto;margin-bottom: auto;">S/. 0.00</span>
                  </button>
                  @else
                  <a href="/login" class="btn btn-primary rounded-pill" style="padding: 10px 20px !important;background-color: white;color: 2D2E83;border-color: white;">Iniciar sesión</a>
                  @endauth
                <ul class="dropdown-menu dropdown-menu-lg-end p-0 rounded" aria-labelledby="dropdownMenuButton2" style="top:55px;">
                  @auth
                  <div class="row p-2">
                    <div class="col-7">
                      <span class="text-black" style="font-size: small;font-weight: bold;">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
                    </div>
                    <div class="col-5">
                      <span class="text-black">S/. 0.00</span>
                    </div>
                  </div>
                  <div class="row p-2">
                    <div class="col-6">
                      <button class="btn btn-primary" style="padding: 10px;width: 100%;">Retirar</button>
                    </div>
                    <div class="col-6">
                      <button class="btn btn-secondary" style="padding: 10px;width: 100%;">Depositar</button>
                    </div>
                  </div>                  
                  @else
                  <li><a class="dropdown-item" href="/login">Login</a></li>
                  <li><a class="dropdown-item" href="/register">Registrarme</a></li>
                  @endauth

                  @auth
                  <li><hr class="dropdown-divider"></li>
                  <li>                    
                    <a class="dropdown-item" href="/perfil">
                      <i class="fa fa-user" aria-hidden="true"></i>Mi Cuenta 
                    </a>
                  </li>
                  <li>                    
                    <a class="dropdown-item" href="/codigos">
                      <i class="fa fa-code" aria-hidden="true"></i>Mis códigos
                    </a>
                  </li>
                  <li class="pb-4">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-clone" aria-hidden="true"></i> Cerrar sesión
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

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4>Mis Códigos activos</h4>
              </div>
              @foreach ($codigos as $item)
              <div class="item">
                <ul>
                    <li><img src="{{asset('assets1/images/game-01.jpg')}}" alt="" class="templatemo-item imgclass"></li>
                    <li><h4>Ptos Samsh</h4><span>1</span></li>
                    <li><h4>Vence</h4><span>30/11/2023</span></li>
                    <li><h4>Código</h4><span>{{$item->codigo}}</span></li>
                    <li><h4>Estado</h4>
                        @if($item->estado==0)
                        <span>Activo</span>                            
                        @else
                        <span>Inactivo</span>  
                        @endif                        
                    </li>
                    <li><div class="main-border-button border-no-active"><a href="#">Copiar codigo</a></div></li>
                </ul>
              </div>
              @endforeach
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>


  @include('layouts.footer')

      @include('layouts.offcanvas')
      @include('layouts.noticanvas')

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
