<?php
session_start();
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$newbook = $_POST['book_title'];
$publishing_date = $_POST['date'];
$idauthor = $_POST['idauthor'];
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES['image']['name']);


$query = 'INSERT into book
 (`title`, `publishing_date`, `idauthor`, `image`)
  Values (:newbook, :publishing_date, :idauthor, :targetFile)';
$statement = $pdo->prepare($query);
$statement->bindValue(':newbook', $newbook, \PDO::PARAM_STR);
$statement->bindValue(':publishing_date', $publishing_date, \PDO::PARAM_STR);
$statement->bindValue(':idauthor', $idauthor, \PDO::PARAM_INT);
$statement->bindvalue(':targetFile', $targetFile, \PDO::PARAM_STR);
$statement->execute();
if($statement){
    $_SESSION['addbook'] = "Livre ajouté";
    header ("location:/books_list.php");
}
