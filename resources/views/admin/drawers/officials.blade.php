<div class="bar-for-side ">
  <div class="menu">
    <i class="indent icon "></i><span>MENU</span>
  </div>
</div>
<br id='br'><br id='br'>
<div class="dashboard-side">
  <div class="avatar">
     <img src="/storage/uploads/images/{{auth()->user()->profile_pic}}" class="ui avatar image tiny" alt="e-planning">
      <h4 class="header">{{auth()->user()->fullname}}</h4>
  </div>
  <div class="ui middle aligned divided  selection list">
        <div class="item {{ request()->is('dashboard') ? "active" : ""}}" data="status">
          <i class="shipping fast icon "></i>
          <div class="content">
            <a href="{{route("areaOfficer.dashboard")}}">
              <div class="header">Applications</div>
            </a>
          </div>
        </div>
        <div class="item {{ request()->is('dashboard/apply') ? "active" : ""}}" data="" >
          <i class="user icon "></i>
          <div class="content">
            <a href="#">
              <div class="header ">Analytics</div>
            </a>
          </div>
        </div>
        <div class="item {{ request()->is('dashboard/profile*') ? "active" : ""}}">
          <i class="user icon "></i>
          <div class="content">
            <a href="{{route("user.profile",auth()->user()->id)}}">
             <div class="header">Profile</div>
           </a>
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
