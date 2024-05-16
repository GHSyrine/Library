<?php
session_start();
include "header.php";
$id = $_GET["id"];
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$query = "DELETE FROM book 
WHERE idbook = :id";
$statement = $pdo->prepare($query);
$statement->bindValue(":id", $id, PDO::PARAM_INT);
$statement->execute();
if ($statement) {
    $_SESSION['deletebook'] = "Livre supprimé";
}
header("location:/books_list.php");
