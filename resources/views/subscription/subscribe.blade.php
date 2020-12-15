@extends('layouts.subscription')

@section('content')
<div class="ui basic compressed segment">
    <div class="ui basic very padded segment">
        <div class="ui stackable centered padded grid">
            <div class="white row">
                <div class="ten wide column">
                    <div class="ui basic segment">
                        <h3>Your subscription plan</h3>
                        <div class="ui raised segments">
                            <div class="ui segment">
                                <h2 class="ui header">
                                    <img src="/storage/interface/gem.png" class="ui image">
                                    <div class="content">
                                        EVSIP Monthly Premium
                                        <div class="sub header">Billed per month</div>
                                    </div>
                                </h2>
                            </div>
                            <div class="ui clearing secondary segment">
                                <h3 class="ui left floated sub header">
                                    All prices include VAT if applicable
                                </h3>
                                <h3 class="ui right floated sub header">
                                    ORDER TOTAL: $10
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="six wide column">
                    <div class="ui basic segment">
                        <h3>Payment Methods</h3>
                        <div class="ui form">
                            <div class="grouped fields">
                                <div class="ui raised blue segment">
                                    <div class="field">
                                        <div class="ui radio checkbox">
                                            <input type="radio" name="payment" id="paypal" tabindex="0" class="hidden">
                                            <label><img class="ui avatar image" style="border-radius: 0 !important" src="/storage/interface/credit-card.png" alt=""> <strong>Paypal/Credit Card</strong></label>
                                        </div>
                                    </div>
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ten wide column">
                    <a class="ui inverted button" href="/pricing"><i class="angle left icon"></i> Back to pricing</a>
                </div>
                <div class="six wide column">
                    <a class="ui blue right floated confirmsub disabled button" href="/subscribe/receipt">Confirm Subscription</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modal.modal-banktransfer')
@endsection