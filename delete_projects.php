<?php

require_once("./config/connexionBdd.php");

$idProject = $_GET['id'];

//on prépare une requête qui va nous permettre de stocker
//le nom du projet
$req1 = $bdd->prepare('SELECT project_name FROM projects WHERE id = :id');

$req1->bindParam(':id', $idProject);
$req1->execute();



//suppression de l'ensemble des plugins
//on supprime les plugins liés au projet avant de supprimer
//le projet afin de respecter les contraintes

$req2 = $bdd->prepare('DELETE FROM projects_plugins WHERE id_projects = '.$idProject.'');
$req2->execute();

//on supprime le projet sélectionné

$req3 = $bdd->prepare('DELETE FROM projects WHERE id = :id');

$req3->bindParam(':id', $idProject);
$req3->execute();

// echo "<p>Le project a bien été supprimé</p>"

?>

<!-- <a href="listing_projects.php">retour à la liste des projects</a> -->

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>Delete_projects</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le project a bien était supprimé</p>
					<!-- <p class="para">Le project a bien été modifié</p> -->

					<a href="listing_projects.php">Retour à la liste des projets</a><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
