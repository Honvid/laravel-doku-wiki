<?php

use Dcat\Admin\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->resource('/books', 'BookController')->names('admin.books');
    $router->resource('/pages', 'PageController')->names('admin.pages');
    $router->resource('/authors', 'AuthorController')->names('admin.authors');
    $router->resource('/categories', 'CategoryController')->names('admin.categories');
});
