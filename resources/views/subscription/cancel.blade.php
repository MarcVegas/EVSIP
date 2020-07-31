@extends('layouts.app')

@section('content')
<div class="ui basic compressed segment">
    <div class="ui stackable padded grid">
        <div class="white row">
            <div class="column">
                <div class="ui basic very padded center aligned segment">
                    <img class="ui small centered image" src="/storage/interface/exit.png" alt="">
                    <h2>Your subscription has been cancelled</h2>
                    <p><b>We are sad to see you go. Tell us what's wrong</b></p>
                    <form class="ui form" action="">
                        <div class="grouped fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="issue" tabindex="0" class="hidden">
                                    <label>The service is too expensive</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="issue" tabindex="0" class="hidden">
                                    <label>Needs more premium features</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="issue" tabindex="0" class="hidden">
                                    <label>We rarely use premium features</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="issue" tabindex="0" class="hidden">
                                    <label>Performance needs to be improved</label>
                                </div>
                            </div><br>
                            <a class="ui basic grey button" href="/dashboard/admin">Go to Dashboard</a>
                            <button class="ui blue button" type="submit">Submit Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection