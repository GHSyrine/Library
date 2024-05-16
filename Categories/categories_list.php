<?php
session_start();
include "header.php";
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$statement = $pdo->query("SELECT * FROM category");
$category = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<h1 class="text-center">Liste des catégories</h1>

<?php
if (isset($_SESSION['addcat'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['addcat']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['addcat']);
}

if (isset($_SESSION['updatecat'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['updatecat']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['updatecat']);
}

if (isset($_SESSION['deletecat'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['deletecat']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['deletecat']);
}
?>
<table class="table">
    <thead>
        <th> Catégorie</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach ($category as $onecategory) { ?>
            <tr>
                <td>
                    <a href="detailcategory.php?id=<?= $onecategory['idcategory'] ?>">
                        <?= $onecategory['Category_name'] ?></a>
                </td>
                <td>
                    <a href="modifycategory.php?id=<?= $onecategory['idcategory'] ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="deletecategory.php?id=<?= $onecategory['idcategory'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="addcategory.php" class="btn btn-success">Ajouter une catégorie</a>