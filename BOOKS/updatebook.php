<?php
session_start();
include "header.php";
$id=$_GET["id"];
$newbook = $_POST['book_title'];
$pub_date = $_POST['date'];
$idauthor =$_POST['idauthor'];

var_dump($_POST);

$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$query = "UPDATE book 
SET title = :newbook,
publishing_date = :pub_date,
idauthor = :idauthor
WHERE idbook = :id";
$statement = $pdo->prepare($query);
$statement ->bindValue(":newbook", $newbook, \PDO::PARAM_STR);
$statement ->bindValue(":pub_date", $pub_date, \PDO::PARAM_STR);
$statement ->bindValue(":idauthor", $idauthor, \PDO::PARAM_INT);
$statement ->bindValue(":id", $id, PDO::PARAM_INT);
$statement ->execute();

if($statement){
    $_SESSION['updatebook'] = "Informations livre modifiées";
}
header("location:/books_list.php");
