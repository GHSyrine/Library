<?php
include "header.php";
$id = $_GET['id'];
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');
$query = "SELECT * FROM category as c
JOIN book_category as bc on c.idcategory =bc.category_idcategory
JOIN book as b on bc.book_idbook = b.idbook
WHERE idcategory =:id";
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, \PDO::PARAM_INT);
$statement->execute();
$category = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<p>les livres disponibles pour cette catégorie sont :</p> 

<table class="table table-bordered">
    <thead>
        <th>livres disponibles</th>
    </thead>
    <tbody>
        <tr>
            <td>
                <?php
                foreach ($category as $onecategory) { ?>

                    <?= $onecategory['title'] ?></p>
                <?php
                }
                ?>

            </td>
        </tr>
    </tbody>
</table>