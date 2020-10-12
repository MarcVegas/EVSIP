@extends('layouts.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        @include('inc.messages')
        <div class="ui basic segment">
            <div class="ui pointing menu">
                <a href="#" class="active item" data-tab="first"><i class="user outline icon"></i> Profile</a>
                <a href="#" class="item" data-tab="second"><i class="file alternate outline icon"></i> Files</a>
                <div class="right menu">
                    <div class="item">
                        <button class="ui button">Guidelines</button>
                    </div>
                    <div class="item">
                        <a class="ui green approve button" onclick="event.preventDefault();
                        document.getElementById('approve-form').submit();"><i class="check icon"></i> Approve</a>
                        <form id="approve-form" action="{!! action('StudentRegistrationController@update', $profile->user_id) !!}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="course_id" id="course_id" value="{{$profile->course_id}}">
                            <input type="hidden" name="school_id" id="school_id" value="{{$profile->school_id}}">
                            <input type="hidden" name="_method" value="PUT">
                        </form>
                    </div>
                </div>
            </div>
            <div class="ui basic active tab segment" data-tab="first">
                <div class="ui stackable grid">
                    <div class="eight wide column">
                        <h3>Applicant Information</h3>
                        <div class="ui form">
                            <div class="field">
                                <label>Fullname</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" name="fname" id="fname" value="{{$profile->firstname}}" readonly>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="lname" id="lname" value="{{$profile->lastname}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Gender</label>
                                <input type="text" name="gender" id="gender" value="{{$profile->gender}}" readonly>
                            </div>
                            <div class="field">
                                <label>Type</label>
                                <input type="text" name="type" id="type" value="{{$profile->type}}" readonly>
                            </div>
                            <div class="field">
                                <label>Contact</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" name="email" id="email" value="{{$contacts->email}}" readonly>
                                    </div>
                                    <div class="field">
                                        <input type="text" name="contact" id="contact" value="{{$profile->contact}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="two wide column"></div>
                    <div class="six wide column">
                        <div class="ui basic segment">
                            <img class="ui small circular centered image" src="/storage/avatars/{{$contacts->avatar}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui basic tab segment" data-tab="second">
                @if (count($requirements) > 0)
                    <div class="ui stackable four link cards">
                        @foreach ($requirements as $requirement)
                            <div class="card" >
                                <div class="image">
                                    @if ($requirement->type == 'pdf')
                                        <img src="/storage/requirements/pdf.png" alt="">
                                    @else
                                        <img src="/storage/requirements/{{$requirement->filename}}" alt="">
                                    @endif
                                </div>
                                <div class="content">
                                    <div class="header">{{$requirement->filename}}</div>
                                    <div class="description">Filetype: {{$requirement->type}}</div>
                                </div>
                                <div class="extra content">
                                    <div class="ui two buttons">
                                        <a class="ui button" href="/storage/requirements/{{$requirement->filename}}" target="_blank">View</a>
                                        <a class="ui button" href="/storage/requirements/{{$requirement->filename}}" download="{{$requirement->filename}}" target="_blank">Download</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@include('modal.modal-premium')
@include('modal.modal-approve')
@endsection