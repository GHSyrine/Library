<?php
$id=$_GET['id'];


$title=$_POST['book_title'];
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');

$sql ='UPDATE book SET title =:title WHERE idbook = :id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':title', $title, \PDO::PARAM_STR);
$statement->execute();
header ("location:books_list.php");