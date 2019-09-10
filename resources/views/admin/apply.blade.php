@extends('layouts.app')

  @section('content')
        <br><br>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 col-md-4">
                  @include('admin/drawers/public')
                </div>
                <div class="col-xs-12 col-md-8 dashboard-content" style="background:white;padding:10px">
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
                        <h3 class="wow fadeIn" data-wow-delay="1s" style="color:#0a716e; font-weight:bolder;font-size:20px;">You Are welcome</h3 >
                      @endif

                    </div>
                  </div>
                  <div class="show show-apply" style="display:block">
                    @include('partials/approvalAppForm')

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
