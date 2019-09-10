<form class="ui form attached fluid segment main-form " action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field("PATCH") }}
        @if (session('success'))
          <div class="ui green message">
            <div class="header">Message</div>
            <p>{{ session('success') }}</p>
          </div>
        @endif
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <div class="ui red message" role="alert">
              {{ $error }}
            </div>
          @endforeach

        @endif

          <div class="field">
            <div class="profile-update-pic file-handler">
              <div class="label">
                <label for="profile_pic">
                  <i  class="edit icon"></i>
                  <img src="/storage/uploads/images/{{auth()->user()->profile_pic}}" alt="">
                </label>
            </div>
              <input type="file" name="profile_pic" id="profile_pic">
            </div>
          </div>
          <div class="field">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="{{Auth::user()->username}}" placeholder="username">
          </div>
          <div class="field">
            <label>Fullname</label>
            <input type="text" name="fullname" value="{{Auth::user()->fullname}}"  placeholder="Fullname">
            <!-- <div class="ui basic red pointing prompt label transition ">Please enter a usernam</div> -->
          </div>
            <div class="field">
              <label for="lga">LGA</label>
              <select class="ui fluid dropdown" name="lga" id="lga">
                <option value="{{Auth::user()->lga}}">{{Auth::user()->lga}}</option>
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

            <div class="field">
              <label>Email Address</label>
              <input type="email" name="email" value="{{Auth::user()->email}}" placeholder="example@mail.com">
            </div>
            <div class="field" for="phoneNo">
              <label>Phone number</label>
              <input type="number" name="pNumber" id="phoneNo" value="{{Auth::user()->pNumber}}" placeholder="Phone Number">
            </div>
           <div class="ui button primary"> Change Password</div><br><br>

           <button type="submit" class="ui submit button">Update</button>
</form>
