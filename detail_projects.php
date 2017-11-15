<!DOCTYPE html>
<html>
<head>
      <?php require_once("header_meta.php"); ?>
    <title>Détails des projets</title>
</head>
  <body>
      <?php require_once("head.php");

	  require_once("./config/connexionBdd.php");

	  $idProject = $_GET['id'];

	  $requete = $bdd->prepare('SELECT p.id,p.project_name,p.id_cms,p.version,p.hebergeur,p.id_statut,p.comments,cms_languages.nom  nom_cms, statuts.nom  nom_statut
						FROM projects p
						INNER JOIN cms_languages
						ON p.id_cms = cms_languages.id
						INNER JOIN statuts
						ON p.id_statut = statuts.id
						WHERE p.id = :id');




$requete->bindParam(':id', $idProject);
$requete->execute();
//var_dump ($requete);
$donnees = $requete->fetch(PDO::FETCH_ASSOC);


// select list of plugins of project
$req_plugins = $bdd->query('SELECT *
FROM projects_plugins
INNER JOIN plugins
WHERE id_projects = '.$idProject.' AND projects_plugins.id_plugins = plugins.id');
?>


	    <div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Détails du projet</h1><br/><br/>


						<div class="row">
							<div class="col-sm-6">
								 <p>Nom du projet :
							  <?php echo '<tr><td>', $donnees['project_name'], '</td></tr>' ?>
								  </p><br/>


								 <p>Version :
								 <?php echo '<tr><td>', $donnees['version'], '</td></tr>' ?>
								  </p><br/>


								 <p>Statut :
								 <?php echo '<tr><td>', $donnees['nom_statut'], '</td></tr>' ?>
								  </p><br/>


								 <p>CMS/Language :
								 <?php echo '<tr><td>', $donnees['nom_cms'], '</td></tr>' ?>
								  </p><br/>
								 </div>


									<div class="col-sm-6">
								 <p>Hébergé sur :
								 <?php echo '<tr><td>', $donnees['hebergeur'], '</td></tr>' ?>
								  </p><br/>


								  <p>Commentaires :
								 <?php echo '<tr><td>', $donnees['comments'], '</td></tr>' ?>
								  </p><br/>

								 <p>Modèles/plugins :<br />
									<?php
									while($plugins = $req_plugins->fetch())
									{
										echo $plugins['nom']."<br />";
									}
									?>

								  </p><br/>

					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
