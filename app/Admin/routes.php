<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('/books', 'BookController')->names('admin.books');
    $router->resource('/pages', 'PageController')->names('admin.pages');
    $router->resource('/authors', 'AuthorController')->names('admin.authors');

});
