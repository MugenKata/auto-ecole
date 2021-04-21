<?php auth(3); ?>

<!-- MONITEUR -->
<div class="d-flex justify-content-center mt-4">
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  		Ajouter un moniteur
	</button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Ajouter un moniteur</h5>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body">
        		<form method="post" action="">
        			<div class="mb-3">
                    	<label for="nom" class="form-label">NOM</label>
                    	<input type="text" name="nom" id="nom" class="form-control">
	                </div>
	                <div class="mb-3">
                    	<label for="prenom" class="form-label">Prénom</label>
                    	<input type="text" name="prenom" id="prenom" class="form-control">
	                </div>
	                <div class="mb-3">
                    	<label for="telephone" class="form-label">Téléphone</label>
                    	<input type="text" name="tel" id="telephone" maxlength="10" class="form-control">
	                </div>
	                <div class="mb-3">
                    	<label for="email" class="form-label">Adresse email</label>
                    	<input type="email" name="email" id="email" class="form-control">
	                </div>
	                <div class="mb-3">
                    	<label for="adresse" class="form-label">Adresse</label>
                    	<textarea name="adresse" id="adresse" class="form-control"></textarea>
	                </div>
	                <div class="mb-3">
                    	<label for="cp" class="form-label">Code postal</label>
                    	<input type="text" name="cp" id="cp" maxlength="5" class="form-control">
	                </div>
	                <div class="mb-3">
	                	<label for="type" class="form-label">
	                		Type
	                	</label>
	                	<select name="lvl" id="type" class="form-select">
  							<option value="2">Moniteur</option>
  							<option value="1">Eleve</option>
						</select>
	                </div>
	                <div class="mt-4">
		                <div class="d-flex justify-content-center">
		                    <button type="submit" name="add-monitor" class="btn btn-primary">Ajouter</button>
		                </div>
		            </div>
        		</form>
      		</div>
    	</div>
  	</div>
</div>

<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<h3 class="text-center">Liste des moniteurs</h3>
		<table class="table text-center">
			<thead>
			    <tr>
			      	<th scope="col">NOM</th>
			      	<th scope="col">Prénom</th>
			      	<th scope="col">Actions</th>
			    </tr>
			</thead>
			<tbody>
				<?php
				$view = $bdd->query("SELECT * FROM users WHERE lvl = 2 ORDER BY id_u DESC");
				if ($view->rowCount() == 0) { ?>
					<tr>
						<td colspan="3">Aucun moniteur trouvé dans la basse de données</td>
					</tr>
				<?php } elseif (isset($_GET['edit'])) { 
				while ($donnees = $view->fetch()) { ?>
					<tr>
						<form method="post" action="">
							<td>
								<input type="text" name="nom" class="form-control" value="<?= $donnees['nom'] ?>">
							</td>
							<td>
								<input type="text" name="prenom" class="form-control" value="<?= $donnees['prenom'] ?>">
							</td>
							<td>
								<button type='submit' name='modifier' class='btn btn-primary me-2' style='background-color: green; border-color: green;'>
									OK
								</button>
								<button type='submit' name='retour' class='btn btn-primary' style='background-color: red; border-color: red;'>
									X
								</button>
							</td>
						</form>
					</tr>
					<?php
					if (isset($_POST['modifier'])) {
						$id_u = $_GET['edit'];
						$nom = $_POST['nom'];
						$prenom = $_POST['prenom'];
						$update = $bdd->prepare("UPDATE users SET nom = :nom, prenom = :prenom WHERE id_u = '".$id_u."' ");
						$update->bindValue(':nom', $nom, PDO::PARAM_STR);
						$update->bindValue(':prenom', $prenom, PDO::PARAM_STR);
						$update->execute();
						header('Location: admin');
					}
					?>
				<?php } ?>
				<?php } else {
					while ($donnees = $view->fetch()) {
				?>
				<tr>
					<td><?= $donnees['nom'] ?></td>
					<td><?= $donnees['prenom'] ?></td>
					<td class="table-action">
						<a class="btn btn-primary active fw-bold me-3" href="admin&edit=<?= $donnees['id_u'] ?>">
							Modifier
						</a>
						<a class="btn btn-danger active fw-bold" href="admin&id_u=<?= $donnees['id_u'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer ce moniteur ?'));">
							Supprimer
						</a>
					</td>
				</tr>
				<?php } ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- ELEVES -->
<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<h3 class="text-center">Liste des élèves</h3>
		<table class="table text-center">
			<thead>
			    <tr>
			      	<th scope="col">NOM</th>
			      	<th scope="col">Prénom</th>
			      	<th scope="col">Actions</th>
			    </tr>
			</thead>
			<tbody>
				<?php
				$view = $bdd->query("SELECT * FROM users WHERE lvl = 1 ORDER BY id_u DESC");
				if ($view->rowCount() == 0) { ?>
					<tr>
						<td colspan="3">Aucun élève trouvé dans la basse de données</td>
					</tr>
				<?php } elseif (isset($_GET['edit'])) { 
				while ($donnees = $view->fetch()) { ?>
					<tr>
						<form method="post" action="">
							<td>
								<input type="text" name="nom" class="form-control" value="<?= $donnees['nom'] ?>">
							</td>
							<td>
								<input type="text" name="prenom" class="form-control" value="<?= $donnees['prenom'] ?>">
							</td>
							<td>
								<button type='submit' name='modifier' class='btn btn-primary me-2' style='background-color: green; border-color: green;'>
									OK
								</button>
								<button type='submit' name='retour' class='btn btn-primary' style='background-color: red; border-color: red;'>
									X
								</button>
							</td>
						</form>
					</tr>
					<?php
					if (isset($_POST['modifier'])) {
						$id_u = $_GET['edit'];
						$nom = $_POST['nom'];
						$prenom = $_POST['prenom'];
						$update = $bdd->prepare("UPDATE users SET nom = :nom, prenom = :prenom WHERE id_u = '".$id_u."' ");
						$update->bindValue(':nom', $nom, PDO::PARAM_STR);
						$update->bindValue(':prenom', $prenom, PDO::PARAM_STR);
						$update->execute();
						header('Location: admin');
					}
					?>
				<?php } ?>
				<?php } else {
					while ($donnees = $view->fetch()) {
				?>
				<tr>
					<td><?= $donnees['nom'] ?></td>
					<td><?= $donnees['prenom'] ?></td>
					<td class="table-action">
						<a class="btn btn-primary active fw-bold me-3" href="admin&edit=<?= $donnees['id_u'] ?>">
							Modifier
						</a>
						<a class="btn btn-danger active fw-bold" href="admin&id_u=<?= $donnees['id_u'] ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cette élève ?'));">
							Supprimer
						</a>
					</td>
				</tr>
				<?php } ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>