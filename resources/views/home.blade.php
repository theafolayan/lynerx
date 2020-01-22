@extends('layouts.app')

@section('content')
 <!-- Header -->
    <header class="header header-inverse" style="background-color: #385B2B;">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

          <h1>{{auth()->user()->name}}</h1>
            <p class="fs-20"><i class="fa fa-map-marker mr-8"></i> {{auth()->user()->email}}</p>

            <hr class="w-50 ">
                        <p class="fs-20"> {{auth()->user()->getTotalNumberOfCompletedLessons()}}</p>


            <a class="btn btn-xl btn-round btn-white w-200" href="#" data-scrollto="section-apply">Apply Now</a>

          </div>
        </div>

      </div>
    </header>
    <!-- END Header -->
@endsection
