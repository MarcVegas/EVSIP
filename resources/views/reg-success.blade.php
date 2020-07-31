@extends('layouts.prompt')

@section('content')
<div class="bg">
    <br><br><br><br>
    <div class="ui basic center aligned segment">
        <i class="check icon"></i>
        <h1 class="title">Success!</h1>
        <p class="subtitle">We will send a confirmation email to your email within 24 hours after we approve your application.</p>
        <h4 class="ui paragraph">Application request has been sent. We will need to verify your account first before you can use it.
                We might also contact you using the contact information you provided during the verification process. Thank you and have a good day
        </h4>
        <a class="ui blue large button" href="/login">Go Back</a>
    </div> 
</div>
@endsection