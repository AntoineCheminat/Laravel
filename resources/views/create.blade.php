@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Créer sujet</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'createThread', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Titre :') !!}
                            {!! Form::text('title',null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('content_thread', 'Contenu :') !!}
                            {!! Form::textarea('content_thread',null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group text-center">
                            {!! Form::button('Ajouter', array('class' => 'btn btn-info', 'type' => 'submit')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection