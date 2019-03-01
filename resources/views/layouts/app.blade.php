<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Withus{Dev} is a techcompany focus on web development solutios for both start up business and well established business">
    <meta name="author" content="Emmanuel Taiwo" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/semantic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <!-- particles.js container -->
      <div id="particles-js">
        <div class="nav-container">
             <div class="container">
               <div class="row">
                 <div class="col-md-3">
                   <div class="logo">
                     <img src="/images/logo/withusdev-logo.png" alt="">
                   </div>
                 </div>
                 <div class="col-md-9">
                   <ul class="nav-main pull-right">
                     <li><a href="/">Home</a></li>
                     <li><a href="#">Blog</a></li>
                     <li><a href="#">About Us</a></li>
                     <li><a href="#">Contact</a></li>
                     <li><a href="#">Our Work<a></li>
                    </ul>
                 </div>
               </div>
             </div>

            <div class="banner-content">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="abt wow fadeInUp">
                     <h1>App Development </h1><br>
                     <p>Do you have a project you want's to discuss with us?</p>
                     <div class="ui buttons">
                       <div class="ui button orange"> <a href="#" style="color:inherit"> Get Started</div>
                       <div class="ui button inverted orange">Contact Us</div>
                     </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <img class="wow zoomIn" src="/images/banner/slide1.png" alt="" width="100%">
                  </div>
                </div>
              </div>

            </div>
        </div>
      </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-1.12.3.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/particles.js') }}"></script>
    <script src="{{ asset('js/particle.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
