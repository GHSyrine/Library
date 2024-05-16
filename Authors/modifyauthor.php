<?php
include "header.php";
$id=$_GET["id"];

$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$statement = $pdo->prepare("SELECT * FROM author where idauthor=:id");
$statement ->bindValue(":id", $id, PDO::PARAM_INT);
$statement->execute();
$author = $statement->fetch(PDO::FETCH_ASSOC);
?>


<form action="updateauthor.php?id=<?=$id?>" method="POST">
    <input type="hidden" name="id" value="<?= $id;?>">
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Prénom de l'auteur</label>
                <input  value="<?=$author['firstname']?>" type="text" class="form-control" name="firstname_author">
        </div>
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom de l'auteur</label>
                <input  value="<?=$author['lastname']?>" type="text" class="form-control" name="lastname_author">
        </div>
        <div>
        <input type="submit" value="Modifier">
        </div>
</form>