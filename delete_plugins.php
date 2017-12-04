<?php

require_once("./config/connexionBdd.php");

$idPlugins = $_GET['id'];
$requete = $bdd->prepare('DELETE FROM plugins WHERE id = :id');

$requete->bindParam(':id', $idPlugins);
$requete->execute();

// echo "<p>Le plugin à bien était supprimer</p>"

?>

<!-- <a href="listing_plugins.php">retour à la liste des cms</a> -->

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>Delete_plugins</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le plugin a bien était supprimé</p>
					<!-- <p class="para">Le project a bien été modifié</p> -->

					<a href="listing_plugins.php">Retour à la liste des plugins</a><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
