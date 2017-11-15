<?php
session_start();
// On se connecte a la base de données.
require_once("./config/connexionBdd.php");

if (isset($_GET['id'])AND $_GET['id'] > 0)
{
//Sécuriser la variable
  $getid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
  $requser->execute(array($getid));
  $userinfo = $requser->fetch();
}

?>

<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['pseudo'];?></h2>
         <br /><br />

         Pseudo = <?php echo $userinfo['pseudo'];?>
         <br>
         E-mail = <?php echo $userinfo['email'];?><br><br>

         <?php

        if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']);
          {

          ?>
          <a href="deconnexion.php">Me déconnecter</a>
          <?php
          }
          ?>
      </div>
   </body>
</html>
