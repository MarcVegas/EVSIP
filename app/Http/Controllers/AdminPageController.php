<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Post;
use App\Thread;
use App\Page;
use App\Gallery;

class AdminPageController extends Controller
{
    public function index(){
        $user_id = auth()->user()->user_id;

        $page = Page::where('id', $user_id)->first();
        $announcements = Announcement::where('user_id', $user_id)->get();
        $galleries = Gallery::where('user_id', $user_id)->get();

        return view('/dashboard/admin/page/page')->with('page', $page)->with('galleries', $galleries)->with('announcements', $announcements);
    }

    public function create(){
        $user_id = auth()->user()->user_id;

        $posts = Post::where('user_id', $user_id)->get();

        return view('/dashboard/admin/page/announcement-create')->with('posts', $posts);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required',
            'user_id' => 'required|string',
            'role' => 'required|string',
            'linked' => 'integer',
        ]);

        

        // $tid = $this->generateThreadId();

        $announcement = new Announcement;
        $announcement->title = $request->input('title');
        $announcement->body = $request->input('body');
        $announcement->role = $request->input('role');
        $announcement->user_id = $request->input('user_id');
        if ($request->has('linked')) {
            $announcement->post = $request->input('linked');
        }
        $announcement->save();

        /* $thread = new Thread;
        $thread->thread_id = $tid;
        $thread->user_id = $request->input('user_id');
        $thread->title = $request->input('title');
        $thread->save();

        $post = new Post;
        $post->thread_id = $tid;
        $post->user_id = $request->input('user_id');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->has('tag')) {
            $post->tag = $request->input('tag');
        }
        $post->save(); */

        return redirect()->route('adminpage.index')->with('success', 'Your announcement has been posted');
    }

    public function show($id){
        
    }

    public function update(Request $request, $id){
        
    }

    public function destroy($id){

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
