<!DOCTYPE html>
<html>
<head>
      <?php require_once("header_meta.php"); ?>
    <title>Liste des statuts</title>
</head>
  <body>
      <?php require_once("head.php"); ?>
		<div class="row">
			<div class="container">
				<div class="col-sm-12">
					<h1>Listes des statuts</h1>

						<a class="btn btn-primary pull-right" href="http://localhost/igloo/add_statuts.php">Ajouter un statut</a><br/><br/><br/>


					<table class="table">
						<thead>
							<tr>
							  <th cope="col">Statuts</th>
							  <th cope="col">Modifier</th>
							  <!--<th cope="col">Supprimer</td>-->
							 </tr>
						</thead>
						<tbody>
						  <?php
								require_once("./config/connexionBdd.php");
								$requete = $bdd->query('SELECT * FROM statuts');
								while($donnees = $requete->fetch())
								{

								echo '<tr><td>', $donnees['nom'],'</td><td><a href="edit_statuts.php?id='.$donnees['id'].'">Modifier</a></td>'."\r\n";

								//echo '<td><a href="delete_statuts.php?id='.$donnees['id'].'">Supprimer</a></td>'."\r\n";

								echo '</tr>'."\r\n";
								}
								$requete->closeCursor();

								?>
						</tbody>
					</table><br><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
