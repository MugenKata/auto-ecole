<?php 

require "modele/agenda-admin.modele.php";

if (isset($_POST['submit'])) {
	$titre = $_POST['titre'];
	$description = $_POST['description'];
	$date_l = $_POST['date_l'];
	$date_fin = $_POST['date_fin'];
	$id_e = $_POST['id_e'];
	$id_m = $_POST['id_m'];
	if ($titre != "" && $description != "" && $date_l != "" && $date_fin != "" && $id_e != "" && $id_m != "") {
		$insertion = insertTitre($titre, $description, $date_l, $date_fin, $id_e, $id_m);
	}
}

require "vue/agenda-admin.php"; 

?>