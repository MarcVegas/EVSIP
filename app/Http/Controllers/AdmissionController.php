<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admission;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->user_id;

        $admissions = Admission::where('user_id','=', $user_id)->get();

        return view('/dashboard/admin/page/admission')->with('admissions', $admissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'enrolee_type' => 'required|string',
            'body' => 'required|string'
        ]);

        $user_id = auth()->user()->user_id;

        $admission = new Admission;
        $admission->enrolee_type = $request->input('enrolee_type');
        $admission->body = $request->input('body');
        $admission->user_id = $user_id;
        $admission->save();

        return redirect()->route('admissions.index')->with('success', 'Requirement added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $admissions = Admission::where('user_id','=', $user_id)->get();

        $admit = Admission::where('id','=', $id)->first();

        return view('/dashboard/admin/page/admission-edit')->with('admissions', $admissions)->with('admit', $admit);
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
            'enrolee_type' => 'required|string',
            'body' => 'required|string'
        ]);

        $admission = Admission::where('id','=', $id);
        $admission->enrolee_type = $request->input('enrolee_type');
        $admission->body = $request->input('body');
        $admission->save();

        return redirect()->route('admissions.index')->with('success', 'Requirement updated');
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
}
