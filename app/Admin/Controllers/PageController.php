<?php

namespace App\Admin\Controllers;

use App\Models\Book;
use App\Models\Page;
use App\Repositories\PageRepository;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class PageController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new PageRepository(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->title->tree(); // 开启树状表格功能
            $grid->order;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->quickSearch(['id', 'title']);
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new PageRepository(), function (Show $show) {
            $show->id;
            $show->title;
            $show->author;
            $show->book_id;
            $show->parent;
            $show->desc;
            $show->content;
            $show->order;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Page, function (Form $form) {
            $form->row(function (Form\Row $row) {
                $row->width(12)->text('title')->required();
                $row->width(4)->select('book_id')->options(Book::all()->pluck('name', 'id'));
                $row->width(4)->select('parent')
                    ->options(Page::all()->pluck('title', 'id'))->default(0);
                $row->width(4)->text('author');
                $row->width(12)->markdown('desc');
                $row->width(12)->markdown('content')->required();
                $row->width(4)->number('order');
                $row->width(4)->display('created_at');
                $row->width(4)->display('updated_at');
            });
            $form->saving(function ($a){
                $parent = request()->input('parent');
                if(is_null($parent)){
                    $a->deleteInput('parent');
                }
            });
        });
    }
}
