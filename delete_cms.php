<?php

require_once("./config/connexionBdd.php");

$idCms = $_GET['id'];
$requete = $bdd->prepare('DELETE FROM cms_languages WHERE id = :id');

$requete->bindParam(':id', $idCms);
$requete->execute();

echo "<p>Le cms à bien était supprimer</p>"

?>

<a href="listing_cms_language.php">retour à la liste des cms</a>