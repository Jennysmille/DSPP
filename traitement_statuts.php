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
echo "<p>Le statut à bien était envoyé</p>"

?>
<a href="listing_statuts.php">retour à la liste des statuts</a>

