<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Page;
use App\Course;

class SchoolPagesController extends Controller
{
    public function index(){
        

        return view('/dashboard/admin/page/page');
    }

    public function store(Request $request){
        $this->validate($request, [
            'mission' => 'required|string',
            'vision' => 'required|string',
        ]);

        $user_id = auth()->user()->user_id;

        $page = new Page;
        $page->id = $user_id;
        $page->mission = $request->input('mission');
        $page->vision = $request->input('vision');
        $page->save();

        return redirect()->route('adminpage.index')->with('success', 'Mission and Vission updated');
    }

    public function eperiod(Request $request, $id){
        $this->validate($request, [
            'enrollment_start' => 'required',
            'enrollment_end' => 'required',
        ]);

        $pagecheck = Page::where('id', $id)->first();
        $pagecheck->enrollment_start = $request->input('enrollment_start');
        $pagecheck->enrollment_end = $request->input('enrollment_end');
        $pagecheck->save();
        
        $this->checkIfOngoing($id);
        
        return redirect()->route('adminpage.index')->with('success', 'Enrollment period successfuly set');
    }

    public function checkIfOngoing($id){
        $check = Page::where('id', $id)->first();

        if (Carbon::parse($check->enrollment_end)->lt(Carbon::now())) {
            Course::where('school_id', $id)->update(['enrollment' => 'closed']);
        }elseif (Carbon::parse($check->enrollment_end)->gt(Carbon::now())){
            Course::where('school_id', $id)->update(['enrollment' => 'ongoing']);
        }
    }
}
