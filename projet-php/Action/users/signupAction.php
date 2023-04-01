<?php
require('action/database.php');

if(isset($_POST['validate'])){

    if(!empty($_POST['username']) AND !empty($_POST['password'])){
        
        $user_username = htmlspecialchars($_POST['username']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT username FROM users WHERE username = ?');
        $checkIfUserAlreadyExists->execute(array($user_username));

        if($checkIfUserAlreadyExists->rowCount() == 0){
            
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(username, password) VALUES (?, ?)');
            $insertUserOnWebsite->execute(array($user_username, $user_password));

            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, username FROM users WHERE username = ?');
            $getInfosOfThisUserReq->execute(array($user_username));

            $usersInfos = $getInfosOfThisUserReq->fetch();

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['username'] = $usersInfos['username'];

            header('Location: index.php');

        }else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}
