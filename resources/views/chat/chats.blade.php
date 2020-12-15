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
                                        <div class="content">
                                            <div class="header">{{$chat->username}} </div>
                                            @if($chat->unread)
                                                <span class="pending">{{ $chat->unread }}</span><span id="unread-text">unread messages</span>
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
                <div class="twelve wide column">
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
                                                    <div class="dep item" id="{{$department->user_id}}">
                                                        <img class="ui mini avatar image" src="/storage/avatars/{{$department->avatar}}" alt="">
                                                        {{$department->username}}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                {{-- <button class="ui tiny basic icon button"><i class="trash alternate outline icon"></i></button> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="sixteen wide column" style="" id="messages">
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
                                <div class="ui fluid input" id="message-text">
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
                if (my_id == data.from) {
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
                }
            });

            $('.chats').click(function () {
                receiver_id = $(this).attr('id');
                $(this).find('.pending').remove();
                $(this).find('#unread-text').remove();
                $.ajax({
                    type: "GET",
                    url: '/messages/' + receiver_id,
                    data: "",
                    cache: false,
                    success: function (data) {
                        $('#messages').html(data);
                        scrollToBottomFunc();
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

            $('.dep.item').click(function () {
                var assigned_to = $(this).attr('id');

                var datastr = "assigned_to=" + assigned_to;
                    $.ajax({
                        type: "PUT",
                        url: '/messages/assign/' + receiver_id,
                        data: datastr,
                        cache: false,
                        success: function (data) {
                            $('#message-text').addClass('disabled');
                            $('.send.button').addClass('disabled');
                        },
                        error: function(jqXHR, status, err) {
                            console.log("some shit happened");
                        }
                    });
            });

            function scrollToBottomFunc() {
                $('.message-wrapper').animate({
                    scrollTop: $('.message-wrapper').get(0).scrollHeight
                }, 350);
                console.log('scrolled');
            }
        });
    </script>
@endsection