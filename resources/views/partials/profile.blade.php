<div class="profile">
   <div class="">
     <div class="image">
       <img src="/storage/uploads/images/{{auth()->user()->profile_pic}}" alt="">
     </div>
     <div class="items">
       <div class="panel raised">
         <div class="head">
           <h4>Username</h4>
         </div>
         <div class="body">
           {{Auth::user()->username}}
         </div>
       </div>
       <br>
       <div class="panel raised">
         <div class="head">
           <h4>Fullname</h4>
         </div>
         <div class="body">
           {{Auth::user()->fullname}}
         </div>
       </div>
       <br>
       <div class="panel raised">
         <div class="head">
           <h4>Loca Government Area</h4>
         </div>
         <div class="body">
           {{Auth::user()->lga}}
         </div>
       </div>
       <br>
       <div class="panel raised">
         <div class="head">
           <h4>Phone Number</h4>
         </div>
         <div class="body">
           <a href="tel:{{Auth::user()->pNumber}}">{{Auth::user()->pNumber}}</a>
         </div>
       </div>
       <br>
       <div class="panel raised">
         <div class="head">
           <h4>Email</h4>
         </div>
         <div class="body">
           <a href="mailTo:{{Auth::user()->email}}">{{Auth::user()->email}}</a>

         </div>
       </div>

     </div>
   </div>
</div>
