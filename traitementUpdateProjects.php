<?php

require_once("./config/connexionBdd.php");

//récupere les données du formulaire
$project_name = $_POST['project_name'];
$id_cms = $_POST['cms'];
$version = $_POST['version'];
$hebergeur = $_POST['hebergeur'];
$id_statut = $_POST['statut'];
$comments = $_POST['comments'];

$idProject = $_POST['project_id'];


//suppression de l'ensemble des plugins
//l'ajout des plugins sélectionnés sera fait en fin de traitement
$req2 = $bdd->prepare('DELETE FROM projects_plugins WHERE id_projects = '.$idProject.'');
$req2->execute();

$req = $bdd->prepare('UPDATE `igloo_webprojects`. `projects` SET `project_name` = :project_name, `id_cms` = :cms, `version` = :version, `hebergeur` = :hebergeur, `id_statut` = :statut, `comments` = :comments WHERE `projects` . `id` = :id');

$req->execute(array(
'project_name' => $project_name,
'cms' => $id_cms,
'version' => $version,
'hebergeur' => $hebergeur,
'statut' => $id_statut,
'comments' => $comments,
'id' => $idProject
));

//insertion des plugins sélectionnés lors de la mise à jour
$id_project = $_POST['project_id'];
//print_r($id_new_project);
// echo "<p>Le plugin à bien été modifié</p>";

foreach($_POST['plugins'] as $id_plugin)
{ //echo $id_plugin;
	$req2 = $bdd->prepare('INSERT INTO projects_plugins (id_projects, id_plugins) VALUES(?, ?)');
	$resq = $req2->execute(array($id_project, $id_plugin));
}

// echo "<p>Le project à bien été modifié</p>"

?>

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>traitementUpdateProjects</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le plugin a bien été modifié</p>
					<p class="para">Le project a bien été modifié</p>

					<a href="listing_projects.php">Retour à la liste des projets</a><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
<!-- <a href="listing_projects.php">retout à la liste des projects</a> -->
