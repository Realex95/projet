<!DOCTYPE html>
<html lang="en">
<?php include 'action/users/authentification.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/head.php'; ?>
<body>
    <?php 
    if(isset($_SESSION['auth'])){
    echo "<p>Bienvenue " . $_SESSION['username'] . " !</p>";
    }
    ?>
</body>
</html>