@extends('layouts.app')

@section('content')
<div class="container py-8">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white">Registrarme</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Nombres</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="apellidos" class="col-md-2 col-form-label text-md-end">Apellidos</label>

                            <div class="col-md-4">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipodoc" class="col-md-2 col-form-label text-md-end">Tipo documento</label>

                            <div class="col-md-4">
                                <select class="form-control @error('tipodoc') is-invalid @enderror" name="tipodoc" id="tipodoc" value="{{ old('tipodoc') }}" required>
                                    <option value="1">DNI</option>
                                    <option value="2">PASAPORTE</option>
                                    <option value="2">CARNET DE EXTRANJERÍA</option>
                                </select>

                                @error('tipodoc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="nrodoc" class="col-md-2 col-form-label text-md-end">Número Documento</label>

                            <div class="col-md-4">
                                <input id="nrodoc" type="number" class="form-control @error('nrodoc') is-invalid @enderror" name="nrodoc" value="{{ old('nrodoc') }}" required>

                                @error('nrodoc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="direccion" class="col-md-2 col-form-label text-md-end">Dirección</label>

                            <div class="col-md-10">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2"></div>
                            <div class="col-md-3 mb-3">
                                <select class="form-control @error('departamento') is-invalid @enderror" name="departamento" id="departamento" value="{{ old('departamento') }}" required>
                                    <option value="0">Departamento</option>
                                </select>

                                @error('departamento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <select class="form-control @error('provincia') is-invalid @enderror" name="provincia" id="provincia" value="{{ old('provincia') }}" required>
                                    <option value="0">Provincia</option>
                                </select>

                                @error('provincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <select class="form-control @error('distrito') is-invalid @enderror" name="distrito" id="distrito" value="{{ old('distrito') }}" required>
                                    <option value="0">Distrito</option>
                                </select>

                                @error('distrito')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-form-label text-md-end">Fecha Nacimiento</label>
                            <div class="col-md-3 mb-3">
                                <input placeholder="Día" id="dia" type="number" class="form-control @error('dia') is-invalid @enderror" name="dia" value="{{ old('dia') }}" required>

                                @error('dia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <select class="form-control @error('provincia') is-invalid @enderror" name="provincia" id="provincia" value="{{ old('provincia') }}" required>
                                    <option value="0">Mes</option>
                                    <option value="1">Enero</option>
                                    <option value="2">febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">MAyo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>

                                @error('provincia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <input placeholder="Año" id="anio" type="number" class="form-control @error('anio') is-invalid @enderror" name="anio" value="{{ old('anio') }}" required>

                                @error('anio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
