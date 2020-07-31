@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <br><br>
        <div class="ui basic segment">
        <div class="ui stackable grid">
            <div class="eleven wide column">
                <div class="ui segment">
                <div class="gradient-primary card-icon long">
                    <h2 class="header center aligned" style="color: white;">General Information</h2>
                </div><br><br>
                    <form class="ui equal width form" id="profile" action= "{!! action('AdminProfileController@update', Auth::user()->user_id) !!}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="fields">
                            <div class="field">
                                <label>School Name</label>
                                <input placeholder="School name" value="{{$profile->school_name}}" type="text" name="school_name" id="school_name">
                            </div>
                            <div class="field">
                                <label>Acronym</label>
                                <input placeholder="Acronym" value="{{$profile->username}}" type="text" name="username" id="username">
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <input placeholder="Email" value="{{$profile->email}}" type="email" name="email" id="email">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field">
                                <label>Category</label>
                                <select class="ui dropdown" name="category" id="category">
                                    @foreach (Cache::get('category') as $category)
                                        <option value="{{ $category }}"{{ ( $profile->category == $category ) ? ' selected' : '' }}>{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Type</label>
                                <select class="ui dropdown" name="type" id="type">
                                    @foreach (Cache::get('type') as $type)
                                        <option value="{{ $type }}"{{ ( $profile->type == $type ) ? ' selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field">
                                <label>Affiliation</label>
                                <select class="ui dropdown" name="affiliation" id="affiliation">
                                    @foreach (Cache::get('affiliation') as $affiliation)
                                        <option value="{{ $affiliation }}"{{ ( $profile->affiliation == $affiliation ) ? ' selected' : '' }}>{{ $affiliation }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field">
                                <label>Entrance Exam</label>
                                <select class="ui dropdown" name="exam" id="exam">
                                    @foreach (Cache::get('exam') as $exam)
                                        <option value="{{ $exam }}"{{ ( $profile->exam == $exam ) ? ' selected' : '' }}>{{ $exam }}</option>
                                    @endforeach
                                </select>
                            </div>                                  
                            <div class="field">
                                <label>Phone Number</label>
                                <input placeholder="(xxx)" value="{{$profile->contact}}" type="text" name="contact" id="contact">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field">
                                <label>Description</label>
                                <textarea name="description" id="description" rows="5">
                                    {{$profile->description}}
                                </textarea>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="POST">
                        <div class="ui secondary stackable menu">
                            <div class="item">
                                <a class="ui button orange" href="{{ route('password.request') }}">Change Password</a>
                            </div>
                            <div class="right item">
                                <button type="submit" class="ui right labeled icon edit-btn button blue">
                                    <i class="edit outline sub icon"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="five wide column">
                <div class="ui segment center aligned">
                    <div>
                        <img src="/storage/avatars/{{$profile->avatar}}" alt="logo" width="30%" class="ui centered circular image" id="userAvatar">
                    </div>
                    <div class="ui header">Administrator</div>
                    <div class="meta">Your avatar is displayed publicly for all other users. We highly recommend you use PNG images for your logo.</div><br>
                    <input type="file" (change)="fileEvent($event)" form="profile" class="inputfile" name="avatar" id="fileimage"/>
                    <label for="fileimage" class="ui primary button">
                        Change Avatar
                    </label>
                </div>
                <div class="ui segment center aligned">
                    <div class="ui header"><i class="map marker alternate icon"></i>Location</div>
                    <div class="meta location">
                    @if ($location ?? '')
                        {{$location->place_loc}}
                    @else
                        No location set
                    @endif    
                    </div><br>
                    <button class="ui map button olive">Update Location</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="ui gmaps modal">
    <i class="close icon"></i>
    <div class="content">
        <h2>We are located at...</h2> 
            <div class="ui stackable grid">
            <div class="row">
                <div class="six wide column">
                    <div class="ui raised segment">
                        <h5>Search your location</h5>
                        <div class="ui fluid input">
                            <input type="text" name="pac-input" id="pac-input" placeholder="Find your location" autocomplete>
                        </div>
                    </div>
                    <h4><i class="map marker alternate blue icon"></i> <span id="address">No address set</span></h4>
                    <form action="{{route('location.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">
                        <input type="hidden" name="location" id="location">
                        <input type="hidden" name="place_id" id="place_id">
                        <input type="hidden" name="_method" value="POST">
                        <button type="submit" class="ui blue fluid saveloc button">Save Location</button>
                    </form>
                </div>
                <div class="ten wide column">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modal.modal-premium')
@endsection
@section('ajax')
<script src="{{ asset('js/autoCompMaps.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbZMPoMaWaAnuSqpN3kMq8MBjIsYpqy4U&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
        $(document).ready(function () {
            var userid = "{{ Auth::user()->user_id }}";

            $('.map.button').click(function (){
                $('.gmaps.modal').modal('show');
            });
        });
    </script>
@endsection