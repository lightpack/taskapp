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
        response()->render('tasks/index', [
            'tasks' => TaskModel::query()->all(),
        ]);
    }

    /**
     * Show new task form.
     */
    public function showAddForm()
    {
        response()->render('tasks/form');
    }

    /**
     * Submit new task.
     */
    public function postAddForm()
    {
        $task = new TaskModel();
        $task->title = request()->post('title');
        $task->save();

        redirect('tasks');
    }

    /**
     * Show task update form.
     */
    public function showEditForm($id)
    {
        $task = new TaskModel($id);

        response()->render('tasks/form', [
            'task' => $task,
        ]);
    }

    /**
     * Save task update.
     */
    public function postEditForm($id)
    {
        $task = new TaskModel($id);
        $task->title = request()->post('title');
        $task->status = request()->post('status');
        $task->save();

        redirect('tasks');
    }
}
