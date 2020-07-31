<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;

class StudentProfileController extends Controller
{
    public function show($id){
        $profile = User::leftJoin('students', 'users.user_id', '=', 'students.user_id')
        ->select('users.*', 'students.*')
        ->where('students.user_id', $id)->first();

        //$profile = User::where('user_id','=', $id)->admin->first();

        return view('dashboard/student/profile')->with('profile', $profile);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'contact' => 'required',
            'gender' => 'required',
        ]);

        //handle file upload
        if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
        }

        $user = User::where('user_id','=', $id)->first();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if ($request->hasFile('avatar')) {
            $user->avatar = $fileNameToStore;
        }
        $user->save();

        $student = Student::where('user_id','=', $id)->first();
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->contact = $request->input('contact');
        $student->gender = $request->input('gender');
        $student->save();

        return back()->with('success', 'Profile updated successfuly');
    }
}
