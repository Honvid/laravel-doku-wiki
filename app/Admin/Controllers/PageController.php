<?php

namespace App\Admin\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Page;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;

class PageController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make((new Page())->with(['book', 'authors']), function (Grid $grid) {
            $grid->id->sortable();
            $grid->title->tree(); // 开启树状表格功能
            $grid->book->display(function ($book) {
                return $book['name'] ?? '';
            });
            $grid->authors->display(function ($authors) {
                if (empty($authors)) {
                    return '佚名';
                }
                $result = [];
                foreach ($authors as $author) {
                    $result[] = '<a href="/admin/authors/' . $author['id'] . '">' . $author['name'] . '</a>';
                }

                return join(', ', $result);
            });
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
        return Show::make($id, Page::with(['book', 'authors']), function (Show $show) {
            $show->id;
            $show->book->as(function ($book) {
                return $book['name'] ?? '';
            });
            $show->title;
            $show->authors->as(function ($authors) {
                return !empty($authors) ? join(', ', array_column($authors, 'name')) : '佚名';
            });
            $show->desc;
            $show->content;
            $show->order;
            $show->edit_count;
            $show->view_count;
            $show->edit_count;
            $show->comment_count;
            $show->last_modify_by;
            $show->last_modify_at;
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
        return Form::make(Page::with('authors'), function (Form $form) {
            $form->row(function (Form\Row $row) {
                $row->width(12)->text('title')->required();
                $row->width(4)->select('book_id')->options(Book::all()->pluck('name', 'id'));
                $row->width(4)->select('parent_id')
                    ->options(Page::all()->pluck('title', 'id'))->default(0);
                $row->width(4)->multipleSelect('authors')
                    ->options(Author::all()->pluck('name', 'id'))
                    ->customFormat(function ($v) {
                        if (!$v) {
                            return [];
                        }

                        return array_column($v, 'id');
                    });
                $row->width(12)->textarea('desc');
                $row->width(12)->markdown('content')->required();
                $row->width(4)->number('order');
            });
            $form->saving(function ($request) {
                $parent = request()->input('parent_id');
                if (is_null($parent)) {
                    $request->deleteInput('parent_id');
                }
            });
        });
    }
}
