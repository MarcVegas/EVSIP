@extends('layouts.match')

@section('content')
@include('inc.navbar')
<div class="ui basic match-tab segment">
    <div class="ui stackable centered padded grid">
        <div class="dark row">
            <div class="sixteen wide column" style="height: 480px;">
            <h2 class="ui horizontal inverted part-title divider header">Course Matcher</h2>
            <div class="ui basic active tab segment" data-tab="first">
                <p class="part-subtitle">Please select one option</p>
                <div class="ui basic center aligned segment" style="padding: 9em 15em 5em 15em !important;">
                    <div class="ui large buttons">
                        <button class="ui blue first button" data-tab="second">Senior High School</button>
                        <div class="or"></div>
                        <button class="ui grey first button" data-tab="second">Colleges/Universities</button>
                    </div>
                </div>
            </div>
            <div class="ui basic tab segment" data-tab="second">
                <div class="ui basic padded segment" style="height:370px;overflow-y:auto">
                    <div class="ui five cards">
                        <div class="ui link card">
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/027-book.png" alt="">
                                <div class="subject" style="margin-top: 5px">Literature</div>
                            </div>
                        </div>
                        <div class="ui link card">
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/025-chemistry.png" alt="">
                                <div class="subject" style="margin-top: 5px">Chemistry</div>
                            </div>
                        </div>
                        <div class="ui link card">
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/028-microscope.png" alt="">
                                <div class="subject" style="margin-top: 5px">Biology</div>
                            </div>
                        </div>
                        <div class="ui link card">
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/011-physics.png" alt="">
                                <div class="subject" style="margin-top: 5px">Physics</div>
                            </div>
                        </div>
                        <div class="ui link card">
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/015-innovation.png" alt="">
                                <div class="subject" style="margin-top: 5px">Engineering</div>
                            </div>
                        </div>
                        <div class="ui link card">
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/010-sports.png" alt="">
                                <div class="subject" style="margin-top: 5px">Sports and Wellness</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align:center;">
                    <a href="#" class="ui blue second button" data-tab="third">Next <i class="arrow right icon"></i></a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection