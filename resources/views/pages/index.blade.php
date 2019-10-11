@extends('layouts.app')

  @section('content')
    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-9">
          <div class="shadow-1 slider-box">
            @include('inc/homeSlider')
          </div>
        </div>
        <div class="col-xs-12 col-md-3">
          <div class="side-bar">
            <h3 class="ui block header ">Latest Forum Topics</h3>
            <div class="ui large feed shadow-2 wow bounceInUp" data-wow-delay="0.8s">
               <div class="event">
                   <div class="label">
                     <img class="ui middle aligned tiny image" src="../images/wireframe/square-image.png">
                   </div>
                   <div class="content">
                     <div class="summary">
                       New Portal for Building Plan Approval
                       <div class="date">
                         3 days ago
                       </div>
                     </div>
                     <div class="meta">
                       <a class="comment">
                         <i class="comment icon"></i> 6 Comments
                       </a>
                     </div>
                   </div>
              </div>
            </div>

            <div class="ui large feed shadow-2 wow bounceInUp" data-wow-delay="1.5s">
               <div class="event">
                   <div class="label">
                     <img class="ui middle aligned tiny image" src="../images/wireframe/square-image.png">
                   </div>
                   <div class="content">
                     <div class="summary">
                       Era for Speedy Building Plan approval
                       <div class="date">
                         6 days ago
                       </div>
                     </div>
                     <div class="meta">
                       <a class="comment">
                         <i class="comment icon"></i> 11 Comments
                       </a>
                     </div>
                   </div>
              </div>
            </div>



          </div>
          </div>
      </div>
    </div>

    <hr>
    <div class="container">
      <div class="row">

        {{-- Modal For Status Checking Start--}}

          <div class="ui status-checker-m modal mini">
            <div class="header">Status Checker</div>
            <div class="content">
              <div class="ui form">
                <div class="field">
                  <label>Application Id</label>
                  <input type="number" name="appId" required placeholder="Enter Your application Id" value="">
                </div>
              </div>
            </div>
            <div class="actions">
              <div class="ui cancel button">Cancel</div>
            </div>
          </div>

        {{-- Modal For Status Checking End--}}


      <div class="col-md-6 wow bounceInLeft">
        <div class="ui placeholder segment center aligned">
          <div class="ui icon header">
            <i class="question icon"></i>
            Check Your Application Status
          </div>
          <div class="ui green button inverted check_stutus">Check</div>
        </div>
      </div>

        <div class="col-md-6 wow bounceInRight">
          <div class="ui placeholder segment center aligned">
            <div class="ui icon header">
              <i class="user plus icon"></i>
                Register Here Within few seconds for your planning pamit
            </div>
            <div class="ui green button inverted">Create Account</div>
          </div>
        </div>


      </div>
    </div>

    <br><br>


  @endsection
