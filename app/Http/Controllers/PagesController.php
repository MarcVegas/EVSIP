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

class PagesController extends Controller
{
    public function index(){
        return view('welcome');
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

        return view('schoolpage')->with('courses', $courses)
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

        return view('register')->with('school', $school)->with('course', $course)->with('student', $student);
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

    public function allcourses(){
        $courses = Course::leftJoin('users', 'courses.school_id', '=', 'users.user_id')
        ->select('courses.*', 'users.*')->paginate(8);

        return view('allcourses')->with('courses', $courses);
    }

    public function registered(){

        return view('reg-student-success');
    }
}
