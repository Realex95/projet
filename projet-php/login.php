<?php require('action/users/loginAction.php'); ?>
<?php require('includes/head.php'); ?>
<?php include 'includes/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<body>
    <br><br>
    <form method="POST" action="login.php">
    <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre nom d'utilisateur">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
    </div>
    <button type="submit" name="validate" class="btn btn-primary">Se connecter</button>
    </form>

</body>
</html>