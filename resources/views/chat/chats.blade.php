@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        <div class="ui basic padded segment">
            <div class="ui stackable grid">
                <div class="four wide column">
                    <div class="ui attached segment" style="overflow-y:auto;max-height:32em;">
                        <h2 style="color: #434a77;">Chat</h2>
                        {{-- <button class="ui icon button"><i class="ellipsis vertical icon"></i></button> --}}
                        <hr>
                        @if (count($chats) > 0)
                            <div class="ui large middle aligned selection list">
                                @foreach ($chats as $chat)
                                    <div class="chats item" id="{{$chat->user_id}}">
                                        <img class="ui avatar left floated image" src="/storage/avatars/{{$chat->avatar}}">
                                        @if ($chat->assigned_to != NULL)
                                            <a class="ui mini right floated green circular label">assigned</a>
                                        @else 
                                            <a class="ui mini right floated blue circular label">unassigned</a>
                                        @endif
                                        <div class="content">
                                            <div class="header">{{$chat->username}} </div>
                                            @if($chat->unread)
                                                <span class="pending">{{ $chat->unread }} unread messages</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else 
                            <div class="ui basic center aligned segment">
                                <br><br>
                                <img src="/storage/interface/conversation.png" class="ui centered tiny image" alt="no posts">
                                <h4>No chats yet</h4>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="seven wide column">
                    <div class="ui grid">
                        <div class="row">
                            <div class="nine wide column">
                            <h3></h3>
                            </div>
                            <div class="seven wide right aligned column">
                                @if (Auth::user()->role == 'admin')
                                    <div class="ui tiny basic icon labeled floating dropdown button">
                                        <i class="user outline icon"></i>
                                        <span class="text"><img class="ui mini avatar image" src="/storage/avatars/{{Auth::user()->avatar}}" alt="">{{Auth::user()->username}}</span>
                                        <div class="left menu">
                                            <div class="header">Assign to</div>
                                            @if (count($departments) > 0)
                                                @foreach ($departments as $department)
                                                    <div class="item">
                                                        <img class="ui mini avatar image" src="/storage/avatars/{{$department->avatar}}" alt="">
                                                        {{$department->username}}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <button class="ui tiny basic icon button"><i class="trash alternate outline icon"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="sixteen wide column" style="overflow-y:auto;max-height:30em;" id="messages">
                                <div class="ui basic center aligned segment">
                                    <br><br>
                                    <img src="/storage/interface/chat.png" class="ui centered small image" alt="no posts">
                                    <h4>No conversation started</h4>
                                    <p>Click on another <strong>chat session</strong> to view messages</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui grid">
                        <div class="row">
                            <div class="twelve wide column">
                                <div class="ui fluid input">
                                    <input type="text" placeholder="Type your message" class="message-body" name="body" id="body">
                                </div>
                            </div>
                            <div class="four wide column">
                                <button class="ui blue icon labeled circular send button" tabindex="0">
                                    <i class="paper plane icon"></i>
                                    Send
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui segment">
                        <h2 style="color: #434a77;">Profile</h2>
                        <hr>
                        @if (Auth::user()->role != 'student')
                            <div class="ui secondary menu">
                                <a class="active item" data-tab="first">Profile</a>
                                <a class="item" data-tab="second">Responses</a>
                            </div>
                        @endif
                        <div class="ui basic center aligned active tab segment" data-tab="first">
                            <div class="ui basic center aligned segment">
                                <br><br>
                                <img src="/storage/interface/student.png" class="ui centered small image" alt="no scholarships">
                                <h4>Profile is displayed here</h4>
                            </div>
                        </div>
                        <div class="ui basic tab segment" data-tab="second">
                            <div class="ui middle aligned horizontal list">
                                <div class="item">
                                    <a class="ui brown label">Requirements</a>
                                    <div class="ui flowing popup top left transition hidden">
                                        <h5>Requirements</h5>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                             Reiciendis eligendi, excepturi accusamus dolorem perspiciatis</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <a class="ui brown label">Enrollment period</a>
                                </div>
                                <div class="item">
                                    <a class="ui brown label">Scholarship</a>
                                </div>
                                <div class="item">
                                    <a class="ui brown label">Courses</a>
                                </div>
                            </div>
                            <h5>Add new automated response</h5>
                            <form class="ui form">
                                <div class="field">
                                    <label>Keyword</label>
                                    <input type="text" placeholder="Enter keyword">
                                </div>
                                <div class="field">
                                    <label>Response</label>
                                    <textarea rows="2" placeholder="Enter response"></textarea>
                                </div>
                                <button class="ui inverted violet icon labeled fluid button">Add Keyword <i class="plus icon"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('ajax')
    <script>
        var receiver_id = '';
        var my_id = "{{ Auth::user()->user_id }}";

        $(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('12c4db1b0696801100e9', {
        cluster: 'ap1',
        forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
            console.log('triggered');
        });

            $('.chats').click(function () {
                receiver_id = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: '/messages/' + receiver_id,
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#messages').html(data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            $(document).on('keyup','.message-body', function (e){
                var message = $(this).val();

                if (e.keyCode == 13 && message != '' && receiver_id != '') {
                    $(this).val('');

                    var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                    $.ajax({
                    type: "POST",
                    url: 'messages',
                    data: datastr,
                    cache: false,
                    success: function (data) {
                        /* if (my_id == data.from) {
                            $('#' + data.to).click();
                        } else if (my_id == data.to) {
                            if (receiver_id == data.from) {
                                // if receiver is selected, reload the selected user ...
                                $('#' + data.from).click();
                            } else {
                                // if receiver is not seleted, add notification for that user
                                var pending = parseInt($('#' + data.from).find('.pending').html());

                                if (pending) {
                                    $('#' + data.from).find('.pending').html(pending + 1);
                                } else {
                                    $('#' + data.from).append('<span class="pending">1</span>');
                                }
                            }
                        } */
                    },
                    error: function(jqXHR, status, err) {
                        console.log("some shit happened");
                    },
                    complete: function () {
                        console.log("huh...that actually worked");
                    }
                });
                }
            });
        });
    </script>
@endsection