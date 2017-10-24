<?php

require_once '../lib/Repository.php';

/**
 * Das TaskRepository ist zuständig für alle Zugriffe auf die Tabelle "task".
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
     * Erstellt einen neuen Task mit den gegebenen Werten.
     *
     * @param $title Wert für die Spalte title
     * @param $description Wert für die Spalte description
     * @param $due_date Wert für die Spalte due_date
     * @param $is_done Wert für die Spalte is_done
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
    
    /**
     * Ändert einen Task mit den gegebenen Werten.
     *
     * @param $id Wert für die Spalte id
     * @param $title Wert für die Spalte title
     * @param $description Wert für die Spalte description
     * @param $due_date Wert für die Spalte due_date
     * @param $is_done Wert für die Spalte is_done
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    
    public function edit($id, $title, $description, $due_date, $is_done)
    {
        $query = "UPDATE $this->tableName SET title = ?, description = ?, due_date = ?, is_done = ? WHERE id = ?";
            
        $statement = ConnectionHandler::getConnection()->prepare($query);
        if($statement === false)
            echo ConnectionHandler::getConnection()->error;
        $statement->bind_param('sssii', $title, $description, $due_date, $is_done, $id);
        
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;    
    }
}
