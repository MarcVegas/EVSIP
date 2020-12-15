<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationMail;
use App\Mail\AppDenyMail;
use App\School;
use App\Document;
use App\User;

class SchoolRegistrationController extends Controller
{
    public function index(){
        $registrants = School::where('status','=','inactive')->get();
        
        return view('/dashboard/siteadmin/registrations')->with('registrants', $registrants);
    }

    public function show($id){
        $review = School::where('school_id','=', $id)->first();

        $documents = Document::where('school_id','=', $id)->get();

        return view('/dashboard/siteadmin/review')->with('review', $review)->with('documents', $documents);
    }

    public function approve($id){
        
        $school = School::where('school_id','=', $id)->first();
        $school->status = 'active';
        $school->save();

        $user = User::where('user_id', $id)->first();
        

        Mail::to($user->email)->send(new ApplicationMail($school->school_name));
        return redirect('/dashboard/siteadmin/registrations')->with('success', $school->school_name.' application has been approved');

    }

    public function deny(Request $request,$id){
        $school = School::where('school_id','=', $id)->first();
        $name = $school->school_name;

        $user = User::where('user_id', $id)->first();
        $reason = $request->input('reason');

        Mail::to($user->email)->send(new AppDenyMail($name, $reason));

        return redirect('/dashboard/siteadmin/registrations')->with('success', $name.' application has been denied');
    }
}
