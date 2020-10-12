<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\School;
use App\Student;
use App\Registration;
use App\Requirement;
use App\Location;
use App\Page;
use App\Announcement;
use App\Advertisement;
use App\Admission;

class PagesController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function regSuccess(){
        return view('reg-success');
    }

    public function tac(){
        return view('termsandconditions');
    }

    public function page($id){
        $courses = Course::leftJoin('users', 'courses.school_id', '=', 'users.user_id')
        ->select('courses.*', 'users.*')->where('school_id', $id)->paginate(8);

        $announcements = Announcement::where('user_id', $id)->get();

        $location = Location::where('school_id', $id)->first();
        $page = Page::where('id', $id)->first();

        $school = School::leftJoin('users', 'schools.school_id', '=', 'users.user_id')
        ->select('schools.*', 'users.*')
        ->where('schools.school_id', $id)->first();

        return view('schoolpage')->with('courses', $courses)
        ->with('school', $school)
        ->with('location', $location)
        ->with('page', $page)
        ->with('announcements', $announcements);
    }

    public function registerPage($id){
        $user_id = auth()->user()->user_id;

        $course = Course::where('course_id','=', $id)->first();
        $student = Student::where('user_id','=', $user_id)->first();
        $school = School::leftJoin('users', 'users.user_id', '=', 'schools.school_id')
        ->select('users.*','schools.*')
        ->where('schools.school_id', $course->school_id)->first();
        $admissions = Admission::where('user_id','=', $school->school_id)->get();

        return view('register')->with('school', $school)->with('course', $course)->with('student', $student)
        ->with('admissions', $admissions);
    }

    public function registerCourse(Request $request){
        $this->validate($request, [
            'fname' => 'required|string',
            'course_id' => 'required|string',
            'enrolee_type' => 'required|string',
            'school_id' => 'required|integer',
        ]);

        $user_id = auth()->user()->user_id;

        $register = new Registration;
        $register->username = $request->input('fname');
        $register->type = $request->input('enrolee_type');
        $register->course_id = $request->input('course_id');
        $register->school_id = $request->input('school_id');
        $register->user_id = $user_id;
        $register->save();

        //Ready file for upload
        $files = $request->file('files');
        foreach ($files as $file) {
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $file->storeAs('public/requirements', $fileNameToStore);

            $req = new Requirement;
            $req->type = $extension;
            $req->filename = $fileNameToStore;
            $req->user_id = $user_id;
            $req->school_id = $request->input('school_id');
            $req->course_id = $request->input('course_id');
            $req->save();
        }

        return redirect()->route('pages.prompt');
    }

    public function allcourses(Request $request){
        $searched = null;
        if ($request->has('search')) {
            $searchterm = $request->get('search');

            $columns = ['courses.course_name','courses.duration','courses.abbreviation','schools.school_name'];

            $query = Course::leftJoin('users', 'courses.school_id', '=', 'users.user_id')
            ->leftJoin('schools', 'schools.school_id', '=', 'users.user_id')
            ->select('courses.*', 'users.*', 'schools.*');

            foreach ($columns as $column) {
                $query->orWhere($column,'=', $searchterm);
            }

            $searched = $query->get();
        }

        $courses = Course::leftJoin('users', 'courses.school_id', '=', 'users.user_id')
        ->select('courses.*', 'users.*')->paginate(9);

        $ads = Advertisement::leftJoin('schools', 'advertisements.user_id','=','schools.school_id')
        ->select('advertisements.*','schools.*')->get();

        return view('allcourses')->with('courses', $courses)->with('ads', $ads)->with('searched', $searched);
    }

    public function registered(){

        return view('reg-student-success');
    }
}
