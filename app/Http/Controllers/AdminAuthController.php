<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    

    public function register(){
        return view('admin_login.register-admin');
    }
}
