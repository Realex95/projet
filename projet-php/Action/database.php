<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8;', 'root', '');
}catch(Exception $e){
    die('Il a y une erreur :' . $e->getMessage());
}
