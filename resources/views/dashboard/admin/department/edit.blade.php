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
                <div class="eight wide column">
                    <div class="ui segment">
                        <div class="gradient-primary card-icon long">
                            <h2 class="header center aligned" style="color: white;">Update department</h2>
                        </div><br><br>
                        <form class="ui equal width form" id="dep-form" action="{!! action('DepartmentsController@update', $user->user_id) !!}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="fields">
                                <div class="field">
                                    <label>Username</label>
                                    <input id="name" type="text" value="{{$user->username}}" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:orangered;">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label>Email</label>
                                    <input id="email" type="email" value="{{$user->email}}" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:orangered">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label>Department Name</label>
                                <input id="department" name="department" value="{{$user->department}}" type="text" >
                            </div>
                            <input type="hidden" name="role" id="role" value="subadmin">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="ui secondary menu">
                                <div class="item">
                                    <a class="ui button orange" href="{{ route('password.request') }}">Change Password</a>
                                </div>
                                <div class="right item">
                                    <button type="submit" class="ui green button"><i class="check icon"></i>Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui segment center aligned">
                        <div>
                            <img src="/storage/avatars/{{$user->avatar}}" alt="logo" width="30%" class="ui centered circular image" id="userAvatar">
                        </div>
                        <div class="ui header">Sub-admin</div>
                        <div class="meta">Your avatar is displayed publicly for all other users. We highly recommend you use PNG images for your logo.</div><br>
                        <input type="file" (change)="fileEvent($event)" form="dep-form" class="inputfile" name="avatar" id="fileimage"/>
                        <label for="fileimage" class="ui primary button">
                            Change Avatar
                        </label>
                    </div>
                </div>
                <div class="three wide column"></div>
            </div>
        </div>
    </div>
</div>
@endsection