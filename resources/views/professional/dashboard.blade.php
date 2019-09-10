@extends('layouts.app')

  @section('content')

        @if (session('success'))
          <div class="alert alert-success" role="alert">
           {{ session('success')}}
          </div>
        @endif
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
              {{ $error }}
            </div>
          @endforeach

        @endif
        <br><br>

            <div class="container">
              <div class="row">
                <div class="col-xs-12 col-md-4">
                  <div class="dashboard-side">
                    <div class="avatar">
                       <img src="images/avatar/small/ade.jpg" class="ui avatar image tiny" alt="e-planning">
                        <h4 class="headr">Kristy</h4>
                    </div>
                    <div class="ui middle aligned divided  selection list">
                          <div class="item active" data="apply" >
                            <i class="user icon "></i>
                            <div class="content">
                              <div class="header ">Apply For Building plan Approval</div>
                            </div>
                          </div>
                          <div class="item" data="status">
                            <i class="shipping fast icon "></i>
                            <div class="content">
                              <div class="header">Approval Status</div>
                            </div>
                          </div>
                          <div class="item" data="profile">
                            <i class="user icon "></i>
                            <div class="content">
                              <div class="header">Profile</div>
                            </div>
                          </div>
                          <div class="item" data="settings">
                          <i class="setting icon "></i>
                            <div class="content">
                              <div class="header">Settings</div>
                            </div>
                          </div>
                          <div class="item " data="calcultor">
                          <i class="calculator icon "></i>
                            <div class="content">
                              <div class="header">Assesment Calculator</div>
                            </div>
                          </div>

                          <div class="item">
                            <i class="logout icon "></i>
                            <div class="content">
                              <div class="header">Logout</div>
                            </div>
                          </div>
                        </div>
                  </div>
                </div>
                <div class="col-xs-12 col-md-8 dashboard-content" style="background:white;padding:10px">
                  <div class="show show-apply">
                    <div class="ui icon message">
                      <i class="inbox icon"></i>
                      <div class="content">
                        <div class="header">
                          <h1>
                            Professional
                            {{ Greetings() }} {{ Auth::user()->title }}{{ Auth::user()->fullname }}!
                          </h1>
                        </div>
                        <p> <a href="#">Here</a> are are some guide to to help you approve your First plan</p>

                        <div class="approve-options">
                          <div class="ui shape">
                              <div class="sides">
                                <div class="active side bApprove"><button type="button" class="ui button teal apa"> <a href="/" style="color:inherit">Building Plan Approval</a> </button></div>
                                <div class="side"><button type="button" class="ui button teal apa">Building Approval</button></div>
                                <div class="side"><button type="button" class="ui button teal apa">Layout Approval</button></div>
                              </div>
                            </div><br>
                            <div class="ui buttons">
                              <div class="ui button left"> <i class="chevron left icon"></i> </div>
                              <div class="ui button right"><i class="chevron right icon"></i></div>
                            </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="show show-status">

                    <div class="ui steps">
                        <div class="step">
                          <i class="truck icon"></i>
                          <div class="content">
                            <div class="title">Applied</div>
                            <div class="description"><a class="ui teal circular label">2</a></div>
                          </div>
                        </div>
                        <div class="active step">
                          <i class="payment icon"></i>
                          <div class="content">
                            <div class="title">Pending</div>
                            <div class="description"><a class="ui orange circular label">2</a></div>
                          </div>
                        </div>
                        <div class="disabled step">
                          <i class="info icon"></i>
                          <div class="content">
                            <div class="title">Confirm Order</div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="show show-profile">
                    <div class="ui icon message">
                      <i class="inbox icon"></i>
                      <div class="content">
                        <div class="header">
                          <h1>
                            Profile
                          </h1>
                        </div>
                        <p> <a href="#">Here</a> are are some guide to to help you approve your First plan</p>
                      </div>
                    </div>
                  </div>



                  <div class="show show-settings">
                    <div class="ui icon message">
                      <i class="inbox icon"></i>
                      <div class="content">
                        <div class="header">
                          <h1>
                            Settings
                          </h1>
                        </div>
                        <p> <a href="#">Here</a> are are some guide to to help you approve your First plan</p>
                      </div>
                    </div>
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

                  <div class="">
                    <div class="calcultor">
                      <h4 class="ui header">Title</h4>
                      <div class="body">
                        <form class="ui form calcultor-form" action="index.html" method="post">
                          <div class="field">
                            <label>Building Type</label>
                            <select class="ui fluid dropdown rate" name="rate" required>
                              <option value="">Select Building type</option>
                              <option value="residential">residential</option>
                              <option value="commercial">Commercial</option>
                              <option value="filling_station">Filling Station</option>
                            </select>
                          </div>

                        <div class="fields">
                          <div class="field disabled">
                            <label>Rate Based On Type</label>
                            <input type="number" name="rate"  placeholder="rate" required>
                          </div>
                          <div class="field">
                            <label>Length of the building</label>
                            <input type="number" name="length" placeholder="Building Length" required>
                          </div>
                          <div class="field">
                            <label>Breadth of the building </label>
                            <input type="number" name="breadth" placeholder="Breadth" required>
                          </div>
                            <div class="field">
                              <label>Building Height </label>
                              <input type="number" name="height" placeholder="Height to the roof level" required>
                            </div>
                        </div>
                        <button type="submit" class="ui button done">Done</button>
                   {{-- Calculation Result Model --}}
                        <div class="ui modal mini">
                            <i class="close icon"></i>
                            <div class="header">
                              <div class="logo"> <h4>e</h4> </div>Assessment Calculation Result
                            </div>
                            <div class="image content">
                              <div class="image">
                                  <i class="calculator icon"></i>
                              </div>
                              <div class="description">
                                <table class="ui inverted unstackable table">
                                  <thead>
                                    <tr>
                                      <th colspan=2>Likely Assessment Payment</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>Assement</td>
                                      <td class="total_accessment"></td>
                                    </tr>
                                    <tr>
                                      <td>Allocation</td>
                                      <td class="allocation"></td>
                                    </tr>
                                    <tr>
                                      <td>Inspection</td>
                                      <td class="inspection"></td>
                                    </tr>
                                  </tbody>
                                  <tfoot>
                                    <tr colspan="2"><th> <strong>Total</strong> </th>
                                    <th class="total"></th>
                                  </tr></tfoot>
                                </table>
                              </div>
                            </div>
                            <div class="actions">
                              <div class="ui button cancel red">Cancel</div>
                              <div class="ui button ok">OK</div>
                            </div>
                          </div>

                          {{-- Calculation Result Model End--}}


                        </form>
                      </div>

                    </div>

                  </div>
                  </div>



                </div>
              </div>
            </div>


         </div>

         <br><br>


  @endsection
