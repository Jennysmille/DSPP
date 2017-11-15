<?php

require_once("./config/connexionBdd.php");


//récupere les données du formulaire
$nom = $_POST['nom'];
// inserer dans la bdd 
$req = $bdd->prepare('INSERT INTO cms_languages(nom) VALUES(:nom)');
$req->execute(array(
'nom' => $nom
));


echo "<p>Le cms/Language à bien était envoyé</p>"

?>
<a href="listing_cms_language.php">retour à la liste des Cms/Languages</a>