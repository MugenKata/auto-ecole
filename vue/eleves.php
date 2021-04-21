<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-auto">
			<h3 class="text-center">Liste des messages</h3>
			<table class="table text-center">
				<thead>
				    <tr>
				      	<th scope="col"># Expéditeur</th>
				      	<th scope="col"># Destinataire</th>
				      	<th scope="col">Date d'envoi</th>
				      	<th scope="col">Lu</th>
				    </tr>
				</thead>
				<tbody>
					<?php
					$view = $bdd->query("SELECT * FROM messages");
					while ($donnees = $view->fetch()) {
					?>
					<tr>
						<td><?= $donnees['id_exp'] ?></td>
						<td><?= $donnees['id_dest'] ?></td>
						<td><?= $donnees['date_envoi'] ?></td>
						<td>
							<?php if ($donnees['lu'] == 0) { ?>
							<a href="messages" style="text-decoration: none;"><b>Non lu</b></a>
							<?php } else { ?>
							<a href="messages" style="text-decoration: none;">Lu</a>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>