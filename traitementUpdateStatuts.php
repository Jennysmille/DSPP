<?php

require_once("./config/connexionBdd.php");

$nom = $_POST['nom'];

$idStatut = $_POST['id_statut'];


$req = $bdd->prepare('UPDATE `statuts` SET `nom` = :nom WHERE `statuts`.`id` = :id');

$req->execute(array(
'nom' => $nom,
'id' => $idStatut
));

echo "<p>Le statut à bien été modifié</p>"

?>
<a href="listing_statuts.php">retour à la liste des statuts</a>