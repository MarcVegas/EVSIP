@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <div class="ui secondary menu">
                <div class="ui left icon input">
                    <input type="text" placeholder="Search...">
                    <i class="search icon"></i>
                </div>
                <div class="right menu">
                    <a class="ui blue button" href="/home">Browse Courses</a>
                </div>
            </div>
        </div>
        <div class="ui basic segment">
            @if (count($favorites) > 0)
                <table class="ui selectable celled small table">
                    <thead>
                        <tr>
                            <th>Acronym</th>
                            <th>Course</th>
                            <th>Degree</th>
                            <th>Duration</th>
                            <th>Enrollment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($favorites as $favorite)
                            <tr>
                                <td>{{$favorite->abbreviation}}</td>
                                <td>{{$favorite->course_name}}</td>
                                <td>{{$favorite->course_categ}}</td>
                                <td>{{$favorite->duration}}</td>
                                <td>{{$favorite->enrollment}}</td>
                                <td>
                                    <div class="ui blue buttons">
                                        <a class="ui view button" href="/home/preview/{{$favorite->course_id}}">View</a>
                                        <div class="ui floating tasks dropdown icon button">
                                            <i class="dropdown icon"></i>
                                            <div class="menu">
                                                <form action="{!! action('FavoritesController@destroy', $favorite->id) !!}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="item deny" type="submit"><i class="delete icon"></i> Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else 
                <div class="ui basic center aligned segment">
                    <br><br>
                    <img src="/storage/interface/wishlist.png" class="ui centered small image" alt="no courses">
                    <h4>No favorites added yet</h4>
                    <p>Press the <strong>Browse</strong> button to start browsing courses to add here</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection