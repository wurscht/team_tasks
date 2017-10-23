<?php

require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class TaskController
{
    public function index()
    {
        $taskRepository = new TaskRepository();

        $view = new View('task_index');
        $view->title = 'Task';
        $view->heading = 'Task';
        $view->tasks = $TaskRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('task_create');
        $view->title = 'Create task';
        $view->heading = 'Create task';
        $view->display();
    }

    public function doCreate()
    {
        if ($_POST['send']) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $due-date = $_POST['due-date'];
            $is_done = $_POST['is_done'];

            $taskRepository = new TaskRepository();
            $taskRepository->create($title, $description, $due-date, $is_done);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /task');
    }

    public function delete()
    {
        $taskRepository = new TaskRepository();
        $taskRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /task');
    }
}
