<?php

function connectBDD($hostname, $database, $username, $password) {
    try {
        $bdd = new PDO("mysql:host=".$hostname.";dbname=".$database.";charset=utf8","".$username."","".$password."");
        return $bdd;
    } catch (PDOException $e) {
        die("Erreur de connexion au serveur MySQL : " . $e->getMessage());
    }
}

function auth($lvl) {
    if (isset($_SESSION['lvl']) && $_SESSION['lvl'] >= $lvl)
        return true;
    else
        header("Location: nav.php");
}

function generateMdp() {
    $chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    
    $motdepasse = "";
   
    $motdepasse .= $chaine[rand(0,25)];
    $motdepasse .= $chaine[rand(0,25)];
    
    $motdepasse .= $chaine[rand(26,51)];
    $motdepasse .= $chaine[rand(26,51)];
    
    $motdepasse .= $chaine[rand(52,60)];
    $motdepasse .= $chaine[rand(52,60)];
    
    $motdepasse = str_shuffle($motdepasse);

    return $motdepasse;
}

?>