@extends('layout')

@section('title')
    {{$author->name}}
@endsection

@section('content')
    <h2 class="text-center">{{$author->name}}</h2>
    <ul>
        @foreach($author->books as $book)
            <li>{{$book->title}}</li>
        @endforeach
    </ul>
@endsection