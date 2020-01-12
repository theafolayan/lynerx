@extends('layouts.app')


    
    {{-- @stop --}}


@section('content')
<header class="header header-inverse" style="background-color: #385B2B;">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <h1> {{$series->title}} </h1>
            <p class="fs-20 opacity-70"> Customise your Series Lessons</p>

          </div>
        </div>

      </div>
    </header>
     <div class="section">
       <ul class="list-group">
         <li class="list-group-item">
         <vue-lessons default_lessons = "{{$series->lessons}}" series_id="{{$series->id}}"> </vue-lessons>
         </li>
       </ul>
      </div>
@endsection