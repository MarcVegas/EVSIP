<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\Student;
use App\School;
use App\Course;
use App\Favorite;

class DashboardsController extends Controller
{
    //Site admin pages
    public function siteAdmin(){
        $schoolCount = School::select('school_name,school_id')->count();
        $registerCount = Registration::select('username,user_id')->count();

        return view('dashboard/siteadmin/overview')->with('school', $schoolCount)
        ->with('registered', $registerCount);
    }

    //School admin pages
    public function admin(){
        $school = auth()->user()->user_id;

        $registrations = Student::leftJoin('registrations', 'students.user_id', '=', 'registrations.user_id')
        ->select('students.*', 'registrations.*')
        ->where('registrations.school_id', $school)->paginate(5);

        $courses = Course::where('school_id', $school)->count();

        return view('dashboard/admin/overview')->with('registrations', $registrations)->with('courses', $courses);
    }
    
    //School department pages
    public function department(){
        return view('dashboard/department/overview');
    }

    //Student pages
    public function student(){
        $user = auth()->user()->user_id;
        $registered = Registration::where('user_id', $user)->count();
        $registrations = Course::leftJoin('registrations', 'courses.course_id', '=', 'registrations.course_id')
        ->select('courses.*', 'registrations.*')
        ->where('registrations.user_id', $user)->paginate(5);
        $favs = Favorite::where('user_id', $user)->count();

        return view('dashboard/student/overview')->with('registered', $registered)
        ->with('favs', $favs)->with('registrations', $registrations);
    }
}
