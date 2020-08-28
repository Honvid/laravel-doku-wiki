<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new CategoryRepository(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name->tree(); // 开启树状表格功能
            $grid->level;
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
        return Show::make($id, new CategoryRepository(), function (Show $show) {
            $show->id;
            $show->name;
            $show->parent_id;
            $show->level;
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
        return Form::make(new CategoryRepository(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->select('parent_id')->options(Category::all()->pluck('name', 'id'));
            $form->text('level');
        });
    }
}
