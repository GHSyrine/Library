<?php
include "header.php";
$id = $_GET['id'];
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$query = "SELECT * FROM author as a
Join book as b
on a.idauthor = b.idauthor
WHERE a.idauthor =:id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, \PDO::PARAM_INT);
$statement->execute();
$author = $statement->fetchall(PDO::FETCH_ASSOC);
?>
<p>le nombre de livre écrit par cet auteur est : <?=count($author)?></p>
<?php
foreach($author as $oneauthor){?>
    
    <?= $oneauthor['title']?>
    <br>
<?php
}
?>
