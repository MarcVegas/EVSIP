@extends('layouts.homepage')

@section('content')
@include('inc.navbar')
<br><br>
@include('ads.ads-header')
<div class="ui basic center aligned segment">
    <h1 style="font-family: 'Poppins',sans-serif;font-size: 4em;color: orange;">Start <i class="compass icon"></i> Exploring</h1><br>
    <div class="ui inverted violet large buttons">
        <button class="ui active button">Featured</button>
        <a class="ui button" href="/all">All Courses</a>
    </div>
</div>
<div class="ui stackable centered padded grid">
    <div class="row">
        <div class="three wide column"></div>
        <div class="ten wide column">
            <h5 class="sectiontitle"><i class="thumbs up icon"></i> GREAT OFFERS YOU MIGHT LIKE</h5>
            <div class="jumbotron">
                @foreach ($ads as $ad)
                    <div class="banner">
                        <img src="/storage/backgrounds/{{$ad->background}}" width="845px">
                        <h1 class="adtitle">
                            {{$ad->title}} 
                            @if ($ad->discount != null)
                            <span class="ui black big label"><p style="color: yellow;">{{$ad->discount}}% OFF</p></span>
                            @endif
                        </h1>
                        <p class="sponsor">{{$ad->school_name}}</p>
                        @if ($ad->link != null)
                        <a class="ui purple large button" style="position: absolute;bottom: 25px;right: 5px;" href="/home/preview/{{$ad->user_id}}">Register Now</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="three wide column">
        </div>
    </div><br>
    <div class="row">
        <div class="three wide column"></div>
        <div class="ten wide column">
            <h5 class="sectiontitle"><i class="star icon"></i> RECOMMENDED FOR YOU</h5>
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
                    <img src="/storage/interface/certificate.png" class="ui centered small image" alt="no courses">
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
            <h5 class="sectiontitle"><i class="handshake icon"></i> JOIN THE COMMUNITY</h5>
            <div class="ui equal width stackable grid">
                <div class="column">
                    <img class="ui centered homestat image" src="/storage/interface/cardstats.jpg">
                    <h2 class="stattitle">Users</h2>
                    <h1 class="statnumber">1,500</h1>
                </div>
                <div class="column">
                    <img class="ui centered homestat image" src="/storage/interface/cardstats2.jpg">
                    <h2 class="stattitle">Partners</h2>
                    <h1 class="statnumber">100</h1>
                </div>
                <div class="column">
                    <img class="ui centered homestat image" src="/storage/interface/cardstats3.jpg">
                    <h2 class="stattitle">Registrations</h2>
                    <h1 class="statnumber">1,500</h1>
                </div>
            </div><br><br>
            <p class="sectiontitle" style="text-align: center; font-weight: bolder;">Be part of our ever growing community of users and partner schools in the region. Joining is free and convenient so what are you waiting for?</p>
        </div>
        <div class="three wide column"></div>
    </div>
    <div class="row">
        <div class="three wide column"></div>
        <div class="ten wide column">
            <div class="ui equal width stackable grid">
                <div class="column">
                    <img class="ui medium centered image" src="/storage/interface/handshake.png" alt="">
                </div>
                <div class="column">
                    <div class="ui basic center aligned segment" style="color:white;">
                        <br><br>
                        <h2 class="thefont">Partner with us!</h2>
                        <p style="font-size: 1.3em;font-weight: 700;">Boost the online presence of your school and reach more students
                            in Eastern Visayas. Best of all, it's FREE. Register now or click the
                            button below to learn more.
                        </p>
                        <a class="ui inverted violet button" href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="three wide column"></div>
    </div>
    <div class="row">
        <div class="three wide column"></div>
        <div class="ten wide column">
            
        </div>
        <div class="three wide column"></div>
    </div>
</div>
@endsection
