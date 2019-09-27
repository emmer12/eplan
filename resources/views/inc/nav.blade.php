<div class="mobile-menu-c">
  {{-- <i class="icon cancel floated right" style="float:right;padding:10px;font-size:30px"></i> --}}
  <div class="menu">
    @if (Auth::guest())
      <div class=""><a href="{{route('login')}}" >Login</a></div>
      <div class=""><a href="{{route('register')}}" >Register</a></div>
      <div class="ui divider"></div>
      @else
      <img class="ui avatar image" src="/storage/uploads/images/{{auth()->user()->profile_pic}}" alt="label-image" />
      <a href="#" style="font-size:14px;font-weight:700">{{ Auth::user()->username }}</a>
      <div class=""><a  href="settings.html">Settings</a></div>
      <a class="item">Need Help?</a>
      <div class="ui divider"></div>
      <div>
        <a
        style="font-size:14px"
        class="item"
        href="{{ route('logout') }}"
        oncdivck="
        event.preventDefault();
        document.getElementById('logout-form').submit();"
        >
        Sign Out
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>

    </div>
    @endif



  </div>
</div>
<div class="main-menu">
  <div class="contain">
      <div class="logo">
				 <h4>e</h4>
        {{-- <img src="assets/images/e-planning.png" alt="e-planning"> --}}
      </div>
      <div class="ui menu borderless right-menu">
        @if (Auth::guest())
           <a href="/" class="item active">Home</a>
           <a href="" class="item">Forum</a> </li>
           <a href="{{route('login')}}" class="item">Login</a>
           <a href="{{route('register')}}" class="item">Register</a>
          @else
            <div class="right menu">
              <div class="item">
                <div class="ui icon input ">
                 <input type="text" placeholder="Search...">
                 <i class="search link icon"></i>
                </div>
              </div>
                <div class="ui dropdown item">
                    <img class="ui avatar image" src="/storage/uploads/images/{{auth()->user()->profile_pic}}" alt="label-image" />
                    <a href="#" style="font-size:14px;font-weight:700">{{ Auth::user()->username }}</a>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{route("dashboard.redirect")}}">Dashboard</a>
                        <a class="item" href="profile.html">Profile</a>
                        <a class="item" href="settings.html">Settings</a>
                        <div class="ui divider"></div>
                        <a class="item">Need Help?</a>
                        <a
                            class="item"
                            href="{{ route('logout') }}"
                            onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();"
                         >
                            Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>

            <div class="ui dropdown item">
              <div class="">
                <i class="ui icon bell"></i>
                <i class="dropdown icon"></i>
              </div>
              <div class="menu" style="width:100px">
                <div class="item">
                  <img class="ui avatar image" src="/../images/avatar/small/helen.jpg">
                  Jenny Hess
                </div>
                <div class="ui divider"></div>
                <div class="item" >
                  <img class="ui avatar image" src="/../images/avatar/small/helen.jpg">
                  Jenny Emmanuel jayeoba
                </div>
              </div>
            </div>

         </div>
          @endif

        </div>

      </div>
    </div>
  </div>



<div class="tab-menu">
	<div class="contain">
			<div class="logo">
				 <h4>e</h4>
				{{-- <img src="assets/images/e-planning.png" alt="e-planning"> --}}
			</div>
			<div class="menu">
				<ul class="main-menu-left">
          <li><a href="/" class="active-link">Home</a> </li>
          <li> <a href="">Forum</a> </li>
					<li> <a href="#">About Us</a> </li>
            @if (Auth::guest())
    					<li> <a href="{{route('login')}}">Login</a> </li>
    					<li > <a href="{{route('register')}}">Register</a></li>
              @else
                <li>
                  <div class="ui small horizontal list" style="">
                    <div class="item">
                      <img class="ui avatar image" src="/storage/uploads/images/{{auth()->user()->profile_pic}}">
                      <div class="content">
                        <div class="header">{{ Auth::user()->fullname }} <i class="angle down icon"></i></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <a
                      href="{{ route('logout') }}"
                      onclick="
                      event.preventDefault();
                      document.getElementById('logout-form').submit();"
                   >
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                 </li>
            @endif
				</ul>
			</div>
		</div>
</div>




<div class="mobile-menu">
 <div class="container">
   <div class="custom-row-nav">
         <div class="logo">
         	  <h4>e</h4>
         </div>
         <div class="m-search">
           <i class="search icon"></i>
         </div>
         <div class='tab'>
           <i class="bars icon bar-menu"></i>
         </div>
      </div>
 </div>
</div>




<div class="loader-custom">
  <div class="loader-inner">
    <div class="shadow">
    </div>
 </div>
</div>
