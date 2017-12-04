<?php

require_once("./config/connexionBdd.php");

$idCms = $_GET['id'];
$requete = $bdd->prepare('DELETE FROM cms_languages WHERE id = :id');

$requete->bindParam(':id', $idCms);
$requete->execute();

// echo "<p>Le cms à bien était supprimer</p>"

?>

<!-- <a href="listing_cms_language.php">retour à la liste des cms</a> -->

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>Delete_cms</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le cms a bien était supprimé</p>
					<!-- <p class="para">Le project a bien été modifié</p> -->

					<a href="listing_cms_language.php">Retour à la liste des cms</a><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
