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
class LoginController
{
    /**
     * Funktion, die den User in die Seite einloggt,
     * wenn das richtige Passwort eingegeben wurde.
     */
    public function index()
    {
        $view = new view('login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }
    
    public function check()
    {
        exit('hello');
        if ($_POST['password'] == "salami1") {
            exit('finish here');
            $_SESSION['login'] = true;
            header("Location: /home");
        } else {
            header("Location: /login?login=fail");
        }
    }
}
