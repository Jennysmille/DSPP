<?php

require_once("./config/connexionBdd.php");

if (isset($_POST['nom']) && isset($_POST['id_cms_language']))
// inserer dans la bdd
$req = $bdd->prepare('INSERT INTO plugins(nom, id_cms_language) VALUES(:nom, :id_cms_language)');
$req->execute(array($_POST['nom'], $_POST['id_cms_language']));

$id_new_id_cms_language = $bdd->lastInsertId();
echo "<p>Le plugin à bien était ajouté !</p>";

$tableau_plugins = $_POST['id_nom']

foreach($tableau_plugin as idNom)
{
	$req2 = $bdd->prepare('INSERT INTO projects_plugins(id_projects, id_plugins) VALUES(?,?)');
	$req = $req2->execute(array(id_new_plugin, idNom));
}

?>
