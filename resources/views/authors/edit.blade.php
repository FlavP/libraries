@extends('layout')

@section('title')
    {{$author>name}}
@endsection

@section('content')
    {!! Form::model($author, [ 'method' => 'PATCH', 'url' => ['authors', $author->id], 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name: ') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Edit Author', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection