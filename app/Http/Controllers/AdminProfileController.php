<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\School;
use App\Location;

class AdminProfileController extends Controller
{
    public function show($id){
        $profile = User::leftJoin('schools', 'users.user_id', '=', 'schools.school_id')
        ->select('users.*', 'schools.*')
        ->where('schools.school_id', $id)->first();

        $location = Location::where('school_id', $id)->first();

        return view('dashboard/admin/profile')->with('profile', $profile)->with('location', $location);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'school_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'category' => 'required',
            'type' => 'required',
            'affiliation' => 'required',
            'exam' => 'required',
            'contact' => 'required',
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

        $school = School::where('school_id','=', $id)->first();
        $school->school_name = $request->input('school_name');
        $school->category = $request->input('category');
        $school->type = $request->input('type');
        $school->affiliation = $request->input('affiliation');
        $school->exam = $request->input('exam');
        if ($request->has('description')) {
            $school->description = $request->input('description');
        }
        $school->contact = $request->input('contact');
        $school->save();

        return back()->with('success', 'Profile updated successfuly');
    }

    public function location(Request $request){
        $this->validate($request, [
            'lat' => 'required',
            'lng' => 'required',
            'location' => 'required',
            'place_id' => 'required',
        ]);

        $user_id = auth()->user()->user_id;

        $location = new Location;
        $location->place_lat = $request->input('lat');
        $location->place_lng = $request->input('lng');
        $location->place_loc = $request->input('location');
        $location->place_id = $request->input('place_id');
        $location->school_id = $user_id;
        $location->save();

        return redirect('/dashboard/admin/profile/'.$user_id)->with('success', 'Location successfuly updated');
    }
}
