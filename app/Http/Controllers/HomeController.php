<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Thread;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($search = false)
    {
        Carbon::setLocale('fr');
        $posts = Post::orderBy('created_at', 'desc')->get();
        $threads = Thread::orderBy('updated_at', 'desc')->get();
        return view('home', ['search' => $search, 'posts' => $posts, 'threads' => $threads]);
    }

    public function write(Request $request) {
        $post = new Post;
        $post->post_content = $request->post_content;
        $post->author = Auth::id();
        $post->save();
        Session::flash('alert-success', 'Post saved successfully!');
        return redirect('home');
    }
}
