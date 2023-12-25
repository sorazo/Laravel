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

    public function updateForm($id)
    {
        $book = Book::where('id', $id)->first();
        return view('books.updateForm', ['book'=>$book]);
    }

    public function update(Request $request)
    {
        // 1つ目の処理
        $id = $request->input('id');
        $up_title = $request->input('upTitle');
        $up_price = $request->input('upPrice');
        // 2つ目の処理
        Book::where('id', $id)->update([
            'title' => $up_title,
            'price' => $up_price
        ]);
        // 3つ目の処理
        return redirect('/index');
    }

    public function delete($id)
    {
        Book::where('id', $id)->delete();
        return redirect('/index');
    }

    public function search(Request $request)
    {
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
            $books = Book::where('title','like', '%'.$keyword.'%')->get();
        }else{
            $books = Book::all();
        }
        // 3つ目の処理
        return view('books.index',['books'=>$books]);
    }
}
