@extends('layouts.app')
@section('content')
<section class="section bg-gray">
        <div class="container">

          <div class="row gap-y">
            
            @foreach ($series as $series)
                <div class="col-12 col-md-6 col-lg-4">
              <div class="card card-hover-shadow">
              {{-- <a href="blog-single.html"><img class="card-img-top" src="{{asset('storage/').$series->image_url}}" alt="Card image cap"></a> --}}
                <div class="card-block">
                <h4 class="card-title">{{$series->title}}</h4>
                <p class="card-text">{{$series->description}}</p>
                  <a class="fw-600 fs-12" href="blog-single.html">Read more <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                </div>
              </div>
            </div>
            @endforeach


            
          </div>


          <nav class="flexbox mt-30">
            <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
            <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
          </nav>


        </div>
      </section>
@endsection