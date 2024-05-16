
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subscription</title>
</head>
<body>
<form action="saveuser.php" method="POST">
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Utilisateur</label>
                <input type="text" class="form-control" name="user_name" required>
        </div>
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Mot de passe</label>
                <input type="text" class="form-control" name="password" required>
                </div>
        <input type="submit" value="Inscription">
</body>
</html>