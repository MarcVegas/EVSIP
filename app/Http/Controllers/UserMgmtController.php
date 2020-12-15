<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderMail;
use App\User;
use App\School;

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

    public function sendReminder($id){
        $profile = User::leftJoin('schools', 'users.user_id', '=', 'schools.school_id')
        ->select('users.*', 'schools.*')
        ->where('schools.school_id', $id)->first();

        $date = Carbon::now()->addMonth()->toDateString();

        Mail::to($profile->email)->send(new ReminderMail($profile->school_name, $date));

        return redirect('/dashboard/siteadmin/show/school/'.$profile->school_id)->with('success', 'Reminder has been sent');
    }
}
