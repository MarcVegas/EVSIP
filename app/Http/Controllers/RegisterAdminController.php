<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\User;
use App\School;
use App\Document;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class RegisterAdminController extends Controller
{
    
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        event(new Registered($user = $this->create($request->all(),$request)));
        
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'school_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'school_name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'category' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'affiliation' => ['required', 'string', 'max:255'],
            'exam' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'files.*' => ['mimes:jpg,jpeg,png,bmp','max:1999']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, Request $request)
    {
        $user = new User;
        $user->username = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        $user->password = Hash::make($data['password']);
        $user->user_id = $data['school_id'];
        $user->save();

        $school = new School;
        $school->school_name = $data['school_name'];
        $school->category = $data['category'];
        $school->type = $data['type'];
        $school->affiliation = $data['affiliation'];
        $school->exam = $data['exam'];
        $school->contact = $data['contact'];
        $school->school_id = $data['school_id'];
        $school->save();

        //Ready file for upload
        $files = $request->file('files');
        foreach ($files as $file) {
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $file->storeAs('public/documents', $fileNameToStore);

            $doc = new Document;
            $doc->type = 'verification';
            $doc->filename = $fileNameToStore;
            $doc->school_id = $data['school_id'];
            $doc->save();
        }
    }
}
