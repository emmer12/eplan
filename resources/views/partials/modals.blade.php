{{-- Recieved Modal --}}

<div class="ui received modal">
  <i class="close icon"></i>
  <div class="ui header">
    Recieved
  </div>
  <div class="content">
     <form class="ui form" action="index.html" method="post">
       <div class="msg hide"></div>
          {{ csrf_field() }}
          <input type="hidden" name="appId" value="{{$appDetails->id}}">
          <div class="three fields">
            <div class="field">
              <label for="allocation">Allocation fee</label>
              <input type="number" id="allocation" placeholder="Allocation fee" name="allocation">
            </div>
            <div class="field">
              <label for="assessment">Assessment fee</label>
              <input type="number" id="assessment" placeholder="Assessment fee" name="assessment">
            </div>
            <div class="field">
              <label for="inspection">Inspection Fees</label>
              <input type="number" id="inspection" placeholder="Inspection fee" name="inspection">
            </div>
          </div>

            <div class="three fields">
              <div class="field">
                <label for="time">Meet up Time</label>
                <input type="time" id="time" placeholder="Time" name="time">
              </div>
              <div class="field">
                <label for="date1">Meet up Date 1</label>
                <input type="date" id="date1" placeholder="Date 1" name="date1">
              </div>
              <div class="field">
                <label for="date2">Meet up Date 2</label>
                <input type="date" id="date2" placeholder="Date 2" name="date2">
              </div>
              <div class="field">
                <label for="date3">Meet up Date 3</label>
                <input type="date" id="date3" placeholder="Date 3" name="date3">
              </div>
         </div>

     </form>
  </div>
  <div class="actions">
    <div class="ui green button receive-app-bind">
      <i class="checkmark icon"></i>
        Receive
    </div>
  </div>
</div>




{{-- Reject Modal --}}


<div class="ui reject modal">
  <i class="close icon"></i>
  <div class="ui icon header">
    <i class="cancel icon red"></i>
    Reject
  </div>
  <div class="content">
    <form class="ui form" action="index.html" method="post">
      <div class="msg hide">
      </div>
      {{ csrf_field() }}
      <input type="hidden" name="appId" value="{{$appDetails->id}}">
      <input type="hidden" name="userId" value="{{$appDetails->user_id}}">
      <div class="field">
        <label class="" style="color:orange">Please state clearly the reason for rejection and what the applicant need to readjust</label>
        <textarea name="msg" id="reject-msg" placeholder="reason for rejection"></textarea>
      </div>
    </form>
  </div>
  <div class="actions">
    <div class="ui red cancel button">
      <i class="remove icon inherit"></i>
      Close
    </div>
    <div class="ui green button reject-app-bind">
      Reject
    </div>
  </div>
</div>


{{-- Approve Modal --}}


<div class="ui basic basic-approved modal">
  <div class="ui icon header">
    <i class="checkmark icon"></i>
    Approve
  </div>
  <div class="content">
    <p>Are are about to give approval to this application, click Approve to continue</p>
  </div>
  <div class="actions">
    <div class="ui red basic cancel inverted button">
      <i class="remove icon"></i>
      No
    </div>
    <div class="ui green ok inverted button">
      <i class="checkmark icon"></i>
      Yes
    </div>
  </div>
</div>

<div class="ui small modal opay">
  <div class="header ">Header
      <div class="ui basic cancel cancelmod" style="float:right"><i class="times icon"></i></div>
    </div>
    <div class="ui message msg hide"></div>
  <div class="content">
    <div class="ui placeholder segment">
      <div class="ui two column stackable center aligned grid">
        <div class="ui vertical divider">Or</div>
        <div class="middle aligned row">
          <div class="column">
            <div class="ui icon header">
              <i class="world icon"></i>
              Pay Online
            </div>
            <div class="ui primary button">
              PayNow
            </div>
          </div>
          <div class="column">
            <div class="ui icon header loading">
              <form class="file-handler paid loading" action="{{route("make.payment")}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="pReceipt">
                  <img src="" alt="" width="100%">
                  <i class="file icon"></i>
                </label>
                <input type="hidden" name="type" value="offline">
                <input type="hidden" name="appId" value="{{$appDetails->id}}">
                <input type="file" name="pReceipt" id="pReceipt" class="hide" value="">
                 Submit Offline Payment
              </form>
            </div>
            <div class="ui primary button submitOffline">
              Submit
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Meet Up modal --}}

<div class="ui basic meet-up-modal modal">
  <div class="ui icon header">
    <i class="clock outline icon"></i>
    MeetUp
  </div>
  @if ($received->meetup_date==null)
    <div class="content">
      <p>Are are about to give approval to this application, click <i class="ui label">Meet Up</i> to set the appointment</p>
      <form class="ui form" action="index.html" method="post">
        <div class="msg">

        </div>
        {{ csrf_field() }}
        <input type="hidden" name="appId" value="{{$appDetails->id}}">
        <input type="hidden" name="time" value="{{$received->meetup_time}}">
        <div class="ui radio checkbox">
          <input type="radio" name="meet-up-time" value="{{$received->date->date1 }}">
          <label style="color:#007478"><i class="calendar check icon"></i> {{$received->date->date1 }} </label>
        </div><br><br>
        <div class="ui radio checkbox">
          <input type="radio" name="meet-up-time" value="{{$received->date->date2 }}">
          <label style="color:#007478"><i class="calendar check icon"></i> {{$received->date->date2 }}</label>
        </div><br><br>
        <div class="ui radio checkbox">
          <input type="radio" name="meet-up-time" value="{{$received->date->date3 }}">
          <label style="color:#007478"><i class="calendar check icon"></i> {{$received->date->date3 }}</label>
        </div><br>

        <h5>The inspection time is
          <div class="ui label">
            <i class="clock icon"></i>
            {{$received->meetup_time }}
          </div>
        </h5>

      </form>
    </div>
    <div class="actions">
      <div class="ui red basic cancel inverted button">
        <i class="remove icon inherit"></i>
        Close
      </div>
      <div class="ui green ok inverted button meet">
        <i class="checkmark icon inherit"></i>
        Meet Up
      </div>
    </div>
    @else
      <h4>
        The <b>Meet up</b> time as been schedule to be  <span class="ui label"><i class="calendar outline icon"></i>{{ $received->meetup_date }}</span> by <span class="ui label"><i class="clock outline icon"></i>{{ $received->meetup_time }}</span>
      </h4>
      <div class="actions">
        <div class="ui red basic cancel inverted button">
          <i class="remove icon inherit"></i>
          Close
        </div>
      </div>
  @endif
</div>





{{-- App Fee modal --}}

@if ($received)
  {{-- Calculation Result Model --}}
  <div class="ui app-fee-modal modal mini">
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
              <td>Assessment</td>
              <td class="">{{$received->assessment}}</td>
            </tr>
            <tr>
              <td>Allocation</td>
              <td class="">{{$received->allocation}}</td>
            </tr>
            <tr>
              <td>Inspection</td>
              <td class="">{{$received->inspection}}</td>
            </tr>
          </tbody>
          <tfoot>
            <tr colspan="2"><th> <strong>Total</strong> </th>
              <th class="total">{{$received->assessment + $received->allocation + $received->inspection}}</th>
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

@endif
