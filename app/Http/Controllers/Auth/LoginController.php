<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\School;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        if (auth()->user()->role == 'siteadmin') {
            return '/dashboard/siteadmin';
        }
        elseif (auth()->user()->role == 'admin') {
            $user_id = auth()->user()->user_id;
            $school = School::where('school_id','=', $user_id)->first();
            if ($school->status == 'active') {
                return '/dashboard/admin';
            }else{
                return '/account/inactive';
            }
            
        }elseif (auth()->user()->role == 'subadmin'){
            return '/dashboard/department';
        }
        else {
            return '/home';
        }
    }
}
