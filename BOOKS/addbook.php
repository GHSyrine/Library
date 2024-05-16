<?php
include "header.php";
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$statement = $pdo->query("SELECT * FROM author");
$authors = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<form action="savebook.php" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">

                <label>Titre du livre</label>
                <input type="text" name="book_title">
        </div>
        <div class="row mb-3">
                <label>Date de publication</label>
                <input type="DATE" name="date">
        </div>
        <div class="row mb-3">
        <label for="auteur">Auteur</label>
        <select name="idauthor">
        </div>
        <?php
        foreach ($authors as $author) { ?>
                
                <option value="<?= $author['idauthor'] ?>"><?= $author['lastname'] ?></option>
                <br>
        <?php
        } ?>
        <div>
        <input type="file" name="image">
        <input type="submit" name="submit" value="Upload">
        </div>
        <input type="submit" value="Ajouter">
</form>
<p> Si l'auteur n'existe pas dans la liste merci de l'ajouter via ce lien <a href=addauthor.php>Ajouter l'auteur</a> avant d'ajouter le livre. </p>