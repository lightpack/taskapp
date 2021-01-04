<?php

/**
 * Register app routes here.
 */

$route->group(['namespace' => 'App\Controllers'], function($route) {
    $route->get('/', 'HomeController@index');
    $route->get('/tasks', 'TaskController@index');
    $route->get('/tasks/add', 'TaskController@add');
    $route->post('/tasks/add', 'TaskController@add');
    $route->get('/tasks/edit/:num', 'TaskController@edit');
    $route->post('/tasks/edit/:num', 'TaskController@edit');
});