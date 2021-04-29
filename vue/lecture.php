<?php
if(isset($_SESSION['id_u']) AND !empty($_SESSION['id_u'])) {
$msg = $bdd->prepare('SELECT * FROM messages WHERE id_dest = ?');
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
   <a href="envoi">Nouveau message</a><br /><br /><br />
   <h3>Votre boîte de réception:</h3>
   <?php
   if($msg_nbr == 0) { echo "Vous n'avez aucun message..."; }
   while($m = $msg->fetch()) {
      $p_exp = $bdd->prepare('SELECT nom FROM users WHERE id_u = ?');
      $p_exp->execute(array($m['id_exp']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['nom'];
   ?>
   <b><?= $p_exp ?></b> vous a envoyé: <br />
   <?= nl2br($m['message']) ?><br />
   -------------------------------------<br/>
   <?php } ?>
</body>
</html>
<?php } ?>