<?php
session_start();
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$pseudo = ($_POST['user_name']);
$keyp = ($_POST['password']);

$pseudo = htmlentities($_POST['user_name']);
$keyp = htmlentities($_POST['password']);

$qr = 'SELECT * FROM user WHERE user_name = :pseudo AND pass_word = :keyp';
$recup = $pdo->prepare($qr);
$recup->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
$recup->bindValue(':keyp', $keyp, \PDO::PARAM_STR);
$recup->execute();
$res = $recup->fetch(PDO::FETCH_ASSOC);

if ($res) {
    $_SESSION['login'] = "Vous êtes connecté";
    header("location:/index.php");
} else {
    echo "le pseudo ou le mot de passe est incorrect";
}
