<?php
include "header.php";
?>
<form action="saveauthor.php" method="POST">
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Prénom de l'auteur</label>
                <input type="text" class="form-control" name="firstname_author">
        </div>
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nom de l'auteur</label>
                <input type="text" class="form-control" name="lastname_author">
                </div>
        <input type="submit" value="Ajouter">
</form>
<?php
