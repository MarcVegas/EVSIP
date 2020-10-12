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
                    <div class="ui equal width form">
                        <div class="fields">
                            <div class="field">
                                <label>School Name</label>
                                <input placeholder="School name" value="{{$profile->school_name}}" type="text" name="school_name" readonly>
                            </div>
                            <div class="field">
                                <label>Acronym</label>
                                <input placeholder="Acronym" value="{{$profile->username}}" type="text" name="username" readonly>
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <input placeholder="Email" value="{{$profile->email}}" type="email" name="email" readonly>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field">
                                <label>Category</label>
                                <input value="{{$profile->category}}" type="text" name="category" readonly>
                            </div>
                            <div class="field">
                                <label>Type</label>
                                <input value="{{$profile->type}}" type="text" name="type" readonly>
                            </div>
                            <div class="field">
                                <label>Affiliation</label>
                                <input value="{{$profile->affiliation}}" type="text" name="affiliation" readonly>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field">
                                <label>Entrance Exam</label>
                                <input value="{{$profile->exam}}" type="text" name="exam" readonly>
                            </div>                                  
                            <div class="field">
                                <label>Phone Number</label>
                                <input placeholder="(xxx)" value="{{$profile->contact}}" type="text" name="contact" id="contact">
                            </div>
                        </div>
                        <div class="ui basic segment">
                            {{$profile->description}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="five wide column">
                <div class="ui segment center aligned">
                    <div>
                        <img src="/storage/avatars/{{$profile->avatar}}" alt="logo" width="30%" class="ui centered circular image" id="userAvatar">
                    </div>
                    <div class="ui header">School Administrator</div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection