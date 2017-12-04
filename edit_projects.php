<!DOCTYPE html>
<html>
    <title>Modification d'un projet</title>
  <body>
      <?php require_once("head.php"); ?>
      <?php require_once("header_meta.php"); ?>
<?php

require_once("./config/connexionBdd.php");

$idProject = $_GET['id'];
$requete = $bdd->prepare('SELECT p.id, p.project_name, p.id_cms, p.version, p.hebergeur, p.id_statut, p.comments, cms_languages.nom  nom_cms, statuts.nom  nom_statut
						FROM projects p
						INNER JOIN cms_languages
						ON p.id_cms = cms_languages.id
						INNER JOIN statuts
						ON p.id_statut = statuts.id
						WHERE p.id = :id');



$requete->bindParam(':id', $idProject);
$requete->execute();
//var_dump ($requete);
$donnees = $requete->fetch(PDO::FETCH_ASSOC);
//var_dump ($donnees);
//echo $donnees['nom'];


?>

	  <div class="container">
		<div class="row">
			<div class="col-sm-12">
			<h1>Modifiez un projet</h1>


	<form method="post" action="traitementUpdateProjects.php" enctype="multipart/form-data">
	<input type="hidden" name="project_id" id="project_id" value="<?php echo $idProject; ?>"/><br/><br/>
			<div class="row">
				<div class="col-sm-6">
				<p>
					<label for="name">Nom du projet :</label><br/>
					<input type="text" name="project_name" id="project_name" value="<?php echo $donnees['project_name']; ?>"/><br/><br/>

				</p>

					<p>
						<label for="nom">Quels CMS/Language ?</label>
						<a href="http://localhost/igloo/add_cms_language.php">Ajoutez un nouveau CMS/Language</a><br />
						<select name="cms" id="cms">
							<?php
								$requete = $bdd->query('SELECT * FROM cms_languages');
								while($cms_list = $requete->fetch())
								{
								?>

								<option value="<?php echo $cms_list['id']; ?>" <?php if ($donnees['id_cms'] == $cms_list['id']) echo "selected"; ?> > <?php echo $cms_list['nom']; ?></option>
								<?php
								}
								$requete->closeCursor();

								?>
						</select>
					</p><br/>

					<p>
					<label for="nom">Version :</label><br/>
					<input type="numero" name="version" id="version" value="<?php echo $donnees['version']; ?>"/>
					</p><br/>

					<p>
					<label for="nom">Héberger sur :</label><br/>
						<input type="texte" name="hebergeur" id="hebergeur" value="<?php echo $donnees['hebergeur']; ?>"/>
					</p><br/>


					<p>
					<label for="nom">Statut :</label>
					<a href="http://localhost/igloo//add_statuts.php">Ajoutez un nouveau statut</a><br/>
					<select name="statut" id="statut">
					<?php

						$requete = $bdd->query('SELECT * FROM statuts');
								while($list = $requete->fetch())
								{
								?>

								<option value="<?php echo $list['id']; ?>" <?php if ($donnees['id_statut'] == $list['id']) echo "selected"; ?> > <?php echo $list['nom']; ?></option>
								<?php
								}
								$requete->closeCursor();
					?>


					</select>
					</p><br/>



					<p>
					<label for="nom">Commentaires : </label><br/>
					<textarea name="comments" id="comments" ><?php echo $donnees['comments']; ?></textarea>
					<br/>
					</p>
				</div>


				<div class="col-sm-6">

					<label for="nom">Quels modèles/plugins :</label>
					<a href="http://localhost/igloo/add_plugins.php">Ajoutez un nouveau Modèles/Plugins</a><br />
          <?php

                     $requete = $bdd->query('SELECT * FROM plugins');

                     while($plugins = $requete->fetch())
                     {
                           echo $plugins['id'];
                           $req2 = $bdd->query('SELECT id_plugins FROM projects_plugins WHERE id_projects = '.$idProject.' AND id_plugins = '.$plugins['id'].'');
                           $id = $req2->fetch();
                           $check ="";
                           if($plugins['id'] == $id['id_plugins']){
                               $check ="checked";
                         //echo $id['id_plugins'];
                     }
                           echo '<input '.$check.' type="checkbox" name="plugins[]" value="'.$plugins['id'].'">';
                           echo $plugins['nom']."\r\n";

                     }
                     $requete->closeCursor();
              ?>

                 <br/><br/>
				</div>


				<div class="row">
					<div class="col-sm-12">
						 <button type="submit" class="btn btn-primary pull-right" value="Valider">Valider</button><br/><br/>
					</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
   </body>
</html>
