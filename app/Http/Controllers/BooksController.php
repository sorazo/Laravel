<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;

class BooksController extends Controller
{
    //
    public function index()
    {
        $books = Book::get();
        //Bookモデル（booksテーブル）からレコード情報を取得

        return view('books.index',['books'=>$books]);
    }

    public function createForm()
    {
        $authors = Author::get();
        return view('books.createForm',['authors'=>$authors]);
    }

    public function bookCreate(Request $request)
    {
        $author_id = $request->input('author_id');
        $title = $request->input('title');
        $price = $request->input('price');

        Book::create([
            'author_id' => $author_id,
            'title'=> $title,
            'price'=> $price,
        ]);
        return redirect('/index');
    }
}
