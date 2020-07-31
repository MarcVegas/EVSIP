@if (count($messages) > 0)
    <ul>
        @foreach ($messages as $message)
            <li class="{{$message->from == Auth::user()->user_id ? 'receiver' : 'sender'}}" style="margin-bottom: 10px;">
                {{$message->body}} <br>
            <small class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</small></li>
        @endforeach
    </ul>
@else 
    <div class="ui basic center aligned segment">
        <br><br>
        <img src="/storage/interface/chat.png" class="ui centered small image" alt="no posts">
        <h4>No conversation started</h4>
        <p>Click on another <strong>chat session</strong> to view messages</p>
    </div>
@endif