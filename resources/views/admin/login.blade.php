@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row ">
      <div class="col-md-6 form-contain">
        <div class="form-header ">
           <div class="logo">e</div>
           <span>Admin Login</span>
        </div>
        <form class="main-form" action="{{ route('admin.login.process') }}" method="post">
          {{ csrf_field() }}
          @if (session("msg"))
            <div class="ui negative message">
                <i class="close icon" style="color:inherit"></i>
                <p>{{ session('msg') }}
              </p>
            </div>
            {{-- <p class="messages red"><i class="icon exclamation triangle"></i> {{ session('msg')}} </p> --}}
          @endif

          <div class="ui form">
            <div class="field">
              <label>Username</label>
              <input type="text" name="username" placeholder="username">
            </div>
            <div class="field">
              <label>Password</label>
              <input type="password" name="password" placeholder="*********">
            </div>
            <button type="submit" class="ui submit button">Login</button>


          </div>
        </form>
    </div>
    </div>
  </div>
  <br><br>
@endsection
