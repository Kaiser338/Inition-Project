<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/TaskRepository.php';
require_once __DIR__ . '/../repository/AdminRepository.php';

class TaskController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->taskRepository = new TaskRepository();
        $this->adminRepository = new AdminRepository();
    }

    public function tasks()
    {
        $user_id = $this->isAuthorized();
        $tasks = $this->taskRepository->getTasksToday($user_id);
        $date_time_format = date('Y-m-d', strtotime('tomorrow'));
        $tasks_tommorow = $this->taskRepository->getTasksDate($user_id, $date_time_format);
        $isAdmin = $this->adminRepository->isAdmin($user_id);

        $this->render('tasks', ['tasks' => $tasks, 'tasks_tommorow' => $tasks_tommorow, 'is_admin' => $isAdmin]);
    }

    public function searchTask()
    {
        $this->render('search');
    }

    public function newTask()
    {
        $this->render('new');
    }

    public function changeTask()
    {
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);
        $this->taskRepository->changeTask($data['id'], $data['checked']);
    }

    public function createTask()
    {
        $user_id = $this->isAuthorized();
        $this->taskRepository->createTask($user_id, $_POST['task-name'], $_POST['task-description'], $_POST['day']);
        $this->tasks();
    }

}

?>