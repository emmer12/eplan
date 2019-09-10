@extends('layouts.app')
@section("content")
  <!--/END TOP HEADER AREA-->
          <div class="title-area">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                      <div class="about-title-area">
                       <h1>404 Error</h1>
                       <p><a href="index.html">Home</a> - <span>Not Found</span> </p>
                      </div>
                   </div>
               </div>
           </div>
        </div>
    <!--/END HERO AREA-->

    <div class="not_found_page">
  <div class="container">
      <div class="row wow fadeInUp">
          <div class="col-md-6 col-md-offset-1 col-sm-6 text-center">
              <div class="error_page_image">
                  <img src="/images/404_Error.png" width="100%" alt="eplanning">
              </div>
          </div>
          <div class="col-md-4 col-sm-6">
              <div class="error_page">
                  <h1>404</h1>
                  <h3><span>Opps.....</span> Sorry, this page is not found. <br>It looks like nothing was found at this location.</h3>
                <div class="col-sm-12 col-xs-12 comment_button">
                  <a href="/" class="ui button ">BACK TO HOME  <i class="arrow left icon" aria-hidden="true"></i></a>
                </div>
              </div>
          </div>
      </div>
  </div>
  </div>
@endsection("content")
