@extends('layout')
@section('title')
    Authors
@endsection
@section('content')
    <h1 class="text-center">Authors List</h1>
    <ul>
    @foreach($authors as $author)
        <li><a href="{{route('authors.show', $author->id)}}">{{$author->name}}</a></li>
    @endforeach
    </ul>
@stop