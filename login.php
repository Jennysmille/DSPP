<?php
session_start();
// On se connecte a la base de données.
require_once("./config/connexionBdd.php");


if (isset($_POST['formconnect']))
{
  $emailconnect = htmlspecialchars($_POST['emailconnect']);
  $mdpconnect = sha1($_POST['mdpconnect']);

    if(!empty($emailconnect) AND !empty($mdpconnect))
    {
      $requser = $bdd->prepare('SELECT * FROM users WHERE email = ? AND motdepasse = ?');
      $requser->execute(array($emailconnect, $mdpconnect));
  //rowCount fonction qui permet de compter le nombres de ranger.
      $userexist = $requser->rowCount();
    if($userexist == 1)
    {
      $userinfo = $requser->fetch();
      $_SESSION['id'] = $userinfo['id'];
      $_SESSION['pseudo'] = $userinfo['pseudo'];
      $_SESSION['email'] = $userinfo['email'];
      header('Location: index.php?id='.$_SESSION['id']);

    }
    else
    {
      $erreur = "Mauvais email ou mot de passe !";
    }
  }
  else
  {
    $erreur = "Tous les champs doivent être complétés !";

  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <?php require_once("header_meta.php"); ?>
  <link rel="stylesheet" type="text/css" href="style.css">
     <title></title>
  </head>
  <body>

    <div class="container" style="margin-top: 100px;">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default">
            <!-- <h4>Retrouvez nous !</h4><br>
            <span><i class="fa fa-facebook"></i></span>
            <span><i class="fa fa-twitter"></i></span>
            <span><i class="fa fa-google"></i></span>
            <br><br><hr> -->

            <div class="panel-body">
              <form action="" method="post">
                <div class="form-group">
                  <p>E-mail</p>
                  <input type="text" name="emailconnect" class="form-control" placeholder="Entrez votre nom">
                </div>

                <div class="form-group">
                  <p>Mot de passe</p>
                  <input type="password" name="mdpconnect" class="form-control" placeholder="Entrez votre mot de passe">
                </div>

                <div class="form-group">
                  <input type="submit" name="formconnect" class="btn btn-success btn-lg btn-block" value="Valider">
                </div>
              </form>
              <?php
              if(isset($erreur)) {
                 echo '<font color="red">'.$erreur."</font>";
              }
              ?>
            </div>
            <div class="lock"><i class="fa fa-lock fa-3x"></i></div>
            <div class="label">Connexion</div>
            <div class="label2"></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
