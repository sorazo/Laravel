<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', 'BooksController@index');

Route::get('/create-form', 'BooksController@createForm');

Route::post('/author/create', 'AuthorsController@authorCreate');

Route::post('/book/create', 'BooksController@bookCreate');

Route::get('/book/{id}/update-form', 'BooksController@updateForm');

Route::post('/book/update', 'BooksController@update');
