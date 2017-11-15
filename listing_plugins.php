<!DOCTYPE html>
<html>
<head>
      <?php require_once("header_meta.php"); ?>
    <title>Liste des plugins</title>
</head>
  <body>
      <?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-sm-12">
					<h1>Listes des plugins</h1>

				<a class="btn btn-primary pull-right" href="http://localhost/igloo/add_plugins.php">Ajouter un plugin</a><br/><br/><br/>

						<table class="table">
              <thead>
						   <tr>
							  <th scope="col">Plugins</th>
							  <th scope="col">Type de CMS</th>
							  <th scope="col">Utilisé par</th>
							  <th scope="col">Modifier</th>
							  <th scope="col">Supprimer</th>

							</tr>
              </thead>
              <tbody>
								  <?php
								require_once("./config/connexionBdd.php");

								$requete = $bdd->query('SELECT plugins.id, plugins.nom, cms_languages.nom AS nom_cms, COUNT(projects_plugins.id_projects) AS nb_projets
								FROM plugins
								RIGHT OUTER JOIN projects_plugins on plugins.id = projects_plugins.id_plugins
								LEFT OUTER JOIN cms_languages on plugins.id_cms_language = cms_languages.id
								WHERE projects_plugins.id_plugins = id_plugins
								GROUP BY plugins.id, plugins.nom, cms_languages.nom');

								while($donnees = $requete->fetch())
								{
								$plugins_count = $bdd->query('SELECT COUNT(id_plugins) FROM projects_plugins WHERE id_plugins = '.$donnees['id'].'')->fetchColumn();


								echo '<tr><td>', $donnees['nom'], '</td>

								<td>', $donnees['nom_cms'], '</td>

								<td><a href="plugin_projects.php?id='.$donnees['id'].'">'.$plugins_count.' projet(s)</a></td>

								<td><a href="edit_plugins.php?id='.$donnees['id'].'">Modifier</td>

								<td><a href="delete_plugins.php?id='.$donnees['id'].'">Supprimer</td></tr>';

								}
								$requete->closeCursor();

								?>
            <tbody>
					</table><br><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
