@extends('layouts.app');

@section('content')
 <div class="row">
   <div class="col col-lg-4"></div>
   <div class="col col-lg-4">
     <div class="card card-shadowed text-center p-50 " style="">
      <h5 class="text-uppercase text-center">Register</h5>
      <br><br>

      <form class="form-type-material" action="/register" method="POST">
        {{-- {{ @csrf_token() }} --}}
        {{-- @csrf --}}
        {{ csrf_field() }}

        {{-- @if ($errors->any)
          @foreach ($error as $errors)
      <li class="list-group-item-danger ">{{$error}}</li>
          @endforeach
        @endif --}}

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Full Name" name="name">
        </div>

        <div class="form-group">
          <input type="email" class="form-control" placeholder="email" name="email">
        </div>
          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        

        <div class="form-group">
          <input type="password" class="form-control" name = "password" placeholder="password">
        </div>
          @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        {{-- <div class="form-group">
          <input type="password" class="form-control" placeholder="Password (confirm)">
        </div> --}}

        <div class="form-group">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">I agree to all <a class="text-primary" href="#">terms</a></span>
          </label>
        </div>

        <br>
        <input class="btn btn-bold btn-block btn-primary" type="submit" value="Register">
      </form>

      <hr class="w-30">

      <p class="text-center text-muted fs-13 mt-20">Already have an account? <a href="page-login.html">Sign in</a></p>
   </div>
   </div>
    <div class="col col-lg-4"></div>
 </div>


@endsection