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
                            <h2 class="header center aligned" style="color: white;">Create department</h2>
                        </div><br><br>
                        <form class="ui equal width form" id="dep-form" action="{{route('departments.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="fields">
                                <div class="field">
                                    <label>Username</label>
                                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:orangered;">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label>Email</label>
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:orangered">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="field">
                                <label>Department Name</label>
                                <input id="department" name="department" type="text" >
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>{{ __('Password') }}</label>
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                                <div class="field">
                                    <label>{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <input type="hidden" name="role" id="role" value="subadmin">
                            <div class="ui secondary menu">
                                <div class="item">
                                    <a class="ui red button" href="{{route('departments.index')}}">Cancel</a>
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
                            <img src="/storage/avatars/maleuser.png" alt="logo" width="30%" class="ui centered circular image" id="userAvatar">
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