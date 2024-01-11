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
        kr-post-url-success="{{route('pasareladeposito')}}">
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

            <h1 class="title text-center pt-6"> Depósito MarsGame</h1>
            <!-- multistep form -->

            <div class="row pt-4">
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
                  <div class="p-2" id="pasarela1">
                    <h4>Recordatorio:</h4>
                    <span class="text-light">Para realizar pagos con tarjeta debes tener habilitado la opción de pagos online de tu tarjeta</span><br>
                    <span style="color: #00983A;">"Contactar a soporte para consultar o validar el pago"</span>
                  </div>
                  
                  <div class="p-2" id="billeteradigital" style="display: none;">
                    <h4>Recordatorio:</h4>
                    <span class="text-light">Para realizar pagos con YAPE o PLIN deberas adjuntar tu vaucher de pago, recuerda que esta modalidad tiene un plazo maximo de 24 horas para validar tu pago</span><br>
                    <span style="color: #00983A;">"Contactar a soporte para consultar o validar el pago WhatsApp: 978461095"</span>
                  </div>
                  <div class="form-check p-2" style="margin-left: 15px;">
                    <input class="form-check-input" type="checkbox" value="" id="yape" onchange="javascript:PagarYape()">
                    <label class="form-check-label text-light" for="flexCheckDefault">
                      Pagar con YAPE
                    </label>
                    <label class="form-check-label text-light p-2" id="LabelYape" style="display: none;">
                      978461095
                    </label>
                    <img src="{{asset('assets/img/yapemarsgame.jpeg')}}" id="ImagenYape" alt="yapemarsgame" style="width: 250px;background-color: transparent !important;color: white !important;display: none;text-align: center;">
                    <div name="DivYape" id="DivYape" style="display: none;">
                      <input type="file" name="fileyape" id="fileyape" class="form-control p-2 mt-2">
                      <input type="text" id="monto-yape" value="{{$monto}}" style="display: none;">
                      <div class="row container py-2 justify-content-center">
                        <button class="btn1 text-center btn-pagar-yape" style="background-color: #00983A;">Pagar</button>
                      </div>
                    </div>
                  </div>
                  <div class="form-check p-2" style="margin-left: 15px;">
                    <input class="form-check-input" type="checkbox" value="" id="plin" onchange="javascript:PagarPlin()">
                    <label class="form-check-label text-light" for="flexCheckDefault">
                      Pagar con PLIN
                    </label>
                    <label class="form-check-label text-light p-2" id="LabelPlin" style="display: none;">
                      978461095
                    </label>
                    <img src="{{asset('assets/img/plinmarsgame.jpeg')}}" id="ImagenPlin" alt="plinmarsgame" style="width: 250px;background-color: transparent !important;color: white !important;display: none;text-align: center;">
                    <div name="DivPlin" id="DivPlin" style="display: none;">
                      <input type="file" name="fileplin" id="fileplin" class="form-control p-2 mt-2">
                      <input type="text" id="monto-plin" value="{{$monto}}" style="display: none;">
                      <div class="row container py-2 justify-content-center">
                        <button class="btn1 text-center btn-pagar-plin" style="background-color: #00983A;">Pagar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-8 col-md-12 col-sm-12" style="overflow-x:auto;">
                <h4 class="text-center pt-4">Resumen de tu Compra</h4>
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
                            <tr>
                            <th class="text-ligth" scope="row">
                                <img style="border-radius: 15px;" src="{{asset('assets/img/illustrations/imagentest.jpg')}}" width="100" alt="">
                            </th>
                            <td style="vertical-align: middle;" class="text-ligth">Depósito</td>
                            <td style="vertical-align: middle;" class="text-ligth text-center">S/. {{$monto}}</td>
                            <td style="vertical-align: middle;" class="text-ligth text-center">1</td>
                            <td style="vertical-align: middle;" class="text-ligth text-center">S/. {{$monto}}</td>
                            </tr>
                        </tbody>
                        <tfooter>
                            <tr>
                              <th colspan="4" style="vertical-align: middle;"><h5 class="text-center">Total</h5></th>
                              <th style="vertical-align: middle;"><h5 class="text-center">S/. {{$monto}}</h5></th>
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
       
            <!-- <div>
                <img src="{{asset('assets/img/illustrations/carritocompras.png')}}" style="display: block;margin-left: auto;margin-right: auto;" width="200" alt="">
                <h4 class="p-2 text-center text-ligth">No hay compras por aquí</h4>
                <p class="text-ligth text-center" style="font-size: 16px;">Todavía no tienes ningún artículo dentro de tu carrito de compras</p>
            </div> -->
       

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
        function PagarYape() {
            pasarela = document.getElementById("pasarela");
            imagenyape = document.getElementById("ImagenYape");
            imagenplin = document.getElementById("ImagenPlin");
            labelyape = document.getElementById("LabelYape");
            labelplin = document.getElementById("LabelPlin");
            divyape = document.getElementById("DivYape");
            divplin = document.getElementById("DivPlin");
            boton = document.getElementById("botonPagarSaldo");
            pasarela1 = document.getElementById("pasarela1");
            billeteradigital = document.getElementById("billeteradigital");
            yape = document.getElementById("yape");
            check = document.getElementById("check");
            plin = document.getElementById("plin");
            if (yape.checked) {
                pasarela.style.display='none';
                imagenplin.style.display='none';
                divyape.style.display='block';
                divplin.style.display='none';
                billeteradigital.style.display="block";
                pasarela1.style.display="none";
                labelyape.style.display='block';
                labelplin.style.display='none';
                imagenyape.style.display='block';
                
                
                plin.checked=false;
                check.checked=false;
                boton.style.display='none';
            }
            else {
                pasarela.style.display='block';
                imagenyape.style.display='none';
                imagenplin.style.display='none';
                billeteradigital.style.display="none";
                pasarela1.style.display="block";
                
                labelyape.style.display='none';
                labelplin.style.display='none';
                divyape.style.display='none';
                boton.style.display='none';
            }
        }
    </script>

    <script type="text/javascript">
        function PagarPlin() {
            pasarela = document.getElementById("pasarela");
            imagenplin = document.getElementById("ImagenPlin");
            imagenyape = document.getElementById("ImagenYape");
            labelyape = document.getElementById("LabelYape");
            labelplin = document.getElementById("LabelPlin");
            divyape = document.getElementById("DivYape");
            divplin = document.getElementById("DivPlin");
            boton = document.getElementById("botonPagarSaldo");
            plin = document.getElementById("plin");
            yape = document.getElementById("yape");
            check = document.getElementById("check");
            if (plin.checked) {
              pasarela.style.display='none';
                imagenyape.style.display='none';
                labelyape.style.display='none';
                divyape.style.display='none';
                divplin.style.display='block';
                labelplin.style.display='block';
                imagenplin.style.display='block';
                billeteradigital.style.display="block";
                pasarela1.style.display="none";
                yape.checked=false;
                check.checked=false;
                boton.style.display='none';
                
            }
            else {
                pasarela.style.display='block';
                imagenyape.style.display='none';
                imagenplin.style.display='none';
                billeteradigital.style.display="none";
                pasarela1.style.display="block";
                
                labelyape.style.display='none';
                labelplin.style.display='none';
                divplin.style.display='none';
                boton.style.display='none';
            }
        }
    </script>

    <script>
      $('.btn-pagar-yape').on('click', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var monto = $("#monto-yape").val();
        var archivoyape = $("#fileyape").val();

        if(archivoyape == ''){
          Swal.fire({
              icon:'warning',
              text: 'Debes subir tu comprobante de pago',
          });
          return false;
        }else{
              const MAXIMO_TAMANIO_BYTES = 1000000;
              var archivoyape = $('#fileyape')[0].files[0];
              if (archivoyape.size > MAXIMO_TAMANIO_BYTES) {
                  Swal.fire({
                      icon:'warning',
                      text: 'El tamaño máximo de archivo es 1MB',
                  });
                  return false;
              }
          }

          formData.append('file',$('#fileyape')[0].files[0]);
          formData.append('monto',$('#monto-yape').val());
          console.log(monto);
        $.ajax({
            url: "/yape-deposito",
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
                 if (response.status) {
                 Swal.fire({
                     icon: 'success',
                     title: 'Éxito!',
                     text: response.msg,
                     allowOutsideClick: false,
                     confirmButtonText: "Ok",
                 })
                 .then(resultado => {
                  // window.location="/";
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
                    text: response.msg,
                  })
            }
        });
       
      });
    </script>

<script>
      $('.btn-pagar-plin').on('click', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var monto = $("#monto-plin").val();
        var archivoplin = $("#fileplin").val();

        if(archivoplin == ''){
          Swal.fire({
              icon:'warning',
              text: 'Debes subir tu comprobante de pago',
          });
          return false;
        }else{
              const MAXIMO_TAMANIO_BYTES = 1000000;
              var archivoplin = $('#fileplin')[0].files[0];
              if (archivoplin.size > MAXIMO_TAMANIO_BYTES) {
                  Swal.fire({
                      icon:'warning',
                      text: 'El tamaño máximo de archivo es 1MB',
                  });
                  return false;
              }
          }

          formData.append('file',$('#fileplin')[0].files[0]);
          formData.append('monto',$('#monto-plin').val());
          console.log(formData);
        $.ajax({
            url: "/plin-deposito",
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
                 if (response.status) {
                 Swal.fire({
                     icon: 'success',
                     title: 'Éxito!',
                     text: response.msg,
                     allowOutsideClick: false,
                     confirmButtonText: "Ok",
                 })
                 .then(resultado => {
                  // window.location="/";
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
                    text: response.msg,
                  })
            }
        });
       
      });
    </script>

    <script>

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
