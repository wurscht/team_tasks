<?php

require_once '../repository/TaskRepository.php';

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
        $view->tasks = $taskRepository->readAll();
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
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $due_date = htmlspecialchars($_POST['due_date']);
            $is_done = htmlspecialchars($_POST['is_done']);
            if (strlen($title) > 60) {
                $view = new view('title_error');
                $view->title = 'Title error';
                $view->heading = 'Title error';
                $view->display();
            } else {
                $taskRepository = new TaskRepository();
                $taskRepository->create($title, $description, $due_date, $is_done);
                
                // Anfrage an die URI /task weiterleiten (HTTP 302)
                header('Location: /task');    
            }
        }
    }

    public function delete()
    {
        $taskRepository = new TaskRepository();
        $taskRepository->deleteById($_GET['id']);

        // Anfrage an die URI /task weiterleiten (HTTP 302)
        header('Location: /task');
    }
    
    public function edit()
    {
        $taskRepository = new TaskRepository();
        
        $id = $_GET['id'];
        if(!$id){
            echo "Task has no id!";
        }
        
        $view = new View('task_edit');
        $view->title = 'Edit task';
        $view->heading = 'Edit task';
        $view->task = $taskRepository->readById($id);
        $view->display();
    }
    
    public function doEdit()
    {
        if ($_POST['send']) {
            $id = htmlspecialchars($_POST['id']);
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $due_date = htmlspecialchars($_POST['due_date']);
            if (isset($_POST['is_done'])) {
                $is_done = 1;
            } else {
                $is_done = 0;
            }
            if (strlen($title) > 60) {
                $view = new view('title_error');
                $view->title = 'Title error';
                $view->heading = 'Title error';
                $view->display();
            } else {
                $taskRepository = new TaskRepository();
                $taskRepository->edit($id, $title, $description, $due_date, $is_done);
                header("Location: /task");
                exit;
            }
        }
    }
    
    public function titleError()
    {
        if (strlen($_POST['title']) > 60) {
            $view = new view('title_error');
            $view->title = 'Title error';
            $view->heading = 'Title error';
            $view->display();
        }
    }
}
