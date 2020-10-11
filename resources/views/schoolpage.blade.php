@extends('layouts.page')

@section('content')
@include('inc.navbar')
<div class="ui basic very padded segment" style="padding-left:9em !important;padding-right:9em !important;">
    <div class="ui raised landing very padded segment">
        <div class="ui horizontal list">
            <div class="item">
                <img class="ui circular medium image" src="/storage/avatars/{{$school->avatar}}">
                <div class="content" style="color:white">
                    <h1 style="font-size:4em;">{{$school->school_name}}</h1>
                    
                </div>
            </div>
        </div>
        <div class="ui basic center aligned segment">
            <div class="ui inverted horizontal relaxed list">
                <a href="#annoucements" class="active item">Announcements</a>
                <a href="#offerings" class="item">Our Offers</a>
                <a href="#history" class="item">History</a>
                <a href="#gallery" class="item">Gallery</a>
                <a href="#location" class="item">Location</a>
            </div>
        </div>
    </div>
</div>
<div class="ui stackable grid">
    <div class="row">
        <div class="three wide column"></div>
        <div class="ten wide column">
            @if ($announcements ?? '')
                <h5 class="sectiontitle"><i class="bullhorn icon"></i> NEWS AND ANNOUNCEMENTS</h5><br>
                <div class="jumbotron">
                    @foreach ($announcements as $announcement)
                        <div class="flashcard">
                            <div class="ui grid">
                                <div class="middle aligned row">
                                    <div class="four wide column">
                                        <img class="ui small rounded centered image" src="/storage/interface/forum.png" alt="">
                                    </div>
                                    <div class="twelve wide column">
                                        <h2 class="ui inverted header">
                                            {{$announcement->title}}
                                            <div class="sub header">
                                                {{$announcement->body}}
                                            </div>
                                        </h2>
                                        @if ($announcement->post != NULL)
                                            <a class="ui basic teal small button" href="/forum/{{$announcement->post}}">Know more</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="three wide column"></div>
    </div>
    <div class="row">
        <div class="three wide column"></div>
        <div class="ten wide column">
            <h5 class="sectiontitle"><i class="star icon"></i> OUR COURSES</h5>
            @if (count($courses) > 0)
                <div class="ui stackable four cards">
                    @foreach ($courses as $course)
                        <div class="ui raised link view card" id="getCourse">
                            <input type="hidden" name="course_id" id="course_id" value="{{$course->course_id}}">
                            <a href="/home/preview/{{$course->course_id}}">
                                <div class="ui green label floatlabel">{{$course->duration}}</div>
                                <br><br><br>
                                <img class="ui small circular centered image" src="/storage/avatars/{{$course->avatar}}" alt="logo">
                            </a>
                            <p class="floatdesc">{{$course->course_name}}</p>
                        </div>
                    @endforeach
                </div>
                {{$courses->links()}}
            @else 
                <div class="ui basic center aligned segment">
                    <br><br>
                    <img src="/storage/interface/box.png" class="ui centered small image" alt="no courses">
                    <h4>No courses to display yet</h4>
                    <p>This could be a server problem. Try again later</p>
                </div>
            @endif
        </div>
        <div class="three wide column"></div>
    </div>
    <div class="row">
        <div class="three wide column"></div>
        <div class="ten wide column">
            <h5 class="sectiontitle"><i class="map marker icon"></i> FIND US HERE</h5>
            <img class="ui rounded image" src="/storage/interface/maptemp.jpg" alt="">
            {{-- @if ($location ?? '')
                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCbZMPoMaWaAnuSqpN3kMq8MBjIsYpqy4U&q=place_id:{{$location->place_id}}" frameborder="0" width="840" height="435" allowfullscreen></iframe>
            @else
                <img class="ui rounded image" src="/storage/interface/maptemp.jpg" alt="">
            @endif --}}
        </div>
        <div class="three wide column"></div>
    </div>
    <div class="row">
        <div class="three wide column"></div>
        <div class="ten wide column">
            @if ($page ?? '')
                <h5 class="sectiontitle"><i class="certificate icon"></i> WHAT WE STAND FOR</h5>
                <div class="ui basic segment">
                    <div class="ui two column stackable center aligned grid">
                        <div class="ui vertical divider"></div>
                        <div class="row">
                            <div class="column">
                                <h2 class="sectiontitle">MISSION</h2>
                                <p style="color: white;font-size:1.3em">{{$page->mission}}</p>
                            </div>
                            <div class="column">
                                <h2 class="sectiontitle">VISION</h2>
                                <p style="color: white;font-size:1.3em">{{$page->vision}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="three wide column"></div>
    </div>
</div>
<br><br>
@if (Auth::user()->role != 'admin')
<button class="ui blue circular icon chatapp big button"><i class="envelope outline icon large"></i></button>
<div class="ui custom popup transition hidden">
    <div class="ui segments">
        <div class="ui inverted blue segment">
            <h3 class="ui header">
                <img src="/storage/avatars/{{$school->avatar}}">
                <div class="content">
                    Hello there
                    <div class="sub header" style="color:white">We usually respond in a few hours</div>
                </div>
            </h3>
        </div>
        <div class="ui segment">
            <div id="chat-feed">
                <div class="ui basic segment" id="messages">
                    <i class="comments outline teal big icon"></i>
                    <br>
                    Get in touch by sending us a message
                </div>
            </div>
            <div class="ui action input">
                <input type="text" placeholder="Type your message" class="message-body" name="body" id="body">
                <button class="ui blue right send button">
                  <i class="paper plane icon"></i>
                  Send
                </button>
              </div>
        </div>
    </div>
</div>
@endif
@endsection

@push('ajax')
    <script>
        $(document).ready(function () {
            var message;
            var receiver_id = "{{$school->school_id}}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var resizePopup = function(){$('.ui.popup').css('max-height', $(window).height());};

            $(window).resize(function(e){
                resizePopup();
            });

            Pusher.logToConsole = true;

            var pusher = new Pusher('12c4db1b0696801100e9', {
            cluster: 'ap1',
            forceTLS: true
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                fetchMessages();
            });

            $('.chatapp.button').popup({
                popup : $('.custom.popup'),
                on    : 'click',
                lastResort: 'bottom right',
                onShow: function(){
                    resizePopup();
                },
            });

            function fetchMessages() {
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
            }

            fetchMessages();

            $(document).on('click','.send.button', function (e){
                var message = $('.message-body').val();

                if (message != '' && receiver_id != '') {
                    $('.message-body').val("");

                    var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                    $.ajax({
                    type: "POST",
                    url: '/messages',
                    data: datastr,
                    cache: false,
                    success: function (data) {
                        fetchMessages();
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

            /* $('.send.button').click(function (e) {
                message = $('.message-body').val();

                if (receiver_id != '' && message != '') {
                    var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                    $.ajax({
                        type: "POST",
                        url: '{{route("messages.store")}}',
                        data: datastr,
                        cache: false,
                        success: function (data) {
                            fetchMessages();
                            $('#message-body').val("");
                        },
                        error: function(jqXHR, status, err) {
                            console.log(err);
                        }
                    });
                }
            }); */
        });
    </script>
@endpush