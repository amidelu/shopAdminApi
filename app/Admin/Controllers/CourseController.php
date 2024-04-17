<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Models\CourseType;
use App\Models\Course;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Tree;

class CourseController extends AdminController
{
    protected function grid() {
        $grid = new Grid(new Course());

        return $grid;
    }
    protected function detail($id)
    {
        $show = new Show(Course::findOrFail( $id));

        $show->field('id', __('Id'));
        $show->field('title', __('Category'));
        $show->field('description', __('Description'));
        $show->field('order', __('Order'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Course());
        $form->text('name', __('Name'));
        // Get our categories
        // Key value pair
        // Last one is the key in pluck method
        $result = CourseType::pluck('id', 'title');
        // This is for category dropdown
        $form->select('type_id', __('Category'))->options($result);
        $form->image('thumbnail', __('Thumbnail'))->uniqueName();
        // File is used for video and other format like pdf/doc
        $form->file('video', __('Video'))->uniqueName();
        $form->text('description', __('Description'));
        // Decimal method helps with retreiving float number from database
        $form->decimal('price', __('Price'))->default(0);
        $form->number('lesson_num', __('Lesson Number'))->default(0);
        $form->number('video_length', __('Video Length'))->default(0);
        // For who is posting dropdown
        $result = User::pluck('name', 'token');
        $form->select('user_token', __('Teacher'))->options($result);
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
