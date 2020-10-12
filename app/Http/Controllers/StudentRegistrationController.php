<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Registration;
use App\User;
use App\Requirement;
use App\School;
use App\Course;
use App\Department;
use App\Mail\RegisteredMail;
use Illuminate\Support\Facades\Mail;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = auth()->user()->user_id;

        $registrations = Student::leftJoin('registrations', 'students.user_id', '=', 'registrations.user_id')
        ->select('students.*', 'registrations.*')
        ->where('registrations.school_id', $school)->where('status', 'pending')->get();

        $all = Student::leftJoin('registrations', 'students.user_id', '=', 'registrations.user_id')
        ->select('students.*', 'registrations.*')
        ->where('registrations.school_id', $school)->get();

        return view('/dashboard/admin/registrations')->with('registrations', $registrations)
        ->with('all', $all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school_id = auth()->user()->user_id;

        $profile = Registration::leftJoin('students', 'students.user_id', '=', 'registrations.user_id')
        ->select('students.*', 'registrations.*')
        ->where('registrations.user_id', $id)->first();

        $contacts = User::where('user_id','=', $id)->first();

        $requirements = Requirement::where(['user_id' => $id],['school_id', $school_id])->get();

        return view('/dashboard/admin/review')->with('profile', $profile)->with('contacts', $contacts)->with('requirements', $requirements);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school_id = auth()->user()->user_id;

        $registrant = Registration::where(['user_id' => $id],['school_id', $school_id])->first();
        $registrant->status = 'approved';
        $registrant->save();
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'course_id' => 'required|string',
            'school_id' => 'required|integer',
        ]);

        $course_id = $request->input('course_id');
        $school_id = $request->input('school_id');

        $registrant = Registration::where('user_id','=', $id)->first();
        $registrant->status = 'approved';
        $registrant->save();

        $user = User::where('user_id', $id)->first();
        $school = School::where('school_id', $school_id)->first();
        $course = Course::where('course_id', $course_id)->first();

        Mail::to($user->email)->send(new RegisteredMail($registrant->username, $school->school_name, $course->course_name));

        return view('/dashboard/admin/registrations')->with('success', 'Student application has been approved. Email notification has been sent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deny(){
        
    }

    public function getDepRegistrations($id){
        $subadmin = auth()->user()->user_id;

        $school = Department::where('user_id', $subadmin)->first();

        $registrations = Student::leftJoin('registrations', 'students.user_id', '=', 'registrations.user_id')
        ->leftJoin('courses', 'registrations.course_id', '=', 'courses.course_id')
        ->select('students.*', 'registrations.*', 'courses.*')
        ->where('registrations.school_id', $school->school_id)
        ->where('courses.department', $subadmin)
        ->where('status', 'pending')->get();

        return view('/dashboard/department/registrations')->with('registrations', $registrations);
    }
}
