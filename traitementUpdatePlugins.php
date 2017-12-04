<?php

require_once("./config/connexionBdd.php");

//récupere les données du formulaire
$nom = $_POST['nom'];
$id_cms_language = $_POST['cms'];



$idPlugin = $_POST['plugin_id'];
//print_r($idCms);

$req = $bdd->prepare('UPDATE `igloo_webprojects`. `plugins` SET `nom` = :nom, `id_cms_language` = :cms WHERE `plugins`.`id` = :id');

$req->execute(array(
'nom' => $nom,
'cms' => $id_cms_language,
'id' => $idPlugin
));


// echo "<p>Le plugins à bien été modifié</p>"

?>

<!-- <a href="listing_plugins.php">retout à la liste des cms</a> -->

<!DOCTYPE html>
<html>
	<head>
		 <?php require_once("header_meta.php"); ?>
		   <link rel="stylesheet" type="text/css" href="./assets/css/site.css">
	<title>traitementUpdatePlugins</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>

		<div class="row">
			<div class="container">
				<div class="col-lg-12 ajout">
					<!-- <h1 class="ajout">Confirmation !</h1> -->

					<p class="para">Le plugins a bien été modifié</p>
					<!-- <p class="para">Le project a bien été modifié</p> -->

					<a href="listing_plugins.php">Retour à la liste des plugins</a><br><br>
				</div>
			</div>
		</div>
	</body>
</html>
