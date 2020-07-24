<?php

namespace App\Admin\Controllers;

use App\Models\Author;
use App\Models\Book;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;

class BookController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Book(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->author->display(function ($author) {
                $authors = Author::find($author)->pluck('name', 'id');
                if (empty($authors)) {
                    return '';
                }
                $result = [];
                foreach ($authors->toArray() as $id => $name) {
                    $result[] = '<a href="/admin/authors/' . $id . '">' . $name . '</a>';
                }

                return join(', ', $result);
            });
            $grid->order;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
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
        return Show::make($id, new Book(), function (Show $show) {
            $show->id;
            $show->name;
            $show->author->as(function ($ids) {
                return !empty($ids) ? join(',', Author::find($ids)->pluck('name')->toArray()) : "";
            });
            $show->desc;
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
        return Form::make(new Book(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            $form->multipleSelect('author')
                ->options(Author::all()->pluck('name', 'id'));
            $form->markdown('desc');
            $form->number('order');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
