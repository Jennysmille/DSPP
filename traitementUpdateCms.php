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


echo "<p>Le cms à bien été modifié</p>"

?>

<a href="listing_cms_language.php">retout à la liste des Cms</a>