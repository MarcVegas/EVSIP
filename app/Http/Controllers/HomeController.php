<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\School;
use App\Scholarship;
use App\Admission;
use App\Favorite;
use App\Registration;
use App\Location;
use App\Advertisement;
use App\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::leftJoin('users', 'courses.school_id', '=', 'users.user_id')
        ->select('courses.*', 'users.*')->inRandomOrder()->limit(8)->get();

        $seniorhigh = Course::leftJoin('users', 'courses.school_id', '=', 'users.user_id')
        ->select('courses.*', 'users.*')->where('courses.course_categ', 'Senior High School')->inRandomOrder()->limit(8)->get();

        $ads = Advertisement::leftJoin('schools', 'advertisements.user_id','=','schools.school_id')
        ->select('advertisements.*','schools.*')->get();

        return view('home')->with('courses', $courses)->with('seniorhigh', $seniorhigh)->with('ads', $ads);
    }

    public function show($id)
    {
        $user = auth()->user()->user_id;

        $preview = Course::leftJoin('schools', 'courses.school_id', '=', 'schools.school_id')
        ->select('courses.*','courses.description as desc', 'schools.*')
        ->where('courses.course_id', $id)->first();

        $scholarships = Scholarship::where('user_id','=', $preview->school_id)->get();
        $admissions = Admission::where('user_id','=', $preview->school_id)->get();
        $school = User::where('user_id','=', $preview->school_id)->first();
        $location = Location::where('school_id', $preview->school_id)->first();
        $registerCheck = Registration::where('course_id', $id)->where('user_id', $user)->first();
        $favoriteCheck = Favorite::where('course_id', $id)->where('user_id', $user)->first();
        $eperiodCheck = Page::where('id', $preview->school_id)->first();

        return view('view-course')->with('preview', $preview)
        ->with('admissions', $admissions)
        ->with('scholarships', $scholarships)
        ->with('school', $school)->with('registerCheck', $registerCheck)
        ->with('favoriteCheck', $favoriteCheck)
        ->with('location', $location)->with('eperiodCheck', $eperiodCheck);
    }
}
