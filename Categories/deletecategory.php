<?php
session_start();
include "header.php";
$id=$_GET["id"];
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$query = "DELETE FROM category 
WHERE idcategory = :id";
$statement = $pdo->prepare($query);
$statement ->bindValue(":id", $id, PDO::PARAM_INT);
$statement ->execute();
if($statement){
    $_SESSION['deletecat'] = "Catégorie supprimée";
    header ("location:/categories_list.php");
}

header("location:/categories_list.php");
