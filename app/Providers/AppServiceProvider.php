<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Page;
use App\Observers\AuthorObserver;
use App\Observers\BookObserver;
use App\Observers\PageObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Book::observe(BookObserver::class);
        Author::observe(AuthorObserver::class);
        Page::observe(PageObserver::class);
    }
}
