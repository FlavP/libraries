@extends('layout')
@section('title')
    Books
@endsection
@section('content')
    <h1 class="text-center">Books List</h1>
    <div class="row">
        @foreach($books as $book)
            <div class="col-md-4">
                <a href="{{route('books.show', $book->id)}}"><h3>{{$book->title}}</h3></a>
                <p>by:
                    @foreach($book->authors as $author)
                    <a href="{{route('authors.show', $author->id)}}"><h5>{{$author->name}}</h5></a>
                    @endforeach
                </p>
            </div>
        @endforeach
    </div>
@stop