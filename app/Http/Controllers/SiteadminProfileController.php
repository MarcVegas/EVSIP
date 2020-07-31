<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;

class SiteadminProfileController extends Controller
{
    public function show($id){
        $profile = User::leftJoin('admins', 'users.user_id', '=', 'admins.user_id')
        ->select('users.*', 'admins.*')
        ->where('admins.user_id', $id)->first();

        //$profile = User::where('user_id','=', $id)->admin->first();

        return view('dashboard/siteadmin/profile')->with('profile', $profile);
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

        $admin = Admin::where('user_id','=', $id)->first();
        $admin->firstname = $request->input('firstname');
        $admin->lastname = $request->input('lastname');
        $admin->contact = $request->input('contact');
        $admin->gender = $request->input('gender');
        $admin->save();

        return back()->with('success', 'Profile updated successfuly');
    }
}
