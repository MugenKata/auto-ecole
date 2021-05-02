	<?php
if(isset($_SESSION['id_u']) AND !empty($_SESSION['id_u'])) {
$msg = $bdd->prepare('SELECT * FROM messages WHERE id_dest = ? ORDER BY id DESC');
$msg->execute(array($_SESSION['id_u']));
$msg_nbr = $msg->rowCount();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Boîte de réception</title>
   <meta charset="utf-8" />
</head>
<body>
   <a href="profil?id=<?= $_SESSION['id_u'] ?>">Profil</a>    <a href="envoi">Nouveau message</a><br /><br /><br />
   <h3>Votre boîte de réception:</h3>
   <?php
   if($msg_nbr == 0) { echo "Vous n'avez aucun message..."; }
   while($m = $msg->fetch()) {
      $p_exp = $bdd->prepare('SELECT nom FROM users WHERE id_u = ?');
      $p_exp->execute(array($m['id_exp']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['nom'];
   ?>
   <a href="lecture?id=<?= $m['id_exp'] ?>"<?php if($m['lu'] == 1) { ?>><span style="color:grey"><?php } ?><b><?= $p_exp ?></b> vous a envoyé un message<br />
      <b>Objet:</b> <?= $m['objet'] ?><?php if($m['lu'] == 1) { ?></span><?php } ?></a><br />
   -------------------------------------<br/>
   <?php } ?>
</body>
</html>
<?php } ?>