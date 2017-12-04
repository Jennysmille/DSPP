<?php

require_once("./config/connexionBdd.php");

$nom = $_POST['nom'];

$idStatut = $_POST['id_statut'];


$req = $bdd->prepare('UPDATE `statuts` SET `nom` = :nom WHERE `statuts`.`id` = :id');

$req->execute(array(
'nom' => $nom,
'id' => $idStatut
));

// echo "<p>Le statut à bien été modifié</p>"

?>
<!-- <a href="listing_statuts.php">retour à la liste des statuts</a> -->

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>traitementUpdateStatuts</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le statuts a bien été modifié</p>
					<!-- <p class="para">Le project a bien été modifié</p> -->

					<a href="listing_statuts.php">Retour à la liste des statuts</a><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
