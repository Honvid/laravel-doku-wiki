<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace'     => 'Web',
], function (Router $router) {
    $router->get('/books/{book}/blacklist', 'BookController@blacklist');
    //$router->resource('/pages', 'PageController');
    //$router->resource('/authors', 'AuthorController');
});