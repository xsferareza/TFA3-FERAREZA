<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    protected $taskModel;
    protected $userModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    // Welcome Page (/) - Today's tasks only
    public function index()
    {
        $data = [
            'title' => 'Welcome - Today\'s Tasks',
            'tasks' => $this->taskModel->getTodayTasks()
        ];
        return view('tasks/welcome', $data);
    }

    // Task List Page (/tasks) - All tasks ordered by date
    public function list()
    {
        $data = [
            'title' => 'All Tasks Listing',
            'tasks' => $this->taskModel->getAllTasks()
        ];
        return view('tasks/index', $data);
    }

    // Profile Page (/profile) - Single user record
    public function profile()
    {
        $data = [
            'title' => 'User Profile',
            'user'  => $this->userModel->getDemoUser()
        ];
        return view('pages/profile', $data);
    }

    // Static About Page (/about) - Developer details
    public function about()
    {
        $data = [
            'title' => 'About Developer'
        ];
        return view('pages/about', $data);
    }
}