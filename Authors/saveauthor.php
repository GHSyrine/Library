<?php
session_start();
$firstname = $_POST['firstname_author'];
$lastname = $_POST['lastname_author'];
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$query = 'INSERT into author (firstname, lastname) Values (:firstname_author, :lastname_author)';
$statement = $pdo->prepare($query);
$statement->bindValue(':firstname_author', $firstname, \PDO::PARAM_STR);
$statement->bindValue(':lastname_author', $lastname, \PDO::PARAM_STR);
$statement->execute();
if ($statement) {
    $_SESSION['addauthor'] = "Auteur ajouté";
    header("location:/authors_list.php");
}
