<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\Student;
use App\School;
use App\Course;

class DashboardsController extends Controller
{
    //Site admin pages
    public function siteAdmin(){
        return view('dashboard/siteadmin/overview');
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
        return view('dashboard/student/overview');
    }
}
