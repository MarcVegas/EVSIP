<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Favorite;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->user_id;

        $favorites = Favorite::leftJoin('courses', 'courses.course_id', '=', 'favorites.course_id')
        ->select('favorites.*', 'courses.*')
        ->where('favorites.user_id', $user)->get();

        return view('/dashboard/student/favorites')->with('favorites', $favorites);
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
            'username' => 'required|string',
            'course_id' => 'required|string',
            'school_id' => 'required|integer',
            'user_id' => 'required|string',
        ]);

        $favCheck = Favorite::where('course_id', $request->course_id)->where('user_id', $request->user_id)->first();
        if (is_null($favCheck)) {
            $favorite = new Favorite;
            $favorite->username = $request->username;
            $favorite->course_id = $request->course_id;
            $favorite->school_id = $request->school_id;
            $favorite->user_id = $request->user_id;
            $favorite->save();
        }
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
        //
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
        //
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
