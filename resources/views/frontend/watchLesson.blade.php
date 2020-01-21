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

    <section class=" section bg-grey">
        <div class="container">
          <div class="row gap-y text-center">
        <div class="col-12">

          <vue-player default_lesson ="{{$lesson}}"> 
          </vue-player>

          @if($lesson->getNextLesson())
            <a href="{{route('series.watch', ['series'=> $series->slug, 'lesson'=> $lesson->getNextLesson()->id])}}" class="btn btn-info">Next Lesson</a>
          @endif

          @if($lesson->getPreviousLesson())
            <a href="{{route('series.watch', ['series'=> $series->slug, 'lesson'=> $lesson->getPreviousLesson()->id])}}" class="btn btn-info">Previous Lesson</a>
          @endif 
            

        </div>
        <div class="col-12">
          <ul class="list-group">
            @foreach ($series->getOrderedLessons() as $l)
          <li class="list-group-item"> <a href="{{route('series.watch', ['lesson'=>$l->id, 'series'=> $series->slug])}}">{{$l->title}}</a></li>
            @endforeach
          </ul>
        </div>
          </div>
        </div>
    </section>
@endsection