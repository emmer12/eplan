@if (count($appDetails->feedbacks) > 0)

  <div class="mobile-chat-toggle icon mobile-action" >
    <i class="comment icon outline inherit"></i>
  </div>

  <div class="chat-div">
    <div class="header">
        <i class="comment alternate outline icon inherit green"></i>
        <span>Messages</span>

        <span class="action"> <i class="angle up icon inherit "></i> </span>
    </div>
    <div class="body">

      @foreach ($appDetails->feedbacks as $feedback)

        <div class="message-container {{ $feedback->user_id==Auth::id() ? 'right' : ''}}">
          <div class="time">
            <img src="{{asset('images/avatar/small/matt.jpg')}}" alt="" class="mini">
          </div>
          <div class="data">
            <div class="message {{ $feedback->type=="Rejected" ? ' has-error-rejected' : ''}}">
              {{$feedback->messages}}
            </div>
            <span class='name'>{{$feedback->user->username}}</span>
          </div>
        </div>
      @endforeach



        {{-- <div class="message-container right">
          <div class="time">
            <img src="{{asset('images/avatar/small/nan.jpg')}}" alt="" class="mini">
          </div>
          <div class="data">
            <div class="message">
              Hello This is a message from
            </div>
            <span class='name'>dupzy</span>
          </div>
        </div> --}}



    </div>

    <div class="footer">
      <audio src="{{asset('audio/bbm_tone.wav')}}" style="display:none"></audio>
      <input type="text" name="" value="" placeholder="Reply">
      <div class="circular ui button icon sendMsg" data-id="{{$appDetails->id}}" data-username="{{Auth::user()->username}}" data-img="{{Auth::user()->profile_pic}}" data-app-img="user-11_1569001555.jpg" data-token={{csrf_token()}}  data-user_id="{{ Auth::id() }}"><i class=" icon inherit send"></i></div>
    </div>
  </div>
@endif
