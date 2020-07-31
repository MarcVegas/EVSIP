<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bookmark;
use App\User;
use App\Post;

class BookmarkController extends Controller
{
    public function index(){
        $user_id = auth()->user()->user_id;

        $bookmarks = DB::table('posts')
        ->join('users', 'users.user_id', '=', 'posts.user_id')
        ->join('bookmarks', 'bookmarks.user_id', '=', 'users.id')
        ->where('bookmarks.user_id', '=', $user_id)
        ->get();

        return view('forum.bookmark')->with('bookmarks', $bookmarks);
    }

    public function store($id){
        $user_id = auth()->user()->user_id;

        $bookmark = new Bookmark;
        $bookmark->post_id = $id;
        $bookmark->user_id = $user_id;
        $bookmark->save();

        return view('forum.feed')->with('success', 'Bookmark added');
    }

    public function destroy($id){

    }
}
