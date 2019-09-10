@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row ">
      <div class="col-md-6 form-contain">
        <div class="form-header ">
           <div class="logo">e</div>
           <span>Login</span>
        </div>

        <form class="main-form" action="{{ route('user.login') }}" method="post">
          {{ csrf_field() }}
          @if (session('msg'))
              <div class="ui error message"><i class="icon exclamation triangle" style="color:red"></i>{{session("msg")}}</div>
          @endif
          <div class="ui form">
            <div class="field">
              <label>Username Or email</label>
              <input type="text" name="email" placeholder="example@mail.com">
            </div>
            <div class="field">
              <label>Password</label>
              <input type="password" name="password" placeholder="*********">
            </div>
            <button type="submit" class="ui submit button">Login</button>


          </div>
        </form><br>
        <div class="ui bottom attached warning message">
          <i class="icon help"></i>Forgot Your Password? <a href="/login">retrieve here</a>.
        </div>
    </div>
    </div>
  </div>
  <br><br>
@endsection
