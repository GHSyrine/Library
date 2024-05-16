<?php
session_start();
include "header.php";
$id = $_GET["id"];
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$query = "SELECT * FROM book
WHERE idbook = :id"; 
$statement = $pdo-> prepare ($query);
$statement -> bindValue (":id", $id, PDO::PARAM_INT);
$statement -> execute();
$book = $statement ->fetch(PDO::FETCH_ASSOC);
var_dump($book);
if(isset($_SESSION['cart'])) {
    $_SESSION['cart'][] = $book;
    var_dump($_SESSION['cart']);
}
else{
    $_SESSION['cart'] = array($book);
}

//header("location:/index.php");
