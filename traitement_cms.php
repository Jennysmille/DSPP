<?php

require_once("./config/connexionBdd.php");


//récupere les données du formulaire
$nom = $_POST['nom'];
// inserer dans la bdd
$req = $bdd->prepare('INSERT INTO cms_languages(nom) VALUES(:nom)');
$req->execute(array(
'nom' => $nom
));


// echo "<p>Le cms/Language à bien était envoyé</p>"

?>
<!-- <a href="listing_cms_language.php">retour à la liste des Cms/Languages</a> -->

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>traitement_cms</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le cms/Language a bien était envoyé</p>
					<!-- <p class="para">Le project a bien été modifié</p> -->

					<a href="listing_cms_language.php">Retour à la liste des Cms/Languages</a><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
