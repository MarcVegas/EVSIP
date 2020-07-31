<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Post;
use App\User;
use App\Bookmark;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = User::leftJoin('posts', 'users.user_id', '=', 'posts.user_id')
        ->select('users.*', 'posts.*')
        ->where('title','<>', NULL)->orderBy('posts.created_at','desc')->get();

        // ->where('post_id','<>', NULL)

        return view('forum.feed')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->user_id;
        $user = User::where('user_id','=', $user_id)->first();

        return view('forum.create')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uid = auth()->user()->user_id;
        $tid = $this->generateThreadId();

        $thread = new Thread;
        $thread->thread_id = $tid;
        $thread->user_id = $uid;
        $thread->title = $request->input('title');
        $thread->save();

        $post = new Post;
        $post->thread_id = $tid;
        $post->user_id = $uid;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->has('tag')) {
            $post->tag = $request->input('tag');
        }
        $post->save();

        return redirect()->route('forum.index')->with('success', 'Your thread has been posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = User::leftJoin('posts', 'users.user_id', '=', 'posts.user_id')
        ->select('users.*', 'posts.*')
        ->where('post_id','=', $id)->first();

        $comments = User::leftJoin('posts', 'users.user_id', '=', 'posts.user_id')
        ->select('users.*', 'posts.*')
        ->where('thread_id', $post->thread_id)->where('title', '=', NULL)->get();

        return view('forum.show')->with('post', $post)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('forum.edit')->with('post', $post);
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
        ]);

        $post = Post::where('post_id','=', $id)->first();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect()->route('forum.index');
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

    public function comment(Request $request, $id){
        $uid = $id;
        $tid = $request->input('thread_id');

        $post = new Post;
        $post->thread_id = $tid;
        $post->user_id = $uid;
        $post->body = $request->input('comment');
        $post->save();

        return view('forum.feed')->with('success', 'Comment added');
    }

    public function posts(){
        $user_id = auth()->user()->user_id;

        $posts = User::leftJoin('posts', 'users.user_id', '=', 'posts.user_id')
        ->select('users.*', 'posts.*')
        ->where('posts.user_id','=', $user_id)->orderBy('posts.created_at','desc')->get();

        return view('forum.posts')->with('posts', $posts);
    }

    public function generateThreadId(){
        $thread_id = mt_rand(100,2000);
        
        if ($this->threadIdExists($thread_id)) {
            $this->generateThreadId();
        }

        return $thread_id;
    }

    public function threadIdExists($thread_id){
        return Thread::where('thread_id','=',$thread_id)->exists();
    }
}
