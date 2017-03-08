@extends('layout')
@section('title')
    The Wall
@endsection

@section('content')
    <div class="title m-b-md">
        The Wall
    </div>

    <div>
        {!! Form::open(['url' => 'write']) !!}
            {!! Form::text('post_content') !!}
            {!! Form::submit('Write on the wall !') !!}
        {!! Form::close() !!}
    </div>

    <div>
        @if($search === false)
            All posts :
        @else
            All posts containing "{{ $search }}" :
        @endif
    </div>

    <div class="links">
        <a href="/">Get back to homepage</a>
    </div>
@endsection
