@extends('layout')

@section('title')
    {{$author->name}}
@endsection

@section('content')
    <h2 class="text-center">{{$author->name}}</h2>
    <ul>
        @foreach($author->books as $book)
            <a href="{{route('books.show', $book->id)}}"><li>{{$book->title}}</li></a>
        @endforeach
    </ul>
@endsection