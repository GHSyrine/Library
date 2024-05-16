<?php
session_start();
include "header.php";
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$statement = $pdo->query("SELECT * FROM book");
$books = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
if (isset($_SESSION['updatebook'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo   $_SESSION['updatebook']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['updatebook']);
}

if (isset($_SESSION['deletebook'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['deletebook']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['deletebook']);
}
if (isset($_SESSION['addbook'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['addbook']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['addbook']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Liste des Livres</h1>

        <div class=bookslist>
            <table>
                <thead>
                    <th> Titre du livre</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($books as $book) { ?>
                        <tr>
                            <td class=link>
                                <a href="detailbook.php?id=<?= $book['idbook'] ?>">
                                    <?= $book['title'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="modify.php?id=<?= $book['idbook'] ?>" class="btn btn-primary btn-sm">Modifier</a>
                                <a href="deletebook.php?id=<?= $book['idbook'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                                <a href="addtocart.php?id=<?= $book['idbook'] ?>" class="btn btn-primary btn-sm">Ajouter au panier</a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="addbook.php" class="btn btn-success">Ajouter un livre</a>
    </div>
</body>

</html>