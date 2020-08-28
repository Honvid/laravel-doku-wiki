<?php

namespace App\Admin\Controllers;

use App\Repositories\AuthorRepository;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;

class AuthorController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new AuthorRepository(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->birthday;
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
        return Show::make($id, new AuthorRepository(), function (Show $show) {
            $show->id;
            $show->name;
            $show->birthday;
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
        return Form::make(new AuthorRepository(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            $form->text('birthday');
        });
    }
}
