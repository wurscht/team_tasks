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
class HomeController
{
    /**
     * Funktion um die Home Seite anzuzeigen.
     * Gibt die View "Home" zurück.
     */
    public function index()
    {
        $taskRepository = new TaskRepository();
        
        $view = new View('default_index');
        $view->title = 'Home';
        $view->heading = 'Home';
        $view->display();
    }
}
