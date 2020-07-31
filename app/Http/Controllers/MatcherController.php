<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class MatcherController extends Controller
{
    public function index(){
        return view('matcher');
    }
}
