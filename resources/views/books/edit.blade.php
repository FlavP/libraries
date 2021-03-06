@extends('layout')

@section('title')
    {{$book->title}}
@endsection

<h2 class="text-center">{{$book->title}}</h2>

@section('content')
    {!! Form::model($book, [ 'method' => 'PATCH', 'url' => ['books', $book->id], 'files' => true]) !!}
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
        {!! Form::label('author_list', 'Author(s): ') !!}
        {!! Form::select('author_list[]', $authors, $book->authors, ['id' => 'author_list', 'class' => 'form-control', 'multiple']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Edit Book', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection

@section('footer')
    <script>
        $('#author_list').select2({
            placeholder: 'Choose an author',
            tags: true,
        });
    </script>
@endsection