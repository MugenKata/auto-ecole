	<?php
if(isset($_SESSION['id_u']) AND !empty($_SESSION['id_u'])) {
   if(isset($_GET['id_u']) AND !empty($_GET['id_u'])) {
      $id_message = intval($_GET['id']);
      $msg = $bdd->prepare('DELETE FROM messages WHERE id = ? AND id_dest = ?');
      $msg->execute(array($_GET['id'],$_SESSION['id']));
      header('Location:reception');
   }
} 
?>