@extends('layouts.app')
@section('content')
    
    <header class="header header-inverse h-fullscreen pb-80" style="background-image: url({{asset('storage/').'/'.$series->image_url}});" data-overlay="8">
      <div class="container text-center">

        <div class="row h-full">
          <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

            <p class="opacity-70">News</p>
            <br>
          <h1 class="display-4 hidden-sm-down">{{$series->title}}</h1>
          <h1 class="hidden-md-up">{{$series->title}}</h1>
            <br><br>
            <p><span class="opacity-70 mr-8">By</span> <a class="text-white" href="#">Lynerx</a></p>
            <p><img class="rounded-circle w-40" src="assets/img/avatar/2.jpg" alt="Lynerx Logo"></p>

          </div>

          <div class="col-12 align-self-end text-center">
            <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-content"><span></span></a>
          </div>

        </div>

      </div>
    </header>

      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      |Series content
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section" id="section-content">
        <div class="container">

          <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
              
            <p class="lead"> {{$series->description}}</p>

              <hr class="w-100">

             
            </div>            
          </div>
        </div>
      </div>





     






@endsection