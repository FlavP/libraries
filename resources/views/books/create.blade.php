@extends('layout')
@section('content')
    {!! Form::model($book = new \App\Book()) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::file('cover', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('author_list', 'Author(s): ') !!}}
            {!! Form::select('author_list[]', $authors, null, ['id' => 'author_list', 'class' => 'form-control', 'multiple']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Book', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@stop