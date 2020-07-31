@extends('layouts.match')

@section('content')
@include('inc.navbar')
    <div class="ui basic match-tab segment">
        <h1 class="part-subtitle">Select a plan that fits your school's needs</h1>
        <div class="ui stackable grid">
            <div class="two wide column"></div>
            <div class="four wide column">
                <div class="ui inverted center aligned pricing segment">
                    <img class="ui tiny centered image" src="/storage/interface/game.png" alt="">
                    <h2>Free</h2>
                    <p style="text-align:center">Get listed and experience the benefits free of charge. No card or payment required</p>
                    <div class="ui list">
                        <div class="item">
                            <i class="check blue icon"></i>
                            Student registration
                        </div>
                        <div class="item">
                            <i class="check blue icon"></i>
                            Course management
                        </div>
                        <div class="item">
                            <i class="check blue icon"></i>
                            Personal webpage
                        </div>
                    </div>
                    <div class="ui inverted divider"></div><br><br>
                    <h3 style="text-align:center">Free</h3>
                    <a class="ui blue button" href="#">Get Account</a>
                </div>
            </div>
            <div class="four wide column">
                <div class="ui inverted blue center aligned pricing segment">
                    <img class="ui tiny centered image" src="/storage/interface/shipping-and-delivery.png" alt="">
                    <h2>Premium</h2>
                    <p style="text-align:center">Unlock features and tools and get the full benefits of your account</p>
                    <div class="ui list">
                        <div class="item">
                            <i class="check icon"></i>
                            Student registration
                        </div>
                        <div class="item">
                            <i class="check icon"></i>
                            Course management
                        </div>
                        <div class="item">
                            <i class="check icon"></i>
                            Front page Advertising
                        </div>
                        <div class="item">
                            <i class="check icon"></i>
                            Dedicated customer support
                        </div>
                        <div class="item">
                            <i class="check icon"></i>
                            Personal webpage
                        </div>
                    </div>
                    <div class="ui inverted divider"></div><br>
                    <h3 style="text-align:center">Php 400<small>/month</small></h3>
                    <a class="ui black button" href="{{route('pricing.monthly')}}">Get Started</a>
                </div>
            </div>
            <div class="four wide column">
                <div class="ui inverted center aligned segment">
                    <img class="ui tiny centered image" src="/storage/interface/miscellaneous.png" alt="">
                    <h2>Platinum</h2>
                    <p style="text-align:center">Get the same benefits with an annual subscription and <strong>SAVE 5%</strong> compared to a monthly subscription</p>
                    <div class="ui list">
                        <div class="item">
                            <i class="check blue icon"></i>
                            Student registration
                        </div>
                        <div class="item">
                            <i class="check blue icon"></i>
                            Course management
                        </div>
                        <div class="item">
                            <i class="check blue icon"></i>
                            Front page Advertising
                        </div>
                        <div class="item">
                            <i class="check blue icon"></i>
                            Dedicated customer support
                        </div>
                        <div class="item">
                            <i class="check blue icon"></i>
                            Personal webpage
                        </div>
                    </div>
                    <div class="ui inverted divider"></div>
                    <h3 style="text-align:center">Php 4,500<small>/year</small></h3>
                    <a class="ui blue button" href="{{route('pricing.yearly')}}">Get Started</a>
                </div>
            </div>
            <div class="two wide column"></div>
        </div>
    </div>
@endsection