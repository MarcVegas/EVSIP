<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;

class SubadminProfileController extends Controller
{
    public function show($id){
        $profile = User::leftJoin('departments', 'users.user_id', '=', 'departments.user_id')
        ->select('users.*', 'departments.*')
        ->where('departments.user_id', $id)->first();

        return view('dashboard/department/profile')->with('profile', $profile);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required',
            'department' => 'required',
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

        $department = Department::where('user_id', $id)->first();
        $department->department = $request->input('department');
        $department->save();

        return back()->with('success', 'Profile updated successfuly');
    }
}
