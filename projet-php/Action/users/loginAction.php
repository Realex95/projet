<?php
 session_start();
require('action/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['username']) AND !empty($_POST['password'])){
        
        $user_username = htmlspecialchars($_POST['username']);
        $user_password = htmlspecialchars($_POST['password']);

        $checkIfUserExists = $bdd->prepare('Select * from users where username = ?');
        $checkIfUserExists->execute(array($user_username));

        if($checkIfUserExists->rowCount() > 0)
        {
            $usersInfos = $checkIfUserExists->fetch();
            if(password_verify($user_password, $usersInfos['password']))
            {
                
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['username'] = $usersInfos['username'];

                header('Location: index.php');
            }
            else {
                $errorMsg = "votre mot de passe incorrecte";
            }
        }
        else {
            $errorMsg = "Votre pseudo est introuvable";

        }
    }
    else
    {
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}
