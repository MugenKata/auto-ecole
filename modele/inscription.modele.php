<?php

function inscription($nom, $prenom, $tel, $email, $mdp, $adresse, $cp) {
	global $bdd;
	$insertion = $bdd->prepare("
        INSERT INTO users (nom, prenom, tel, email, mdp, lvl, adresse, cp) 
        VALUES (:nom, :prenom, :tel, :email, :mdp, '1', :adresse, :cp)");
    $insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
    $insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $insertion->bindValue(':tel', $tel, PDO::PARAM_STR);
    $insertion->bindValue(':email', $email, PDO::PARAM_STR);
    $insertion->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $insertion->bindValue(':adresse', $adresse, PDO::PARAM_STR);
    $insertion->bindValue(':cp', $cp, PDO::PARAM_STR);
	$insertion->execute();
	return $insertion->fetch();

}

?>