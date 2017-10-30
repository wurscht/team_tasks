<?php

/** 
 * Hier wird die Datei TaskRepository.php eingebunden.
 * Diese Datei ist da, um die Verbindung zur Datenbank herzustellen.
 * (Tasks zu löschen, bearbeiten und ersellen)
 */
require_once '../repository/TaskRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class TaskController
{
        
    /**
     * Funktion um alle Tasks anzuzeigen.
     * Gibt die View "Task" zurück.
     */
    public function index()
    {
        $taskRepository = new TaskRepository();

        $view = new View('task_index');
        $view->title = 'Task';
        $view->heading = 'Task';
        $view->tasks = $taskRepository->readAll();
        $view->display();
    }

    /**
     * Funktion um einen Task zu ersellen.
     * Gibt die View "Create task" zurück.
     */
    public function create()
    {
        $view = new View('task_create');
        $view->title = 'Create task';
        $view->heading = 'Create task';
        $view->display();
    }

    /**
     * Funktion, die ausgelöst wird, wenn bei der View "Create task" auf den Button "send"
     * geklickt wird.
     * Die Eingaben werden aus der POST Variable gelesen und dem TaskRepository, zwecks einfügen
     * in die Datenbank, weitergeleitet.
     * 
     * Wenn der Titel, oder die Beschreibung zu lange sind, werden Fehler Views angezeigt
     * ("Title error" oder "Description error").
     *
     * Dem TaskRepository werden die Parameter $title (string), $description (string), $due_date
     * (string) und $is_done (int) mitgegeben.
     *
     * Der User auf die View "Task" weitergeleitet.        
     */
    public function doCreate()
    {
        if ($_POST['send']) {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $due_date = htmlspecialchars($_POST['due_date']);
            if (isset($_POST['is_done'])) {
                $is_done = 1;
            } else {
                $is_done = 0;
            }
            if ($this->titleError())
            {
               
            } else if ($this->descriptionError())
            {
            } 
            else {
                $taskRepository = new TaskRepository();
                $taskRepository->create($title, $description, $due_date, $is_done);
                
                // Anfrage an die URI /task weiterleiten (HTTP 302)
                header('Location: /task');    
            }
        }
    }

    /**
     * Funktion um einen Task zu löschen.
     * Liest aus der GET Variable das Attribut "id" und löscht
     * den Datensatz mit dieser ID aus der Datenbank.
     *
     * Der User wird auf die View "Task" weitergeleitet.
     */
    public function delete()
    {
        $taskRepository = new TaskRepository();
        $taskRepository->deleteById($_GET['id']);

        // Anfrage an die URI /task weiterleiten (HTTP 302)
        header('Location: /task');
    }
    
    /**
     * Funktion um einen Task zu bearbeiten.
     * 
     * Gibt die View "Edit Task" zurück.
     */
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
    
    /** 
     * Funktion, die ausgelöst wird, wenn bei der View "Edit task" auf den Button "send"
     * geklickt wird. Die Eingaben werden aus der POST Variable gelesen und dem TaskRepository,
     * zwecks abändern in der Datenbank, weitergeleitet.
     * 
     * Wenn der Titel, oder die Beschreibung zu lange sind, werden Fehler Views angezeigt
     * ("Title error" oder "Description error").
     *
     * Dem TaskRepository werden die Parameter $id (int), $title (string), $description 
     * (string), $due_date (string) und $is_done (int) mitgegeben.
     *    
     * Der User auf die View "Task" weitergeleitet. 
     */
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
            if ($this->titleError())
            {
            } else if ($this->descriptionError())
            {
            }
            else {
                $taskRepository = new TaskRepository();
                $taskRepository->edit($id, $title, $description, $due_date, $is_done);
                header("Location: /task");
                exit;
            }
        }
    }
    
    /**
     * Funktion, die prüft ob der eingegebene Titel mehr als 60 Zeichen beinhaltet
     * und bei Eintreten die View "Title error" zurückgibt.
     */
    public function titleError()
    {
        if (strlen($_POST['title']) > 60) {
            $view = new view('title_error');
            $view->title = 'Title error';
            $view->heading = 'Title error';
            $view->display();
            return true;
        }
    }
    
    /**
     * Funktion, die prüft ob die eingegebene Beschreibung mehr als 300 Zeichen beinhaltet
     * und bei Eintreten die View "Description error" zurückgibt.
     */
    public function descriptionError()
    {
        if (strlen($_POST['description']) > 300) {
            $view = new view('description_error');
            $view->title = 'Description error';
            $view->heading = 'Description error';
            $view->display();
            return true;
            
        }
    }
}
