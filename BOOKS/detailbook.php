<?php
include "header.php";
$id=$_GET['id'];

$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$query = "SELECT * FROM book as b 
Join author as a ON b.idauthor=a.idauthor
Join book_category as bc on b.idbook=bc.book_idbook
Join category as c on c.idcategory =bc.category_idcategory
WHERE idbook =:id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, \PDO::PARAM_INT);
$statement->execute();
$book = $statement->fetch(PDO::FETCH_ASSOC);
?>
<hr>
<h2 class="text-center"> Informations </h2>
<hr>
  
  
  <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src=<?=$book['image']?> class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
    <h5 class="card-title"><?=$book['title']?></h5>
    <p class="card-text"><?=$book['Category_name']?></p>
    <p class="card-text"><?=$book['summary']?></p>
  </div>
  </div>
  </div>
</div>