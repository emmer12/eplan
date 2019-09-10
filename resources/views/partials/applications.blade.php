
 <div class="wrapper app-wrapper">

<table class="ui t celled table unstackable">
  <thead>
    <tr>
      <th>S/N</th>
      <th>Application Name</th>
      <th>Location</th>
      <th>Status</th>
      <th></th>
    </tr>
  </thead>
  <tbody class="tbody">
    <button class="ui button load" style="display:none">Loading...</button>
    @if (count($applications) < 1)
             <div class="ui message info" role="alert">
               No application yet
             </div>
             @else
               @foreach($applications as $i=>$application)
                 <tr
                 @if ($application->status=="Pending")
                   class="warning"
                 @elseif ($application->status=="Processing")
                   class="warning"
                 @elseif ($application->status=="Rejected")
                   class="negative"
                   @else
                   class="positive"
                 @endif
                 >
                   <td>{{ $i+1 }}</td>
                   <td>{{$application->name}}</td>
                   <td>{{$application->location}}</td>
                   <td class="selectable">
                     <a
                     @if (Auth::guard('admin')->user())
                       href="{{ route('admin.app.details',$application->slug) }}"
                       @else
                       href="{{ route('user.application.details',$application->id) }}"
                     @endif
                     >{{$application->status}}
                       @if ($application->status=="Pending")
                         <i class="pending icon"></i>
                       @elseif ($application->status=="Processing")
                         <i class="loading icon "></i>
                       @elseif ($application->status=="Rejected")
                         <i class="times icon "></i>
                         @else
                         <i class="check icon "></i>
                       @endif
                     </a>
                   </td>
                   <td><div class="ui button default" data="">
                     <a style="color:inherit"
                       href="{{ route('user.application.details',$application->id) }}"
                       ><i class="eye icon " ></i>View Details
                     </a>
                     </div>
                 </td>
                 </tr>
               @endforeach
             </tbody>
             <tfoot>
               <tr><th colspan="5">
                 <div class="ui right floated pagination menu">
                   <a class="icon item">
                     <i class="left chevron icon"></i>
                   </a>
                      {{ $applications->links() }}
                   <a class="icon item">
                     <i class="right chevron icon"></i>
                   </a>
                 </div>
               </th>
             </tr></tfoot>

    @endif



</table>
</div>
