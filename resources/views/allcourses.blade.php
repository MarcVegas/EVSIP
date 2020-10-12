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
<div class="ui text container">
    @include('inc.messages')
    <form class="ui inverted form" action="{{route('pages.all')}}" action="GET">
        <div class="ui action large left icon fluid input">
            <i class="search icon"></i>
            <input type="text" name="search" placeholder="Search for..." style="width:28em">
            <button class="ui blue button" type="submit">Search Now</button>
        </div><br>
    </form>
    <div class="ui inverted form">
        <div class="three fields">
            <div class="field">
                <label>Category</label>
                <select class="ui search course_categ dropdown" name="course_categ" id="">
                    <option value="">Select one</option>
                    @foreach (Cache::get('course_categ') as $course_categ)
                        <option value="{{$course_categ}}">{{$course_categ}}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label>Institution</label>
                <select class="ui search category dropdown" name="category" id="">
                    <option value="">Select Category</option>
                    @foreach (Cache::get('category') as $category)
                        <option value="{{$category}}">{{$category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label>School Type</label>
                <select class="ui search type dropdown" name="type" id="">
                    <option value="">Select Type</option>
                    @foreach (Cache::get('type') as $type)
                        <option value="{{$type}}">{{$type}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    @if ($searched ?? '')
        <h5 class="sectiontitle"><i class="search icon"></i> Search results</h5>
        @if (count($searched) > 0)
            <div class="ui stackable three cards">
                @foreach ($searched as $search)
                    <div class="ui raised link view card" id="getCourse">
                        <input type="hidden" name="course_id" id="course_id" value="{{$search->course_id}}">
                        <a href="/home/preview/{{$search->course_id}}">
                            <div class="ui green label floatlabel">{{$search->duration}}</div>
                            <br><br><br>
                            <img class="ui small circular centered image" src="/storage/avatars/{{$search->avatar}}" alt="logo">
                        </a>
                        <p class="floatdesc">{{$search->course_name}}</p>
                    </div>
                @endforeach
            </div>
        @else 
            <div class="ui basic center aligned segment">
                <br><br>
                <img src="/storage/interface/certificate.png" class="ui centered small image" alt="no courses">
                <h4>We coudn't find the course you are looking for</h4>
            </div>
        @endif
    @endif
    <h5 class="sectiontitle"><i class="book icon"></i> All Courses</h5>
    <div id="courses-card">
        @if ($courses ?? '')
            <div class="ui stackable three cards">
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
            <div class="ui center aligned basic segment">
                {{$courses->links('vendor.pagination.semantic-ui')}}
            </div>
        @else 
            <div class="ui basic center aligned segment">
                <br><br>
                <img src="/storage/interface/certificate.png" class="ui centered small image" alt="no courses">
                <h4>No courses to display yet</h4>
                <p>This could be a server problem. Try again later</p>
            </div>
        @endif
    </div>
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
@endsection

@push('ajax')
    <script>
        var course_categ;
        var category;
        var type;
        var datastr;

        function filterSearch(datastr) {
            $.ajax({
                type: "GET",
                url: '/filter/course',
                data: datastr,
                cache: false,
                success: function (data) {
                    $('#courses-card').html(data);
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        $('.course_categ.dropdown').dropdown({
            onChange: function(value, text, $selectedItem){
                course_categ = value;
                datastr = 'course_categ=' + course_categ + '&';
                if (category != null && type != null) {
                    filterSearch(datastr);
                }
            }
        });

        $('.category.dropdown').dropdown({
            onChange: function(value, text, $selectedItem){
                category = value;
                datastr = datastr + 'category=' + category + '&';
                if (course_categ != null && type != null) {
                    filterSearch(datastr);
                }
            }
        });

        $('.type.dropdown').dropdown({
            onChange: function(value, text, $selectedItem){
                type = value;
                datastr = datastr + 'type=' + type + '&';
                if (category != null && course_categ != null) {
                    filterSearch(datastr);
                }
            }
        });
    </script>
@endpush