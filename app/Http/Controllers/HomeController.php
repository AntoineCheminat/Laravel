<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $threads = Thread::orderBy('updated_at', 'desc')->paginate(10);
        $commentsNb = array();
        foreach ($threads as $thread) {
            $commentsNb[$thread->id] = Comment::where('thread', $thread->id)->count();
        }
        return view('home', ['search' => $search, 'threads' => $threads, 'commentsNb' => $commentsNb]);
    }

}
