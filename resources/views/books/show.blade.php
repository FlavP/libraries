@extends('layout')

@section('title')
    {{$book->title}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">{{$book->title}}</h3>
            @foreach($book->authors as $author)
                <a href="{{route('authors.show', $author->id)}}"><h5>{{$author->name}}</h5></a>
            @endforeach
            <img src="{{$cover}}" alt="cover" class="img-responsive">
            <p>{{$book->description}}</p>
            <a href="{{route('books.edit', $book)}}" class="btn btn-info">Edit</a>
            <a href="{{route('books.destroy', $book)}}" class="btn btn-danger">Delete</a>
        </div>
    </div>
@endsection()