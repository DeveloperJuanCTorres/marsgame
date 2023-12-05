<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MarsGame') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <?php
        $version = '1993.4.1';
    ?>
    <link rel="stylesheet" href="{{asset('assets1/css/templatemo-cyborg-gaming.css')}}?v=<?php echo $version ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

    <link href="{{asset('assets/css/mystyles.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    
    <link href="{{asset('vendor/prism/prism.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <link href="{{asset('assets/css/theme.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <link href="{{asset('assets/css/user.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @stack('izipay')
    <!-- Scripts -->
    <!-- vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body>
   
        <!-- include('layouts.header') -->
        <main>
            @yield('content')
        </main>
        <!-- include('layouts.footer') -->
    <!-- </div> -->
    <!-- JavaScript Libraries -->

    <script src="{{asset('vendors/popper/popper.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/anchorjs/anchor.min.js')}}"></script>
    <script src="{{asset('vendors/is/is.min.js')}}"></script>
    <script src="{{asset('vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{asset('vendors/lodash/lodash.min.js')}}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{asset('vendors/prism/prism.js')}}"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <script src="{{asset('assets/js/mystyles.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.min.js"></script>
    <script src="{{asset('assets/js/login.js')}}"></script>
    <script src="{{asset('assets/js/ubigeo.js')}}"></script>
    <script src="{{asset('assets/js/ubigeo1.js')}}"></script>
    <script src="{{asset('assets/js/selectubigeo.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>

    <script src="{{asset('assets/js/culqi.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://checkout.culqi.com/js/v4"></script>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    @stack('script')

    <script src="https://checkout.culqi.com/js/v4"></script>
    <script>
        Culqi.publicKey = 'pk_test_ecfa72b4b25716be';
    </script>
</body>
</html>
