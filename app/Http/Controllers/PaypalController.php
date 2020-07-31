<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\User;
use App\School;
use PhpParser\Node\Stmt\TryCatch;

class PaypalController extends Controller
{
    public function getAccessToken(){
        $uri = 'https://api.sandbox.paypal.com/v1/oauth2/token';
        $clientId = 'AT-m_GlMpyp7nPVKHXxNhL_lSXAOK_3ZBtdioq_E2iA0Myvp7kKVAvz1wIfXUmqvow4o0GydtwDb3gBr';
        $secret = 'EOfaSUA-tjcZiSzPgv6LRBsLtj7yg9xyofN_1QZ-fm3pdY2b6hIaUpaMf0ak-DcqQUNW8y54Z9YKfA0h';

        $client = new Client();
        $response = $client->request('POST', $uri, [
            'headers' =>
                [
                    'Accept' => 'application/json',
                    'Accept-Language' => 'en_US',
                   'Content-Type' => 'application/x-www-form-urlencoded',
                ],
            'body' => 'grant_type=client_credentials',
    
            'auth' => [$clientId, $secret, 'basic']
            ]
        );
        
        $data = json_decode($response->getBody(), true);
        
        $access_token = $data['access_token'];

        return $access_token;
    }

    public function checkToken(){
        $uri = 'https://api.sandbox.paypal.com/v1/catalogs/products?page_size=2&page=1&total_required=true';
        $access_token = 'A21AAFUWLm8hxeKXVMqfrOZQCyiYkV16PId4yq_8O1McxSdKGCGdXRPLg0ogDx79kqBL1qtQ_EFT9EI4ym6y8tFWrFnR-Pxmg';

        $client = new Client();
        $response = $client->request('GET', $uri, [
            'headers' =>
                [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer '.$access_token,
                ]
            ]
        );

        $statusCode = $response->getStatusCode();
        return $statusCode;
    }

    //Product Management
    public function listProduct(){
        $uri = 'https://api.sandbox.paypal.com/v1/catalogs/products?page_size=2&page=1&total_required=true';
        $access_token = 'A21AAFUWLm8hxeKXVMqfrOZQCyiYkV16PId4yq_8O1McxSdKGCGdXRPLg0ogDx79kqBL1qtQ_EFT9EI4ym6y8tFWrFnR-Pxmg';

        $client = new Client();
        $response = $client->request('GET', $uri, [
            'headers' =>
                [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer '.$access_token,
                ]
            ]
        );

        $statusCode = $response->getStatusCode();
        if ($statusCode === 500) {
            $data = 'Error 500';
        }else{
            $data = json_decode($response->getBody(), true);
        }

        return view('/dashboard/siteadmin/subscription/product')->with('data', $data);
    }

    public function createProduct(){
        
    }

    public function showProduct(){
        
    }

    public function updateProduct(){
        
    }

    //Plan Management
    public function listPlan(){
        $uri = 'https://api.sandbox.paypal.com/v1/billing/plans?page_size=2&page=1&total_required=true';
        $access_token = 'A21AAFUWLm8hxeKXVMqfrOZQCyiYkV16PId4yq_8O1McxSdKGCGdXRPLg0ogDx79kqBL1qtQ_EFT9EI4ym6y8tFWrFnR-Pxmg';

        $client = new Client();
        $response = $client->request('GET', $uri, [
            'headers' =>
                [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer '.$access_token,
                ]
            ]
        );

        $statusCode = $response->getStatusCode();
        if ($statusCode == 401) {
            $access_token = $this->getAccessToken();
            $this->listPlan();
        }elseif ($statusCode == 500) {
            $data = 'Error 500';
        }else{
            $data = json_decode($response->getBody(), true);
        }

        return view('/dashboard/siteadmin/subscription/plan')->with('data', $data);
    }

    public function createPlan(){

    }

    public function showPlan(){
        
    }

    public function updatePlan(){
        
    }

    public function activatePlan(){
        
    }

    public function deactivatePlan(){
        
    }

    public function updatePricing(){
        
    }

    //Subscription Management
    public function listSubscription(){
        $subscribers = User::leftJoin('schools', 'users.user_id', '=', 'schools.school_id')
        ->select('users.*', 'schools.*')
        ->where('membership', 'premium')->get();

        return view('dashboard/siteadmin/subscription/subscriber')->with('subscribers', $subscribers);
    }

    public function showSubscriber($id){
        $uri = 'https://api.sandbox.paypal.com/v1/billing/subscriptions/'.$id;
        $access_token = 'A21AAFUWLm8hxeKXVMqfrOZQCyiYkV16PId4yq_8O1McxSdKGCGdXRPLg0ogDx79kqBL1qtQ_EFT9EI4ym6y8tFWrFnR-Pxmg';

        $client = new Client();
        $response = $client->request('GET', $uri, [
            'headers' =>
                [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer '.$access_token,
                ]
            ]
        );

        $statusCode = $response->getStatusCode();
        if ($statusCode == 401) {
            $access_token = $this->getAccessToken();
            $this->showSubscriber($id);
        }elseif ($statusCode == 500) {
            $data = 'Error 500';
        }else{
            $data = json_decode($response->getBody(), true);
        }

        return view('/dashboard/siteadmin/subscription/show-subscriber')->with('data', $data);
    }
    
}
