<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Document;

class SchoolRegistrationController extends Controller
{
    public function index(){
        $registrants = School::where('status','=','inactive')->paginate(5);
        
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

        $name = $school->school_name;
        return view('/dashboard/siteadmin/registrations')->with('success', $name.' application has been approved');

    }
}
