@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifier commentaire</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'updateCom', 'class' => 'form-horizontal']) !!}
                        <div class="form-group col-md-12">
                            {!! Form::label('content_comment', 'Contenu :') !!}
                            {!! Form::textarea('content_comment', $comment->content, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group text-center">
                            {!! Form::hidden('id_comment', $comment->id) !!}
                            {!! Form::hidden('id_thread', $comment->thread) !!}
                            {!! Form::button('Modifier', array('class' => 'btn btn-info', 'type' => 'submit')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection