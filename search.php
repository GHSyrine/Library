<?php
include "header.php";
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$statement =$pdo ->query("SELECT * FROM book");

if(isset($_GET['title']) AND !empty($_GET['title'])){
     $varlike = ($_GET['title']);
     $statement = $pdo ->query("SELECT * FROM book  WHERE title LIKE '$varlike'");
     $book = $statement ->fetch(PDO::FETCH_ASSOC);

}
?>
<form method="GET" action=""> 
     <input type="search" name="title" placeholder="rechercher un livre">
     <input type="SUBMIT" name="valider" value="Rechercher"> 
</form>

<a href="detailbook.php?id=<?= $book['idbook']?>"><?= $book['title'] ?> </a>
