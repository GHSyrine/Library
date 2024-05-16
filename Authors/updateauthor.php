<?php
session_start();
include "header.php";
$id=$_GET["id"];
$firstname = $_POST['firstname_author'];
$lastname = $_POST['lastname_author'];

$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$statement = $pdo->prepare("UPDATE author SET firstname=:firstname, lastname=:lastname WHERE idauthor=:id"); 
$statement ->bindValue(":firstname", $firstname, PDO::PARAM_STR);
$statement ->bindValue(":lastname", $lastname, PDO::PARAM_STR);
$statement ->bindValue(":id", $id, PDO::PARAM_INT);
$statement ->execute();

if($statement){
    $_SESSION['updateauthor'] = "Auteur modifié";
    header ("location:/authors_list.php");
}


