<?php

  require "modele/inscription.modele.php";


if(isset($_POST['forminscription'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $tel = htmlspecialchars($_POST['tel']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $cp = htmlspecialchars($_POST['cp']);     
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['tel']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['adresse']) AND !empty($_POST['cp'])) {
       $nomlength = strlen($nom);
       if($nomlength <= 255) {
          if($email == $email2) {
             if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $reqemail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
                $reqemail->execute(array($email));
                $emailexist = $reqemail->rowCount();
                if($emailexist == 0) {
                   if($mdp == $mdp2) {
                      $insertmbr = $bdd->prepare("INSERT INTO users(nom, prenom, tel, email, mdp, adresse, cp) VALUES(?, ?, ?, ?, ?, ?, ?)");
                      $insertmbr->execute(array($nom, $prenom, $tel, $email, $mdp, $adresse, $cp));
                      $erreur = "Votre compte a bien été créé !</a>";
                   } else {
                      $erreur = "Vos mots de passes ne correspondent pas !";
                   }
                } else {
                   $erreur = "Adresse email déjà utilisée !";
                }
             } else {
                $erreur = "Votre adresse email n'est pas valide !";
             }
          } else {
             $erreur = "Vos adresses email ne correspondent pas !";
          }
       } else {
          $erreur = "Votre username ne doit pas dépasser 255 caractères !";
       }
    } else {
       $erreur = "Tous les champs doivent être complétés !";
    }
 }
    require "vue/inscription.php";
?>