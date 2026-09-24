<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TasksController extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->where('task_date', date('Y-m-d'))
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('tasks/welcome', $data);
    }

    public function tasks()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks/list', $data);
    }

    public function profile()
    {
        $userModel = new UserModel();

        $data['user'] = $userModel->first();

        return view('tasks/profile', $data);
    }

    public function about()
    {
        return view('tasks/about');
    }
}