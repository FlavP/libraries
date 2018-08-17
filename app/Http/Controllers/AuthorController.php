<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::orderBy('name')->get();
        return view('authors.list', compact('authors'));
    }

    public function create() {
        return view('authors.create');
    }

    public function store(Request $request){
        $author = new Author();
        $author->name = $request['name'];
        $author->save();
        return redirect('authors');
    }

    public function show(Author $author){
        return view('authors.show', compact('author'));
    }
}
