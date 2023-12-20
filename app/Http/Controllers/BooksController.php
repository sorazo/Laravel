<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    //
    public function index()
    {
        $books = Book::get();
        //Bookモデル（booksテーブル）からレコード情報を取得

        return view('books.index',['books'=>$books]);
    }
}
