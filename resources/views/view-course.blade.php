@extends('layouts.preview')

@section('content')
<div class="ui stackable grid">
    <div class="two wide column"></div>
    <div class="twelve wide column">
        <div class="ui secondary inverted menu">
            <a class="active item" data-tab="first">Overview</a>
            <a class="item" data-tab="second">Location</a>
            <a class="item" data-tab="third">Requirements</a>
            <a class="item" data-tab="fourth">Careers</a>
        </div>
        <div class="ui mobile reversed stackable grid">
            <div class="four wide column">
                <img class="sideimage" src="/storage/interface/cardstats2.jpg" alt="">
                <img class="logo" src="/storage/avatars/{{$school->avatar}}" alt="">
                <a class="ui inverted grey visit button" href="/page/{{$preview->school_id}}"><i class="external alternate icon"></i> Visit Page</a>
            </div>
            <div class="ten wide column">
                <div class="ui basic tab active segment" data-tab="first" style="margin-left:5em;color:white;">
                    <h2>{{$preview->course_name}}</h2>
                    <p><i class="stopwatch orange icon"></i> {{$preview->duration}} | <i>Majors: none</i></p>
                    <p class="description">{{$preview->desc}}</p>
                    <h4>Details</h4>
                    <div class="ui four column grid">
                        <div class="column">
                            <p>Enrollment <br> <strong>{{$preview->enrollment}}</strong></p>
                        </div>
                        <div class="column">
                            <p>Tuition <br> <strong>{{$preview->tuition}}</strong></p>
                        </div>
                        <div class="column">
                            <p>Entrance Exam <br> <strong>{{$preview->exam}}</strong></p>
                        </div>
                        <div class="column"></div>
                    </div><br><br>
                    @if (Auth::user()->role == 'student')
                        @if (is_null($registerCheck))
                            <a href="/course/register/{{$preview->course_id}}" class="ui violet button"><i class="pencil alternate icon"></i> Register</a>
                        @else
                            <a href="#" class="ui violet disabled button"><i class="check icon"></i> Registered</a>
                        @endif
                        <button class="ui {{$favoriteCheck == NULL ? 'inverted' : ''}} red icon favorite button" data-title="Course added to favorites" data-position="top center" data-variation="tiny"><i class="heart icon"></i></button>
                    @else
                        <a href="#" class="ui disabled button" data-content="Your account is not qualified to perform this action"><i class="pencil alternate icon"></i> Register</a>
                    @endif
                    @if ($preview->prospectus != NULL)
                        <a href="/storage/documents/{{$preview->prospectus}}" class="ui inverted brown right floated button" download><i class="cloud download icon"></i> Download prospectus</a>
                    @endif
                </div>
                <div class="ui basic tab segment" data-tab="second" style="margin-left:5em;color:white;">
                    @if ($location ?? '')
                        <h4><i class="map marker alternate orange icon"></i>{{$location->place_loc}}</h4>
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCbZMPoMaWaAnuSqpN3kMq8MBjIsYpqy4U&q=place_id:{{$location->place_id}}" frameborder="0" width="550" height="360" allowfullscreen></iframe>
                    @else
                        <img class="ui big image" src="/storage/interface/maptemp.jpg" alt="">
                    @endif
                </div>
                <div class="ui basic tab segment" data-tab="third" style="margin-left:5em;color:white;">
                    <h4><i class="file orange icon"></i> Bring the following documents</h4>
                    @if (count($admissions) > 0)
                        <div class="ui inverted accordion">
                            @foreach ($admissions as $admission)
                                <div class="title">
                                    <i class="dropdown icon"></i>
                                    {{$admission->enrolee_type}}
                                </div>
                                <div class="content">
                                    <div class="transition hidden">{!! $admission->body !!}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="ui basic tab segment" data-tab="fourth" style="margin-left:5em;color:white;">
                    <h4><i class="user md orange icon"></i> Career oppurtunities for this course</h4>
                    <small>Mouse over an item to learn more about a particular career path</small><br><br>
                    <div class="ui relaxed grid">
                        <div class="doubling three column row">
                            <div class="column">
                                <img class="ui avatar left floated image" src="/storage/avatars/maleuser2.jpg">
                                <a href="#" id="career" style="font-weight:bolder;" data-title="Web Developer" data-content="Web developers create web-based systems used by many users on the internet" data-variation="tiny">Web Developer</a>
                            </div>
                            <div class="column">
                                <img class="ui avatar left floated image" src="/storage/avatars/maleuser.png">
                                <a href="#" style="font-weight:bolder;">IT Consultant</a>
                            </div>
                            <div class="column">
                                <img class="ui avatar left floated image" src="/storage/avatars/maleuser2.jpg">
                                <a href="#" style="font-weight:bolder;">Fullstack Developer</a>
                            </div>
                            <div class="column">
                                <img class="ui avatar left floated image" src="/storage/avatars/maleuser.png">
                                <a href="#" style="font-weight:bolder;">Network Administrator</a>
                            </div>
                            <div class="column">
                                <img class="ui avatar left floated image" src="/storage/avatars/maleuser2.jpg">
                                <a href="#" style="font-weight:bolder;">Software Engineer</a>
                            </div>
                            <div class="column">
                                <img class="ui avatar left floated image" src="/storage/avatars/maleuser2.jpg">
                                <a href="#" style="font-weight:bolder;">IT Instructor</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="two wide column"></div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function (){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.favorite.button')
            .popup({
                inline: true,
                delay: {
                    show: 300,
                    hide: 500
                }
            });

            $('.favorite.button').click(function () {
                var user_id = "{{Auth::user()->user_id}}";
                var username = "{{Auth::user()->username}}";
                var school_id = "{{$preview->school_id}}";
                var course_id = "{{$preview->course_id}}";

                var datastr = "username=" + username + "&course_id=" + course_id + "&school_id=" + school_id + "&user_id=" + user_id;
                $.ajax({
                    type: "POST",
                    url: '/dashboard/student/favorites',
                    data: datastr,
                    cache: false,
                    success: function (data) {
                        console.log("posted");
                    },
                    error: function(jqXHR, status, err) {
                        console.log("some shit happened");
                    },
                    complete: function () {
                    }
                });
            });
        });
    </script>
@endsection