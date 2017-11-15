<?php

require_once("./config/connexionBdd.php");

$idPlugins = $_GET['id'];
$requete = $bdd->prepare('DELETE FROM plugins WHERE id = :id');

$requete->bindParam(':id', $idPlugins);
$requete->execute();

echo "<p>Le plugin à bien était supprimer</p>"

?>

<a href="listing_plugins.php">retour à la liste des cms</a>