@extends('layouts.app')

@section('content')
<style>

#checkout-progress {
  width: 90%;
  margin: 0px auto;
  font-size: 2.5em;
  font-weight: 900;
  position: relative;
}
@media (max-width: 767px) {
  #checkout-progress {
    font-size: 1.5em;
  }
}
#checkout-progress:before {
  content: "";
  position: absolute;
  left: 0;
  top: 50%;
  height: 10px;
  width: 100%;
  background-color: #ccc;
  -webkit-transform: translateY(-50%) perspective(1000px);
          transform: translateY(-50%) perspective(1000px);
}
#checkout-progress:after {
  content: "";
  position: absolute;
  left: 0;
  top: 50%;
  height: 10px;
  width: 100%;
  background-color: #2C3E50;
  -webkit-transform: scaleX(0) translateY(-50%) perspective(1000px);
          transform: scaleX(0) translateY(-50%) perspective(1000px);
  -webkit-transform-origin: left center;
          transform-origin: left center;
  transition: -webkit-transform 0.5s ease;
  transition: transform 0.5s ease;
  transition: transform 0.5s ease, -webkit-transform 0.5s ease;
}
#checkout-progress.step-2:after {
  -webkit-transform: scaleX(0.5) translateY(-50%) perspective(1000px);
          transform: scaleX(0.5) translateY(-50%) perspective(1000px);
}
#checkout-progress.step-3:after {
  -webkit-transform: scaleX(1) translateY(-50%) perspective(1000px);
          transform: scaleX(1) translateY(-50%) perspective(1000px);
}
#checkout-progress.step-4:after {
  -webkit-transform: scaleX(1) translateY(-50%) perspective(1000px);
          transform: scaleX(1) translateY(-50%) perspective(1000px);
}
#checkout-progress.step-5:after {
  -webkit-transform: scaleX(1) translateY(-50%) perspective(1000px);
          transform: scaleX(1) translateY(-50%) perspective(1000px);
}
#checkout-progress.step-6:after {
  -webkit-transform: scaleX(1) translateY(-50%) perspective(1000px);
          transform: scaleX(1) translateY(-50%) perspective(1000px);
}
#checkout-progress .progress-bar1 {
  width: 100%;
  display: flex;
  height: 100px;
  justify-content: space-between;
  align-items: center;
}
#checkout-progress .progress-bar1 .step {
  z-index: 2;
  position: relative;
}
#checkout-progress .progress-bar1 .step .step-label {
  position: absolute;
  top: calc(100% + 25px);
  left: 50%;
  -webkit-transform: translateX(-50%) perspective(1000px);
          transform: translateX(-50%) perspective(1000px);
  white-space: nowrap;
  font-size: 0.4em;
  font-weight: 600;
  color: #ccc;
  transition: 0.3s ease;
}
@media (max-width: 767px) {
  #checkout-progress .progress-bar1 .step .step-label {
    top: calc(100% + 15px);
  }
}
#checkout-progress .progress-bar1 .step span {
  color: #ccc;
  transition: 0.3s ease;
  /* display: block; */
  -webkit-transform: translate3d(0, 0, 0) scale(1) perspective(1000px);
          transform: translate3d(0, 0, 0) scale(1) perspective(1000px);
}
#checkout-progress .progress-bar1 .step .fa-check {
  color: #fff;
  position: absolute;
  left: 50%;
  top: 50%;
  transition: -webkit-transform 0.3s ease;
  transition: transform 0.3s ease;
  transition: transform 0.3s ease, -webkit-transform 0.3s ease;
  -webkit-transform: translate3d(-50%, -50%, 0) scale(0) perspective(1000px);
          transform: translate3d(-50%, -50%, 0) scale(0) perspective(1000px);
}
#checkout-progress .progress-bar1 .step.active span, #checkout-progress .progress-bar1 .step.active .step-label {
  color: #2C3E50;
}
#checkout-progress .progress-bar1 .step.valid .fa-check {
  -webkit-transform: translate3d(-50%, -50%, 0) scale(1) perspective(1000px);
          transform: translate3d(-50%, -50%, 0) scale(1) perspective(1000px);
}
#checkout-progress .progress-bar1 .step.valid span {
  color: #2C3E50;
  -webkit-transform: translate3d(0, 0, 0) scale(2) perspective(1000px);
          transform: translate3d(0, 0, 0) scale(2) perspective(1000px);
}
#checkout-progress .progress-bar1 .step.valid .step-label {
  color: #2C3E50 !important;
}
#checkout-progress .progress-bar1 .step:after {
  content: "";
  position: absolute;
  z-index: -1;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%) perspective(1000px);
          transform: translate(-50%, -50%) perspective(1000px);
  width: 50px;
  height: 50px;
  background-color: #fff;
  border-radius: 50%;
  border: 5px solid #ccc;
  transition: 0.3s ease;
}
@media (max-width: 767px) {
  #checkout-progress .progress-bar1 .step:after {
    width: 40px;
    height: 40px;
  }
}
#checkout-progress .progress-bar1 .step.active:after {
  border: 5px solid #2C3E50;
}
#checkout-progress .progress-bar1 .step.valid:after {
  background-color: #2C3E50;
  border: 5px solid #2C3E50;
}

.button-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  width: 100%;
  margin: 100px auto 0px;
}
.button-container .btn {
  display: inline-block;
  background-color: #2C3E50;
  color: #fff;
  padding: 10px 15px;
  border-radius: 10px;
  text-transform: uppercase;
  font-weight: 900;
  border: 3px solid #2C3E50;
  transition: 0.3s ease;
  cursor: pointer;
  text-align: center;
}
@media (max-width: 767px) {
  .button-container .btn {
    width: 100%;
    margin-bottom: 15px;
  }
}
.button-container .btn:hover {
  background-color: transparent;
  color: #2C3E50;
  -webkit-transform: scale(1.02) perspective(1000px);
          transform: scale(1.02) perspective(1000px);
}


/* siguiente */


</style>
@push('izipay')
        <!-- Javascript library. Should be loaded in head section -->
        <script
        src="https://static.micuentaweb.pe/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js"
        kr-public-key="56249706:publickey_sXXZLrJ0sFXul61ndNcBJxzcj3DriaMFBKgXa1VW0BQVw"
        kr-post-url-success="{{route('pasarelapagos')}}">
        </script>
        <!-- theme and plugins. should be loaded after the javascript library -->
        <!-- not mandatory but helps to have a nice payment form out of the box -->
        <link rel="stylesheet" href="https://static.micuentaweb.pe/static/js/krypton-client/V4.0/ext/classic-reset.css">
        <script src="https://static.micuentaweb.pe/static/js/krypton-client/V4.0/ext/classic.js"></script>
    @endpush
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
  @include('layouts.header1')
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content m-0">

          <!-- ***** Gaming Library Start ***** -->

            <h1 class="title text-center pt-8"> Carrito de compras</h1>
            <!-- multistep form -->

            @if (Cart::getContent()->count() > 0)
            <div class="step-1" id="checkout-progress" data-current-step="1">
                <div class="progress-bar1">
                    <div class="step step-1 active"><span> 1</span>
                    <div class="fa fa-check opaque"></div>
                    <div class="step-label"> Checkout</div>
                    </div>
                    <div class="step step-2"><span> 2</span>
                    <div class="fa fa-check opaque"></div>
                    <div class="step-label"> Datos de pago</div>
                    </div>
                    <!-- <div class="step step-3"><span> 3</span>
                    <div class="fa fa-check opaque"></div>
                    <div class="step-label"> Confirmación</div>
                    </div> -->
                    <div class="step step-4"><span> 3</span>
                    <div class="fa fa-check opaque"></div>
                    <div class="step-label"> Pagar</div>
                    </div>

                </div>
            </div>

            <section id="section1" class="section1" style="display:block;">
                <div class="row pt-0">
                    <div class="col-xl-8 col-md-12 col-sm-12" style="overflow-x:auto;">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col"></th>
                                <th style="color: #00983A;font-weight: bold;" scope="col">Producto</th>
                                <th style="color: #00983A;font-weight: bold;" class="text-center" scope="col">Precio</th>
                                <th style="color: #00983A;font-weight: bold;" class="text-center" scope="col">Cantidad</th>
                                <th style="color: #00983A;font-weight: bold;" class="text-center" scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::getContent() as $item)
                                <tr>
                                <th class="text-ligth" scope="row">
                                    <img style="border-radius: 15px;" src="{{asset('assets/img/illustrations/imagentest.jpg')}}" width="100" alt="">
                                </th>
                                <td style="vertical-align: middle;" class="text-ligth">{{$item->name}}</td>
                                <td style="vertical-align: middle;" class="text-ligth text-center">{{$item->price}}</td>
                                <td style="vertical-align: middle;" class="table-min">
                                  <div class="input-group">
                                    <input class="btn btn-secondary p-2 restar1" data-id="{{$item->name}}" type="button" value="-" style="width: 50px;"
                                        onclick="document.getElementById('{{$item->name}}').value = parseInt(document.getElementById('{{$item->name}}').value) - 1">
                                    <input style="width: 10px;" type="text" class="form-control p-2 text-center" id="{{$item->name}}" placeholder="" value="{{$item->quantity}}" disabled>
                                    <input class="btn btn-secondary p-2 sumar1" data-id="{{$item->name}}" type="button" value="+" style="width: 50px;"
                                        onclick="document.getElementById('{{$item->name}}').value = parseInt(document.getElementById('{{$item->name}}').value) + 1">
                                  </div>
                                </td>
                                <!-- <td style="vertical-align: middle;" class="text-ligth text-center">$item->quantity</td> -->
                                <td style="vertical-align: middle;" class="text-ligth text-center">
                                    <button type="submit" class="btn btn-secondary" style="background-color: transparent !important;">
                                        <i class="fa fa-trash" style="color: white;"> </i>
                                    </button>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form method="GET" action="{{ route('cart.create') }}">
                            <button type="submit" class="btn btn-secondary" style="background-color: transparent !important;">
                            <i class="fa fa-trash mx-2" style="color: white;"> </i> Limpiar carrito</button>
                        </form>
                    </div>
                    <div class="col-xl-4 col-md-6 col-sm-12 p-4">
                        <div class="card p-2 bg-primary" style="border-radius: 20px !important;">
                            <h3 class="text-center my-4">Resumen del pedido</h3>
                            <table class="table py-4">
                                <tbody>
                                    <tr>
                                    <th scope="row"><h5>Subtotal:</h5></th>
                                      <td>
                                        <h5>S/
                                          <input class="input-none" type="text" id="subtotal" value="{{Cart::getSubTotal()}}">
                                        </h5>
                                      </td>
                                      </tr>
                                      <tr>
                                      <th scope="row"><h5>Descuento:</h5></th>
                                      <td><h5>S/ 0.00</h5></td>
                                      </tr>
                                      <tr>
                                      <th scope="row"><h4>Total</h4></th>
                                      <td>
                                        <h4>S/
                                          <input class="input-none" type="text" id="total" value="{{Cart::getTotal()}}">
                                        </h4>
                                      </td>
                                    </tr>
                            </tbody>
                            </table>
                            @if (Cart::getContent()->count() == 0)
                            <div class="btn btn-primary my-4 d-block"> Siguiente</div>
                            @else
                            <div class="btn btn-primary my-4 btn-next d-block"> Siguiente</div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            <section id="section2" class="section2" style="display:none;">
              <div class="row pt-0">
                <div class="col-xl-6 col-md-6 col-sm-12 p-4">
                  <div class="card p-2 bg-primary" style="border-radius: 15px !important;">
                    <h4 class="p-2 text-center">Datos Personales</h4>
                    <div class="input-group mb-3">
                      <span style="background-color: #1d243d;color: #00983A" class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                      <input style="background-color: transparent;color: white;" type="text" class="form-control" value="{{Auth::user()->name}} {{Auth::user()->last_name}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                      <span style="background-color: #1d243d;color: #00983A" class="input-group-text" id="inputGroup-sizing-default">Email</span>
                      <input style="background-color: transparent;color: white;" type="text" class="form-control" value="{{Auth::user()->email}}" disabled aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                      <span style="background-color: #1d243d;color: #00983A" class="input-group-text" id="inputGroup-sizing-default">Dirección</span>
                      <input style="background-color: transparent;color: white;" type="text" class="form-control" value="{{Auth::user()->direccion}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                      <span style="background-color: #1d243d;color: #00983A" class="input-group-text" id="inputGroup-sizing-default">Departamento</span>
                      <input type="hidden" id="depart" value="{{ Auth::user()->departamento }}">
                      <select style="background-color: transparent;color: white;" class="form-select" id="ubigeo_dep" name="departamento" value="{{ Auth::user()->departamento }}" required >
                        
                      </select>
                    </div>
                    <div class="input-group mb-3">
                      <span style="background-color: #1d243d;color: #00983A" class="input-group-text" id="inputGroup-sizing-default">Provincia</span>
                      <input type="hidden" id="prov" value="{{ Auth::user()->provincia }}">
                      <select style="background-color: transparent;color: white;" class="form-select" id="ubigeo_pro" name="provincia" value="{{ Auth::user()->departamento }}" required >
                        
                      </select>
                    </div>
                    <div class="input-group mb-3">
                      <span style="background-color: #1d243d;color: #00983A" class="input-group-text" id="inputGroup-sizing-default">Distrito</span>
                      <input type="hidden" id="dist" value="{{ Auth::user()->distrito }}">
                      <select style="background-color: transparent;color: white;" class="form-select" id="ubigeo_dis" name="distrito" value="{{ Auth::user()->departamento }}" required >
                        
                      </select>
                    </div>
                    <div class="btn btn-primary my-4 btn-next d-block"> Siguiente</div>
                  </div>                  
                </div>
                <div class="col-xl-6 col-md-12 col-sm-12" style="overflow-x:auto;">
                <h4 class="text-center pt-2">Resumen de tu Compra</h4>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th style="color: #00983A;font-weight: bold;" scope="col">Producto</th>
                            <th style="color: #00983A;font-weight: bold;" class="text-center" scope="col">Precio</th>
                            <th style="color: #00983A;font-weight: bold;" class="text-center" scope="col">Cantidad</th>
                            <th style="color: #00983A;font-weight: bold;" class="text-center" scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::getContent() as $item)
                            <tr>
                            <th class="text-ligth" scope="row">
                                <img style="border-radius: 15px;" src="{{asset('assets/img/illustrations/imagentest.jpg')}}" width="100" alt="">
                            </th>
                            <td style="vertical-align: middle;" class="text-ligth">{{$item->name}}</td>
                            <td style="vertical-align: middle;" class="text-ligth text-center">S/. {{$item->price}}</td>
                            <td style="vertical-align: middle;" class="text-ligth text-center">{{$item->quantity}}</td>
                            <td style="vertical-align: middle;" class="text-ligth text-center">S/. {{$item->price*$item->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfooter>
                            <tr>
                              <th colspan="4" style="vertical-align: middle;"><h5 class="text-center">Total</h5></th>
                              <th style="vertical-align: middle;"><h5 class="text-center">S/. {{Cart::getTotal()}}</h5></th>
                            </tr>
                        </tfooter>
                    </table>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" checked name="terminos" id="terminos" value="terminos" disabled>
                        <label class="form-check-label text-ligth" for="terminos">
                          Al pagar estas aceptando los <a target="_blank" href="/terminos">Términos & Condiciones</a>
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" checked name="politicas" id="politicas" value="politicas" disabled>
                        <label class="form-check-label text-ligth" for="politicas">
                          Al pagar estas aceptando las <a target="_blank" href="/politicas">Políticas de Seguridad</a>
                        </label>
                      </div>
                    </div>                    
                </div>
              </div>
                
            </section>

            <section id="section3" class="section3" style="display:none;">
              <div class="row pt-0">
                <div class="col-xl-4 col-md-6 col-sm-12 p-4">
                  @if(isset($formToken))
                  <div class="card p-2" id="pasarela" style="border-radius: 10px !important;background-color: #FF4240;">
                    <div class="d-block mx-auto p-2">
                      <img src="{{asset('assets/img/gallery/izipay.png')}}" width="200" alt="">
                    </div>
                      <!-- payment form -->
                      <div class="kr-embedded"  kr-form-token="{{$formToken}}" style="width:100%">
                          <!-- payment form fields -->
                          <div class="kr-pan"></div>
                          <div class="kr-expiry"></div>
                          <div class="kr-security-code"></div>
                          <!-- payment form submit button -->
                          <button class="kr-payment-button"></button>
                          <!-- error zone -->
                          <div class="kr-form-error"></div>
                      </div>
                    </div>
                  @else
                      <h3>Error</h3>
                  @endif
                  @if ($saldo >= Cart::getTotal())
                  <button id="botonPagarSaldo" class="btn btn-primary btn-pagar" style="width: 200px; background-color: transparent !important;color: white !important;display: none;"> Pagar (Saldo: S/. {{$saldo}})</button>
                  <div class="form-check p-2" style="margin-left: 15px;">
                    <input class="form-check-input" type="checkbox" value="" id="check" onchange="javascript:PagarSaldo()">
                    <label class="form-check-label text-light" for="flexCheckDefault">
                      Usar mi saldo disponible
                    </label>
                  </div>
                  @endif
                </div>
                <div class="col-xl-8 col-md-12 col-sm-12" style="overflow-x:auto;">
                <h4 class="text-center pt-2">Resumen de tu Compra</h4>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th style="color: #00983A;font-weight: bold;" scope="col">Producto</th>
                            <th style="color: #00983A;font-weight: bold;" class="text-center" scope="col">Precio</th>
                            <th style="color: #00983A;font-weight: bold;" class="text-center" scope="col">Cantidad</th>
                            <th style="color: #00983A;font-weight: bold;" class="text-center" scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::getContent() as $item)
                            <tr>
                            <th class="text-ligth" scope="row">
                                <img style="border-radius: 15px;" src="{{asset('assets/img/illustrations/imagentest.jpg')}}" width="100" alt="">
                            </th>
                            <td style="vertical-align: middle;" class="text-ligth">{{$item->name}}</td>
                            <td style="vertical-align: middle;" class="text-ligth text-center">S/. {{$item->price}}</td>
                            <td style="vertical-align: middle;" class="text-ligth text-center">{{$item->quantity}}</td>
                            <td style="vertical-align: middle;" class="text-ligth text-center">S/. {{$item->price*$item->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfooter>
                            <tr>
                              <th colspan="4" style="vertical-align: middle;"><h5 class="text-center">Total</h5></th>
                              <th style="vertical-align: middle;"><h5 class="text-center">S/. {{Cart::getTotal()}}</h5></th>
                            </tr>
                        </tfooter>
                    </table>
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" checked name="terminos1" id="terminos1" value="terminos1" disabled>
                        <label class="form-check-label text-ligth" for="terminos1">
                          Al pagar estas aceptando los <a target="_blank" href="/terminos">Términos & Condiciones</a>
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" checked name="politicas1" id="politicas1" value="politicas1" disabled>
                        <label class="form-check-label text-ligth" for="politicas1">
                          Al pagar estas aceptando las <a target="_blank" href="/politicas">Políticas de Seguridad</a>
                        </label>
                      </div>
                    </div>
                </div>
              </div>
            <!-- <button type="button" id="btn_pagar" class="btn1 btn-gradient mt-2 padding-left-0 btn_comprar">Comprar</button> -->
                <!-- <button class="btn btn-secondary btn-submit" id="btn_participar" style="background-color: transparent !important;display:none;">
                    Pagar
                </button> -->
                <!-- <div class="btn btn-submit" style="display:none;">Submit</div> -->
            </section>
            <section id="section4" class="section4" style="display:none;">
                section4
            </section>
            <!-- <div class="button-container">
            <div class="btn btn-prev disabled"> previous step</div>
            <div class="btn btn-next"> next step</div>
            <div class="btn btn-submit" style="display:none;">Submit</div>
            </div> -->
            @else
            <div>
                <img src="{{asset('assets/img/illustrations/carritocompras.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="200" alt="">
                <h4 class="p-2 text-center text-ligth">No hay compras por aquí</h4>
                <p class="text-ligth text-center" style="font-size: 16px;">Todavía no tienes ningún artículo dentro de tu carrito de compras</p>
            </div>
            @endif

          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>


  @include('layouts.footer')

      @include('layouts.offcanvas')
      @include('layouts.noticanvas')

      <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.6/tailwind.min.css">
      <script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets1/js/owl-carousel.js')}}"></script>
    <script src="{{asset('assets1/js/tabs.js')}}"></script>
    <script src="{{asset('assets1/js/popup.js')}}"></script>
    <script src="{{asset('assets1/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/ubigeo.js')}}"></script>
  <script src="{{asset('assets/js/selectubigeo1.js')}}"></script>
    <script src="https://checkout.culqi.com/js/v4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Culqi.publicKey = 'pk_test_ecfa72b4b25716be';
    </script>

    <script src="https://use.fontawesome.com/83fc84333f.js"></script>
    <script src="{{asset('assets/js/header.js')}}"></script>

    <script type="text/javascript">
        function PagarSaldo() {
            element = document.getElementById("pasarela");
            boton = document.getElementById("botonPagarSaldo");
            check = document.getElementById("check");
            if (check.checked) {
                element.style.display='none';
                boton.style.display='block';
            }
            else {
                element.style.display='block';
                boton.style.display='none';
            }
        }
    </script>

    <script>
      $('.btn-pagar').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            url: "/pagarsaldo",
            method: "post",
						dataType: 'json',
						data: {
							_token: $('meta[name="csrf-token"]').attr('content')
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
                     icon: 'error',
                     title: 'Error',
                     text: response.msg,
                 })
                }
                
             },
            error: function (response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...!!',
                    text: 'Algo ocurrió, por favor inténtelo más tarde!',
                  })
            }
        });
       
      });

        $('.btn-next').on('click', function() {

            var currentStepNum = $('#checkout-progress').data('current-step');
            var nextStepNum = (currentStepNum + 1);
            var currentStep = $('.step.step-' + currentStepNum);
            var nextStep = $('.step.step-' + nextStepNum);
            var progressBar = $('#checkout-progress');
            $('.btn-prev').removeClass('disabled');
            $('#section'+currentStepNum).toggle();
            $('#section'+nextStepNum).toggle();
            if(nextStepNum == 3) {
                $(this).toggle();
                $('.btn-submit').toggle();
            }
            /*if(nextStepNum == 5){
                $(this).addClass('disabled');
            }*/
            $('.checkout-progress').removeClass('.step-' + currentStepNum).addClass('.step-' + (currentStepNum + 1));

            currentStep.removeClass('active').addClass('valid');
            currentStep.find('span').addClass('opaque');
            currentStep.find('.fa.fa-check').removeClass('opaque');

            nextStep.addClass('active');
            progressBar.removeAttr('class').addClass('step-' + nextStepNum).data('current-step', nextStepNum);
        });

        $('.btn-submit').on('click',function(){
            $('.btn-submit').toggle('disabled');
            $('.btn-prev').toggle();
            var currentStepNum = $('#checkout-progress').data('current-step');
            var currentStep = $('.step.step-' + currentStepNum);
            currentStep.removeClass('active').addClass('valid');
            currentStep.find('.fa.fa-check').removeClass('opaque');
        });

        $('.btn-prev').on('click', function() {

            var currentStepNum = $('#checkout-progress').data('current-step');
            var prevStepNum = (currentStepNum - 1);
            var currentStep = $('.step.step-' + currentStepNum);
            var prevStep = $('.step.step-' + prevStepNum);
            var progressBar = $('#checkout-progress');
            $('.btn-next').removeClass('disabled');
            $('#section'+currentStepNum).toggle();
            $('#section'+prevStepNum).toggle();
            if(currentStepNum == 3  ){
                $('.btn-submit').toggle();
                $('.btn-next').toggle();
            }
            if(currentStepNum == 1) {
                return false;
            }
            if(prevStepNum == 1){
                $(this).addClass('disabled');
            }
            $('.checkout-progress').removeClass('.step-' + currentStepNum).addClass('.step-' + (prevStepNum));

            currentStep.removeClass('active');
            prevStep.find('span').removeClass('opaque');
            prevStep.find('.fa.fa-check').addClass('opaque');

            prevStep.addClass('active').removeClass('valid');
            progressBar.removeAttr('class').addClass('step-' + prevStepNum).data('current-step', prevStepNum);
        });

    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const btn_participar = document.getElementById('btn_participar');


        btn_participar.addEventListener('click', function (e){
            var formData = new FormData();
            var id = $("#id").val();

            formData.append('id',id);
            console.log(formData);
            $.ajax({
                url: "/participar",
                type: "POST",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: formData,
                contentType: false,
                processData: false,
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
                //cambiar gracias por tu compra Swal
                    // window.location.href = "/";
                    if (response.status) {
                    Swal.fire({
                        icon: 'success',
                        title: response.msg,
                        text: "Participación realizada con exito",
                        allowOutsideClick: false,
                        confirmButtonText: "Ok",
                    })
                    .then(resultado => {
                        window.location.href = "/";
                    })
                    }
                    else{
                    Swal.fire({
                        icon: 'error',
                        title: response.msg,
                        text: response.msg,
                    })
                    }

                },
                error: function (response) {
                Swal.fire({
                    icon: 'error',
                    title: "Upps, sucedio un error",
                    text: response.msg,
                })
                }
            });
        })
    </script>
  @endsection
