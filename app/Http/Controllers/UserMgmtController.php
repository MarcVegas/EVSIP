<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserMgmtController extends Controller
{
    public function allUsers(){
        $schools = User::leftJoin('schools', 'users.user_id', '=', 'schools.school_id')
        ->select('users.*', 'schools.*')->where('users.role', 'admin')->get();

        $students = User::leftJoin('students', 'users.user_id', '=', 'students.user_id')
        ->select('users.*', 'students.*')->where('users.role', 'student')->get();

        return view('dashboard.siteadmin.users')->with('schools', $schools)->with('students', $students);
    }

    public function showSchool($id){
        $profile = User::leftJoin('schools', 'users.user_id', '=', 'schools.school_id')
        ->select('users.*', 'schools.*')
        ->where('schools.school_id', $id)->first();

        return view('dashboard.siteadmin.show')->with('profile', $profile);
    }

    public function showStudent($id){
        $profile = User::leftJoin('students', 'users.user_id', '=', 'students.user_id')
        ->select('users.*', 'students.*')
        ->where('students.user_id', $id)->first();

        return view('dashboard.siteadmin.show-student')->with('profile', $profile);
    }
}
