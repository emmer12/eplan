<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="E-planning">
    <meta name="author" content="Emmanuel Taiwo" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#007478">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="{{ asset('css/semantic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nivo-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/preview.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/richtext.min.css') }}" rel="stylesheet"> --}}
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery-1.12.0.min.js') }}"></script>

</head>
<body>
    <div id="app">



      <!-- particles.js container -->

      @include('inc/nav')


        @yield('content')


        @include('inc/footer')

      <div class="overlay">

      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/semantic.js') }}"></script>
    <script src="{{ asset('js/jquery.nivo.slider.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.init.min.js') }}"></script>
    <script src="{{ asset('js/dropify.js') }}"></script>
    {{-- <script src="{{ asset('js/mustache.js') }}"></script> --}}
    <script src="{{ asset('js/venobox.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.richtext.js') }}"></script> --}}
    <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
