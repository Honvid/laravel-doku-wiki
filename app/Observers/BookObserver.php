<?php

namespace App\Observers;

use App\Models\Book;

class BookObserver
{
    /**
     * 处理 Book「created」事件
     *
     * @param  Book  $book
     * @return void
     */
    public function created(Book $book)
    {

    }

    /**
     * 处理 Book「updated」事件
     *
     * @param  Book  $book
     * @return void
     */
    public function updated(Book $book)
    {
        $book->update([
            'edit_count' => $book->edit_count++,
        ]);
    }

    /**
     * 处理 Book「deleted」事件
     *
     * @param  Book  $book
     * @return void
     */
    public function deleted(Book $book)
    {
        //
    }

    /**
     * 处理 Book「forceDeleted」事件
     *
     * @param  Book  $book
     * @return void
     */
    public function forceDeleted(Book $book)
    {
        //
    }
}
