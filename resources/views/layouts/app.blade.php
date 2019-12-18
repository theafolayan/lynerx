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
                <a class="topbar-brand" href="index.html">
                <img class="logo-default" src="{{asset('logo-dark.png')}}" alt="logo">
                  <img class="logo-inverse" src="{{asset('logo-dark.png')}}" alt="logo">
                </a>
              </div>
      
      
              <div class="topbar-right">
                <ul class="topbar-nav nav">
                  <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                 
      
                  <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">LOGIN</a>
                    
                  </li>
      
                
                </ul>
              </div>
      
            </div>
          </nav>
          @yield('header')
       
           <main class="main-content"> 
               @yield('content');
           </main>
           <vue-login> </vue-login>
    </div>
  
    <footer>
     
    <script src="{{asset('js/core.min.js')}}"></script>
    <script src="{{asset('js/thesaas.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    </footer>
</body>
</html>
