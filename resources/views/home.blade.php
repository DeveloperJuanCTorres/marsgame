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

       

        <div class="container py-4">
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
              <img class="mascota" src="{{asset('assets/img/mascota.png')}}" width="50%">
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
      <section id="participar" class="py-0">

        <!-- <div class="bg-holder d-none d-md-block" style="background-image:url(assets/img/illustrations/bg-left1.png);background-position:left;background-size:15% 100%;"> -->
        <div class="bg-holder d-none d-md-block">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-none d-xl-block  mt-11" style="background-image:url(assets/img/illustrations/circle.png);background-position:18% 49%;;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center py-4 px-4">
            <!-- <div class="col-md-6 col-xl-6">
              <h2 class="mb-md-5" style="color: #00983A;font-weight: bold;">Participar</h2>
              <p class="text-light movil">¡Es hora de participar en nuestros emocionantes sorteos, repletos de increíbles premios que te dejarán sin aliento!
                Nuestro compromiso es mantener la emoción y sorprender a nuestros participantes con premios emocionantes y variados.
                En nuestros sorteos, no solo encontrarás una amplia gama de premios tentadores, sino también la oportunidad de entrar con mayor fuerza para los proximos sorteos en el Smash!!.</p>
              <p class="text-light mt-3">¡No te pierdas la oportunidad! Participa en nuestro sorteo y podrías ser el próximo ganador. ¡Inscríbete ahora!</p>
            </div>
            <div class="col-md-6 col-xl-6">
            <div class="img-shape"><iframe class="feature-img" width="560" height="390" src="https://www.youtube.com/embed/mCkBLdlovSs?si=7jzGqpKs7KpvT1w_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
            </div> -->
            <div class="col-12 mt-6">
              <div class="d-flex align-items-start">
                <div class="nav flex-column nav-tab" id="nav-tab" role="tablist" aria-orientation="vertical">
                  <a class="circle-hover-wrapper nav-link mb-lg-4 active" id="nav-car-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-car" role="tab" aria-controls="nav-car" aria-selected="true">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/participar.png" alt="..." />
                      <img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/participar.png" alt="..." />
                    </div>
                  </a>
                  <a class="circle-hover-wrapper nav-link mb-lg-4" id="nav-home-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/proximosorteo.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/proximosorteo.png" alt="..." /></div>
                  </a><a class="circle-hover-wrapper nav-link mb-lg-4" id="nav-paw-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-paw" role="tab" aria-controls="nav-paw" aria-selected="false">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/ultimosorteo.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/ultimosorteo.png" alt="..." /></div>
                  </a><a class="circle-hover-wrapper nav-link mb-lg-4" id="nav-plane-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-plane" role="tab" aria-controls="nav-plane" aria-selected="false">
                    <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/comunidad.png" alt="..." /><img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/comunidad.png" alt="..." /></div>
                  </a></div>
                <div class="tab-content w-100" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-car" role="tabpanel" aria-labelledby="nav-car-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Participar</h2>
                        <p class="text-400 movil">¡Es hora de participar en nuestros emocionantes sorteos, repletos de increíbles premios que te dejarán sin aliento!
                          Nuestro compromiso es mantener la emoción y sorprender a nuestros participantes con premios emocionantes y variados.
                          En nuestros sorteos, no solo encontrarás una amplia gama de premios tentadores, sino también la oportunidad de entrar con mayor fuerza para los proximos sorteos en el Smash!!.</p>
                        <p class="text-400 mt-3">¡No te pierdas la oportunidad! Participa en nuestro sorteo y podrías ser el próximo ganador. ¡Inscríbete ahora!</p>
      
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                      <div class="img-shape"><iframe class="feature-img" width="560" height="390" src="https://www.youtube.com/embed/mCkBLdlovSs?si=7jzGqpKs7KpvT1w_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div>
                 
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Premios</h2>
                        <p class="text-400 movil">¡La emoción continúa y te invitamos a participar en nuestro próximo sorteo a lo grande! No te pierdas la oportunidad de ganar increíbles premios desde lo que imaginas y mucho más. Solo tienes que inscribirte y estarás un paso más cerca de convertirte en uno de nuestros afortunados ganadores</p>
                        <p class="text-400 mt-3">¡Sigue participando y mantén viva la emoción! ¡No te lo puedes perder! con el Smash el que sigue la consigue!</p>
                       
                      </div>
                      <div class="col-md-6 col-xl-8 text-center">
                        <div id="carouselproximosorteo" class="carousel carousel-dark slide" data-bs-ride="carousel"
                            style="border-radius: 20px;">

                          <div class="carousel-inner" style="border-radius: 20px;">
                            <div class="carousel-item active" data-bs-interval="10000">
                              <img class="feature-img" src="assets/img/sorteos/1.jpg" alt="..." />
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                              <img class="feature-img" src="assets/img/sorteos/2.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/3.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/4.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/5.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/6.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/7.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/8.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/9.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/10.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/11.jpg" alt="..." />
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
                        
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-paw" role="tabpanel" aria-labelledby="nav-paw-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Último sorteo</h2>
                        <p class="text-400 movil">¡Felicidades a todos los afortunados ganadores de nuestro emocionante ultimo sorteo! Les extendemos nuestras más sinceras felicitaciones por su gran logro. Esperamos que disfruten de sus increíbles premios y que les brinden momentos de felicidad y satisfacción.</p>
                        <p class="text-400 mt-3">Agradecemos a todos los participantes por hacer de este sorteo un éxito. ¡Sigan atentos a futuros sorteos y quizás puedan ser los próximos en celebrar una victoria! ¡Enhorabuena una vez más!</p>
                       
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                        <div class="img-shape"><img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." /></div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-plane" role="tabpanel" aria-labelledby="nav-plane-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Comunidad</h2>
                        <p class="text-400 movil">¡Únete a nuestra emocionante comunidad de redes sociales y descubre la magia de los sorteos! En nuestra página, te mantendremos al día con los últimos sorteos cargados de fabulosos premios. Productos diversos para todos los gustos, siempre hay algo emocionante en juego. Participa, comparte con tus amigos y aumenta tus posibilidades de ganar.</p>
                        <p class="text-400 mt-3">No te pierdas la oportunidad de ser parte de nuestra comunidad de ganadores. ¡Síguenos en nuestras redes sociales y deja que la suerte esté de tu lado! #Sorteos #LasCosasSucedenCuandoParticipas</p>
                       
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                        <div class="img-shape"><img class="feature-img" src="assets/img/gallery/unetecomunidad.jpg" alt="..." /></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section id="clientes" class="py-6">

        <div class="container-fluid px-0">
          <div class="row g-0">
            <div class="col-12 col-xxl-11 offset-xxl-1">
              <h2 class="text-light text-center">Últimos Ganadores</h2>
              <div class="p-4">
                <img src="{{asset('assets/img/illustrations/jugadas.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="200" alt="">
                <h4 class="p-2 text-center text-ligth">No tenemos ganadores aún</h4>
                <p class="text-ligth text-center" style="font-size: 16px;">Aquí podrás ver a nuestros ganadores.</p>
              </div>
              <!-- <div class="carousel slide" id="carouselExampleIndicators" data-bs-ride="carouse">
                <div class="carousel-inner ps-md-5 ps-lg-11 py-4 py-md-5 py-lg-4 pb-lg-9">
                  <div class="carousel-item active">
                    <div class="row h-100">
                      <div class="col-12">
                        <div class="card testimonial-bg card-span text-white mt-10 mt-md-7 mt-lg-8 mx-4 mx-md-0">
                          <div class="card-body pt-0 p-md-0">
                            <div class="d-flex flex-column flex-md-row align-items-center">
                              <div class="card-span-img">
                                <div class="circle-wrapper"><img class="rounded-circle w-100" src="assets/img/team/teamdefault.png" alt="" /></div>
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
              </div> -->
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
          <h2 class="text-light text-center my-5">Tarifa Regular</h2>
        </div>
        <div class="row align-items-center circle-blend circle-blend-right circle-warning p-4" style="margin-left: auto;margin-right: auto;">

        @if($tickets != null)
          @foreach($tickets as $item)
            <div class="col-xs-12 col-lg-4 pt-4">
              <div class="card1 text-center card-soft-primary" style="margin-left: auto;margin-right: auto;">
                <img src="{{config('env')}}/storage/{{$item->imagen}}" style="width:100%;height: 80px;border-radius: 20px 20px 0 0;" alt="..." />
                <div class="card1-header">
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
                      data-id='{{$item->nombre}}'
                      data-name='{{$item->nombre}}'
                      data-price='{{$item->monto}}'
                      data-quantity='1'
                      data-codigos='{{$item->cantidad_codigos}}'
                      data-mensual='{{$item->mensual}}'
                      data-cantidadmeses='{{$item->cantidad_meses}}'
                      data-productid='{{$item->id}}'
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
          <h2 class="text-light text-center my-5">Tarifa Promocional</h2>
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
                      data-id='{{$item->promocion}}'
                      data-name='{{$item->promocion}}'
                      data-price='{{$item->monto}}'
                      data-quantity='1'
                      data-codigos='{{$item->cantidad_codigos}}'
                      data-mensual='{{$item->mensual}}'
                      data-cantidadmeses='{{$item->cantidad_meses}}'
                      data-productid='{{$item->id}}'
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

      <!-- <section>
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8 col-xl-8 col-sm-12 col-12">
                <div class="row justify-content-center">
                  <div class="nav nav-tab" id="nav-tab" role="tablist">
                    <div class="col-sm-4 col-md-4 col-xl-4 col-4">
                      <div class="accordion" id="accordionExample">
                        <div class="">
                          <a class="circle-hover-wrapper nav-link active d-block mx-auto" href="#!" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/proximosorteo.png" alt="..." />
                              <img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/proximosorteo.png" alt="..." />              
                            </div>
                            <div class="text-center">
                              <span class="text-center text-light">Premios</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xl-4 col-4">
                      <a class="circle-hover-wrapper nav-link d-block mx-auto" id="nav-paw-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-paw"  aria-controls="nav-paw" aria-selected="false">
                        <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/ultimosorteo.png" alt="..." />
                          <img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/ultimosorteo.png" alt="..." />              
                        </div>
                        <div class="text-center">
                          <span class="text-center text-light">Último Sorteo</span>
                        </div>
                      </a>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xl-4 col-4">
                      <a class="circle-hover-wrapper nav-link d-block mx-auto" id="nav-plane-tab" href="#!" data-bs-toggle="tab" data-bs-target="#nav-plane" aria-controls="nav-plane" aria-selected="false">
                        <div class="icon-box"><img class="car-insurance-icon" src="assets/img/icons/comunidad.png" alt="..." />
                          <img class="car-insurance-icon car-insurance-icon-hover" src="assets/img/icons/comunidad.png" alt="..." />              
                        </div>
                        <div class="text-center">
                          <span class="text-center text-light">Smash</span>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>              
              </div>
              <div class="col-md-8 col-xl-8 col-sm-12 col-12">
                <div class="tab-content w-100" id="nav-tabContent">
                  <div class="tab-pane fade" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Premios</h2>
                        <p class="text-400 movil">¡La emoción continúa y te invitamos a participar en nuestro próximo sorteo a lo grande! No te pierdas la oportunidad de ganar increíbles premios desde lo que imaginas y mucho más. Solo tienes que inscribirte y estarás un paso más cerca de convertirte en uno de nuestros afortunados ganadores</p>
                        <p class="text-400 mt-3">¡Sigue participando y mantén viva la emoción! ¡No te lo puedes perder! con el Smash el que sigue la consigue!</p>
                        
                      </div>
                      <div class="col-md-6 col-xl-8 text-center">
                        <div id="carouselproximosorteo" class="carousel carousel-dark slide" data-bs-ride="carousel"
                            style="border-radius: 20px;">

                          <div class="carousel-inner" style="border-radius: 20px;">
                            <div class="carousel-item active" data-bs-interval="10000">
                              <img class="feature-img" src="assets/img/sorteos/1.jpg" alt="..." />
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                              <img class="feature-img" src="assets/img/sorteos/2.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/3.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/4.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/5.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/6.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/7.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/8.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/9.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/10.jpg" alt="..." />
                            </div>
                            <div class="carousel-item">
                              <img class="feature-img" src="assets/img/sorteos/11.jpg" alt="..." />
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
                        
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-paw" role="tabpanel" aria-labelledby="nav-paw-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Último sorteo</h2>
                        <p class="text-400 movil">¡Felicidades a todos los afortunados ganadores de nuestro emocionante ultimo sorteo! Les extendemos nuestras más sinceras felicitaciones por su gran logro. Esperamos que disfruten de sus increíbles premios y que les brinden momentos de felicidad y satisfacción.</p>
                        <p class="text-400 mt-3">Agradecemos a todos los participantes por hacer de este sorteo un éxito. ¡Sigan atentos a futuros sorteos y quizás puedan ser los próximos en celebrar una victoria! ¡Enhorabuena una vez más!</p>
                        
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                        <div class="img-shape"><img class="feature-img" src="assets/img/gallery/defaultgame.png" alt="..." /></div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-plane" role="tabpanel" aria-labelledby="nav-plane-tab">
                    <div class="row align-items-center offset-sm-1 g-3">
                      <div class="col-md-6 col-xl-4 order-1 order-md-0">
                        <h2 class="text-light mb-md-5">Comunidad</h2>
                        <p class="text-400 movil">¡Únete a nuestra emocionante comunidad de redes sociales y descubre la magia de los sorteos! En nuestra página, te mantendremos al día con los últimos sorteos cargados de fabulosos premios. Productos diversos para todos los gustos, siempre hay algo emocionante en juego. Participa, comparte con tus amigos y aumenta tus posibilidades de ganar.</p>
                        <p class="text-400 mt-3">No te pierdas la oportunidad de ser parte de nuestra comunidad de ganadores. ¡Síguenos en nuestras redes sociales y deja que la suerte esté de tu lado! #Sorteos #LasCosasSucedenCuandoParticipas</p>
                        
                      </div>
                      <div class="col-md-6 col-xl-8 text-end">
                        <div class="img-shape"><img class="feature-img" src="assets/img/gallery/unetecomunidad.jpg" alt="..." /></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>          
        </div>
      </section> -->


      <section>
        <div class="container">
          <div class="row">
            <h2 class="text-light text-center my-5">Preguntas Frecuentes</h2>
          </div>

          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" style="background-color: transparent !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  ¿Cómo particio?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <span class="text-light"> Para participar, debes tener una cuenta en www.marsgame.pe 
                      Al registrarte te llegara un mail a tu correo para verificar la cuenta. No olvides revisar tu carpeta de SPAM.
                      Luego elegir el plan de tu elección (ticket y/o suscripcion), hacer el pago correspondiente y estarás ya participando en los sorteos Simple y Smash.
                  </span>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" style="background-color: transparent !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  ¿Debo elegir un tipo de sorteo, Simple o Smash?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <span class="text-light">
                  Al comprar un ticket o una suscripción, estarás habilitado automáticamente para participar en AMBOS SORTEOS.
                  </span>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" style="background-color: transparent !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  ¿Qué es el Sorteo Smash?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <span class="text-light">
                    El un tipo de sorteo que consiste  en acumular puntos Smash, estos se generan usando los códigos Smash.
                  </span>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingCuatro">
                <button class="accordion-button collapsed" style="background-color: transparent !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuatro" aria-expanded="false" aria-controls="collapseCuatro">
                  ¿Donde consigo códigos Smash?
                </button>
              </h2>
              <div id="collapseCuatro" class="accordion-collapse collapse" aria-labelledby="headingCuatro" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <span class="text-light">
                    Al comprar cualquiera de los productos ofrecidos, tickets o suscripciones, estos siempre vienen acompañados de códigos Smash, lo cuales podrás ver en tu cuenta, en la sección "Mis códigos". 
                  </span>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingCinco">
                <button class="accordion-button collapsed" style="background-color: transparent !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCinco" aria-expanded="false" aria-controls="collapseCinco">
                  ¿Qué son los puntos Smash?
                </button>
              </h2>
              <div id="collapseCinco" class="accordion-collapse collapse" aria-labelledby="headingCinco" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <span class="text-light">
                    Los puntos Smash representan tus oportunidades en el sorteo Smash. En términos prácticos, se podría decir que los puntos Smash serían los tickets para este tipo de sorteo.
                  </span>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSeis">
                <button class="accordion-button collapsed" style="background-color: transparent !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeis" aria-expanded="false" aria-controls="collapseSeis">
                  ¿Como obtengo puntos Smash?
                </button>
              </h2>
              <div id="collapseSeis" class="accordion-collapse collapse" aria-labelledby="headingSeis" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <span class="text-light">
                    <strong>
                      Seguir los siguientes pasos:
                    </strong>
                  </span><br>
                  <span class="text-light">a. Compartir tus códigos Smash (ej: via WhatsApp) con algún amigo que también tenga cuenta registrada en MarsGame </span><br>
                  <span class="text-light">b. Tu amigo deberá ir a su cuenta y en la sección "Agregar código" ingresar el código</span><br>
                  <span class="text-light">c. Esa transacción se notificará a tu cuenta y deberás aceptarla, con ello estarás generando un punto Smash para cada usuario involucrado en la transacción. El beneficio es para ambos!</span><br>
                  <span class="text-light">d. Nota: Cada código Smash permite un solo uso, luego caduca. El primero que lo use, y sea aceptado, será el beneficiado.</span>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingSiete">
                <button class="accordion-button collapsed" style="background-color: transparent !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSiete" aria-expanded="false" aria-controls="collapseSiete">
                  Tengo puntos Smash sin haber adquirido ningún producto (ticket y/o suscripcion), ¿podre participar en los sorteos?
                </button>
              </h2>
              <div id="collapseSiete" class="accordion-collapse collapse" aria-labelledby="headingSiete" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <span class="text-light">
                    Al tener cuenta en MarsGame podrás ayudar a tus amigos a generar puntos Smash y por ende obtendran tambien podras obtener estos puntos, pero los sorteos son para participantes habilitados quienes hayan comprado al menos un ticket para el evento próximo y/o mantengan suscripción vigente.
                  </span>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOcho">
                <button class="accordion-button collapsed" style="background-color: transparent !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOcho" aria-expanded="false" aria-controls="collapseOcho">
                  ¿Cuantos ganadores habrán en los sorteos?
                </button>
              </h2>
              <div id="collapseOcho" class="accordion-collapse collapse" aria-labelledby="headingOcho" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <span class="text-light">
                    En cada evento resultaran 10 ganadores como mínimo y diferentes entre sí, osea ningún ganador podrá obtener más de un premio en un solo evento.
                  </span>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingNueve">
                <button class="accordion-button collapsed" style="background-color: transparent !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNueve" aria-expanded="false" aria-controls="collapseNueve">
                  En el listado de premios veo variedad de productos, ¿el ganador de cada puesto se lleva todo?
                </button>
              </h2>
              <div id="collapseNueve" class="accordion-collapse collapse" aria-labelledby="headingNueve" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <span class="text-light">
                    En MarsGame nos preocupamos por satisfacer a nuestros usuarios y por ello ofrecemos opciones para cada puesto. Para el evento venidero el primer ganador podrá elegir un producto de entre las opciones que corresponden al primer puesto, y así sucesivamente para cada puesto.
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<!-- Modal -->
<div class="modal fade" id="premios" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #2D2E83;">
        <h5 class="modal-title text-ligth" id="exampleModalToggleLabel">Premios Sorteo 16/12/2023</h5>
        <button type="button" class="btn-close" style="background-color:white;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="padding: 0;">
        <img src="{{asset('assets/img/premios.jpg')}}" width="100%" alt="">        
      </div>
    </div>
  </div>
</div>

  @include('layouts.footer')

  @include('layouts.noticanvas')

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{asset('assets/js/header.js')}}"></script>

<script>
  $(document).ready(function()
      {
        $('#premios').modal("show");
      });
  
</script>

<script>

    $(".btn_comprar").click(function (e) {
      e.preventDefault();
        var ele = $(this);
        var id = ele.attr("data-id");
        var name = ele.attr("data-name");
        var price = ele.attr("data-price");
        var quantity = ele.attr("data-quantity");
        var codigos = ele.attr("data-codigos");
        var mensual = ele.attr("data-mensual");
        var cantidad_meses = ele.attr("data-cantidadmeses");
        var product_id = ele.attr("data-productid");

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
              codigos: codigos,
              mensual: mensual,
              cantidadmeses: cantidad_meses,
              productid: product_id
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
                 if (response.status == true) {
                  // $('#carcount').val(response.count); Esto es para actualizar el contador del carrito
                 Swal.fire({
                     icon: 'success',
                     title: 'Éxito!',
                     text: response.msg,
                     allowOutsideClick: false,
                     confirmButtonText: "Ok",
                 })
                 .then(resultado => {
                  window.location.reload();
                 })
                 }
                 else{
                 Swal.fire({
                     icon: 'info',
                     title: 'Advertencia!',
                     text: response.msg,
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


