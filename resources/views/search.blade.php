@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Résultats pour : <i>{{ $search->search }}</i></div>


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Dernier message</th>
                                </tr>

                                @foreach($results as $result)
                                    <tr>
                                        <td>
                                            <a href="{{ url('thread', ['id' => $result->id]) }}">{{ $result->title }}</a>
                                        </td>
                                        <td>
                                            <b>{{ $result->user->name }}</b>
                                        </td>
                                        <td>
                                            {{ $result->updated_at->diffForHumans() }}
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
