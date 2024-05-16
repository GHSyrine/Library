<?php
include "header.php";
$id=$_GET["id"];

$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$statement = $pdo->prepare("SELECT * FROM book WHERE idbook=:id");
$statement->bindValue(":id", $id, PDO::PARAM_INT);
$statement->execute();

$book = $statement->fetch(PDO::FETCH_ASSOC);
$stm = $pdo->query("SELECT * FROM author");
$authors = $stm->fetchAll(PDO::FETCH_ASSOC);
?>


<form action="updatebook.php?id=<?= $id ?>" method="POST">
        <input type="hidden" name="id" value="<?= $id; ?>">

        <label>Titre du livre</label>
        <input Value="<?= $book['title'] ?>" type="text" name="book_title">
        <label>Date de publication</label>
        <input Value="<?= $book['publishing_date'] ?>" type="DATE" name="date">

        
        <label for="auteur">Auteur</label>
        
        <select name="idauthor">
                <option value="<?= $author['idauthor'] ?>"><?= $author['lastname'] ?></option>
                <?php
                foreach ($authors as $author) { ?>

                        <option value="<?= $author['idauthor'] ?>"><?= $author['lastname'] ?></option>
                        <br>
                <?php
                } ?>
                <div>
                        <input type="submit" value="Modifier">
                </div>
<h5> Si l'auteur n'existe pas dans la liste merci de l'ajouter via ce lien <a href=addauthor.php>Ajouter l'auteur</a> avant d'ajouter le livre. </h5>        