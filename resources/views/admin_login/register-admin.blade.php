@extends('layouts.app')

@section('content')
@include('inc.messages')
<div class="ui basic compressed segment">
    <div class="ui stackable centered padded grid">
        <div class="white row">
            <div class="seven wide center aligned column">
                <img class="ui small centered image" src="/storage/interface/logotextdark.png" alt="">
                <br><br><br><br>
                <img class="ui small centered image" src="/storage/interface/university.png" alt="">
                <h3>We just need some info to get your account started. For more info of the features
                    you get for free just by joining. Click <a href="">here</a>
                </h3>
            </div>
            <div class="nine wide blue column">
                <div class="ui basic padded segment">
                    <h1 class="boldheader" style="font-size: 2em;">{{ __('Register') }}</h1>
                    <form class="ui inverted school form" method="POST" action="{{ route('registeradmin')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="fields">
                            <div class="five wide field">
                                <label>School ID</label>
                                <div class="ui inverted transparent input">
                                <input type="text" name="school_id" required>
                                </div>
                            </div>
                            <div class="eleven wide field">
                                <label for="name">Acronym</label>
                                <div class="ui inverted transparent input">
                                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:orangered;">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><br>
                        <div class="field">
                            <label>School Name</label>
                            <div class="ui inverted transparent input">
                            <input type="text" name="school_name" required>
                            </div>
                        </div>
                        <div class="equal width fields">
                            <div class="field">
                                <label for="email">Email</label>
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
                                <input type="text" placeholder="(+63) xxxxxxxxxx" name="contact" required>
                                </div>
                            </div>
                        </div>
                        <div class="equal width fields">
                            <div class="field">
                                <label>Type</label>
                                <select class="ui search fluid dropdown" name="type" id="type" required>
                                    <option value="">Select type</option>
                                    <option value="Public">Public</option>
                                    <option value="Private">Private</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Category</label>
                                <select class="ui search fluid dropdown" name="category" id="category" required>
                                    <option value="">Select type</option>
                                    <option value="University">University</option>
                                    <option value="College">College</option>
                                    <option value="High School">High School</option>
                                    <option value="Elementary">Elementary</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Affiliation</label>
                                <select class="ui search fluid dropdown" name="affiliation" id="affiliation" required>
                                    <option value="">Select type</option>
                                    <option value="Sectarian">Sectarian</option>
                                    <option value="Non-sectarian">Non-sectarian</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>Entrance Exam</label>
                                <select class="ui search fluid dropdown" name="exam" id="exam" required>
                                    <option value="">Select type</option>
                                    <option value="Required">Required</option>
                                    <option value="Not required">Not required</option>
                                </select>
                            </div>
                        </div>
                        
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
                        <div class="fields">
                            <div class="field">
                                <label>Upload a copy of your business permit, certification, etc (pdf, jpg, png)</label>
                                <input type="file" (change)="fileEvent($event)" class="inputfile" name="files[]" id="fileimage" multiple/>
                                <label for="fileimage" class="ui icon labeled brown button">
                                    <i class="cloud upload icon"></i> 
                                    Upload
                                </label>
                            </div>
                            <div class="field">
                                <label>What should I upload?</label>
                                <a class="ui inverted fluid required button" href="#"><i class="question icon"></i></a>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                            <input type="checkbox" tabindex="0" class="hidden">
                            <label>I agree to the <a href="/termsandconditions" style="color: orange;">Terms and Conditions</a></label>
                            </div>
                        </div><br>
                        <input type="hidden" name="role" id="role" value="admin">
                        {{-- <input type="hidden" name="_method" value=""> --}}
                        <button type="submit" class="ui right floated inverted reg button">{{ __('Sign Up') }}</button>
                    </form>
                    <a href="/login" class="ui inverted left floated button"><i class="angle left icon"></i> Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modal.modal-required')
@endsection
