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
            <h1>Gracias</h1>
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
