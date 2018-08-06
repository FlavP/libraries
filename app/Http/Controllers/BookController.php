<?php

namespace App\Http\Controllers;

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
}
