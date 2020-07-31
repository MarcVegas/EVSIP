<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scholarship;

class ScholarshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->user_id;

        $scholarships = Scholarship::where('user_id','=', $user_id)->get();

        return view('/dashboard/admin/page/scholarship')->with('scholarships', $scholarships);
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
            'provider' => 'required|string',
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $user_id = auth()->user()->user_id;

        $scholarship = new Scholarship;
        $scholarship->provider = $request->input('provider');
        $scholarship->title = $request->input('title');
        $scholarship->body = $request->input('body');
        $scholarship->user_id = $user_id;
        $scholarship->save();

        return redirect()->route('scholarships.index')->with('success', 'Scholarship added');
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
        $scholarships = Scholarship::where('user_id','=', $user_id)->get();

        $scholar = Scholarship::where('id','=', $id)->first();

        return view('/dashboard/admin/page/scholarship-edit')->with('scholarships', $scholarships)->with('scholar', $scholar);
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
            'provider' => 'required|string',
            'title' => 'required|string',
            'body' => 'required|string'
        ]);
        
        $scholarship = Scholarship::where('id','=', $id)->first();
        $scholarship->provider = $request->input('provider');
        $scholarship->title = $request->input('title');
        $scholarship->body = $request->input('body');
        $scholarship->save();

        return redirect()->route('scholarships.index')->with('success', 'Scholarship updated');
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
