@extends('layouts.app')

  @section('content')
        <br><br>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 col-md-4">
                  @if ($role=="AreaOfficer")
                    @include('admin/drawers/officials')
                    @else
                      @include('admin/drawers/public')
                  @endif
                </div>
                <div class="col-xs-12 col-md-8 dashboard-content" style="background:white;padding:10px">


                  <div class="show show-profile" style="display:block">


                  @if ($edit)
                    <div class="ui icon message wow slideInUp">
                      <div class="content">
                        <div class="header">
                          <div class="ui button blue inverted right floated"><a href="{{route("user.profile",["user"=>Auth::id()])}}">Back <i class="arrow left icon"></i></a> </div>
                          <h1>Profile Edit</h1>
                        </div>
                      </div>
                    </div>
                    @include('partials/profileEdit')
                    @else
                      <div class="ui icon message wow slideInUp">
                        <div class="content">
                          <div class="header">
                            <div class="ui button  right floated"><a href="{{route("user.profile",["user"=>Auth::id(),"edit"=>true])}}">Edit Profile <i class="edit icon"></i></a> </div>
                            <h1>Profile</h1>
                          </div>
                        </div>
                      </div>
                    @include('partials/profile')
                  @endif

                  </div>

                  <div class="show show-calcultor">
                    <div class="ui icon message">
                      <i class="calculator icon"></i>
                      <div class="content">
                        <div class="header">
                          <h1>Calcultor</h1>
                        </div>
                        <p> <a href="#">Here</a></p>
                        <p>Please make sure you enter correct value to get correct assessment. this is just to have the idia of the amount you can likely pay</p>
                      </div>
                    </div>

                @include('partials/calculator')


                </div>

              </div>
            </div>
          </div>

         <br><br>


  @endsection
