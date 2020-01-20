@extends('layouts.app')

@section('content')
    <header class="header header-inverse  pb-80" style="background-image: url({{asset('storage/').'/'.$series->image_url}});" data-overlay="8">
      <div class="container text-center">

        <div class="row h-full">
          <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

          <h1 class="display-4 hidden-sm-down">{{$lesson->title}}</h1>
            <h1 class="hidden-md-up">{{$lesson->title}}</h1>
            <br>
          <p class="lead text-white fs-20 hidden-sm-down"><span class="fw-400">Series:</span>  {{$series->title}}</p>

          </div>

          

        </div>

      </div>
    </header>
@endsection