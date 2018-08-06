@extends('layout')

@section('content')
    {!! Form::model($author = new \App\Author(), ['url' => 'authors']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add Author', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}

@stop