@extends('layouts.app')


@section('content')
        <br><br>
        <style media="screen">
          .hide-s{
            display: none
          }
        </style>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 col-md-4">
                  @include('admin/drawers/public')
                </div>
                <div class="col-xs-12 col-md-8 dashboard-content" style="background:white;padding:10px">
                  @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                      <div class="ui message red">{{$error}}</div>
                      <script type="text/javascript">
                      alert("error Occure")
                      </script>
                    @endforeach
                  @endif
                  @if (session('msg'))
                    <div class="ui message green">
                        {{session('msg')}}
                    </div>
                  @endif
                  <div class="app-details-containder " style="width:100%">
                    <div class="feedback shadow-2" style="height:50px">
                      <div class="ui right floated icon button feedbacks circular"> <i class="arrow up icon" style="color:inherit"></i> </div>
                      @if (isset($edit))
                        <a href="{{route("user.application.details",$appDetails->id)}}" class="ui left floated icon button circular"><i class="arrow left icon" style="color:inherit"></i>Back </a>
                        @else
                          @if ($role=="AreaOfficer")
                            <a href="{{route("areaOfficer.dashboard")}}" class="ui left floated icon button circular"><i class="arrow left icon" style="color:inherit"></i>Back </a>
                            @else
                            <a href="{{route("user.dashboard")}}" class="ui left floated icon button circular"><i class="arrow left icon" style="color:inherit"></i>Back </a>
                          @endif
                      @endif
                    </div>



                    <div class="app-state shadow-2 wrapper" style="background:white; padding:10px">
                      @if ($received)
                        <div style="display:none" class="ui right floated circular button green inverted app-fee">App Fees</div>
                        <div style="display:none" class="ui circular button grey paygoclient"> <i class="handshake icon"></i> PayGo</div>
                        <div style="display:none" class="ui circular button green approved "><i class="check icon"></i> Approved</div>
                        <div style="display:none" class="ui circular button blue meet-up "><i class="clock outline icon"></i> MeetUp</div>
                        <div style="display:none" class="ui circular button red rejected-s"><i class="cancel icon"></i>Rejected <i class="label">12</i> </div>
                      @else
                        <div class="ui info message"> <i class="exclamation triangle icon"></i> Application has not been recived yes!!</div>
                      @endif
                    </div>


                    <div class="header shadow-2">
                      <div class="ui items">
                          <div class="item">
                            <a class="ui tiny image">
                              <img src="/storage/uploads/images/{{$appDetails->user->profile_pic}}" alt="" width="100px" height="100px">
                            </a>
                            <div class="content"><br>
                              <a class="header">{{$appDetails->user->fullname}}</a>
                              <div class="description">
                               <h5><a href="tel:{{$appDetails->user->pNumber}}"></a> {{$appDetails->user->pNumber}}</h5>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>
                    @if (isset($edit))
                      @include('partials/appEditForm')
                    @else
                      <div class="details-body" style="background:white">
                        <div class="item">
                          <h4 class="ui horizontal divider header">
                            <i class="bar chart icon"></i>
                            Application Name
                          </h4>
                          <strong>{{$appDetails->name}}</strong>
                        </div>

                        <div class="item">
                          <h4 class="ui horizontal divider header">
                            <i class="map marker alternate icon"></i>
                            Application Location
                          </h4>
                          <strong>{{$appDetails->location}}</strong>
                        </div>

                        <div class="item">
                          <h4 class="ui horizontal divider header">
                            <i class="warehouse icon"></i>
                            Application type
                          </h4>
                          <strong>{{$appDetails->type}}</strong>
                        </div>

                        <div class="item">
                          <h4 class="ui horizontal divider header">
                            <i class="thermometer half icon"></i>
                            Application Status
                          </h4>
                          <strong class="ui red app-status hide">{{$appDetails->type}}</strong>
                        </div>

                        <div class="item">
                          <h4 class="ui horizontal divider header">
                            <i class="picture icon"></i>
                            Application Working Drawings
                          </h4>
                          @php
                            $filed=['site_plan','location_plan','floor_plan','front_elevation','rear_elevation','side_elevation','roof_plan']
                          @endphp
                          <div class="row">
                            @for ($i=0; $i < 7; $i++)
                              <div class="col-md-4">
                                <a class="venobox" data-gall="workingDrawingsGallery" href="/storage/uploads/workingDrawings/{{$appDetails->$filed[$i] }}">
                                <div class="wk-preview">
                                  <h4 class="hover-name">{{$filed[$i]}}<h4/>
                                  <h4 class="mobile">{{$filed[$i]}}<h4/>
                                    <img src="/storage/uploads/workingDrawings/{{$appDetails->$filed[$i] }}" alt="{{$filed[$i]}}" width="100%">
                                  </div>
                                </div>
                              </a>
                              @endfor
                          </div>
                          {{-- <strong class="ui red app-status hide">{{$appDetails->type}}</strong> --}}
                        </div>


                      </div>
                      <br>
                      <br>
                    @endif


                    <div class="footer shadow-2 wrapper">
                       <div class="ui buttons">
                         @if ($role=="AreaOfficer")
                           <div class="ui button orange recived-app"><i class="thumbs up icon"></i> Recieved</div>
                           <div class="ui button red reject-app" ><i class="times icon"></i> Reject</div>
                           <div class="ui button teal paygo" data-token="{{csrf_token()}}" data-id="{{$appDetails->id}}"><i class="handshake icon"></i> PayGo</div>
                           <div class="ui button green approve-app"><i class="check icon"></i> Approve</div>
                           @else
                             <a href="{{route("user.application.edit",$appDetails->id)}}" class="ui button"><i class="edit outline icon"></i> Edit</a>
                         @endif
                       </div>
                    </div>
                  </div>

                  @include('partials/modals')

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


              {{-- Chat Div --}}

              @include('partials/chat')

              {{-- End Chat Div --}}



             </div>

         <br><br>


<script type="text/javascript" src="{{ asset('js/ajaxmodule.js') }}"></script>

  @endsection
