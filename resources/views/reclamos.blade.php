
  @extends('layouts.app')
@section('content')

@include('layouts.header')
@include('layouts.offcanvas')

<section class="py-10">
    <div class="container">
        <div class="heading-section">
            <h4 class="text-center">Libro de Reclamaciones</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-6">
                <div class="card p-2 bg-primary" style="border-radius: 20px !important;">
                    <div class="container">
                        <span class="text-light">MARS INVESTMENTS S.A.C. ("MarsGame", en adelante), identificada con RUC N° 20611806401, con domicilio para estos efectos en Av. Los Nogales N° 251 Dpto. 1404 Cnd. Nuevo Nogales, distrito de El Agustino, provincia de Lima, departamento de Lima y país de Perú.
                            De conformidad con lo establecido en el Código de Protección al Consumidor - Ley N° 29571 y el Reglamento del Libro de Reclamaciones del Código de Protección del Consumidor - Decreto Supremo N° 011-2011-PCM, el Sitio Web cuenta con un Libro de Reclamaciones de naturaleza virtual.
                        </span>
                    </div>
                </div>

                <form method="POST" action="{{ route('enviar-reclamo') }}" name="form1" id="form1" class="box">
                @csrf
                <div class="card p-2 bg-primary my-4" style="border-radius: 20px !important;">
                    <div class="container">
                        <span class="text-light">
                            1. Datos de la persona que presenta la queja o reclamo
                        </span>
                    </div>
                    <div class="row container py-2 justify-content-center">
                        <div class="col-md-4 col-xl-4 my-2">
                            <label class="text-light" for="tipo_documento">Tipo Reclamo:</label>
                            <select class="form-control p-2" style="background-color: transparent;color: #00983A;" name="tipo" id="tipo">
                                <option value="0">Seleccionar</option>
                                <option value="queja">Queja</option>
                                <option value="reclamo">Reclamo</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-xl-4 my-2">
                            <label class="text-light" for="tipo_documento">Tipo Documento:</label>
                            <select class="form-control p-2" style="background-color: transparent;color: #00983A;" name="tipo_doc" id="tipo_doc">
                                <option value="0">Seleccionar</option>
                                <option value="DNI">DNI</option>
                                <option value="CARNET">Carnet Extranjería</option>
                                <option value="LIBRETA">Libreta Electoral</option>
                                <option value="PASAPORTE">Pasaporte</option>
                                <option value="OTROS">Otros</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-xl-4 my-2">
                            <label class="text-light" for="tipo_documento">Nro Documento:</label>
                            <input class="form-control p-2" id="nro_doc" name="nro_doc" style="background-color: transparent;color: #00983A;" type="number">
                        </div>
                        <div class="col-md-12 col-xl-12 my-2">
                            <label class="text-light" for="tipo_documento">Apellidos y Nombres completos:</label>
                            <input class="form-control p-2" id="nombre" name="nombre" style="background-color: transparent;color: #00983A;" type="text">
                        </div>
                        <div class="col-md-4 col-xl-4 my-2">
                            <label class="text-light" for="tipo_documento">Departamento:</label>
                            <select class="form-control p-2" id="ubigeo_dep" style="background-color: transparent;color: #00983A;" name="departamento" value="{{ old('departamento') }}" required>		
                                <option value="0">--Departamento--</option>	  
                            </select>
                        </div>
                        <div class="col-md-4 col-xl-4 my-2">
                            <label class="text-light" for="tipo_documento">Provincia:</label>
                            <select class="form-control p-2" id="ubigeo_pro" style="background-color: transparent;color: #00983A;" name="provincia" value="{{ old('provincia') }}" required>
                                <option value="0">--Provincia--</option>	
                            </select>
                        </div>
                        <div class="col-md-4 col-xl-4 my-2">
                            <label class="text-light" for="tipo_documento">Distrito:</label>
                            <select class="form-control p-2" id="ubigeo_dis" style="background-color: transparent;color: #00983A;" name="distrito" value="{{ old('distrito') }}" required>
                                <option value="0">--Distrito--</option>	
                            </select>
                        </div>
                        <div class="col-md-12 col-xl-12 my-2">
                            <label class="text-light" for="tipo_documento">Dirección:</label>
                            <input class="form-control p-2" id="direccion" name="direccion" style="background-color: transparent;color: #00983A;" type="text" required>
                        </div>
                        <div class="col-md-6 col-xl-6 my-2">
                            <label class="text-light" for="tipo_documento">Teléfono:</label>
                            <input class="form-control p-2" id="telefono" name="telefono" style="background-color: transparent;color: #00983A;" type="number" required>
                        </div>
                        <div class="col-md-6 col-xl-6 my-2">
                            <label class="text-light" for="tipo_documento">Correo:</label>
                            <input class="form-control p-2" id="email" name="email" style="background-color: transparent;color: #00983A;" type="email" required>
                        </div>
                        <p style="color: #00983A;">*En caso se trate de un menor de edad, se consignan los datos del apoderado.</p>
                    </div>
                </div>

                <div class="card p-2 bg-primary my-4" style="border-radius: 20px !important;">
                    <div class="container">
                        <span class="text-light">
                            2. Información general
                        </span>
                    </div>
                    <div class="row container py-2 justify-content-center">
                        <div class="col-md-12 col-xl-12 my-4">
                            <label class="text-light" for="orden">Orden de compra, Identificación del producto o servicio contratado:</label>
                            <input class="form-control p-2" id="orden" name="orden" style="background-color: transparent;color: #00983A;" type="text" required>
                        </div>
                        <div class="col-md-8 col-xl-8 my-2">
                            <label class="text-light" for="tipo_documento">Monto del producto o servicio contratado:</label>
                            <input class="form-control p-2" id="monto" name="monto" style="background-color: transparent;color: #00983A;" type="text">
                        </div>
                        <div class="col-md-4 col-xl-4 my-2">
                            <label class="text-light" for="tipo_documento">Moneda:</label>
                            <select class="form-control p-2" style="background-color: transparent;color: #00983A;" name="moneda" id="moneda">
                                <option value="0">Seleccionar</option>
                                <option value="1">Soles</option>
                                <option value="2">Dólares</option>
                            </select>
                        </div>
                        <div class="col-md-12 col-xl-12 my-2">
                            <label class="text-light" for="tipo_documento">Detalle del reclamo o queja:</label>
                            <textarea rows="2" class="form-control p-2" id="detalle" name="detalle" style="background-color: transparent;color: #00983A;" type="text"></textarea>
                        </div>
                        <div class="col-md-12 col-xl-12 my-2">
                            <label class="text-light" for="tipo_documento">Pedido:</label>
                            <textarea rows="4" class="form-control p-2" id="pedido" name="pedido" style="background-color: transparent;color: #00983A;" type="text"></textarea>
                        </div>
                        <div class="row justify-content-center">
                            <div class="mx-5 g-recaptcha" data-sitekey="6LdgFhopAAAAAFEizQmgWxRVgWhBKM6XCnNIf_lx"></div>
                        </div>
                    </div>
                </div>
                <div class="row container py-2 justify-content-center">
                    <button type="submit" class="btn1 text-center" style="background-color: #00983A;">Enviar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')  
@include('layouts.noticanvas')

<script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/header.js')}}"></script>

@endsection
