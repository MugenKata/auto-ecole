<?php

function insertTitre($titre, $description, $date_l, $date_fin, $id_e, $id_m) {
	global $bdd;
	$insertion = $bdd->prepare("
		INSERT INTO lessons (titre, description, date_l, date_fin, id_e, id_m) 
		VALUES (:titre, :description, :date_l, :date_fin, :id_e, :id_m) 
	");
	$insertion->bindValue(':titre', $titre, PDO::PARAM_STR);
	$insertion->bindValue(':description', $description, PDO::PARAM_STR);
	$insertion->bindValue(':date_l', $date_l, PDO::PARAM_STR);
	$insertion->bindValue(':date_fin', $date_fin, PDO::PARAM_STR);
	$insertion->bindValue(':id_e', $id_e, PDO::PARAM_INT);
	$insertion->bindValue(':id_m', $id_m, PDO::PARAM_INT);
	return $insertion->execute();
}

?>