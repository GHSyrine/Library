<?php
include "header.php";
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$statement = $pdo->query("select * FROM user");
$category=$statement ->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Liste des utilisateurs</h1>
