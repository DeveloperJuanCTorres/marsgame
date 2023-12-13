
  @extends('layouts.app')
@section('content')

@include('layouts.header')
@include('layouts.offcanvas')

<section class="py-8">
    <div class="container">
        <div class="heading-section">
            <h4 class="text-center">Libro de Reclamaciones</h4>
        </div>
        <div class="col-md-8">
            <div class="card p-2 bg-primary" style="border-radius: 20px !important;">
                
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')  
@include('layouts.noticanvas')

<script src="{{asset('vendor1/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/header.js')}}"></script>

@endsection
