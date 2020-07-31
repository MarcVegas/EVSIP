@extends('layouts.homepage')

@section('content')
@include('inc.navbar')
<br><br>
@include('ads.ads-header')
<div class="ui basic center aligned segment">
    <h1 style="font-family: 'Poppins',sans-serif;font-size: 4em;color: orange;"><i class="university icon"></i> All Offers</h1><br>
    <div class="ui inverted violet large buttons">
        <a class="ui button" href="/home">Featured</a>
        <button class="ui active button">All Courses</button>
    </div>
</div>
<div class="ui stackable centered grid">
    <div class="four wide column">
        <div class="ui basic segment">
            <div class="ui inverted large form">
                <h3 style="color:white"><i class="sliders horizontal orange icon"></i> Filters</h3>
                <hr>
                <div class="ui inverted accordion">
                    <div class="active title">
                        <i class="dropdown icon"></i>
                        Category
                    </div>
                    <div class="active content">
                        <div class="grouped fields">
                            @foreach (Cache::get('course_categ') as $course_categ)
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="course_categ" value="{{$course_categ}}" tabindex="0" class="hidden">
                                        <label>{{$course_categ}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="ui inverted accordion">
                    <div class="active title">
                        <i class="dropdown icon"></i>
                        Institution
                    </div>
                    <div class="active content">
                        <div class="grouped fields">
                            @foreach (Cache::get('category') as $category)
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="category" value="{{$category}}" tabindex="0" class="hidden">
                                        <label>{{$category}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="ui inverted accordion">
                    <div class="active title">
                        <i class="dropdown icon"></i>
                        Affiliation
                    </div>
                    <div class="active content">
                        <div class="grouped fields">
                            @foreach (Cache::get('affiliation') as $affiliation)
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="affiliation" value="{{$affiliation}}" tabindex="0" class="hidden">
                                        <label>{{$affiliation}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="ui inverted accordion">
                    <div class="active title">
                        <i class="dropdown icon"></i>
                        School Type
                    </div>
                    <div class="active content">
                        <div class="grouped fields">
                            @foreach (Cache::get('type') as $type)
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="type" value="{{$type}}" tabindex="0" class="hidden">
                                        <label>{{$type}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="eleven wide column">
        <div class="ui basic segment">
            @include('inc.messages')
            <div style="text-align:center;">
                <div class="ui action large left icon input">
                    <i class="search icon"></i>
                    <input type="text" placeholder="Search for..." style="width:28em">
                    <button class="ui grey button">Search Now</button>
                </div>
            </div>
            <h5 class="sectiontitle"><i class="book icon"></i> All Courses</h5>
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
            <h5 class="sectiontitle"><i class="thumbs up icon"></i> GREAT OFFERS YOU MIGHT LIKE</h5>
            <div class="jumbotron">
                <div class="banner">
                    <img src="/storage/interface/adbg1.png" width="845px">
                    <h1 class="adtitle">Bachelor Science of Information Technology <span class="ui black big label"><p style="color: yellow;">20% OFF</p></span></h1>
                    <p class="sponsor">Western Leyte College</p>
                    <a class="ui purple large button" style="position: absolute;bottom: 25px;right: 15px;" href="#">Register</a>
                </div>
                <div class="banner">
                    <img src="/storage/interface/adbg2.png" width="845px">
                    <h1 class="adtitle">Bachelor Science of Secondary Education <span class="ui black big label"><p style="color: yellow;">20% OFF</p></span></h1>
                    <p class="sponsor">Western Leyte College</p>
                    <a class="ui purple large button" style="position: absolute;bottom: 25px;right: 15px;" href="#">Register</a>
                </div>
                <div class="banner">
                    <img src="/storage/interface/adbg3.png" width="845px">
                    <h1 class="adtitle">Bachelor Science of Business Administration <span class="ui black big label"><p style="color: yellow;">20% OFF</p></span></h1>
                    <p class="sponsor">Western Leyte College</p>
                    <a class="ui purple large button" style="position: absolute;bottom: 25px;right: 15px;" href="#">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="ui basic segment" style="left:390px;width:1000px;color:white;">
    <div class="ui left dividing rail">
        <div class="ui sticky">
            <h3><i class="sliders horizontal orange icon"></i> Filters</h3>
            <form class="ui inverted form" action="" method="POST">
                <div class="ui inverted accordion">
                    <div class="active title">
                        <i class="dropdown icon"></i>
                        Select category
                    </div>
                    <div class="active content">
                        <div class="grouped fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="category" tabindex="0" class="hidden">
                                    <label>Bachelor</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="category" tabindex="0" class="hidden">
                                    <label>Masters</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="category" tabindex="0" class="hidden">
                                    <label>Doctors</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="category" tabindex="0" class="hidden">
                                    <label>Vocational</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="ui basic segment" id="main">
        @include('inc.messages')
        <div style="text-align:center;">
            <div class="ui action large left icon input">
                <i class="search icon"></i>
                <input type="text" placeholder="Search for..." style="width:28em">
                <button class="ui grey button">Search Now</button>
            </div>
        </div>
        <h5 class="sectiontitle"><i class="book icon"></i> All Courses</h5>
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
        <h5 class="sectiontitle"><i class="thumbs up icon"></i> GREAT OFFERS YOU MIGHT LIKE</h5>
        <div class="jumbotron">
            <div class="banner">
                <img src="/storage/interface/adbg1.png" width="845px">
                <h1 class="adtitle">Bachelor Science of Information Technology <span class="ui black big label"><p style="color: yellow;">20% OFF</p></span></h1>
                <p class="sponsor">Western Leyte College</p>
                <a class="ui purple large button" style="position: absolute;bottom: 25px;right: 75px;" href="#">Register</a>
            </div>
            <div class="banner">
                <img src="/storage/interface/adbg2.png" width="845px">
                <h1 class="adtitle">Bachelor Science of Secondary Education <span class="ui black big label"><p style="color: yellow;">20% OFF</p></span></h1>
                <p class="sponsor">Western Leyte College</p>
                <a class="ui purple large button" style="position: absolute;bottom: 25px;right: 75px;" href="#">Register</a>
            </div>
            <div class="banner">
                <img src="/storage/interface/adbg3.png" width="845px">
                <h1 class="adtitle">Bachelor Science of Business Administration <span class="ui black big label"><p style="color: yellow;">20% OFF</p></span></h1>
                <p class="sponsor">Western Leyte College</p>
                <a class="ui purple large button" style="position: absolute;bottom: 25px;right: 75px;" href="#">Register</a>
            </div>
        </div>
    </div>
</div> --}}
@endsection