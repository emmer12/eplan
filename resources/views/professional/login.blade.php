@extends('layouts.app')

  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-md-offset-3 ">
          <div class="log-form-con">
            <div class="text-center">
              <div class="">
                <img src="images/icons/fun3.png" class="center" alt="...">
              </div>
              <div class="heading center" >
                <h4 class="text-enter">ADMIN LOGIN</h4>
              </div>
            </div>
            <form action="{{route('admin.login.process')}}" method="post">
              @if (session('msg'))
                    <div class="alert alert-danger" role="alert">
                      <span class="ti ti-control-play"></span>
                      {{ session('msg')}}
                    </div>
              @endif
              {{ csrf_field() }}
              <fieldset class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </fieldset>
              <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="*********" name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </fieldset>
              <div class="text-center">
                <button type="submit" class="text-center custum-login"><i class="fa fa-play"></i></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endsection
