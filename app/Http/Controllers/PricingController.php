<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index(){
        return view('pricing');
    }

    public function monthly(){
        $plan_id = 'P-1WN62400UL283904PL3XQ6RQ';

        return view('subscription.subscribe')->with('plan_id', $plan_id);
    }

    public function yearly(){
        $plan_id = 'P-6FM36206ED890272ML3XRHIQ';

        return view('subscription.subscribe')->with('plan_id', $plan_id);
    }

    public function success(){
        return view('subscription.success');
    }

    public function cancel(){
        return view('subscription.cancel');
    }

    public function receipt(){
        return view('subscription.receipt');
    }
}
