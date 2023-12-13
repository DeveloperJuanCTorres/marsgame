
  @extends('layouts.app')
@section('content')

@include('layouts.header')
@include('layouts.offcanvas')

<section class="py-8">
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
                                <option value="1">Queja</option>
                                <option value="2">Reclamo</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-xl-4 my-2">
                            <label class="text-light" for="tipo_documento">Tipo Documento:</label>
                            <select class="form-control p-2" style="background-color: transparent;color: #00983A;" name="tipo" id="tipo">
                                <option value="0">Seleccionar</option>
                                <option value="1">DNI</option>
                                <option value="2">Carnet Extranjería</option>
                                <option value="2">Libreta Electoral</option>
                                <option value="2">Pasaporte</option>
                                <option value="2">Otros</option>
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
                            <input class="form-control p-2" id="direccion" name="direccion" style="background-color: transparent;color: #00983A;" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')  
@include('layouts.noticanvas')

<script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/header.js')}}"></script>

@endsection
