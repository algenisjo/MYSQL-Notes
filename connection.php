<?php

class Connection
{
    public $pdo = null;

 
//connecting to databse and if error then outputting a message
//connecting the project to a remote server so that it can be viewed live
public function __construct()
{

    $server = "sql203.epizy.com";
    $username = "epiz_29582470";
    $password ="sMKoERtPGuWgWN";
    $dbname = "epiz_29582470_mysqlnotesdb";

    try {
        $this->pdo = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception) {
        echo "ERROR: " . $exception->getMessage();
    }


}

// lets connect oto the databse and retrieving data as an associated array
    public function getNotes() 
    {
        $statement = $this->pdo->prepare("SELECT * FROM notes ORDER BY create_date DESC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
// collecting ($_GET) and sending data to the database 
    public function addNote($note)
    { // prepare statement is used to connect to the database and access a certain query
        $statement = $this->pdo->prepare("INSERT INTO notes (title, description, create_date)
                                    VALUES (:title, :description, :date)");
        $statement->bindValue('title', $note['title']);
        $statement->bindValue('description', $note['description']);
        $statement->bindValue('date', date('Y-m-d H:i:s'));
        return $statement->execute();
    }
// prefilling note form with data and when submitted values are updated
    public function updateNote($id, $note)
    {
        $statement = $this->pdo->prepare("UPDATE notes SET title = :title, description = :description WHERE id = :id");
        $statement->bindValue('id', $id);
        $statement->bindValue('title', $note['title']);
        $statement->bindValue('description', $note['description']);
        return $statement->execute();
    }
// deleting data from databse when called and id's match
    public function removeNote($id)
    {
        $statement = $this->pdo->prepare("DELETE FROM notes WHERE id = :id");
        $statement->bindValue('id', $id);
        return $statement->execute();
    }

    public function getNoteById($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $statement->bindValue('id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}

return new Connection();