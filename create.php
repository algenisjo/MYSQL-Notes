<?php

$connection = require_once 'connection.php';

$id = $_POST['id'] ?? '';
if ($id){
    $connection->updateNote($id, $_POST);
} else {
    $connection->addNote($_POST);
}
// this will redirect back to index.php
header('Location: index.php');