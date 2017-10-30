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
     * Funktion, um die Login Seite anzuzeigen.
     * Gibt die View "Login" zurück.
     */
    public function index()
    {
        $view = new view('login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }
    
    /**
     * Funktion, die den User in die Seite einloggt,
     * wenn das richtige Passwort eingegeben wurde.
     * 
     * Bei richtigem Passwort wird der User auf die View "home" weitergeleitet.
     * Bei falschem Passwort wird der User auf die View "login" weitergeleitet, der GET Parameter
     * "login" wird zudem auf "fail" gesetzt. Dadurch wird dem User eine Fehlermeldung angezeigt.
     */
    public function check()
    {
        if ($_POST['password'] == "salami1") {
            $_SESSION['login'] = true;
            header("Location: /home");
        } else {
            header("Location: /login?login=fail");
        }
    }
    
    
    /**
     * Funktion, um den User auszuloggen.
     * Die Session wird zerstört und der User wird auf die View "login" weitergeleitet.
     */
    public function logout()
    {
        session_destroy();
        header("Location: /login");
    }
}
