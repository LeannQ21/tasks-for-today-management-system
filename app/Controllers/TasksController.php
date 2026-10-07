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
            ->where('is_archived', 0)
            ->where('task_date', date('Y-m-d'))
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('tasks/welcome', $data);
    }

    public function tasks()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->where('is_archived', 0)
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

    public function new()
    {
        return view('tasks/form', [
            'pageTitle' => 'Add New Task',
            'task'      => null,
        ]);
    }

    public function create()
    {
        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date',
            'status'    => 'required|in_list[pending,in_progress,completed]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title'       => $this->request->getPost('title'),
            'status'      => $this->request->getPost('status'),
            'task_date'   => $this->request->getPost('task_date'),
            'created_at'  => date('Y-m-d H:i:s'),
            'is_archived' => 0,
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (! $task) {
            return redirect()->to('/tasks')
                ->with('error', 'Task not found.');
        }

        return view('tasks/form', [
            'pageTitle' => 'Edit Task',
            'task'      => $task,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'title'     => 'required|max_length[150]',
            'task_date' => 'required|valid_date',
            'status'    => 'required|in_list[pending,in_progress,completed]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'status'    => $this->request->getPost('status'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    public function archive($id)
    {
        $taskModel = new TaskModel();

        $taskModel->update($id, [
            'is_archived' => 1,
        ]);

        return redirect()->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}