<?php
session_start();
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');

$pseudo = ($_POST['user_name']);
$keyp = ($_POST['password']);
$query = 'INSERT INTO user
       (`user_name`, `pass_word`)
        Values (:pseudo, :keyp)';
$statement = $pdo->prepare($query);
$statement -> bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
$statement -> bindValue(':keyp', $keyp, \PDO::PARAM_STR);
$statement ->execute();



