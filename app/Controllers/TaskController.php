<?php

namespace App\Controllers;

class TaskController
{
    public function index()
    {
        $data['tasks'] = app('db')->table('tasks')->fetchAll();

        app('response')->render('tasks/home', $data);
    }

    public function add()
    {
        $request = app('request');

        if($request->isPost()) {
            app('db')->table('tasks')->insert([
                'title' => $request->post('title')
            ]);

            redirect('tasks');
        }

        app('response')->render('tasks/form');
    }

    public function edit($id)
    {
        $data['task'] = app('db')->table('tasks')->where('id', '=', $id)->fetchOne();
        $request = app('request');

        if($request->isPost()) {
            app('db')->table('tasks')->update(['id', $id], [
                    'title' => $request->post('title'),
                    'status' => $request->post('status')
                ]
            );

            redirect('tasks');
        }


        app('response')->render('tasks/form', $data);
    }
}