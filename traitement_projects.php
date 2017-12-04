<?php

require_once("./config/connexionBdd.php");

//récupere les données du formulaire
$project_name = $_POST['project_name'];
$id_cms = $_POST['cms'];
$version = $_POST['version'];
$hebergeur = $_POST['hebergeur'];
$id_statut = $_POST['statut'];
$comments = $_POST['comments'];

//$requete = $bdd->prepare('INSERT INTO projects_plugins(id_projects, id_plugins) VALUES(?,?)');


// inserer dans la bdd projects
$req = $bdd->prepare('INSERT INTO projects(project_name, id_cms, version, hebergeur, id_statut, comments) VALUES(:project_name, :cms, :version, :hebergeur, :statut, :comments)');

$req->execute(array(
'project_name' => $project_name,
'cms' => $id_cms,
'version' => $version,
'hebergeur' => $hebergeur,
'statut' => $id_statut,
'comments' => $comments
));

//Projet ajouter
$id_new_project = $bdd->lastInsertId();
//print_r($id_new_project);

//Plugin ajouter
foreach($_POST['plugins'] as $id_plugin)
{ //print_r ($id_plugin);
	$req2 = $bdd->prepare('INSERT INTO projects_plugins (id_projects, id_plugins) VALUES(?, ?)');
	$resq = $req2->execute(array($id_new_project, $id_plugin));
}

?>
<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>traitement_projects</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le project a bien été créé</p>
					<p class="para">Le plugin a bien été envoyé</p>

					<a href="listing_projects.php">Retour à la liste des projets</a>
				</div>
			</div>
		</div>
	</body>
</html>
