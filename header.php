<?php
$pdo = new \PDO('mysql:host=localhost;dbname=library', 'root', '');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="Style.css">
    
    <title>Menu</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="books_list.php">
          <i class="fa-solid fa-book"></i>
          Livres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="authors_list.php">
          <i class="fa-solid fa-pen-to-square"></i>
            Auteurs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories_list.php">
          <i class="fa-solid fa-list"></i> 
          Catégories</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="subscription.php">
          <i class="fa-solid fa-user-plus"></i> 
          Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="authentification.php">
          <i class="fa-solid fa-right-to-bracket"></i>
            connexion</a>
        </li>
        <?php
        if (isset($_SESSION['login'])) {?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
              Déconnexion</a>
          </li>
        <?php
        }?>
        <li class="nav-item">
        <a href="search.php" class="form-control me-2">Rechercher par titre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="panier.php">panier</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>