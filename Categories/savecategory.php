
<?php
session_start();
$newcategory= $_POST['category_name'];
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$query = 'INSERT into category (`Category_name`) Values (:newcategory)';
$statement = $pdo->prepare($query);
$statement ->bindValue(':newcategory',$newcategory, \PDO::PARAM_STR);
$statement ->execute();
if($statement){
    $_SESSION['addcat'] = "Catégorie ajoutée";
    header ("location:/categories_list.php");
}
