<?php

require "modele/login.modele.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $mdp = sha1($_POST['mdp']);
    if ($email != "" && $mdp != "") {
        $requete = getUtilisateur($email, $mdp);
        if ($requete) {
            $_SESSION['id_u'] = $requete['id_u'];
            $_SESSION['nom'] = $requete['nom'];
            $_SESSION['prenom'] = $requete['prenom'];
            $_SESSION['email'] = $requete['email'];
            $_SESSION['lvl'] = $requete['lvl'];
            if ($requete['lvl'] == 0) {
                Alerts::setFlash("<strong>T'est banni fils de pute.</strong>", "danger");
            } elseif ($requete['lvl'] == 1) { // Eleve
                header('Location: accueil ');
            } elseif ($requete['lvl'] == 2) { // Moniteur
                header('Location: accueil');
            } elseif ($requete['lvl'] == 3) { // Admin
                header('Location: accueil');
            }
        } else {
        	Alerts::setFlash("<strong>Identifiants incorrecte</strong>", "danger");
        }
    } else {
    	Alerts::setFlash("<strong>Veillez compléter tous les champs</strong>", "warning");
    }
}

require "vue/login.php";

?>