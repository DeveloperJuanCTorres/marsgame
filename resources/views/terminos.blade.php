@extends('layouts.app')
@section('content')

@include('layouts.header')
@include('layouts.offcanvas')

<section class="py-0">
    <div class="container">
        <div class="row align-items-center min-vh-100 py-8">
            <h3 class="text-center">{{$terminos->titulo}}</h3>
            <div class="col-md-3"></div>
            <div class="text-center col-md-6">
                <p class="text-ligth">{!!$terminos->body!!}</p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>

@include('layouts.footer')  
@include('layouts.noticanvas')

@endsection