<?php
// On se connecte a la base de données.
require_once("./config/connexionBdd.php");
session_start();
$_SESSION = array();
session_destroy();
header('Location: login.php');
?>
