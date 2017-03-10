@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>{{ $thread->title }}</b> posté par <b>{{ $thread->user->name }}</b>
                        <div class="pull-right"><i>{{ $thread->updated_at->diffForHumans() }}</i></div>
                    </div>

                    <div class="panel-body">
                        {{ $thread->content }}
                    </div>
                </div>

                @foreach($comments as $comment)
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <b>{{ $comment->user->name }}</b> a dit :
                                    <div class="pull-right"><i>{{ $comment->created_at->diffForHumans() }}</i></div>
                                </div>
                            </div>
                            {{ $comment->content }}
                        </div>
                    </div>
                @endforeach
                <div class="text-center">
                    {{ $comments->links() }}
                </div>

                <div class="col-md-12">
                    {!! Form::open(['url' => 'createComment', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('content_comment', 'Ajouter un commentaire :') !!}
                        {!! Form::textarea('content_comment',null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::hidden('id_thread', $thread->id) !!}
                    <div class="form-group text-center">
                        {!! Form::button('Ajouter', array('class' => 'btn btn-info', 'type' => 'submit')) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="row">
                    <div class="links col-md-12">
                        <a href="/">Revenir à l'accueil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
