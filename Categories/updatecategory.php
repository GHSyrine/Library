<?php
session_start();
include "header.php";
$id=$_GET["id"];
$Cname=$_POST['Category_name'];
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$query = "UPDATE category
SET Category_name = :Cname
WHERE idcategory = :id";
$statement=$pdo->prepare($query);
$statement ->bindValue(":Cname", $Cname, PDO::PARAM_STR);
$statement ->bindValue(":id", $id, PDO::PARAM_INT);
$statement ->execute();
if($statement){
    $_SESSION['updatecat'] = "Catégorie modifiée";
    header ("location:/categories_list.php");
}


