<?php

namespace App\Models;

use Lightpack\Database\Lucid\Model;

class TaskModel extends Model
{
    public function __construct()
    {
        parent::__construct('tasks');
    }

    public function fetchAll()
    {
        return $this->query()->fetchAll();
    }

    public function fetchOne($id)
    {
        return $this->query()->where('id', '=', $id)->fetchOne();
    }

    public function insert()
    {
        $this->query()->insert([
            'title' => app('request')->post('title')
        ]);
    }

    public function update($id)
    {
        $this->query()->update(['id', $id], [
            'title' => app('request')->post('title'),
            'status' => app('request')->post('status'),
        ]);
    }
}