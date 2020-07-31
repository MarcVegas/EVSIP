<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

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

    public function eperiod(Request $request){
        $this->validate($request, [
            'enrollment_start' => 'required',
            'enrollment_end' => 'required',
            'user_id' => 'required|integer',
        ]);

        $pagecheck = Page::where('id', $request->input('user_id'))->first();

        if (is_null($pagecheck)) {
            $page = new Page;
            $page->enrollment_start = $request->input('enrollment_start');
            $page->enrollment_end = $request->input('enrollment_end');
            $page->save();
        } else {
            $pagecheck->enrollment_start = $request->input('enrollment_start');
            $pagecheck->enrollment_end = $request->input('enrollment_end');
            $pagecheck->save();
        }
        
        return redirect()->route('adminpage.index')->with('success', 'Enrollment period successfuly set');
    }
}
