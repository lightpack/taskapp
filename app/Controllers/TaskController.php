<?php

namespace App\Controllers;

use App\Models\Task;

class TaskController
{
    /**
     * List all tasks.
     */
    public function index()
    {
        return response()->view('tasks/index', [
            'tasks' => Task::query()->all(),
        ]);
    }

    /**
     * Show new task form.
     */
    public function showAddForm()
    {
        return response()->view('tasks/form');
    }

    /**
     * Submit new task.
     */
    public function postAddForm()
    {
        $task = new Task();
        $task->title = request()->input('title');
        $task->save();

        return redirect()->to('tasks');
    }

    /**
     * Show task update form.
     */
    public function showEditForm($id)
    {
        $task = new Task($id);

        return response()->view('tasks/form', [
            'task' => $task,
        ]);
    }

    /**
     * Save task update.
     */
    public function postEditForm($id)
    {
        $task = new Task($id);
        $task->title = request()->input('title');
        $task->status = request()->input('status');
        $task->save();

        return redirect()->to('tasks');
    }
}
