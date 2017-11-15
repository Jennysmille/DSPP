<!DOCTYPE html>
<html>
<head>
      <?php require_once("header_meta.php"); ?>
    <title>Liste des CMS/Languages</title>
</head>
  <body>
      <?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-sm-12">
					<h1>Liste des CMS/Languages</h1>

					<a class="btn btn-primary pull-right" href="http://localhost/igloo/add_cms_language.php">Ajouter un cms/langage</a><br/><br/><br/>


					<table class="table">
						<thead>
							<tr>
							  <th scope="col">CMS</th>
							  <th scope="col">Modifier</th>
							  <!--<th scope="col">Supprimer</th>-->
							</tr>
						</thead>
						<tbody>
						    <?php
								require_once("./config/connexionBdd.php");
								$requete = $bdd->query('SELECT * FROM cms_languages');
								while($donnees = $requete->fetch())
								{

								echo '<tr><td>', $donnees['nom'],'</td><td><a href="edit_cms_language.php?id='.$donnees['id'].'">Modifier</a></td>'."\r\n";

								//echo '<td><a href="delete_cms.php?id='.$donnees['id'].'">Supprimer</a></td>'."\r\n";

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
