@extends('layouts.app')
<!-- include('layouts.header') -->
@section('content')

<!-- HEADER -->
<!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 data-navbar-on-scroll nav-header"  data-navbar-on-scroll="data-navbar-on-scroll"> -->
<div id="headerview">
@include('layouts.header')
@include('layouts.offcanvas')
</div>

<!-- include('layouts.header') -->
<!-- FIN HEADER -->
    
      <section class="py-0">
        <!-- <div class="bg-holder" style="background-image:url(assets/img/illustrations/bg.png);background-position:left center;background-size:auto 816px;">
        </div> -->
        <!--/.bg-holder-->
        
        @include('layouts.carrousel')

        <div class="container">
          <div class="row align-items-center min-vh-100">
            <div class="col-md-7 col-xl-7 pt-9 text-md-start text-center">
              <img src="{{asset('assets/img/premio1.png')}}" width="100%" alt="">
              <!-- <h1 class="display-2 text-light fw-thin">Obtendras grandes <br class="d-none d-xl-block" />beneficios <strong class="fw-bolder">MarsGame </strong></h1>
              <p class="fs-2 text-400">Simple Steps You Can Take to Improve Your <br class="d-none d-xxl-block" />Financial Well-Being for the rest of Your Life </p><a class="btn btn-primary btn-ensurance mt-5" href="#!"><span class="fas fa-chevron-right fa-xs btn-icon"></span><span class="btn-text">Learn more</span></a> -->
            </div>
            <div class="col-md-5 col-xl-5 pe-xxl-0">
              <!-- <h1 class="text-light" style="width: 400px;">¡Ven y participa aquí!</h1>
              <div class="text-center">
                <a class="btn btn-primary" style="color: white;border-radius: 15px;width: 250px;" href="">Quiero registrarme</a>
              </div> -->
              <img src="{{asset('assets/img/gane.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="50%">
              <div class="card card-bg shadow">
                <div class="card-body p-4 p-xl-6">
                  <h2 class="text-100 text-white">Tenemos premios todas las semanas, ¡Ven y participa Aquí!</h2>
                  <form class="mb-3 mt-4">
                    <div class="col-12 d-grid">
                      <a class="btn btn-primary rounded-pill text-white" href="/register">Quiero Registrarme</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="participar">

        <!-- <div class="bg-holder d-none d-md-block" style="background-image:url(assets/img/illustrations/bg-left1.png);background-position:left;background-size:15% 100%;"> -->
        <div class="bg-holder d-none d-md-block">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-none d-xl-block  mt-11" style="background-image:url(assets/img/illustrations/circle.png);background-position:18% 49%;;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="container-lg">
          <div class="row flex-center py-8 py-md-10">
            <div class="col-12 mt-6">
              <div class="d-flex align-items-start">
                <div class="nav flex-column nav-tab" id="nav-tab" role="tablist" aria-orientation="vertical"><a class="circle-hover-wrapper nav-link mb-lg-4 active" id="nav-car-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-car" role="tab" aria-controls="nav-car" aria-selected="true">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/car-hover.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/car-hover.png" alt="..." /></div>
                  </a><a class="circle-hover-wrapper nav-link mb-lg-4" id="nav-home-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/home-hover.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/home-hover.png" alt="..." /></div>
                  </a><a class="circle-hover-wrapper nav-link mb-lg-4" id="nav-paw-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-paw" role="tab" aria-controls="nav-paw" aria-selected="false">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/paw-hover.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/paw-hover.png" alt="..." /></div>
                  </a><a class="circle-hover-wrapper nav-link mb-lg-4" id="nav-plane-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-plane" role="tab" aria-controls="nav-plane" aria-selected="false">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/plane-hover.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/plane-hover.png" alt="..." /></div>
                  </a></div>
                <div class="tab-content w-100" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-car" role="tabpanel" aria-labelledby="nav-car-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Participar</h2>
                        <p class="text-400">Make a plan for the emergence of life. We protect your most precious assets, allowing you to devote your time and energy to more essential things in life.</p>
                        <p class="text-400 mt-3">Discover the most appropriate fit for you and your Family.</p><a class="btn btn-primary btn-ensurance mt-5" href="#!"><span class="fas fa-chevron-right fa-xs btn-icon"></span><span class="btn-text">Learn more</span></a>
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                      <div class="img-shape"><iframe class="feature-img" width="560" height="390" src="https://www.youtube.com/embed/Rmj-q6SfKaE?si=v9t1pdHBLLoxtLnj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
                        <!-- <div class="img-shape"><img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." /></div> -->
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Próximo sorteo</h2>
                        <p class="text-400">Make a plan for the emergence of life. We protect your most precious assets, allowing you to devote your time and energy to more essential things in life.</p>
                        <p class="text-400 mt-3">Discover the most appropriate fit for you and your Family.</p><a class="btn btn-primary btn-ensurance mt-5" href="#!"><span class="fas fa-chevron-right fa-xs btn-icon"></span><span class="btn-text">Learn more</span></a>
                      </div>
                      <div class="col-md-6 col-xl-8 text-center">                          
                        <div id="carouselproximosorteo" class="carousel carousel-dark slide" data-bs-ride="carousel" 
                            style="border-radius: 20px;">
                          
                          <div class="carousel-inner" style="border-radius: 20px;">
                            <div class="carousel-item active" data-bs-interval="10000">
                              <img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." />
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                              <img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." />
                            </div>
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselproximosorteo" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselproximosorteo" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>                 
                        <!-- <div class="img-shape"><img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." /></div> -->
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-paw" role="tabpanel" aria-labelledby="nav-paw-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Último sorteo</h2>
                        <p class="text-400">Make a plan for the emergence of life. We protect your most precious assets, allowing you to devote your time and energy to more essential things in life.</p>
                        <p class="text-400 mt-3">Discover the most appropriate fit for you and your Family.</p><a class="btn btn-primary btn-ensurance mt-5" href="#!"><span class="fas fa-chevron-right fa-xs btn-icon"></span><span class="btn-text">Learn more</span></a>
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                        <div class="img-shape"><img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." /></div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-plane" role="tabpanel" aria-labelledby="nav-plane-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Travel Insurance</h2>
                        <p class="text-400">Make a plan for the emergence of life. We protect your most precious assets, allowing you to devote your time and energy to more essential things in life.</p>
                        <p class="text-400 mt-3">Discover the most appropriate fit for you and your Family.</p><a class="btn btn-primary btn-ensurance mt-5" href="#!"><span class="fas fa-chevron-right fa-xs btn-icon"></span><span class="btn-text">Learn more</span></a>
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                        <div class="img-shape"><img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." /></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row offset-xl-2">
            <div class="col-12">
              <div class="mb-3 mb-md-5">
                <h2 class="text-light mb-7 text-center text-sm-start">Nuestros servicios</h2>
              </div>
              <div class="row">
                <div class="col-sm-6 col-lg-3 mb-6 text-center text-sm-start"><img class="shadow-icon" src="assets/img/icons/support.png" height="60" alt="..." />
                  <h4 class="mt-4 fw-normal text-light">24x7 Support</h4>
                  <p class="text-400 mb-md-0">Client is our most <br> important priority</p>
                </div>
                <div class="col-sm-6 col-lg-3 mb-6 text-center text-sm-start"><img class="shadow-icon" src="assets/img/icons/edit.png" height="60" alt="..." />
                  <h4 class="mt-4 fw-normal text-light">Easy Claim System</h4>
                  <p class="text-400 mb-md-0">Express your desires <br>and needs to us</p>
                </div>
                <div class="col-sm-6 col-lg-3 mb-6 text-center text-sm-start"><img class="shadow-icon" src="assets/img/icons/money.png" height="60" alt="..." />
                  <h4 class="mt-4 fw-normal text-light">Easy installments</h4>
                  <p class="text-400 mb-md-0">It's quick, safe, and simple. Select several methods of payment</p>
                </div>
                <div class="col-sm-6 col-lg-3 mb-6 text-center text-sm-start"><img class="shadow-icon" src="assets/img/icons/security.png" height="60" alt="..." />
                  <h4 class="mt-4 fw-normal text-light">Strongly Secured</h4>
                  <p class="text-400 mb-md-0">Food is made and delivered directly to your home.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section id="clientes" class="py-8">

        <div class="container-fluid px-0">
          <div class="row g-0">
            <div class="col-12 col-xxl-11 offset-xxl-1">
              <h2 class="text-light text-center">Nuestros Ganadores</h2>
              <div class="carousel slide" id="carouselExampleIndicators" data-bs-ride="carouse">
                <div class="carousel-inner ps-md-5 ps-lg-11 py-4 py-md-5 py-lg-4 pb-lg-9">
                  <div class="carousel-item active">
                    <div class="row h-100">
                      <div class="col-12">
                        <div class="card testimonial-bg card-span text-white mt-10 mt-md-7 mt-lg-8 mx-4 mx-md-0">
                          <div class="card-body pt-0 p-md-0">
                            <div class="d-flex flex-column flex-md-row align-items-center">
                              <div class="card-span-img">
                                <div class="circle-wrapper"><img class="rounded-circle w-100" src="assets/img/team/teamdefault.jpg" alt="" /></div>
                              </div>
                              <div class="mt-n6 mt-md-0 text-center text-md-start px-md-6 px-xl-8 px-xxl-10">
                                <h4 class="mb-0 fw-medium text-white">Charlize Theron</h4>
                                <p class="fw-normal mb-0 text-primary">Founder Circle</p>
                                <p class="card-text text-200 mt-3">“Our dedicated patient engagement app and web portal allow you to access information instantaneously (no tedeous form, long calls, or administrative hassle) and securely”</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="row h-100">
                      <div class="col-12">
                        <div class="card testimonial-bg card-span text-white mt-10 mt-md-7 mt-lg-8 mx-4 mx-md-0">
                          <div class="card-body pt-0 p-md-0">
                            <div class="d-flex flex-column flex-md-row align-items-center">
                              <div class="card-span-img">
                                <div class="circle-wrapper"><img class="rounded-circle w-100" src="assets/img/team/teamdefault.jpg" alt="" /></div>
                              </div>
                              <div class="mt-n6 mt-md-0 text-center text-md-start px-md-6 px-xl-8 px-xxl-10">
                                <h4 class="mb-0 fw-medium text-white">Edward Newgate</h4>
                                <p class="fw-normal mb-0 text-primary">Founder Circle</p>
                                <p class="card-text text-200 mt-3">“Our dedicated patient engagement app and web portal allow you to access information instantaneously (no tedeous form, long calls, or administrative hassle) and securely”</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="row h-100">
                      <div class="col-12">
                        <div class="card testimonial-bg card-span text-white mt-10 mt-md-7 mt-lg-8 mx-4 mx-md-0">
                          <div class="card-body pt-0 p-md-0">
                            <div class="d-flex flex-column flex-md-row align-items-center">
                              <div class="card-span-img">
                                <div class="circle-wrapper"><img class="rounded-circle w-100" src="assets/img/team/teamdefault.jpg" alt="" /></div>
                              </div>
                              <div class="mt-n6 mt-md-0 text-center text-md-start px-md-6 px-xl-8 px-xxl-10">
                                <h4 class="mb-0 fw-medium text-white">Charlize Theron</h4>
                                <p class="fw-normal mb-0 text-primary">Founder Circle</p>
                                <p class="card-text text-200 mt-3">“Our dedicated patient engagement app and web portal allow you to access information instantaneously (no tedeous form, long calls, or administrative hassle) and securely”</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center justify-content-xl-end me-auto mt-xl-n7 pe-xl-8">
                  <div class="col-2 text-end position-relative z-index-2">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
                    <div class="carousel-indicators">
                      <button class="active" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"> </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


<!-- ============================================-->
      <!-- <section> PROMOCIONES ============================-->
      <section id="promociones" style="padding-top: 0;">
      <div class="container">
        <div class="row">
          <h2 class="text-light text-center my-5">Tickets</h2>
        </div>
        <div class="row align-items-center circle-blend circle-blend-right circle-warning p-4" style="margin-left: auto;margin-right: auto;">
       
        @if($tickets != null)
          @foreach($tickets as $item)          
            <div class="col-xs-12 col-lg-4 pt-4">
              <div class="card1 text-center card-soft-primary" style="margin-left: auto;margin-right: auto;">
                <img src="{{config('env')}}/storage/{{$item->imagen}}" style="width:100%;height: 80px;border-radius: 20px 20px 0 0;" alt="..." />
                <div class="card1-header">
                  <input style="display: none;" type="text" name="id" id="id" value="{{$item->id}}">
                  <input style="display: none;" type="text" name="name" id="name" value="{{$item->nombre}}">
                  <input style="display: none;" type="text" name="price" id="price" value="{{$item->monto}}">
                  <input style="display: none;" type="text" name="quantity" id="quantity" value="1">
                  <input style="display: none;" type="text" name="codigos" id="codigos" value="{{$item->cantidad_codigos}}">
                  <h3 class="display-2 text-white-promo pt-2"><span class="currency">S/.</span>{{$item->monto}}<span class="period px-2">/{{$item->duracion}}</span></h3>
                </div>
                <div class="card1-block">
                  <h4 class="card1-title text-white"> 
                    {{$item->nombre}} 
                  </h4>
                  <ul class="list-group padding-left-0">
                    <li class="list-group-item">{{$item->beneficio1}}</li>
                    <li class="list-group-item">{{$item->beneficio2}}</li>
                    <li class="list-group-item">{{$item->beneficio3}}</li>
                    <li class="list-group-item">{{$item->beneficio4}}</li>
                  </ul>
                  <button type="button"
                  data-id='{{$item->id}}' 
                      data-name='{{$item->nombre}}' 
                      data-price='{{$item->monto}}' 
                      data-quantity='1' 
                      data-codigos='{{$item->cantidad_codigos}}' 
                       class="btn1 btn-gradient mt-2 padding-left-0 btn_comprar">Comprar</button>
                </div>
              </div>
            </div>
          
          @endforeach
          @endif         
         
        </div>
      </div>
        
        <!-- end of .container-->
      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

      

      <!-- ============================================-->
      <!-- <section> PROMOCIONES ============================-->
      <section id="promociones" style="padding-top: 0;">
      <div class="container">
        <div class="row">
          <h2 class="text-light text-center my-5">Promociones</h2>
        </div>
        <div class="row align-items-center circle-blend circle-blend-right circle-warning p-4" style="margin-left: auto;margin-right: auto;">
       
        @if($products != null)
          @foreach($products as $item)          
            <div class="col-xs-12 col-lg-4 pt-4">
             
              <div class="card1 text-center card-soft-primary" style="margin-left: auto;margin-right: auto;">
                <img src="{{config('env')}}/storage/{{$item->imagen}}" style="width:100%;height: 80px;border-radius: 20px 20px 0 0;" alt="..." />
                <div class="card1-header">
                  <h3 class="display-2 text-white-promo pt-2"><span class="currency">S/.</span>{{$item->monto}}<span class="period px-2">/{{$item->duracion}}</span></h3>
                </div>
                <div class="card1-block">
                  <h4 class="card1-title text-white"> 
                    {{$item->promocion}} 
                  </h4>
                  <ul class="list-group padding-left-0">
                    <li class="list-group-item">{{$item->beneficio1}}</li>
                    <li class="list-group-item">{{$item->beneficio2}}</li>
                    <li class="list-group-item">{{$item->beneficio3}}</li>
                    <li class="list-group-item">{{$item->beneficio4}}</li>
                  </ul>
                  <button type="button"
                      data-id='{{$item->id}}' 
                      data-name='{{$item->promocion}}' 
                      data-price='{{$item->monto}}' 
                      data-quantity='1' 
                      data-codigos='{{$item->cantidad_codigos}}' 
                      class="btn1 btn-gradient mt-2 padding-left-0 btn_comprar">Comprar</button>
                </div>
              </div>
            </div>
          
          @endforeach
          @endif         
         
        </div>
      </div>
        
        <!-- end of .container-->
                        <input style="display: none;" type="text" id="id" value="10">
      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


     

  @include('layouts.footer') 
      
 
  @include('layouts.noticanvas')
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // const btn_comprar = document.getElementById('btn_comprar');
  //   console.log('hola');

    // btn_comprar.addEventListener('click', function (e){
    $(".btn_comprar").click(function (e) {
      e.preventDefault();
        var ele = $(this);
        var id = ele.attr("data-id");
        var name = ele.attr("data-name");
        var price = ele.attr("data-price");
        var quantity = ele.attr("data-quantity");
        var codigos = ele.attr("data-codigos");

        console.log(codigos);

        $.ajax({
            url: "/cart",
            method: "post",
						dataType: 'json',
						data: {
							_token: $('meta[name="csrf-token"]').attr('content'),           
              id: id,
              name: name,
              price: price,
              quantity: quantity,
              codigos: codigos
            },
            beforeSend: function () {
                Swal.fire({
                    header: '...',
                    title: "cargando",
                    allowOutsideClick:false,
                    didOpen: () => {
                    Swal.showLoading()
                    }
                });
            },
            success: function (response) {
                 if (response) {
                 Swal.fire({
                     icon: 'success',
                     title: 'Exito',
                     text: "Participación realizada con exito",
                     allowOutsideClick: false,
                     confirmButtonText: "Ok",
                 })
                 .then(resultado => {
                    // location.reload();
                    $("#headerview").load('home');
                    // $("#totalCheckou").html(response.count);
                    //  $('#offcanvasRight').load('codigos');
                    // location.reload(true);
                    //  $("#headerview").html(response);
                 }) 
                 }
                 else{
                 Swal.fire({
                     icon: 'error',
                     title: 'response.msg',
                     text: 'response.msg',
                 })
                }
                
             },
            error: function (response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...!!',
                    text: 'Something went wrong!!',
                  })
            }
        });
    })
</script>

@endsection


