@extends('layouts.app')

  @section('content')
        <br><br>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 col-md-4">
                  @include('admin/drawers/public')
                </div>
                <div class="col-xs-12 col-md-8 dashboard-content" style="background:white;padding:10px">
                  <div class="show show-apply">
                    <div class="ui icon message wow slideInUp">
                      <i class="inbox icon"></i>
                      <div class="content">
                        <div class="header">
                          <h1>
                            {{ Greetings() }} {{ Auth::user()->title }} {{ Auth::user()->fullname }}!
                          </h1>
                        </div>
                        @if (count($applications) < 1)
                          <p> <a href="#">Here</a> are are some guide to to help you approve your First plan</p>
                          @else
                          <h3 class="wow jello" data-wow-delay="1s" style="color:#0a716e; font-weight:bolder;font-size:20px;">You Are welcome back!</h3 >
                        @endif

                      </div>
                    </div>
                  </div>
                  
                  <div class="custom-stat">
                    <div class="stat stat1">
                      <i class="tasks icon"></i>
                      Applied
                      <a class="ui teal circular label">{{ count($applications) }}</a>
                    </div>
                    <div class="stat stat1">
                      <i class="sync icon"></i>
                      Pending
                      <a class="ui teal circular label">{{ countState($applications,"Pending") }}</a>
                    </div>
                    <div class="stat stat1">
                      <i class="truck icon"></i>
                      Received
                      <a class="ui teal circular label">{{ countState($applications,"Received") }}</a>
                    </div>
                    <div class="stat stat1">
                      <i class="handshake outline icon"></i>
                      MeetUp
                      <a class="ui teal circular label">{{ countState($applications,"MeetUp") }}</a>
                    </div>
                    <div class="stat stat1">
                      <i class="tasks icon"></i>
                      PayGo
                      <a class="ui teal circular label">{{ countState($applications,"PayGo") }}</a>
                    </div>
                    <div class="stat stat1">
                      <i class="tasks icon"></i>
                      Approved
                      <a class="ui teal circular label">{{ countState($applications,"Approved") }}</a>
                    </div>
                  </div>

                <div class="show show-status">
                    {{--   <div class="ui steps mini">
                        <div class="step">
                          <i class="tasks icon"></i>
                          <div class="content">

                            <div class="title">Applied</div>
                            <div class="description"><a class="ui teal circular label">{{ count($applications) }}</a></div>
                          </div>
                        </div>

                        <div class="step">
                          <i class="sync icon"></i>
                          <div class="content">
                            <div class="title">Pending</div>
                            <div class="description"><a class="ui teal circular label">{{ countState($applications,"Pending") }}</a></div>
                          </div>
                        </div>
                        <div class="step">
                          <i class="truck icon"></i>
                          <div class="content">
                            <div class="title">Received</div>
                            <div class="description"><a class="ui teal circular label">{{ countState($applications,"Received") }}</a></div>
                          </div>
                        </div>
                        <div class="step">
                          <i class="handshake outline icon"></i>
                          <div class="content">
                            <div class="title">MeetUp</div>
                            <div class="description"><a class="ui orange circular label">{{ countState($applications,"Approved") }}</a></div>
                          </div>
                        </div>
                        <div class=" step">
                          <i class="check icon"></i>
                          <div class="content">
                            <div class="title">Approved</div>
                            <div class="description"><a class="ui green circular label">{{ countState($applications,"Completed") }}</a>
                          </div>
                          </div>

                        </div>
                      </div> --}}
                      @include('partials/applications')
                  </div>

                  <div class="show-calcultor-contain">

                      @include('partials/calculator')
        
                  </div>
            </div>


         </div>

         <br><br>


  @endsection
