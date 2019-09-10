<form class="ui  form ui justified aligned segment" action="{{ route("edit.approval",$appDetails->id) }}" enctype="multipart/form-data" method="post">
  @if (session('success'))
    <div class="ui green message">{{ session('success') }}</div>
  @endif
  @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
      <div class="ui message red">
        {{ $error}}
      </div>
    @endforeach
  @endif
  {{ csrf_field() }}
  {{ method_field("PATCH") }}
  <div class="field {{ $errors->has('name') ? 'error' : '' }}">
    <label for="name">Plan Name</label>
    <input value="{{ $appDetails->name }}" type="text" name="name" id="name" placeholder="Application Name" >
  </div>
  <div class="two fields {{ $errors->has('type') ? 'error' : '' }}">
      <div class="field">
        <label>Type</label>
        <select class="ui fluid dropdown" name="type">
          <option value="{{ $appDetails->type }}">{{ $appDetails->type }}</option>
          <option value="Residential">Residential</option>
          <option value="Commercial">Commercial</option>
          <option value="Industrial">Industrial</option>
        </select>
      </div>
        <div class="field">
          <label>LGA</label>
          <select class="ui fluid dropdown" name="lga">
            <option value="{{ $appDetails->lga }}">{{ $appDetails->lga }}</option>
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
    <div class="field {{ $errors->has('location') ? 'error' : '' }}">
      <label for="location">Proposal Location</label>
      <input value="{{ $appDetails->location }}" type="text" name="location" id="location" >
    </div>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <div class="container">
      <div class="row">
        @php
          $filed=['site_plan','location_plan','floor_plan','front_elevation','rear_elevation','side_elevation','roof_plan']
        @endphp
        @for ($i=0; $i < 7; $i++)
            <div class="col-md-6">
              <div class="field {{ $errors->has('workingDrawings') ? 'error' : '' }}">
                <label>Upload Your <b>{{ $filed[$i] }}</b> in (Jpg) Format</label>
                <input value="" type="file" name="{{$filed[$i]}}" class="dropify working_drawings" id="p-image" >
              </div>
            </div>
        @endfor
       <hr>
        <div class="clone " style="display:none">
           <div class="control-group input-group" style="margin-top:10px">
             <input type="file" name="additional_doc[]" class="form-control">
             <div class="input-group-btn" id="remove">
               <button class="ui red button btn-remove" type="button"><i class="icon minus" style="color:white"></i></button>
             </div>
           </div>
         </div>

         <br>
      </div>
    </div>
    <button class="ui basic button additional increment" type="button" style="margin-top:30px">
      <i class="icon plus"></i>
      Add More Document
    </button><br><br>

  <div class="ui submit button teal">Update</div>
</form>
