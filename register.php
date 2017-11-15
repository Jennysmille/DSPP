<?php
// On se connecte a la base de données.
require_once("./config/connexionBdd.php");

//vérifier que tout les champs sont remplis
if (isset($_POST['forminscription']))
{
//htmlspecialchars permet d'enlever les caractères html et eviter les injections de code.
//sha1 permet de haché le password pour si on pirate la BDD de pas pouvoir récupérer les password.
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $email = htmlspecialchars($_POST['email']);
   $email2 = htmlspecialchars($_POST['email2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);;


  if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
  {

//vérifier si le pseudo et plus petit que 225 caractères.
    $pseudolenght = strlen($pseudo);
//on va voir si le pseudo et inférieur ou egale.
    if($pseudolenght <= 225)
    {

              if ($email == $email2)
              {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
//verifier si le mail existe déjà. requete qui verifier tout les mails de la table. Donc on fait un rowCount si = a 0 c'est bon sinon plus que 0 c'est qu'il existe dèjà.
                    $reqemail = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                    $reqemail->execute(array($email));
                    $emailexist = $reqemail->rowCount();
                    if($emailexist == 0)
                    {
                        if($mdp == $mdp2)
                        {
                          $insertusers = $bdd->prepare("INSERT INTO users(pseudo, email, motdepasse) VALUES(?, ?, ?)");

                          $insertusers->execute(array($pseudo,$email,$mdp));
                          $erreur= "Votre compte à bien été crée ! <a href =\"login.php\">Me connecter</a>";

                        }
                        else
                        {
                          $erreur = "Vos mot de passe ne correspondent pas !";
                        }
                      }
                    else
                    {
                      $erreur = "Adresse email déjà utilisée !";
                    }
                  }
//je fais cela car si un untilisateur mais du HTMl on peut le changer et valider même si se n'est pas un mail alors que la se sera pas possible.
              else
              {
                $erreur = "Votre adresse email n'est pas valide !";
              }
          }
          else
          {
            $erreur = "Vos adresses email ne correspondent pas !";
          }
    }
    else
    {
      $erreur = "Votre pseudo ne doit pas dépasser 225 caractères !";
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
            <div class="panel-body">
              <form action="" method="post">
                <div class="form-group">
                  <p>Identifiant</p>
                  <input type="text" name="pseudo" class="form-control" placeholder="Entrez votre nom" id="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
                </div>

                <div class="form-group">
                  <p>E-mail</p>
                  <input type="email" name="email" class="form-control" placeholder="Entrez votre e-mail" id="email" value="<?php if(isset($email)) { echo $email; } ?>">
                </div>

                <div class="form-group">
                  <p>Répétez votre e-mail</p>
                  <input type="email2" name="email2" class="form-control" placeholder="Entrez votre e-mail" id="email2" value="<?php if(isset($email2)) { echo $email2; } ?>">
                </div>

                <div class="form-group">
                  <p>Mot de passe</p>
                  <input type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" id="mdp">
                </div>

                <div class="form-group">
                  <p>Répétez votre mot de passe</p>
                  <input type="password" name="mdp2" class="form-control" placeholder="Répétez votre mot de passe" id="mdp2">
                </div>

                <div class="form-group">
                  <input type="submit" name="forminscription" class="btn btn-success btn-lg btn-block" value="Je m'inscris">
                </div>
              </form>
              <?php
              if(isset($erreur)) {
                 echo '<font color="red">'.$erreur."</font>";
              }
              ?>
            </div>
            <div class="lock"><i class="fa fa-lock fa-3x"></i></div>
            <div class="label">Inscription</div>
            <div class="label2"></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
