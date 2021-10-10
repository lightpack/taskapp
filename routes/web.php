<?php

use App\Controllers\HomeController;
use App\Controllers\TaskController;

/**
 * --------------------------------------------------
 * Register web routes here.
 * --------------------------------------------------
 */

route()->get('/', HomeController::class);
route()->get('/tasks', TaskController::class);
route()->get('/tasks/add', TaskController::class, 'showAddForm');
route()->post('/tasks/add', TaskController::class, 'postAddForm');
route()->get('/tasks/edit/:num', TaskController::class, 'showEditForm');
route()->post('/tasks/edit/:num', TaskController::class, 'postEditForm');
