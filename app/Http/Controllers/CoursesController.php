<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Course;
use App\User;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = auth()->user()->user_id;
        $courses = Course::where('school_id','=',$school)->paginate(5);

        return view('/dashboard/admin/course/courses')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->user_id;

        $deps = User::leftJoin('departments', 'users.user_id', '=', 'departments.user_id')
        ->select('users.*', 'departments.*')
        ->where(['departments.school_id' => $user_id],['users.role','subadmin'])->get();

        return view('/dashboard/admin/course/create')->with('deps', $deps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required|unique:courses',
            'abbreviation' => 'required',
            'course_name' => 'required',
            'description' => 'string|nullable',
            'tuition' => 'required|numeric',
            'course_categ' => 'required',
            'duration' => 'required',
            'majors' => 'string|nullable',
            'enrollment' => 'required',
            'department' => 'required',
        ]);

        //handle file upload
        if ($request->hasFile('prospectus')) {
            $filenameWithExt = $request->file('prospectus')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('prospectus')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('prospectus')->storeAs('public/documents', $fileNameToStore);
        }

        $course = new Course;
        $course->course_id = $request->input('course_id');
        $course->course_name = $request->input('course_name');
        if ($request->has('description')) {
            $course->description = $request->input('description');
        }
        $course->course_categ = $request->input('course_categ');
        $course->duration = $request->input('duration');
        if ($request->has('majors')) {
            $course->majors = $request->input('majors');
        }
        if ($request->hasFile('prospectus')) {
            $course->prospectus = $fileNameToStore;
        }
        $course->tuition = $request->input('tuition');
        $course->abbreviation = $request->input('abbreviation');
        $course->enrollment = $request->input('enrollment');
        $course->department = $request->input('department');
        $course->school_id = auth()->user()->user_id;
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::where('course_id','=', $id)->first();

        return view('dashboard.admin.course.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = auth()->user()->user_id;

        $course = Course::where('course_id','=', $id)->first();
        $deps = User::leftJoin('departments', 'users.user_id', '=', 'departments.user_id')
        ->select('users.*', 'departments.*')
        ->where(['departments.school_id' => $user_id],['users.role','subadmin'])->get();

        return view('/dashboard/admin/course/edit')->with('course', $course)->with('deps', $deps);
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
            'course_id' => 'required|unique:courses,id,'.$request->input('id'),
            'abbreviation' => 'required|string',
            'course_name' => 'required|string',
            'description' => 'string|nullable',
            'tuition' => 'required|numeric',
            'course_categ' => 'required',
            'duration' => 'required',
            'majors' => 'string|nullable',
            'enrollment' => 'required',
            'department' => 'required',
        ]);

        $course = Course::where('course_id','=', $id)->first();
        $course->course_id = $request->input('course_id');
        $course->course_name = $request->input('course_name');
        if ($request->has('description')) {
            $course->description = $request->input('description');
        }
        $course->course_categ = $request->input('course_categ');
        $course->duration = $request->input('duration');
        if ($request->has('majors')) {
            $course->majors = $request->input('majors');
        }
        $course->tuition = $request->input('tuition');
        $course->abbreviation = $request->input('abbreviation');
        $course->enrollment = $request->input('enrollment');
        $course->department = $request->input('department');
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfuly');
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

    public function filterSearch(Request $request){
        if ($request->has('course_categ')) {
            $course_categ = $request->get('course_categ');
        }
        if ($request->has('category')) {
            $category = $request->get('category');
        }
        if ($request->has('type')) {
            $type = $request->get('type');
        }

        $courses = Course::leftJoin('users', 'courses.school_id', '=', 'users.user_id')
        ->leftJoin('schools', 'schools.school_id', '=', 'users.user_id')
        ->select('courses.*', 'users.*', 'schools.*')->where('courses.course_categ', $course_categ)
        ->where('schools.category', $category)->where('schools.type', $type)->paginate(9);

        return view('filtercourse')->with('courses', $courses);
    }
}
