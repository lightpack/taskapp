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
        $tasks = TaskModel::query()->all();

        response()->render('tasks/index', [
            'tasks' => $tasks
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
        TaskModel::query()->insert([
            'title' => app('request')->post('title'),
        ]);

        redirect('tasks');
    }

    /**
     * Show task update form.
     */
    public function showEditForm($id)
    {
        response()->render('tasks/form', [
            'task' => TaskModel::query()->where('id', '=', $id)->one(),
        ]);
    }

    /**
     * Save task update.
     */
    public function postEditForm($id)
    {
        TaskModel::query()->where('id', '=', $id)->update([
            'title' => app('request')->post('title'),
            'status' => app('request')->post('status'),
        ]);

        redirect('tasks');
    }
}
