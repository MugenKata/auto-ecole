	<?php

if(isset($_SESSION['id_u']) AND !empty($_SESSION['id_u'])) {
   if(isset($_POST['envoi_message'])) {
      if(isset($_POST['destinataire'],$_POST['message'],$_POST['objet']) AND !empty($_POST['destinataire']) AND !empty($_POST['message']) AND !empty($_POST['objet'])) {
         $destinataire = htmlspecialchars($_POST['destinataire']);
         $message = htmlspecialchars($_POST['message']);
         $objet = htmlspecialchars($_POST['objet']);
         $id_destinataire = $bdd->prepare('SELECT id_u FROM users WHERE nom = ?');
         $id_destinataire->execute(array($destinataire));
         $dest_exist = $id_destinataire->rowCount();
         if($dest_exist == 1) {
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire['id_u'];
            $ins = $bdd->prepare('INSERT INTO messages(id_exp,id_dest,message,objet) VALUES (?,?,?,?)');
            $ins->execute(array($_SESSION['id_u'],$id_destinataire,$message,$objet));
            $error = "Votre message a bien été envoyé !";
         } else {
            $error = "Cet utilisateur n'existe pas...";
         }
      } else {
         $error = "Veuillez compléter tous les champs";
      }
   }
   $destinataires = $bdd->query('SELECT nom FROM users ORDER BY nom');
   if(isset($_GET['r']) AND !empty($_GET['r'])) {
      $r = htmlspecialchars($_GET['r']);
   }
   if(isset($_GET['o']) AND !empty($_GET['o'])) {
      $o = urldecode($_GET['o']);
      $o = htmlspecialchars($_GET['o']);
      if(substr($o,0,3) != 'RE:') {
         $o = "RE:".$o;
      }
   }
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>Envoi de message</title>
      <meta charset="utf-8" />
   </head>
   <body>
      <form method="POST">
          <select name="destinataire">
            <?php while($d = $destinataires->fetch()) { ?>
            <option><?= $d['nom'] ?></option>
            <?php } ?>
         </select> 
         <label>Objet:</label>
         <input type="text" name="objet" <?php if(isset($o)) { echo 'value="'.$o.'"'; } ?> />
         <br /><br />
         <textarea placeholder="Votre message" name="message"></textarea>
         <br /><br />
         <input type="submit" value="Envoyer" name="envoi_message" />
         <br /><br />
         <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
      </form>
      <br />
      <a href="reception">Boîte de réception</a>
   </body>
   </html>
<?php
}
?>