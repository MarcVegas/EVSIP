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
            <div class="eleven wide column">
                <div class="ui segment">
                    <div class="gradient-primary card-icon long">
                        <h2 class="header center aligned" style="color: white;">Subscription</h2>
                    </div><br><br>
                    <div class="ui equal width form">
                        <div class="field">
                            <label>Plan</label>
                            <input type="text" value="EVSIP Monthly Plan" readonly>
                        </div>
                        <div class="field">
                            <label>Payment Method</label>
                            <input type="text" value="Paypal" readonly>
                        </div>
                        <div class="field">
                            <label>Next Billing Date</label>
                            <input type="text" value="{{date('d M Y', strtotime(\Carbon\Carbon::now()->addMonth()))}}" readonly>
                        </div>
                    </div><br>
                    <button class="ui right floated cancelplan button">Cancel Subscription</button><br><br>
                </div>
            </div>
            <div class="five wide column">
            </div>
        </div>
        </div>
    </div>
</div>
<div class="ui tiny cancelplan modal">
    <i class="close icon"></i>
    <div class="content">
        <div class="ui basic center aligned segment">
            <h3>Are you sure you want to cancel your premium subscription?</h3>
            <div class="ui form">
                <div class="field">
                    <label>If so, please provide a reason</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
                <a class="ui inverted red button" href="/dashboard/siteadmin/subscription/cancel/sfsfsf">CANCEL SUBSCRIPTION</a>
            </div>
        </div>
    </div> 
</div>
@endsection
@section('ajax')
    <script>
        $(document).ready(function () {
            var userid = "{{ Auth::user()->user_id }}";

            $('.cancelplan.modal').modal('attach events', '.cancelplan.button', 'show');
        });
    </script>
@endsection