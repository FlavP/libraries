<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    const BOOK_COVERS_PATH = '/images/books/covers';

    public function index() {
        $books = Book::orderBy('title')->get();
        return view('books.list', compact('books'));
    }

    public function create(){
        $authors = Author::pluck('name', 'id');
        return view('books.create', compact('authors'));
    }

    public function store(Request $request){
        $book = new Book();
        $image = time() . '.' . $request->file('cover')->getClientOriginalExtension();
        $request->file('cover')->move(public_path(self::BOOK_COVERS_PATH), $image);
        $book->title = $request['title'];
        $book->cover = $image;
        $book->description = $request['description'];
        $book->save();
        $book->authors()->sync($request->input('author_list'));

        return redirect('books');
    }

    public function show(Book $book){
        $cover = self::BOOK_COVERS_PATH . '/' . $book->cover;
        return view('books.show', compact('book', 'cover'));
    }

    public function edit(Book $book){
        $authors = Author::pluck('name', 'id');
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, $bookId){
        $book = Book::findOrFail($bookId);
        if($request->file('cover') && $book->cover != $request->file('cover')){
            $oldImageName = self::BOOK_COVERS_PATH . '/' . $book->cover;
            Storage::delete($oldImageName);
            $newImageName = time() . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->move(public_path(self::BOOK_COVERS_PATH), $newImageName);
            $book->cover = $newImageName;
        }
        $book->title = $request['title'];
        $book->description = $request['description'];
        $book->save();
        $book->authors()->sync($request->input('author_list'));
        return redirect('books');
    }

    public function destroy(Book $book){
        $book->delete();
        return redirect('books');
    }
}
