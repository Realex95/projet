<?php require('action/users/signupAction.php'); ?>
<?php include 'includes/navbar.php'; ?>
<?php require('includes/head.php'); ?>
<!DOCTYPE html>
<html lang="en">
<body>
    <form class="container" method="POST">

        <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="Lien">
            <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
            <div>
                <a href="login.php">J'ai déjà un compte, je me connecte</a>
            </div>
        </div>
   </form>
</div>
</body>
</html>