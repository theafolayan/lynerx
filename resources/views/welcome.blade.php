@extends('layouts.app')

@section('header')

<header class="header fadeout header-inverse pb-80 h-fullscreen" style="background-image: url('https://images.unsplash.com/photo-1497091071254-cc9b2ba7c48a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=753&q=80' );">
    <canvas class="constellation"></canvas>

    <div class="container">
      <div class="row h-full">
        <div class="col-12 text-center align-self-center">
          {{-- <h1 class="fs-50 fw-600 lh-15 hidden-sm-down">Built for <span class="text-primary" data-type="Authors, Startups, Entrepreneurs, SaaS, WebApps"></span></h1>
          <h1 class="fs-35 fw-600 lh-15 hidden-md-up">Built for<br><span class="text-primary" data-type="Authors, Startups, Entrepreneurs, SaaS, WebApps"></span></h1> --}}
          <br>
          <p class="fs-20 hidden-sm-down"><strong>Lynerx</strong> is an elegant, subscription based SaaS platform built with Laravel 6 and Vue.js 2.6.2</p>
          <p class="fs-16 hidden-md-up"><strong>Lynerx </strong> is the E-Learning Platform You need</p>
          <br>
          <hr class="w-60 hidden-sm-down">
          <br>
          <a class="btn btn-xl btn-round btn-primary fs-20 fw-500 w-350 shadow-3 hidden-sm-down" href="{{route('register')}}">Sign Up Now</a>
        <a class="btn btn-lg btn-round btn-warning w-250 shadow-3 hidden-md-up" href="{{route('register')}}">Sign Up Now</a>
          <br>
          </div>

        <div class="col-12 align-self-end text-center pb-70">
          <a class="scroll-down-2 scroll-down-inverse" href="#" data-scrollto="section-demo"><span></span></a>
        </div>
      </div>
    </div>
  </header>
  <!-- END Header -->




  <!-- Main container -->
 
    
@endsection