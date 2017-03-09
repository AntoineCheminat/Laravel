<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Thread;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ThreadController extends Controller
{
    public function index($id = 1)
    {
        Carbon::setLocale('fr');
        $thread = Thread::where('id', $id)->first();
        $comments = Comment::orderBy('created_at', 'desc')->where('thread', $thread->id)->get();
        return view('thread', ['thread' => $thread, 'comments' => $comments]);
    }

    public function create()
    {
        return view('create');
    }

    public function createThread(Request $request)
    {
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->content = $request->content_thread;
        $thread->author = Auth::id();

        $thread->save();

        Session::flash('alert-success', 'Sujet ajouté avec succès');

        return redirect('/');
    }

    public function createComment(Request $request)
    {
        $thread = new Comment();
        $thread->content = $request->content_comment;
        $thread->thread = $request->id_thread;
        $thread->author = Auth::id();

        $thread->save();

        Session::flash('alert-success', 'Commentaire ajouté avec succès');

        return redirect('/thread/'.$request->id_thread);
    }
}
