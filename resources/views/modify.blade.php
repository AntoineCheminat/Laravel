@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        Mes sujets
                        <a href="{{ url('createModify') }}" class="btn btn-primary pull-right">
                            Créer un sujet
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Titre</th>
                                <th>Réponses</th>
                                <th>Dernière modification</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>

                            @foreach($threads as $thread)
                                <tr>
                                    <td>
                                        <a href="{{ url('thread', ['id' => $thread->id]) }}">{{ $thread->title }}</a>
                                    </td>
                                    <td class="text-center">
                                        {{ $commentsNb[$thread->id] }}
                                    </td>
                                    <td>
                                        {{ $thread->updated_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <a href="{{ url('update/'.$thread->id) }}" class="btn btn-info">Modifier</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete/'.$thread->id) }}" class="btn btn-warning" onClick="return confirm('Confirmer la suppression ?\nATTENTION : Cela supprimera aussi les commentaires du sujet.');">Supprimer</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        <div class="text-center">
                            {{ $threads->links() }}
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Mes commentaires</div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Message</th>
                                <th>Sujet</th>
                                <th>Dernière modification</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>

                            @foreach($comments as $comment)

                                <tr>
                                    <td>
                                        {{ str_limit($comment->content, 50) }}
                                    </td>
                                    <td>
                                        <a href="{{ url('thread', ['id' => $comment->threadId]) }}">{{ $comment->threadId->title }}</a>
                                    </td>
                                    <td>
                                        {{ $comment->updated_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <a href="{{ url('update/comment/'.$comment->id) }}" class="btn btn-info">Modifier</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete/comment/'.$comment->id) }}" class="btn btn-warning" onClick="return confirm('Confirmer la suppression ?');">Supprimer</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        <div class="text-center">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection