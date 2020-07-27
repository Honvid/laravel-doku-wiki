<?php

namespace App\Admin\Controllers;

use App\Repositories\CommentRepository;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class CommentController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new CommentRepository(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->title;
            $grid->user_id;
            $grid->content;
            $grid->status;
            $grid->object_id;
            $grid->object_type;
            $grid->comment_id;
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
        return Show::make($id, new CommentRepository(), function (Show $show) {
            $show->id;
            $show->title;
            $show->user_id;
            $show->content;
            $show->status;
            $show->object_id;
            $show->object_type;
            $show->comment_id;
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
        return Form::make(new CommentRepository(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('user_id');
            $form->text('content');
            $form->text('status');
            $form->text('object_id');
            $form->text('object_type');
            $form->text('comment_id');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
