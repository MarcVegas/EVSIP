<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\Student;
use App\School;
use App\Course;
use App\Favorite;
use App\Department;
use App\Visit;

class DashboardsController extends Controller
{
    //Site admin pages
    public function siteAdmin(){
        $schoolCount = School::select('school_name,school_id')->count();
        $registerCount = Registration::select('username,user_id')->count();

        $schools = School::where('status', 'active')->latest()->limit(5)->get();

        return view('dashboard/siteadmin/overview')->with('school', $schoolCount)
        ->with('registered', $registerCount)->with('schools', $schools);
    }

    //School admin pages
    public function admin(){
        $school = auth()->user()->user_id;

        $registrations = Student::leftJoin('registrations', 'students.user_id', '=', 'registrations.user_id')
        ->select('students.*', 'registrations.*')
        ->where('registrations.school_id', $school)->paginate(5);

        $courses = Course::where('school_id', $school)->count();
        $visits = Visit::where('school_id', $school)->count();

        return view('dashboard/admin/overview')->with('registrations', $registrations)
        ->with('courses', $courses)->with('visits', $visits);
    }
    
    //School department pages
    public function department(){
        $subadmin = auth()->user()->user_id;

        $school = Department::where('user_id', $subadmin)->first();

        $registrations = Student::leftJoin('registrations', 'students.user_id', '=', 'registrations.user_id')
        ->leftJoin('courses', 'registrations.course_id', '=', 'courses.course_id')
        ->select('students.*', 'registrations.*', 'courses.*')
        ->where('registrations.school_id', $school->school_id)
        ->where('courses.department', $subadmin)->paginate(5);

        $courses = Course::where('department', $subadmin)->count();

        return view('dashboard/department/overview')->with('registrations', $registrations)
        ->with('courses', $courses);
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
