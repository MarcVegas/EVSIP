@extends('layouts.app')

@section('content')
@include('inc.messages')
<div class="ui basic compressed segment">
    <div class="ui stackable centered padded grid">
        <div class="white row">
            <div class="seven wide center aligned column">
                <img class="ui small centered image" src="/storage/interface/logotextdark.png" alt="">
                <br><br><br><br>
                <img class="ui small centered image" src="/storage/interface/student.png" alt="">
                <h2>One step closer to creating your free account</h2>
            </div>
            <div class="nine wide blue column">
                <div class="ui basic padded segment">
                    <h1 class="boldheader" style="font-size: 2em;">{{ __('Register') }}</h1>
                    <form class="ui inverted form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="eight wide field">
                            <label for="name">{{ __('Username') }}</label>
                            <div class="ui inverted transparent input">
                            <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:orangered">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>
                        <div class="equal width fields">
                            <div class="field">
                                <label>Firstname</label>
                                <div class="ui inverted transparent input">
                                <input type="text" name="fname" id="fname" required>
                                </div>
                            </div>
                            <div class="field">
                                <label>Lastname</label>
                                <div class="ui inverted transparent input">
                                <input type="text" name="lname" id="lname" required>
                                </div>
                            </div>
                        </div><br>
                        <div class="equal width fields">
                            <div class="field">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <div class="ui inverted transparent input">
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:orangered">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="field">
                                <label>Contact</label>
                                <div class="ui inverted transparent input">
                                <input type="text" placeholder="(+63) xxxxxxxxxx" name="contact" id="contact" required>
                                </div>
                            </div>
                        </div><br>
                        <div class="equal width fields">
                            <div class="field">
                                <label for="password">{{ __('Password') }}</label>
                                <div class="ui inverted transparent input">
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="field">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <div class="ui inverted transparent input">
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>Gender</label>
                            <select class="ui search fluid dropdown" name="gender" id="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                            <input type="checkbox" tabindex="0" class="hidden">
                            <label>I agree to the <a href="/termsandconditions" style="color: orange;">Terms and Conditions</a></label>
                            </div>
                        </div><br>
                        <input type="hidden" name="role" id="role" value="student">
                        <input type="hidden" name="_method" value="POST">
                        <button type="submit" class="ui right floated inverted signup button">{{ __('Sign Up') }}</button>
                    </form>
                    <a href="/login" class="ui inverted left floated button"><i class="angle left icon"></i> Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
