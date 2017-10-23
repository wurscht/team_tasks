<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class TaskRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'task';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($title, $description, $due_date, $is_done)
    {
        $query = "INSERT INTO $this->tableName (title, description, due_date, is_done) VALUES (?, ?, ?, ?)";
        
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $title, $description, $due_date, $is_done);
        
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
    
    public function edit($id, $title, $description, $due_date, $is_done)
    {
        $query = "UPDATE $this->tableName SET title = ?, description = ?, due_date = ? is_done = ? WHERE id = $id";
            
        
    }
}
