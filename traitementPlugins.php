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



echo "<p>Le plugin à bien était envoyé</p>"

?>
<a href="listing_plugins.php">retour à la liste des statuts</a>
