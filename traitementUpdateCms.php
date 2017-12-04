<?php

require_once("./config/connexionBdd.php");

//récupere les données du formulaire
$nom = $_POST['nom'];


$idCms = $_POST['id_cms'];
//print_r($idCms);

$req = $bdd->prepare('UPDATE `cms_languages` SET `nom` = :nom WHERE `cms_languages`.`id` = :id');
// inserer dans la bdd

$req->execute(array(
'nom' => $nom,
'id' => $idCms
));


// echo "<p>Le cms à bien été modifié</p>"

?>

<!-- <a href="listing_cms_language.php">retout à la liste des Cms</a> -->

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>traitementUpdateCms</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le cms a bien été modifié</p>
					<!-- <p class="para">Le project a bien été modifié</p> -->

					<a href="listing_cms_language.php">Retour à la liste des cms</a><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
