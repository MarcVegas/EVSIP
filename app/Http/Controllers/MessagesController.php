<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chat;
use App\Department;
use App\Message;
use App\School;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->user_id;

        $school = Department::where('user_id', $user_id)->first();

        //$chats = User::where('role','<>','subadmin')->where('user_id','<>', $user_id)->get();
        $chats = DB::select("select users.user_id, users.username, users.avatar, users.email, messages.assigned_to, count(is_read) as unread 
            from users LEFT  JOIN  messages ON users.user_id = messages.from and is_read = 0 and messages.to = " . auth()->user()->user_id . "
            where users.user_id != " . auth()->user()->user_id . " AND (users.user_id = messages.from OR users.user_id = messages.to)
            group by users.user_id, users.username, users.avatar, users.email, messages.assigned_to");
        

        $departments = User::leftJoin('departments', 'users.user_id','=','departments.user_id')
        ->select('users.*', 'departments.*')->where('departments.school_id',$user_id)->get();

        return view('chat.chats')->with('chats', $chats)->with('departments', $departments);
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
        $from = auth()->user()->user_id;
        $to = $request->receiver_id;
        $body = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->body = $body;
        $data->is_read = 0;
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $my_id = auth()->user()->user_id;
        
        //Make unread messages as read
        Message::where(['from' => $id, 'to' => $my_id])->update(['is_read' => 1]);

        $messages = Message::where(function ($query) use ($id, $my_id){
            $query->where('from', $my_id)->where('to', $id);
        })->orWhere(function ($query) use ($id, $my_id){
            $query->where('from', $id)->where('to', $my_id);
        })->get();

        return view('inc.chatmessages')->with('messages', $messages);
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
        $my_id = auth()->user()->user_id;
        $assign = $request->get('assigned_to');

        $messages = Message::where(function ($query) use ($id, $my_id){
            $query->where('from', $my_id)->where('to', $id);
        })->orWhere(function ($query) use ($id, $my_id){
            $query->where('from', $id)->where('to', $my_id);
        })->update(['assigned_to' => $assign]);

        Message::where(['from' => $id, 'to' => $my_id])->update(['is_read' => 0]);
        Message::where(['to' => $id, 'from' => $my_id])->update(['is_read' => 0]);

        Message::where('from', $my_id)->where('to', $id)->update(['from' => $assign]);
        Message::where('from', $id)->where('to', $my_id)->update(['to' => $assign]);
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
