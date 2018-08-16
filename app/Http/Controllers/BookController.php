<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list() {
        $books = Book::orderBy('namme')->get();
        return view('books.list', compact('books'));
    }

    public function create(){
        $authors = Author::pluck('name', 'id');
        return view('books.create', compact('authors'));
    }

    public function store(Request $request){
        $book = new Book();
        $image = time() . $request->file('cover')->getClientOriginalExtension();
        $book->title = $request['title'];
        $book->cover = $image;
        $book->description = $request['description'];
        $book->authors()->sync($request->input('author_list'));
        $book->save();
        return view('books.list');
    }

    public function show(Book $book){
        return view('books.show', compact('book'));
    }
}
