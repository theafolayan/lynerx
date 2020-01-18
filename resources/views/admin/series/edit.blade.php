@extends('layouts.app')


    
    {{-- @stop --}}


@section('content')
<header class="header header-inverse" style="background-color: #385B2B;">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <h1> Edit: {{$series->title}} </h1>
            <p class="fs-20 opacity-70"> You can make changes to your series here</p>

          </div>
        </div>

      </div>
    </header>
     <div class="section">
        <div class="container">

          <div class="row gap-y">
            <div class="col-12 col-md-12">

            <form action="{{route('series.update', $series->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- <div class="alert alert-success">We received your message and will contact you back soon.</div> --}}

                <div class="form-group">
                  <input class="form-control form-control-lg" type="text" name="title" value="{{$series->title}}" placeholder="eg: Complete Photography MasterClass">
                </div>

               

                <div class="form-group">
                <textarea class="form-control form-control-lg" name="description" rows="4"  value="{{$series->description}}">{{$series->description}}</textarea>
                </div>
                 <div class="form-group">
                  <input class="form-control form-control-lg" type="file" name="image">
                </div>

                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit ">
              </form>

            </div>


          </div>


        </div>
      </div>
@endsection