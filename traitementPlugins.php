<?php

require_once("./config/connexionBdd.php");

//récupere les données du formulaire
$nom = $_POST['nom'];
$id_cms_language = $_POST['cms'];

// inserer dans la bdd
$req = $bdd->prepare('INSERT INTO plugins(nom, id_cms_language) VALUES(:nom, :cms)');

$req->execute(array(
'nom' => $nom,
'cms' => $id_cms_language
));



// echo "<p>Le plugin a bien était envoyé</p>"

?>
<!-- <a href="listing_plugins.php">retour à la liste des plugins</a> -->

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>traitement_plugins</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le plugin a bien était envoyé</p>
					<!-- <p class="para">Le project a bien été modifié</p> -->

					<a href="listing_plugins.php">Retour à la liste des plugins</a><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
