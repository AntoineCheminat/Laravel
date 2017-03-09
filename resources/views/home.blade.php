@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Discussions</div>

                <div class="panel-body">
                    <a href="{{ url('create') }}" class="btn btn-info pull-right">
                        Créer sujet
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Dernier message</th>
                        </tr>

                            @foreach($threads as $thread)
                            <tr>
                                <td>
                                    <a href="{{ url('thread', ['id' => $thread->id]) }}">{{ $thread->title }}</a>
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
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
