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
        $data = [
            'tasks' => TaskModel::query()->all(),
        ];

        response()->render('tasks/index', $data);
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
        $data = [
            'title' => request()->post('title'),
        ];

        TaskModel::query()->insert($data);

        redirect('tasks');
    }

    /**
     * Show task update form.
     */
    public function showEditForm($id)
    {
        $data = [
            'task' => TaskModel::query()->where('id', '=', $id)->one(),
        ];

        response()->render('tasks/form', $data);
    }

    /**
     * Save task update.
     */
    public function postEditForm($id)
    {
        $data = [
            'title' => request()->post('title'),
            'status' => request()->post('status'),
        ];

        TaskModel::query()->where('id', '=', $id)->update($data);

        redirect('tasks');
    }
}
