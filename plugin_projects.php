<!DOCTYPE html>
<html>
<head>
      <?php require_once("header_meta.php"); ?>
    <title>Détails des projets</title>
</head>
  <body>
		<?php require_once("head.php"); ?>

	 <?php require_once("./config/connexionBdd.php");

	  $idPlugin = $_GET['id'];


$req_plug = $bdd->query('SELECT plugins.id, plugins.nom, plugins.id_cms_language, projects.project_name
FROM projects_plugins
INNER JOIN plugins
ON projects_plugins.id_plugins = plugins.id
INNER JOIN projects
ON projects_plugins.id_projects = projects.id
WHERE id_plugins = '.$idPlugin.'');
$donnees = $req_plug->fetchAll(PDO::FETCH_ASSOC);
?>

	    <div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1>Projets</h1><br/><br/>

						<div class="row">
							<div class="col-sm-6">

								 <p>Nom du plugin : <?php echo $donnees[0]['nom']; ?><br /><br />


								 <p>Nom des projets :
								 <?php
								 foreach ($donnees as $row ){
									 echo $row['project_name'].'<br/>';
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
