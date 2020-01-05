@extends('layouts.app')


    
    {{-- @stop --}}


@section('content')
<header class="header header-inverse" style="background-color: #385B2B;">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <h1> Create a New Series </h1>
            <p class="fs-20 opacity-70"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, fuga.</p>

          </div>
        </div>

      </div>
    </header>
     <div class="section">
        <div class="container">

          <div class="row gap-y">
            <div class="col-12 col-md-6">

            <form action="{{route('series.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <div class="alert alert-success">We received your message and will contact you back soon.</div> --}}

                <div class="form-group">
                  <input class="form-control form-control-lg" type="text" name="title" placeholder="eg: Complete Photography MasterClass">
                </div>

               

                <div class="form-group">
                  <textarea class="form-control form-control-lg" name="description" rows="4" placeholder="Series Description"></textarea>
                </div>
                 <div class="form-group">
                  <input class="form-control form-control-lg" type="file" name="image">
                </div>

                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Submit ">
              </form>

            </div>


            <div class="col-12 col-md-5 offset-md-1">
              <div class="bg-grey h-full p-20">
                <p>Give us a call or stop by our door anytime, we try to answer all enquiries within 24 hours on business days.</p>
                <p>We are open from 9am — 5pm week days.</p>

                <hr class="w-80">

                <p class="lead">652 Main Road, Apt 12<br>New York, USA 10033</p>

                <div>
                  <span class="d-inline-block w-20 text-lighter" title="Email">E:</span>
                  <span class="fs-14">info@domain.com</span>
                </div>

                <div>
                  <span class="d-inline-block w-20 text-lighter" title="Phone">P:</span>
                  <span class="fs-14">+1 (123) 456-7890</span>
                </div>

              </div>
            </div>
          </div>


        </div>
      </div>
@endsection