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
        $comments = Comment::orderBy('created_at', 'desc')->where('thread', $thread->id)->paginate(10);
        return view('thread', ['thread' => $thread, 'comments' => $comments]);
    }

    public function create()
    {
        return view('create');
    }

    public function createModify()
    {
        return view('createModify');
    }

    public function modify()
    {
        Carbon::setLocale('fr');
        $threads = Thread::orderBy('updated_at', 'desc')->where('author', Auth::id())->paginate(5);
        $comments = Comment::orderBy('updated_at', 'desc')->where('author', Auth::id())->paginate(5);
        $commentsNb = array();
        foreach ($threads as $thread) {
            $commentsNb[$thread->id] = Comment::where('thread', $thread->id)->count();
        }

        return view('modify', ['threads' => $threads, 'comments' => $comments, 'commentsNb' => $commentsNb]);
    }

    public function update($id)
    {
        Carbon::setLocale('fr');
        $thread = Thread::where('id', $id)->first();
        return view('update', ['thread' => $thread]);
    }

    public function updateComment($id)
    {
        Carbon::setLocale('fr');
        $comment = Comment::orderBy('created_at', 'desc')->where('id', $id)->first();
        return view('updateComment', ['comment' => $comment]);
    }

    public function delete($id)
    {
        Carbon::setLocale('fr');
        Thread::destroy($id);
        $comments = Comment::orderBy('created_at', 'desc')->where('thread', $id)->get();
        foreach($comments as $comment)
        {
            Comment::destroy($comment->id);
        }
        $threads = Thread::orderBy('updated_at', 'desc')->where('author', Auth::id())->paginate(5);
        $comments = Comment::orderBy('updated_at', 'desc')->where('author', Auth::id())->paginate(5);
        $commentsNb = array();
        foreach ($threads as $thread) {
            $commentsNb[$thread->id] = Comment::where('thread', $thread->id)->count();
        }

        return view('modify', ['threads' => $threads, 'comments' => $comments, 'commentsNb' => $commentsNb]);
    }

    public function deleteComment($id)
    {
        Carbon::setLocale('fr');
        Comment::destroy($id);
        $threads = Thread::orderBy('updated_at', 'desc')->where('author', Auth::id())->paginate(5);
        $comments = Comment::orderBy('updated_at', 'desc')->where('author', Auth::id())->paginate(5);
        $commentsNb = array();
        foreach ($threads as $thread) {
            $commentsNb[$thread->id] = Comment::where('thread', $thread->id)->count();
        }

        return view('modify', ['threads' => $threads, 'comments' => $comments, 'commentsNb' => $commentsNb]);
    }

    public function createThread(Request $request)
    {
        Carbon::setLocale('fr');
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->content = $request->content_thread;
        $thread->author = Auth::id();

        $thread->save();

        Session::flash('alert-success', 'Sujet ajouté avec succès');

        return redirect('/');
    }

    public function createThreadModify(Request $request)
    {
        Carbon::setLocale('fr');
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->content = $request->content_thread;
        $thread->author = Auth::id();

        $thread->save();

        Session::flash('alert-success', 'Sujet ajouté avec succès');

        return redirect('modify');
    }

    public function updateThread(Request $request)
    {
        Carbon::setLocale('fr');
        $thread = Thread::find($request->id_thread);
        $thread->title = $request->title;
        $thread->content = $request->content_thread;
        $thread->author = Auth::id();

        $thread->save();

        $threads = Thread::orderBy('updated_at', 'desc')->where('author', Auth::id())->paginate(5);
        $comments = Comment::orderBy('updated_at', 'desc')->where('author', Auth::id())->paginate(5);

        Session::flash('alert-success', 'Sujet modifié avec succès');

        $commentsNb = array();
        foreach ($threads as $thread) {
            $commentsNb[$thread->id] = Comment::where('thread', $thread->id)->count();
        }

        return view('modify', ['threads' => $threads, 'comments' => $comments, 'commentsNb' => $commentsNb]);
    }

    public function createComment(Request $request)
    {
        Carbon::setLocale('fr');
        $thread = new Comment();
        $thread->content = $request->content_comment;
        $thread->thread = $request->id_thread;
        $thread->author = Auth::id();

        $thread->save();

        Session::flash('alert-success', 'Commentaire ajouté avec succès');

        return redirect('/thread/'.$request->id_thread);
    }

    public function updateCom(Request $request)
    {
        Carbon::setLocale('fr');
        $comment = Comment::find($request->id_comment);
        $comment->content = $request->content_comment;
        $comment->thread = $request->id_thread;
        $comment->author = Auth::id();

        $comment->save();

        $threads = Thread::orderBy('updated_at', 'desc')->where('author', Auth::id())->paginate(5);
        $comments = Comment::orderBy('updated_at', 'desc')->where('author', Auth::id())->paginate(5);

        Session::flash('alert-success', 'Commentaire modifié avec succès');

        $commentsNb = array();
        foreach ($threads as $thread) {
            $commentsNb[$thread->id] = Comment::where('thread', $thread->id)->count();
        }

        return view('modify', ['threads' => $threads, 'comments' => $comments, 'commentsNb' => $commentsNb]);
    }

    public function search(Request $search)
    {
        $results = Thread::search($search->search)->get();
        return view('search', ['search' => $search, 'results' => $results]);
    }
}
