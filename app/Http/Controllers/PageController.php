<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $this->viewIncrement($page);
        $comments = Comment::query()->where('object_id', $page->id)
            ->where('object_type', $page->getClassName())->get();

        return response($page->load(['authors', 'editor', 'book'])->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Page         $page
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'title'   => 'required',
            'content' => 'required',
        ]);

        $result = $page->update($request->all());

        $page->increments($page, 'edit_count');

        return response($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
