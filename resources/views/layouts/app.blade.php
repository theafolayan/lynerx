<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/thesaas.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  
</head>
<body>
    <div id="app">
        

        <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
            <div class="container">
              
              <div class="topbar-left">
                <button class="topbar-toggler">&#9776;</button>
              <a class="topbar-brand" href="{{route('homepage')}}">
                <img class="logo-default" src="{{asset('logo-dark.png')}}" alt="logo">
                  <img class="logo-inverse" src="{{asset('logo-dark.png')}}" alt="logo">
                </a>
              </div>
      
      
              <div class="topbar-right">
                <ul class="topbar-nav nav">
                <li class="nav-item"><a class="nav-link active " href="{{route('homepage')}}">Home</a></li>
                 
                  @if (auth()->check())
                <li class="nav-item text-dark">Hey {{auth()->user()->name}}</li>
                <a class="nav-item" href="{{route('logout')}}" >LOGOUT</a>
                  
                  @else
                      <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">LOGIN</a>
                    
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="{{route('register')}}" >REGISTER</a>
                    
                  </li>
                  @endif
                  
      
                
                </ul>
              </div>
      
            </div>
          </nav>
          {{-- <vue-noty> </vue-noty> --}}
          @yield('header')
       
           <main class="main-content"> 
               @yield('content');
           </main>

           <vue-noty> </vue-noty>

           @if (!auth()->check())
               <vue-login> </vue-login>
           @endif
    </div>
  
   

      <footer class="site-footer py-90">

           <vue-noty> </vue-noty>
        <div class="container">
          <div class="row gap-y">
            <div class="col-12 col-md-5">
              <h6 class="heading-alt text-uppercase fs-14 mb-3"> <img class="logo-inverse" src="{{asset('logo-dark.png')}}" alt="logo"></h6>
              <p class="fs-13">Lynerx is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template; backed for entrepreneurs and powered by Bootstrap 4.</p>
              <br>
            <p class="text-light">Copyright © 2020 <a class="text-light" href="{{route('home')}}">Lynerx</a>. All rights reserved.</p>
            </div>

            <div class="col-12 col-md-2">
              <h6 class="heading-alt text-uppercase fs-14 mb-3">Company</h6>
              <div class="nav flex-column">
                <a class="nav-link" href="page-how-it-works.html">How It Works</a>
                <a class="nav-link" href="page-pricing.html">Pricing</a>
                <a class="nav-link" href="blog-grid.html">Blog</a>
                {{-- <a class="nav-link" href="page-about.html">About</a> --}}
                {{-- <a class="nav-link" href="page-privacy.html">Privacy Policy</a> --}}
              </div>
            </div>

            <div class="col-12 col-md-5">
              <h6 class="heading-alt text-uppercase fs-14 mb-3">Get Started</h6>
              <p class="fs-13">TheSaaS design is harmonious, clean and user friendly. Even though the template has a lot of content, it doesn’t looks messy and all files and code are well structured, commented and divided.</p>
              <br>
              <p>
                <a class="btn btn-sm btn-primary mr-10" href="page-demo.html">Take a test drive</a>
                <a class="btn btn-sm btn-secondary hidden-md-down" href="page-contact.html">EARN FROM COURSES</a>
              </p>
            </div>

          </div>
        </div>
      </footer>
     <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/thesaas.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
