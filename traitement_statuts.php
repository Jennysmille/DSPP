<?php

require_once("./config/connexionBdd.php");

//récupere les données du formulaire
$nom = $_POST['nom'];


// inserer dans la bdd
$req = $bdd->prepare('INSERT INTO statuts(nom) VALUES(:nom)');

$req->execute(array(
'nom' => $nom
));


$requete = $bdd->prepare('SELECT * FROM statuts');
$requete->execute();
// echo "<p>Le statut à bien était envoyé</p>"

?>
<!-- <a href="listing_statuts.php">retour à la liste des statuts</a> -->

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>traitement_statuts</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le statut a bien était envoyé</p>
					<!-- <p class="para">Le plugin a bien été envoyé</p> -->

					<a href="listing_statuts.php">Retour à la liste des statuts</a>
				</div>
			</div>
		</div>
	</body>
</html>
