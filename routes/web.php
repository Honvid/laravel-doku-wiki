<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('book.book');
});

Route::group([
    'namespace'     => 'Web',
], function (Router $router) {
    $router->resource('/books', 'BookController');
    $router->resource('/pages', 'PageController');
    $router->resource('/authors', 'AuthorController');
    $router->resource('/comments', 'CommentController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
