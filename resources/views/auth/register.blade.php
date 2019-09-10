@extends('layouts.app')

  @section('content')
            <div class="container">
              <div class="row ">
                <div class="col-md-6 form-contain">
                  <div class="form-header ">
                     <div class="logo">e</div>
                     <span>Register</span>
                  </div>
                  <form class="ui form attached fluid segment main-form " action="{{ route('register') }}" method="post">
                    {{ csrf_field() }}
                    <div class="ui info message">
                      <div class="header">Your Data</div>
                      <p>Full details of how your data is used can be viewed in to <a href="#"> <b>private notice</b></a> on the website</p>
                    </div>

                    @if (session('msg'))
                      <div class="ui success message">
                        <div class="header">Message</div>
                        <p>{{ session('msg') }}</p>
                      </div>
                    @endif

                      <div class="field ">
                        <label for="type">User Type</label>
                        <select class="ui fluid dropdown {{ $errors->has('type') ? ' error' : '' }}" id="type" name="type">
                          <option value="">Select user type</option>
                          <option value="professional-user">Professional User</option>
                          <option value="general-public-user">General Public User</option>
                        </select>
                        </div>
                        <div class="two fields">
                            <div class="field">
                              <label for="title">Title</label>
                              <select class="ui fluid dropdown" id="title" name="title">
                                <option value="">Title</option>
                                <option value="mr">Mr</option>
                                <option value="mrs">mrs</option>
                                <option value="miss">miss</option>
                                <option value="others">others</option>
                              </select>
                            </div>
                              <div class="field">
                                <label for="lga">LGA</label>
                                <select class="ui fluid dropdown" name="lga" id="lga">
                                  <option value="Akoko North-East">Akoko North-East</option>
                                  <option value="Akoko South-East">Akoko South-East</option>
                                  <option value="Akoko South-West">Akoko South-West</option>
                                  <option value="Akoko North-West">Akoko North-West</option>
                                  <option value="Akure North">Akure North</option>
                                  <option value="Akure South">Akure South</option>
                                  <option value="Ese Odo">Ese Odo</option>
                                  <option value="Idanre">Idanre</option>
                                  <option value="Ifedore">Ifedore</option>
                                  <option value="IlajeEseodo">IlajeEseodo</option>
                                  <option value="Irele">Irele</option>
                                  <option value="Odigbo">Odigbo</option>
                                  <option value="Okitipupa">Okitipupa</option>
                                  <option value="Ondo East">Ondo East</option>
                                  <option value="Ondo West">Ondo West</option>
                                  <option value="Ose">Ose</option>
                                  <option value="Owo">Owo</option>
                                </select>
                              </div>
                            </div>

                          <div class="field">
                            <label>Fullname</label>
                            <input type="text" name="fullname" placeholder="Fullname">
                            <!-- <div class="ui basic red pointing prompt label transition ">Please enter a usernam</div> -->
                          </div>
                          <div class="field">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="username">
                          </div>
                          <div class="field">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="example@mail.com">
                          </div>
                          <div class="field" for="phoneNo">
                            <label>Phone number</label>
                            <input type="number" name="pNumber" id="phoneNo" placeholder="Phone Number">
                          </div>
                          <div class="field" for="password">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="*******">
                          </div>
                          <div class="field" for="confirm">
                            <label>Confirm Password </label>
                            <input type="password" name="password_confirmation" id="confirm" placeholder="*******">
                          </div>
                          <div class="field">
                            <div class="ui checkbox">
                              <input type="checkbox" name="terms" tabindex="0" class="hidden">
                              <label>I agree to the Terms and Conditions</label>

                            </div>
                          </div>


                        <button type="submit" class="ui submit button">Login</button>
                        <div class="ui error message"></div>
                  </form>
                  <div class="ui bottom attached warning message">
                    <i class="icon help"></i>Already signed up? <a href="/login">Login here</a> instead.
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
