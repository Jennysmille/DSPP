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


echo "<p>Le plugins à bien été modifié</p>"

?>

<a href="listing_plugins.php">retout à la liste des cms</a>