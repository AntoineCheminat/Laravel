<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        //$posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home', ['search' => $search, 'posts' => $posts]);
    }

    public function write(Request $request)
    {
        $post = new Post();
        $post->post_content = $request->post_content;
        $post->author = Auth::id();

        $post->save();

        Session::flash('alert-success', 'Post saved successfully');

        return redirect('home');
    }
}
