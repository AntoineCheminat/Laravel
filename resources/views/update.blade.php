@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifier sujet</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'updateThread', 'class' => 'form-horizontal']) !!}
                        <div class="form-group col-md-12">
                            {!! Form::label('title', 'Titre :') !!}
                            {!! Form::text('title',$thread->title, ['class' => 'form-control', 'maxlength' => 100]) !!}
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::label('content_thread', 'Contenu :') !!}
                            {!! Form::textarea('content_thread', $thread->content, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group text-center">
                            {!! Form::hidden('id_thread', $thread->id) !!}
                            {!! Form::button('Modifier', array('class' => 'btn btn-info', 'type' => 'submit')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection