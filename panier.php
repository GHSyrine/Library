<?php
session_start();
if(isset($_SESSION['cart'])) {
  echo "<h2>Contenu du Panier</h2>";
  foreach($_SESSION['cart'] as $book) {
    ?>

      <table class="table">
      <thead>
        <tr>
          <th scope="col">livre ajouté</th>
          </tr>
          </thead>
          <tbody>
           
            <td><?=$book['title']?></td>
          </tbody>
      

  <?php
  }
} else {
  echo "<h2>Le Panier est Vide</h2>";
}
?>