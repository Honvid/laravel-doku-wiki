<?php

namespace App\Admin\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
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
        return Grid::make((new Book())->with(['authors', 'categories']), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
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
            $grid->categories->display(function ($categories) {
                if (empty($categories)) {
                    return '';
                }
                $result = [];
                foreach ($categories as $category) {
                    $result[] = '<a href="/admin/categories/' . $category['id'] . '">' . $category['name'] . '</a>';
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
        return Show::make($id, Book::with(['authors', 'categories']), function (Show $show) {
            $show->id;
            $show->name;
            $show->authors->as(function ($authors) {
                return !empty($authors) ? join(', ', array_column($authors, 'name')) : '佚名';
            });
            $show->categories->as(function ($categories) {
                return !empty($categories) ? join(', ', array_column($categories, 'name')) : '';
            });
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
        return Form::make(Book::with(['authors', 'categories']), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            $form->multipleSelect('authors')
                ->options(Author::all()->pluck('name', 'id'))
                ->customFormat(function ($v) {
                    if (!$v) {
                        return [];
                    }

                    return array_column($v, 'id');
                });
            $form->multipleSelect('categories')
                ->options(Category::all()->pluck('name', 'id'))
                ->customFormat(function ($v) {
                    if (!$v) {
                        return [];
                    }

                    return array_column($v, 'id');
                });
            $form->markdown('desc');
            $form->number('order');
        });
    }
}
