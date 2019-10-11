@extends('layouts.app')


@section('content')
        <br><br>
        Hello
        <style media="screen">
          .hide-s{
            display: none
          }
        </style>
      <div class="container {{ $appDetails->status =="Rejected" ? " body-error" : ""}}">
              <div class="row">
                <div class="col-xs-12 col-md-4">
                  @if ($role=="AreaOfficer")
                    @include('admin/drawers/officials')
                    @else
                      @include('admin/drawers/public')
                  @endif
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
                  <div class="app-details-containder show"  style="width:100%;display:block" >
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
                        <div style="display:none" class="ui circular button red rejected-s"><i class="cancel icon"></i>Rejected <i class="ui question icon"></i></div>
                        <div style="display:none" class="ui right floated circular button blue print"><i class="print icon"></i>Print</div>
                          <div class="rejected-mesaage ui message orange hide" style="position:absolute;z-index:999">
                              @foreach ($appDetails->feedbacks as $feedback)
                                  <div >{{$feedback->messages}}</div><hr>
                              @endforeach
                          </div>
                        @else

                    <div class="ui info message"> <i class="exclamation triangle icon"></i> Application has not been recived yes!!</div>
                    @endif
                  </div>

                    <div class="header shadow-2">
                      <div class="ui items">
                        <a class="ui orange right ribbon label">
                          <b>Application ID <i class="hand point right outline icon inherit"></i> {{$appDetails->id}}</b>
                        </a>
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
                      <div class="details-body details-body-error " style="background:white">
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
                            $field=['site_plan','location_plan','floor_plan','front_elevation','rear_elevation','side_elevation','roof_plan']
                          @endphp
                          <div class="row">

                              <div class="col-md-4">
                                <a class="venobox" data-gall="workingDrawingsGallery" href={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->site_plan" : "/storage/uploads/workingDrawings/$appDetails->site_plan" }}>
                                <div class="wk-preview">
                                  <h4 class="hover-name">Site Plan<h4/>
                                  <h4 class="mobile">Site Plan<h4/>
                                    <img src={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->site_plan" : "/storage/uploads/workingDrawings/$appDetails->site_plan" }} alt="Site Plan" width="100%">
                                  </div>
                                </a>
                              </div>

                              <div class="col-md-4">
                                <a class="venobox" data-gall="workingDrawingsGallery" href={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->location_plan" : "/storage/uploads/workingDrawings/$appDetails->location_plan" }}>
                                <div class="wk-preview">
                                  <h4 class="hover-name">Location Plan<h4/>
                                  <h4 class="mobile">Location Plan<h4/>
                                    <img src={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->location_plan" : "/storage/uploads/workingDrawings/$appDetails->location_plan" }} alt="Site Plan" width="100%">
                                  </div>
                                </a>
                              </div>

                              <div class="col-md-4">
                                <a class="venobox" data-gall="workingDrawingsGallery" href={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->floor_plan" : "/storage/uploads/workingDrawings/$appDetails->floor_plan" }}>
                                <div class="wk-preview">
                                  <h4 class="hover-name">Floor Plan<h4/>
                                  <h4 class="mobile">Floor Plan<h4/>
                                    <img src={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->floor_plan" : "/storage/uploads/workingDrawings/$appDetails->floor_plan" }} alt="Site Plan" width="100%">
                                  </div>
                                </a>
                              </div>

                              <div class="col-md-4">
                                <a class="venobox" data-gall="workingDrawingsGallery" href={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->front_elevation" : "/storage/uploads/workingDrawings/$appDetails->front_elevation" }}>
                                <div class="wk-preview">
                                  <h4 class="hover-name">Front Elevation<h4/>
                                  <h4 class="mobile">Front Elevation<h4/>
                                    <img src={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->front_elevation" : "/storage/uploads/workingDrawings/$appDetails->front_elevation" }} alt="Site Plan" width="100%">
                                  </div>
                                </a>
                              </div>

                              <div class="col-md-4">
                                <a class="venobox" data-gall="workingDrawingsGallery" href={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->rear_elevation" : "/storage/uploads/workingDrawings/$appDetails->rear_elevation" }}>
                                <div class="wk-preview">
                                  <h4 class="hover-name">Rear Elevation<h4/>
                                  <h4 class="mobile">Rear Elevation<h4/>
                                    <img src={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->rear_elevation" : "/storage/uploads/workingDrawings/$appDetails->rear_elevation" }} alt="Site Plan" width="100%">
                                  </div>
                                </a>
                              </div>

                              <div class="col-md-4">
                                <a class="venobox" data-gall="workingDrawingsGallery" href={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->side_elevation" : "/storage/uploads/workingDrawings/$appDetails->side_elevation" }}>
                                <div class="wk-preview">
                                  <h4 class="hover-name">Side Elevation<h4/>
                                  <h4 class="mobile">Side Elevation<h4/>
                                    <img src={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->side_elevation" : "/storage/uploads/workingDrawings/$appDetails->side_elevation" }} alt="Site Plan" width="100%">
                                  </div>
                                </a>
                              </div>

                              <div class="col-md-4">
                                <a class="venobox" data-gall="workingDrawingsGallery" href={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->roof_plan" : "/storage/uploads/workingDrawings/$appDetails->roof_plan" }}>
                                <div class="wk-preview">
                                  <h4 class="hover-name">Roof Plan<h4/>
                                  <h4 class="mobile">Roof Plan<h4/>
                                    <img src={{$appDetails->status == "Approved" ? "/approvedPlan/$appDetails->roof_plan" : "/storage/uploads/workingDrawings/$appDetails->roof_plan" }} alt="Site Plan" width="100%">
                                  </div>
                                </a>
                              </div>

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
                             @if ($appDetails->status=="Approved")
                               <a class="ui button"><i class="print icon"></i>Print App</a>
                               @else
                               <a href="{{route("user.application.edit",$appDetails->id)}}" class="ui button"><i class="edit outline icon"></i> Edit</a>
                             @endif
                         @endif
                       </div>
                    </div>
                  </div>

                  @include('partials/modals')

                </div>


                {{-- Chat Div --}}

                   @include('partials/chat')

                {{-- End Chat Div --}}



              </div>

            <div class="show-calcultor-contain">

              @include('partials/calculator')

            </div>

<script type="text/javascript" src="{{ asset('js/ajaxmodule.js') }}"></script>

  @endsection
