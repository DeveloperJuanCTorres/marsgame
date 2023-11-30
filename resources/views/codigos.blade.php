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
        <div class="page-content pt-0">          

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4 class="text-center">Mis Códigos activos</h4>
              </div>
              @if($codigos->count() > 0)
              @foreach ($codigos as $item)
              <div class="item">
                <ul class="p-0">
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
              @else
              <div>
                  <img src="{{asset('assets/img/illustrations/notificacion.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="200" alt="">
                  <h4 class="p-2 text-center text-ligth">No tienes codigos activos por ahora</h4>
                  <p class="text-ligth text-center" style="font-size: 16px;">Cuando tengas códigos activos, podrás verlos en esta sección.</p>
              </div>
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
 
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets1/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets1/js/tabs.js')}}"></script>
    <script src="{{asset('assets1/js/popup.js')}}"></script>
    <script src="{{asset('assets1/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/header.js')}}"></script>
  @endsection
