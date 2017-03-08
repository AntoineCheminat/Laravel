@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

                <div class="panel-body">
                    {!! Form::open(['url' => 'write']) !!}
                    {!! Form::text('post_content') !!}
                    {!! Form::submit('Write on the wall') !!}
                    {!! Form::close() !!}
                </div>

                <div>
                    @if($search === false)
                        All posts :
                    @else
                        All posts containing : "{{$search}}" :
                    @endif
                </div>
                <div>
                    @foreach($posts as $post)
                        <b>{{ $post->user->name }}</b> wrotes {{ $post->created_at->diffForHumans() }}:<br>
                        {{ $post->post_content }}<hr><br>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
