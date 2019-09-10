@extends('layouts.app')

  @section('content')

    <div class="container">
      <div class="row">
        <div class="center-block" style="background:white;padding:10px;margin:20px">
          <h2 class="ui icon header">
            @if (isset($success))
              <i class="check icon" ></i>
              <div class="ui message green">
                <h4>{{$success}}</h4>
                <div class="ui buttons">
                  <div class="ui button"><a href="/login">Login</a></div>
                </div>
              </div>
              @else
                <div class="ui message red">
                  <i class="user icon" ></i>
                  <div class="">{{$error}}</div>
                  <div class="ui buttons">
                    <div class="ui button"><a href="/">Back to Home</a></div>
                  </div>
                </div>
            @endif
        </h2>
        </div>
      </div>
    </div>

  @endsection
