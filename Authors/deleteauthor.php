<?php
session_start();
include "header.php";
$id=$_GET["id"];
try{
    $pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
    $query = "DELETE FROM author 
WHERE idauthor = :id";
$statement = $pdo->prepare($query);
$statement ->bindValue(":id", $id, PDO::PARAM_INT);
$statement ->execute();
if($statement){
    $_SESSION['deleteauthor'] = "Auteur supprimé";
    header ("location:/authors_list.php");
}
}catch(PDOException $e){
    if($e ->getCode()==23000){
echo "Vous ne pouvez pas supprimer cet auteur";
    }
}


