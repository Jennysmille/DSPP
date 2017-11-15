<?php

require_once("./config/connexionBdd.php");

$idStatut = $_GET['id'];
$requete = $bdd->prepare('DELETE FROM statuts WHERE id = :id');

$requete->bindParam(':id', $idStatut);
$requete->execute();

echo "<p>Le statut à bien était supprimer</p>"

?>

<a href="listing_statuts.php">retour à la liste des cms</a>