@extends('layout.dashboard')

@section('content')
@include('inc.sidemenu')
<div class="thirteen wide column" style="padding: 0 !important;">
    @include('inc.navbar-admin')
    <div class="pale" style="margin-top: 1em; height: 41em;">
        <div class="ui basic padded segment">
            <div class="ui stackable grid">
                <div class="four wide column">
                    <div class="ui segment">
                        <h2 style="color: #434a77;">Chat</h2>
                        <hr>
                        <div class="ui large middle aligned selection list">
                            <div class="item">
                                <img class="ui avatar left floated image" src="images/femaleuser.png">
                                <a class="ui mini right floated green empty circular label"></a>
                                <div class="content">
                                    <div class="header">Helen </div>
                                    Hi! I have an inquiry
                                </div>
                            </div>
                            <div class="item">
                                <img class="ui avatar left floated image" src="images/maleuser2.jpg">
                                <a class="ui mini right floated red empty circular label"></a>
                                <div class="content">
                                    <div class="header">Christian</div>
                                    Is enrollment still o...
                                </div>
                            </div>
                            <div class="item">
                                <img class="ui avatar left floated image" src="images/maleuser3.jpg">
                                <a class="ui mini right floated red empty circular label"></a>
                                <div class="content">
                                    <div class="header">Daniel</div>
                                    Do you accept cros...
                                </div>
                            </div>
                            <div class="item">
                                <img class="ui avatar left floated image" src="images/maleuser.png">
                                <a class="ui mini right floated red empty circular label"></a>
                                <div class="content">
                                    <div class="header">Omar</div>
                                    Hi! I have an inquiry
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seven wide column">
                    <div class="ui grid">
                        <div class="row">
                            <div class="nine wide column">
                                <h3>Omar Cayambulan</h3>
                            </div>
                            <div class="seven wide right aligned column">
                                <div class="ui tiny basic icon labeled floating dropdown button">
                                    <i class="user outline icon"></i>
                                    <span class="text"><img class="ui mini avatar image" src="images/defaultsch.jpg" alt=""> WLC</span>
                                    <div class="left menu">
                                        <div class="header">Assign to</div>
                                        <div class="item">
                                            <img class="ui mini avatar image" src="images/defaultsch.jpg" alt="">
                                            WLC
                                        </div>
                                        <div class="item">
                                            <img class="ui mini avatar image" src="images/defaultstud.jpg" alt="">
                                            CICTE
                                        </div>
                                        <div class="item">
                                            <img class="ui mini avatar image" src="images/defaultstud.jpg" alt="">
                                            COA
                                        </div>
                                        <div class="item">
                                            <img class="ui mini avatar image" src="images/defaultstud.jpg" alt="">
                                            BSBA
                                        </div>
                                    </div>
                                </div>
                                <button class="ui tiny basic icon button"><i class="trash alternate outline icon"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="sixteen wide column" style="height: 30em;">
                                <ul>
                                    <li class="sender">Hello! I have an inquiry</li>
                                    <li class="sender">Regarding the enrollment requirements</li>
                                    <li class="receiver">Hi there</li>
                                    <li class="receiver">No problem, ask away</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="ui grid">
                        <div class="row">
                            <div class="twelve wide column">
                                <div class="ui fluid input">
                                    <input type="text" placeholder="Type your message">
                                </div>
                            </div>
                            <div class="four wide column">
                                <button class="ui blue icon labeled circular button" tabindex="0">
                                    <i class="paper plane icon"></i>
                                    Send
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="five wide column">
                    <div class="ui segment">
                        <h2 style="color: #434a77;">Profile</h2>
                        <hr>
                        <div class="ui secondary menu">
                            <a class="active item" data-tab="first">Profile</a>
                            <a class="item" data-tab="second">Responses</a>
                            <a class="item" data-tab="third">Files</a>
                        </div>
                        <div class="ui basic center aligned active tab segment" data-tab="first">
                            <img class="ui circular centered image" src="images/maleuser.png" alt="" width="100px">
                            <h3>Omar Cayambulan</h3>
                            <a class="ui brown label">Student</a>
                            <div class="ui link raised two cards" style="margin-top: 1em;">
                                <div class="ui card">
                                    <div class="ui basic segment">
                                        <div class="image">
                                            <img class="ui mini centered image" src="images/file.png" alt="">
                                        </div>
                                    </div>
                                    <div class="content">TOR</div>
                                </div>
                                <div class="ui card">
                                    <div class="ui basic segment">
                                        <div class="image">
                                            <img class="ui mini centered image" src="images/file.png" alt="">
                                        </div>
                                    </div>
                                    <div class="content">Form 137</div>
                                </div>
                            </div>
                        </div>
                        <div class="ui basic tab segment" data-tab="second">
                            <div class="ui middle aligned horizontal list">
                                <div class="item">
                                    <a class="ui brown label">Requirements</a>
                                    <div class="ui flowing popup top left transition hidden">
                                        <h5>Requirements</h5>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                             Reiciendis eligendi, excepturi accusamus dolorem perspiciatis</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <a class="ui brown label">Enrollment period</a>
                                </div>
                                <div class="item">
                                    <a class="ui brown label">Scholarship</a>
                                </div>
                                <div class="item">
                                    <a class="ui brown label">Courses</a>
                                </div>
                            </div>
                            <h5>Add new automated response</h5>
                            <form class="ui form">
                                <div class="field">
                                    <label>Keyword</label>
                                    <input type="text" placeholder="Enter keyword">
                                </div>
                                <div class="field">
                                    <label>Response</label>
                                    <textarea rows="2" placeholder="Enter response"></textarea>
                                </div>
                                <button class="ui inverted violet icon labeled fluid button">Add Keyword <i class="plus icon"></i></button>
                            </form>
                        </div>
                        <div class="ui basic tab segment" data-tab="third">
                            <div class="ui link raised two cards">
                                <div class="ui card">
                                    <div class="ui basic segment">
                                        <div class="image">
                                            <img class="ui mini centered image" src="images/file.png" alt="">
                                        </div>
                                    </div>
                                    <div class="content">Enrollment Form</div>
                                    <button class="ui inverted blue button">Attach</button>
                                </div>
                                <div class="ui card">
                                    <div class="ui basic segment">
                                        <div class="image">
                                            <img class="ui mini centered image" src="images/file.png" alt="">
                                        </div>
                                    </div>
                                    <div class="content">Brochure</div>
                                    <button class="ui inverted blue button">Attach</button>
                                </div>
                            </div>
                            <div class="ui pale very padded center aligned segment">
                                <div class="ui tiny header">
                                    Drag file here or click the button below
                                </div>
                            </div>
                            <div class="ui small fluid primary button">Add Document</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection