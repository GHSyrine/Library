<?php
include "header.php";
?>
<form action="savecategory.php" method="POST">
        <div class="form-example">
                <label for="name">Entrer le nom de la catégorie: </label>
                <input type="text" name="category_name" required/>
                <input type="submit" value="Ajouter">
        </div>
</form>