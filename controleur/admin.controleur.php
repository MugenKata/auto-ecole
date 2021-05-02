<?php 

require "modele/admin.modele.php";

if (isset($_POST['add-monitor'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];
	$mdp = sha1(generateMdp());
	$adresse = $_POST['adresse'];
	$cp = $_POST['cp'];
	$lvl = $_POST['lvl'];
	if ($nom != "" && $prenom != "" && $tel != "" && $email != "" && $adresse != "" && $cp != "" && $lvl != "") {
		if (preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$#", $email)) {
			if (preg_match("#^[0-9]{2}([. -]?[0-9]{2}){4}$#", $tel)) {
				if (preg_match("#^[0-9]{5}|2[A-B][0-9]{3}$#", $cp)) {
					$insertion = insert($nom, $prenom, $tel, $email, $mdp, $adresse, $cp, $lvl);
					Alerts::setFlash("Insertion réussi !");
				} else {
					Alerts::setFlash("<strong>Format du code postal invalide</strong>", "warning");
				}
			} else {
				Alerts::setFlash("<strong>Format du téléphone invalide</strong>", "warning");
			}
		} else {
			Alerts::setFlash("<strong>Format de l'adresse email invalide</strong>", "warning");
		}
	} else {
		Alerts::setFlash("<strong>Veillez compléter tous les champs</strong>", "warning");
	}
}

// SUPPRESSION
if (isset($_GET['id_u'])) {
	$id_u  = $_GET['id_u'];
	$delete = $bdd->prepare("DELETE FROM users WHERE id_u = '$id_u'");
	$delete->execute(array($id_u));
	header('Location: admin');
}

require "vue/admin.php"; 

?>