<?php

require_once("./config/connexionBdd.php");

$idStatut = $_GET['id'];
$requete = $bdd->prepare('DELETE FROM statuts WHERE id = :id');

$requete->bindParam(':id', $idStatut);
$requete->execute();

// echo "<p>Le statut à bien était supprimer</p>"

?>

<!-- <a href="listing_statuts.php">retour à la liste des cms</a> -->

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>Delete_statuts</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le statuts a bien était supprimé</p>
					<!-- <p class="para">Le project a bien été modifié</p> -->

					<a href="listing_statuts.php">Retour à la liste des statuts</a><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
