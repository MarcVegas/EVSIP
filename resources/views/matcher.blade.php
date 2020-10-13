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
                        <button class="ui blue first button" data-tab="second" id="Senior High School">Senior High School</button>
                        <div class="or"></div>
                        <button class="ui grey first button" data-tab="second" id="College">Colleges/Universities</button>
                    </div>
                </div>
            </div>
            <div class="ui basic tab segment" data-tab="second">
                <p class="part-subtitle">Select one or more that interests you</p>
                <div class="ui basic padded segment" style="height:370px;overflow-y:auto">
                    <div class="ui five cards">
                        <div class="ui link card" data-id="1">
                            <a class="ui green right corner hidden label" id="1">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/027-book.png" alt="">
                                <div class="subject" style="margin-top: 5px">Literature</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="2">
                            <a class="ui green right corner hidden label" id="2">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/025-chemistry.png" alt="">
                                <div class="subject" style="margin-top: 5px">Chemistry</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="3">
                            <a class="ui green right corner hidden label" id="3">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/028-microscope.png" alt="">
                                <div class="subject" style="margin-top: 5px">Biology</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="4">
                            <a class="ui green right corner hidden label" id="4">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/011-physics.png" alt="">
                                <div class="subject" style="margin-top: 5px">Physics</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="5">
                            <a class="ui green right corner hidden label" id="5">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/015-innovation.png" alt="">
                                <div class="subject" style="margin-top: 5px">Engineering</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="6">
                            <a class="ui green right corner hidden label" id="6">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/010-sports.png" alt="">
                                <div class="subject" style="margin-top: 5px">Sports and Wellness</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="7">
                            <a class="ui green right corner hidden label" id="7">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/003-teacher.png" alt="">
                                <div class="subject" style="margin-top: 5px">Mathema<br>tics</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="8">
                            <a class="ui green right corner hidden label" id="8">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/012-music-and-multimedia.png" alt="">
                                <div class="subject" style="margin-top: 5px">Multimedia</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="9">
                            <a class="ui green right corner hidden label" id="9">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/030-painting.png" alt="">
                                <div class="subject" style="margin-top: 5px">Arts</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="10">
                            <a class="ui green right corner hidden label" id="10">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/013-ruler.png" alt="">
                                <div class="subject" style="margin-top: 5px">Drafting</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="11">
                            <a class="ui green right corner hidden label" id="11">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/014-learning-1.png" alt="">
                                <div class="subject" style="margin-top: 5px">Technology</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="12">
                            <a class="ui green right corner hidden label" id="12">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/017-history.png" alt="">
                                <div class="subject" style="margin-top: 5px">History</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="13">
                            <a class="ui green right corner hidden label" id="13">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/020-geography.png" alt="">
                                <div class="subject" style="margin-top: 5px">Geography</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="14">
                            <a class="ui green right corner hidden label" id="14">
                                <i class="check icon"></i>
                            </a>
                            <div class="content">
                                <img class="ui left floated large avatar image" src="/storage/subjects/029-astronomy.png" alt="">
                                <div class="subject" style="margin-top: 5px">Astronomy</div>
                            </div>
                        </div>
                        <div class="ui link card" data-id="15">
                            <a class="ui green right corner hidden label" id="15">
                                <i class="check icon"></i>
                            </a>
                            <div class="content" id="Entrepreneurship">
                                <img class="ui left floated large avatar image" src="/storage/subjects/024-learning.png" alt="">
                                <div class="subject" style="margin-top: 5px">Entrepre<br>neurship</div>
                            </div>
                        </div>
                    </div><br>
                    <div style="text-align:center;">
                        <button class="ui blue second button" data-tab="third">Next <i class="arrow right icon"></i></button>
                    </div>
                </div>
            </div>
            <div class="ui basic tab segment" data-tab="third">
                <div class="ui basic padded segment" id="match-results" style="height:370px;overflow-y:auto">
                    <div class="ui basic center aligned padded segment">
                        <br><br>
                        {{-- <i class="spinner loading big icon"></i>
                        <h3 style="">Getting your match...</h3> --}}
                        <h2 class="ui icon inverted grey header">
                            <i class="notched circle loading huge icon"></i>
                            Getting your match...
                          </h2>
                    </div>
                </div>
                <a class="ui blue center aligned button" href="/matcher">Go Back</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection