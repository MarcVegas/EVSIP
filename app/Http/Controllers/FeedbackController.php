<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $this->validate($request, [
            'action' => 'required|string',
            'title' => 'required|string',
            'body' => 'string|nullable',
            'user_id' => 'required|integer',
        ]);

        $feedback = new Feedback;
        $feedback->action = $request->input('action');
        $feedback->title = $request->input('title');
        if ($request->has('body')) {
            $feedback->body = $request->input('body');
        }
        $feedback->user_id = $request->input('user_id');
        $feedback->save();
    }
}
