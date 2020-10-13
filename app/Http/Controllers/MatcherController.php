<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class MatcherController extends Controller
{
    public function index(){
        return view('matcher');
    }

    public function match($id){
        $lmt = rand(4,8);

        if ($id == 'College') {
            $courses = Course::leftJoin('users', 'courses.school_id', '=', 'users.user_id')
            ->select('courses.*', 'users.*')->where('courses.course_categ', '<>', 'Senior High School')
            ->where('courses.course_categ', '<>', 'Master')
            ->where('courses.course_categ', '<>', 'Doctor')
            ->inRandomOrder()->limit($lmt)->get();
        } elseif ($id == 'Senior High School') {
            $courses = Course::leftJoin('users', 'courses.school_id', '=', 'users.user_id')
            ->select('courses.*', 'users.*')->where('courses.course_categ', $id)
            ->inRandomOrder()->limit($lmt)->get();
        }
        

        return view('matcher.matchlist')->with('courses', $courses);
    }
}
