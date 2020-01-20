@extends('layouts.app')

@section('header')
<header class="header header-inverse h-fullscreen pb-80" data-parallax="{{asset('img/bg-man.jpg')}}" data-overlay="8">
      <div class="container text-center">

        <div class="row h-full">
          <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

            <h1 class="display-4 hidden-sm-down">Create Professional Websites</h1>
            <h1 class="hidden-md-up">Create Professional Websites</h1>
            <br>
            <p class="lead text-white fs-20 hidden-sm-down"><span class="fw-400">TheSaaS</span> is a responsive, professional, and multipurpose<br> SaaS template powered with <span class="mark-border">Bootstrap 4</span>.</p>

            <br><br><br>

            <a class="btn btn-lg btn-round w-200 btn-primary mr-16" href="#" data-scrollto="section-intro">Demos</a>
            <a class="btn btn-lg btn-round w-200 btn-outline btn-white hidden-sm-down" href="#" data-scrollto="section-intro">Features</a>

          </div>

          <div class="col-12 align-self-end text-center">
            <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-intro"><span></span></a>
          </div>

        </div>

      </div>
</header>



<div class="container"> 
  <br>
<br><br>
<br>
     <div class="row ">
            
            @foreach ($series as $series)
                <div class="col-12 col-md-6 col-lg-4">
              <div class="card card-hover-shadow">
              <a href="blog-single.html"><img class="card-img-top" src="{{asset('storage/').'/'.$series->image_url}}" alt="Card image cap" width="100%" height="100%"></a>
                <div class="card-block">
                <h4 class="card-title">{{$series->title}}</h4>
                <p class="card-text">{{$series->description}}</p>
                <a class="fw-600 fs-12" href="{{'/series/'. $series->slug}}">View Series <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                </div>
              </div>
            </div>
            @endforeach


            
      </div>
</div>


{{-- Testimonials  --}}

<section class="section">
        <div class="container">
          <header class="section-header">
            <h2>Testimonials</h2>
            <hr>
            <p class="lead">Join thousands of satisfied customers using our template globally.</p>
          </header>


          <div class="row gap-y">
            
            <div class="col-12 col-md-6">
              <div class="card card-shadowed">
                <div class="card-block px-30">
                  <div class="rating mb-12">
                    <label class="fa fa-star active"></label>
                    <label class="fa fa-star active"></label>
                    <label class="fa fa-star active"></label>
                    <label class="fa fa-star active"></label>
                    <label class="fa fa-star active"></label>
                  </div>

                  <p class="text-quoted mb-0">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title.</p>
                  <div class="media align-items-center pb-0">
                    <img class="avatar avatar-xs" src="assets/img/avatar/1.jpg" alt="...">
                    <div class="media-body lh-1">
                      <h6 class="mb-0">Maryam Amiri</h6>
                      <small>@maryami</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-12 col-md-6">
              <div class="card card-shadowed">
                <div class="card-block px-30">
                  <div class="rating mb-12">
                    <label class="fa fa-star active"></label>
                    <label class="fa fa-star active"></label>
                    <label class="fa fa-star active"></label>
                    <label class="fa fa-star active"></label>
                    <label class="fa fa-star active"></label>
                  </div>

                  <p class="text-quoted mb-0">A new Day!, Another Oppurtunity to be World Class! Take advantage of the huge variety of courses Lynerx has to offer you today!</p>
                  <div class="media align-items-center pb-0">
                    <img class="avatar avatar-xs" src="assets/img/avatar/2.jpg" alt="...">
                    <div class="media-body lh-1">
                      <h6 class="mb-0">Prosper Otemuyiwa</h6>
                      <small>@unicodedeveloper</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>



        </div>
      </section>
{{--  FAQs --}}
<section class="section">
        <div class="container">
          <header class="section-header">
            <small>Faq</small>
            <h2>Frequently Asked Questions</h2>
            <hr>
          </header>


          <div class="accordion" id="accordion-general">
            <div class="card">
              <h5 class="card-title">
                <a data-toggle="collapse" data-parent="#accordion-general" href="#collapse-general-1">What is TheSaaS?</a>
              </h5>

              <div id="collapse-general-1" class="collapse in">
                <div class="card-block">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>


            <div class="card">
              <h5 class="card-title">
                <a data-toggle="collapse" data-parent="#accordion-general" href="#collapse-general-2">Where can I learn more about how to use TheSaaS?</a>
              </h5>

              <div id="collapse-general-2" class="collapse">
                <div class="card-block">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>


            <div class="card">
              <h5 class="card-title">
                <a data-toggle="collapse" data-parent="#accordion-general" href="#collapse-general-3">Where can I get more details about your security practices?</a>
              </h5>

              <div id="collapse-general-3" class="collapse">
                <div class="card-block">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>


            <div class="card">
              <h5 class="card-title">
                <a data-toggle="collapse" data-parent="#accordion-general" href="#collapse-general-4">Where can I get more details about your security practices?</a>
              </h5>

              <div id="collapse-general-4" class="collapse">
                <div class="card-block">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>


            <div class="card">
              <h5 class="card-title">
                <a data-toggle="collapse" data-parent="#accordion-general" href="#collapse-general-5">What is TheSaaS’s approach to data privacy?</a>
              </h5>

              <div id="collapse-general-5" class="collapse">
                <div class="card-block">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                </div>
              </div>
            </div>
          </div>



        </div>
</section>







  <!-- Main container -->
 
    
@endsection