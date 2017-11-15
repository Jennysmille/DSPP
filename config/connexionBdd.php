<?php

require_once("./config/parameters.php");


try
{
	$bdd = new PDO("mysql:host=$serverName;dbname=$databaseName;charset=utf8", $login, $password);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e)
{
	echo "Connexion failed: " . $e->getMessage();
}
