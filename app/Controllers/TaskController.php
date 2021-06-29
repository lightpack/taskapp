<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController
{
    /**
     * List all tasks.
     */
    public function index()
    {
        app('response')->render('tasks/home', [
            'tasks' => (new TaskModel)->fetchAll()
        ]);
    }

    /**
     * Show new task form.
     */
    public function showAddForm()
    {
        app('response')->render('tasks/form');
    }

    /**
     * Submit new task.
     */
    public function postAddForm()
    {
        (new TaskModel)->insert();
        redirect('tasks');
    }

    /**
     * Show task update form.
     */
    public function showEditForm($id)
    {
        app('response')->render('tasks/form', [
            'task' => (new TaskModel)->fetchOne($id)
        ]);
    }

    /**
     * Save task update.
     */
    public function postEditForm($id)
    {
        (new TaskModel)->update($id);
        redirect('tasks');
    }
}
