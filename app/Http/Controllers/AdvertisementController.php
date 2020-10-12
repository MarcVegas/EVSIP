<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Course;
use App\Background;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->user_id;

        $advertisements = Advertisement::where('user_id', $user_id)->get();
        return view('advertisement.advertise')->with('advertisements', $advertisements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->user_id;

        $courses = Course::where('school_id', $user_id)->get();
        $backgrounds = Background::where('type', 'default')->get();

        return view('advertisement.create')->with('courses', $courses)->with('backgrounds', $backgrounds);
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
            'title' => 'required|string',
            'body' => 'required|string',
            'discount' => 'integer|nullable',
            'link' => 'nullable',
            'file' => 'nullable',
            'custombg' => 'image|nullable',
        ]);

        //handle file upload
        if ($request->hasFile('file')) {
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public/documents', $fileNameToStore);
        }

        $bg = array('adbg1.png','adbg2.png','adbg3.png','adbg4.png');

        $user_id = auth()->user()->user_id;
        $expiry = Carbon::now()->addMonth();

        $advertisement = new Advertisement;
        $advertisement->title = $request->input('title');
        $advertisement->body = $request->input('body');
        if ($request->has('discount') ) {
            $advertisement->discount = $request->input('discount');
        }
        if ($request->has('link') ) {
            $advertisement->link = $request->input('link');
        }
        if ($request->has('file') ) {
            $advertisement->file = $fileNameToStore;
        }
        if ($request->has('custombg') ) {
            $advertisement->background = $request->input('custombg');
        }else{
            $advertisement->background = $bg[array_rand($bg)];
        }
        $advertisement->status = 'active';
        $advertisement->user_id = $user_id;
        $advertisement->expiry_date = $expiry;
        $advertisement->save();

        return redirect()->route('advertisements.index')->with('success', 'Your ad is now active');
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

        $courses = Course::where('school_id', $user_id)->get();
        $advertisement = Advertisement::where('id', $id)->first();

        return view('advertisement.edit')->with('advertisement', $advertisement)
        ->with('courses', $courses);
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
            'title' => 'required|string',
            'body' => 'required|string',
            'discount' => 'integer|nullable',
            'link' => 'nullable',
            'file' => 'nullable',
            'custombg' => 'image|nullable',
        ]);

        //handle file upload
        if ($request->hasFile('file')) {
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public/documents', $fileNameToStore);
        }

        $advertisement = Advertisement::where('id', $id)->first();
        $advertisement->title = $request->input('title');
        $advertisement->body = $request->input('body');
        if ($request->has('discount') ) {
            $advertisement->discount = $request->input('discount');
        }
        if ($request->has('link') ) {
            $advertisement->link = $request->input('link');
        }
        if ($request->has('file') ) {
            $advertisement->file = $fileNameToStore;
        }
        if ($request->has('custombg') ) {
            $advertisement->background = $request->input('custombg');
        }
        $advertisement->save();

        return redirect()->route('advertisements.index')->with('success', 'Your ad is now active');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::where('id', $id)->first();
        $advertisement->delete();

        return redirect()->route('advertisements.index')->with('success', 'Your ad has been removed');
    }

    public function allAds(){
        $advertisements = Advertisement::all();
        
        return view('advertisement.advertise')->with('advertisements', $advertisements);
    }
}
