<?php

function deleteMessage($id_exp) {
    global $bdd;
    $delete = $bdd->prepare("DELETE FROM messages WHERE id_exp = :id_exp");
    $delete->bindValue('id_exp', $id_exp, PDO::PARAM_INT);
    return $delete->execute();
}

function deleteAllMessages() {
    global $bdd;
    $delete_all = $bdd->prepare("DELETE FROM messages");
    return $delete_all->execute();
}

if (isset($_GET['id_exp'])) { 
   $id_exp = $_GET['id_exp'];
   $delete = deleteMessage($id_exp);
   header('Location: reception');
}

if (isset($_POST['delete'])) {
   $delete_all = deleteAllMessages();
   header('Location: reception');
}

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
   <a href="envoi">Nouveau message</a>

    <div class="d-flex justify-content-center">
         <form method="post" action="">
            <button type="submit" name="delete" class="btn btn-danger fs-lg mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer tous les messages ?'));">
               Supprimer tous les messages
            </button>
         </form>
      </div>

<a class="btn btn-danger font-weight-bolder" href="messages&id_exp=<?= $message['id_exp']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer ce message ?'));">Supprimer</a>
   <br /><br /><br />
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