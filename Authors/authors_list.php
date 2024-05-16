<?php
session_start();
include "header.php";
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$statement = $pdo->query("SELECT * FROM author");
$authors = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<h1 class="text-center">Liste des auteurs</h1>

<?php
if (isset($_SESSION['updateauthor'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo   $_SESSION['updateauthor']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['updateauthor']);
}

if (isset($_SESSION['deleteauthor'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['deleteauthor']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['deleteauthor']);
}

if (isset($_SESSION['addauthor'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['addauthor']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['addauthor']);
}
?>

<table class="table">
    <thead>
        <th> Auteur</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach ($authors as $author) { ?>
            <tr>
                <td>
                    <a href="detailauthor.php?id=<?= $author['idauthor'] ?>">
                        <?= $author['firstname'] ?>

                        <?= $author['lastname'] ?>
                    </a>
                </td>
                <td>
                    <a href="modifyauthor.php?id=<?= $author['idauthor'] ?>" class="btn btn-primary btn-sm">Modifier</a>
                    <a href="deleteauthor.php?id=<?= $author['idauthor'] ?>" class="btn btn-danger btn-sm">supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="addauthor.php" class="btn btn-success">Ajouter un auteur </a>