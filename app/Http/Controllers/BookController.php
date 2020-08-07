<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Repositories\BookRepository;
use Dcat\Admin\Support\Helper;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookRepository = null;

    /**
     * BookController constructor.
     *
     * @param BookRepository $bookRepository
     */
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Book list
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = $this->bookRepository->fetch($request);

        return response($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Book         $book
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recommendBooks()
    {
        $books = Book::all();

        return response($books);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Book $book
     *
     * @return \Illuminate\Http\Response
     */
    public function blacklist(Book $book)
    {
        $pages = $book->pages()->get()->toArray();
        $pages = Helper::buildNestedArray($pages);

        return response($pages);
    }
}
