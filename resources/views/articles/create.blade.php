@extends('app')

@section('content')
    <h1>Write a new article</h1>
    <hr/>
    {!! Form::open([
        'url' => 'articles'

    ]) !!}
    {{--        'route' => --}}
    {{--        'action' => --}}
    {{--        'controller' =>     --}}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@stop