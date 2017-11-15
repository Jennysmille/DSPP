<!DOCTYPE html>
<html>
<head>
      <?php require_once("header_meta.php"); ?>
    <title>Liste des projets</title>
</head>
    <body>
      <?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-sm-12">
					<h1>Listes des projets</h1><br/>

					<a class="btn btn-primary pull-right" href="http://localhost/igloo/add_projects.php">Ajouter un projet</a><br/>
					<table class="table">
				<thead>
					<tr>
					<th scope="col">Nom project</th>
					<th scope="col">Voir</th>
					<th scope="col">Modifier</th>
					<th scope="col">Supprimer</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require_once("./config/connexionBdd.php");
						$requete = $bdd->query('SELECT * FROM projects');
						while($project = $requete->fetch())
						{

						echo '<tr><td>', $project['project_name'],'</td><td><a href="detail_projects.php?id='.$project['id'].'">Voir</td><td><a href="edit_projects.php?id='.$project['id'].'">Modifier</td><td><a href="delete_projects.php?id='.$project['id'].'">Supprimer</td><tr>';

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
