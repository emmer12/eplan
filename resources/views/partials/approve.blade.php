<table class="ui celled table unstackable">
  <thead>
    <tr>
      <th>S/N</th>
      <th>Application Name</th>
      <th>Location</th>
      <th>Status</th>
      {{-- <th></th> --}}
    </tr>
  </thead>
  <tbody>
    @if (count($applications) < 1)
             <div class="alert alert-info" role="alert">
               No product In the Store
             </div>
    @endif

    @foreach($applications as $i=>$application)
      <tr

      @if ($application->status=="Pending")
        class="warning"
      @elseif ($application->status=="Processing")
        class="warning"
        @else
        class="positive"
      @endif
      >
        <td>{{ $i+1 }}</td>
        <td>{{$application->name}}</td>
        <td>{{$application->location}}</td>
        <td class="selectable">
          <a href="#">{{$application->status}}
            @if ($application->status=="Pending")
              <i class="pending icon "></i>
            @elseif ($application->status=="Processing")
              <i class="loading icon "></i>
              @else
              <i class="check icon "></i>
            @endif
          </a>
        </td>
        {{-- <td><div class="ui red button delete" data=""> <i class="times icon" style="color:white"></i> </div></td> --}}
      </tr>
    @endforeach

  </tbody>
</table>
