<?php

function insert($nom, $prenom, $tel, $email, $mdp, $adresse, $cp, $lvl) {
	global $bdd;
	$insertion = $bdd->prepare(" INSERT INTO users (nom, prenom, tel, email, mdp, lvl, adresse, cp) VALUES (:nom, :prenom, :tel, :email, :mdp, :lvl, :adresse, :cp) ");
	$insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
	$insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$insertion->bindValue(':tel', $tel, PDO::PARAM_STR);
	$insertion->bindValue(':email', $email, PDO::PARAM_STR);
	$insertion->bindValue(':mdp', $mdp, PDO::PARAM_STR);
	$insertion->bindValue(':adresse', $adresse, PDO::PARAM_STR);
	$insertion->bindValue(':cp', $cp, PDO::PARAM_STR);
	$insertion->bindValue(':lvl', $lvl, PDO::PARAM_INT);
	return $insertion->execute();
}

?>