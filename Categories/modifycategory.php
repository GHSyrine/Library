<?php
include "header.php";
$id = $_GET["id"];

$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$statement = $pdo->prepare("SELECT * FROM category where idcategory=:id");
$statement->bindValue(":id", $id, PDO::PARAM_INT);
$statement->execute();
$category = $statement->fetch(PDO::FETCH_ASSOC);
?>

<form action="updatecategory.php?id=<?=$id?>" method="POST">
    <input type="hidden" name="id" value="<?= $id;?>">
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Catégorie</label>
        <input value="<?= $category['Category_name'] ?>" type="text" class="form-control" name="Category_name">
    </div>
    <div>
        <input type="submit" value="Modifier">
    </div>
</form>