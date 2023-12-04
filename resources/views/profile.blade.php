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
  @include('layouts.header')
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
                    <img class="imgclass1" src="storage/{{ Auth::user()->avatar }}" alt="">
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
                      <li>Premios ganados <span>0</span></li>
                      <li>Puntos Smash <span>{{$smash}}</span></li>
                      <li>Saldo actual <span>S/. {{$saldo}}</span></li>
                      <li>Codigo usuario <span>{{Auth::user()->id}}</span></li>
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
                        <div>
                          <img src="{{asset('assets/img/illustrations/jugadas.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="200" alt="">
                          <h4 class="p-2 text-center text-ligth">No tienes jugadas por ahora</h4>
                          <p class="text-ligth text-center" style="font-size: 16px;">Aquí podrás ver todas tus jugadas.</p>
                        </div>
                        <!-- <div class="col-lg-3 col-sm-6">
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
                        </div> -->
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
              @if($movimientos->count()==0)
              <div>
                <img src="{{asset('assets/img/illustrations/transacciones.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="200" alt="">
                <h4 class="p-2 text-center text-ligth">No has realizado transacciones por ahora</h4>
                <p class="text-ligth text-center" style="font-size: 16px;">Aquí podrás ver todos tus movimientos.</p>
              </div>
              @else
                @foreach($movimientos as $item)
                <div class="item">
                  <ul>
                    <li><img style="border-radius: 0px !important;" src="{{asset('assets/img/illustrations/transacciones.png')}}" alt="" class="templatemo-item imgclass"></li>
                    <li><h4>Transacción Id</h4><span>{{$item->transaction_id}}</span></li>
                    <li><h4>Tipo de Pago</h4><span>{{$item->tipo_pago}}</span></li>
                    <li><h4>Fecha</h4><span>{{$item->fecha_pago}}</span></li>
                    <li><h4>Monto</h4><span>S/. {{$item->monto}}</span></li>                    
                    <li><div class="main-border-button border-no-active"><a href="#">Donwloaded</a></div></li>
                  </ul>
                </div>
                @endforeach
              @endif              
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

    
    <script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets1/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets1/js/tabs.js')}}"></script>
    <script src="{{asset('assets1/js/popup.js')}}"></script>
    <script src="{{asset('assets1/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/header.js')}}"></script>
  @endsection
