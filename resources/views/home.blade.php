@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    Liste des sujets
                        <a href="{{ url('create') }}" class="btn btn-primary pull-right">
                            Créer un sujet
                        </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Titre</th>
                            <th>Réponses</th>
                            <th>Auteur</th>
                            <th>Dernière modification</th>
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
                                    <b>{{ $thread->user->name }}</b>
                                </td>
                                <td>
                                    {{ $thread->updated_at->diffForHumans() }}
                                </td>
                            </tr>
                            @endforeach

                    </table>
                    <div class="text-center">
                        {{ $threads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
