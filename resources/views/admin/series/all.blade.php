@extends('layouts.app')


    
    {{-- @stop --}}


@section('content')
<header class="header header-inverse" style="background-color: #385B2B;">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <h1> All Series </h1>
            <p class="fs-20 opacity-70"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, fuga.</p>

          </div>
        </div>

      </div>
    </header>
     <div class="section">
        <div class="container">

          <div class="row gap-y">
            <div class="col-12">

            <table class="table">
                <thead>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                     @forelse ( $series  as $s)
                    <tr>
                    <td>{{$s->title}}</td>
                    <td> <a href="{{route('series.edit', $s->slug)}}"><button class="btn btn-primary" >Edit</button></a></td>
                    <td> <a href="{{route('series.destroy', $s)}}"><button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    @empty
                    <p class="text-center"> No Series Created Yet!</p>
                    @endforelse
                </tbody>
            </table>

            </div>


            
          </div>


        </div>
      </div>
@endsection