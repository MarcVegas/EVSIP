<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school = auth()->user()->user_id;

        $departments = User::leftJoin('departments', 'users.user_id', '=', 'departments.user_id')
        ->select('users.*', 'departments.*')
        ->where(['departments.school_id' => $school],['users.role', 'subadmin'])->paginate(5);

        return view('dashboard/admin/department/departments')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/admin/department/create');
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
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'department' => 'required',
            'avatar' => 'image|nullable|max:1999',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
        }

        $uid = $this->generateUserId();

        $user = new User;
        $user->username = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        if ($request->hasFile('avatar')) {
            $user->avatar = $fileNameToStore;
        }
        $user->password = Hash::make($request->input('password'));
        $user->user_id = $uid;
        $user->save();

        $department = new Department;
        $department->department = $request->input('department');
        $department->school_id = auth()->user()->user_id;
        $department->user_id = $uid;
        $department->save();

        return redirect()->route('departments.index');
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
        $user = User::leftJoin('departments', 'users.user_id', '=', 'departments.user_id')
        ->select('users.*', 'departments.*')
        ->where('departments.user_id', $id)->first();

        return view('dashboard/admin/department/edit')->with('user', $user);
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
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'department' => 'required|string',
            'avatar' => 'image|nullable|max:1999',
        ]);
        
        if ($request->hasFile('avatar')) {
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
        }

        $user = User::where('user_id', $id)->first();
        $user->username = $request->input('name');
        $user->email = $request->input('email');
        if ($request->hasFile('avatar')) {
            $user->avatar = $fileNameToStore;
        }
        $user->save();

        $department = Department::where('user_id', $id)->first();
        $department->department = $request->input('department');
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department updated successfuly');
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

    public function generateUserId(){
        $user_id = mt_rand(100,1000);
        
        if ($this->userIdExists($user_id)) {
            $this->generateUserId();
        }

        return $user_id;
    }

    public function userIdExists($user_id){
        return User::where('user_id','=',$user_id)->exists();
    }
}
