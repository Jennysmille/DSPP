<!DOCTYPE html>
<html>
	<head>
	 <?php require_once("header_meta.php"); ?>
	<title>Ajout de projet</title>
	</head>
	<body>
		<?php require_once("head.php"); ?>


	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Ajoutez un projet</h1><br/>


		<form method="post" action="traitement_projects.php" enctype="multipart/form-data">

			<div class="row">
				<div class="col-sm-6">

					<label for="name"> Nom du projet :</label><br/>
					<input type="text" name="project_name" id="project_name" /><br/><br/>



						<label for="nom"> Quels CMS/Language ? </label>
						<a href="http://localhost/igloo/add_cms_language.php">Ajoutez un nouveau CMS/Language</a><br />
						<select name="cms" id="cms">
							<?php
							require_once("./config/connexionBdd.php");

							$requete = $bdd->query('SELECT * FROM cms_languages');
							//$requete->execute();
								while ($donnees = $requete->fetch())
								{
								//echo $donnees['id'];
								//echo '<br/>';
								//echo $donnees['nom'];

								echo '<option value='.$donnees['id'].'>'.$donnees['nom'].'</option>';

								}
							$requete->closeCursor();
							?>

						</select><br/><br/>





					<label for="nom">Version : </label><br/>
					<input type="numero" name="version" id="version" />
				<br/><br/>




					<label for="nom">Héberger sur :</label><br/>
						<input type="text" name="hebergeur" id="hebergeur" />
				<br/><br/>



					<label for="nom">Statut :</label>
					<a href="http://localhost/igloo/add_statuts.php">Ajoutez un nouveau statut</a><br/>
					<select name="statut" id="statut">
					<?php
					require_once("./config/connexionBdd.php");

					$requete = $bdd->query('SELECT * FROM statuts');
					//$requete->execute();
						while ($donnees = $requete->fetch())
						{
						//echo $donnees['id'];
						//echo '<br/>';
						//echo $donnees['nom'];

						echo '<option value='.$donnees['id'].'>'.$donnees['nom'].'</option>';

						}
					$requete->closeCursor();
					?>
					</select>
				<br/><br/>




					<label for="nom">Commentaires : </label><br/>
					<textarea name="comments" id="comments"></textarea>
					<br/><br/>

				</div>

<!-- début du traitement des plugins dans les projects
préparation des checkbox -->

				<div class="col-sm-6">
					<label for="nom">Quels modèles/plugins :</label>
					<a href="http://localhost/igloo/add_plugins.php">Ajoutez un nouveau Modèles/Plugins</a><br />
					<?php
					// dislpay plugin ok
						// require_once("./config/connexionBdd.php");
						//
						//  $requete = $bdd->query('SELECT * FROM plugins');
						//
						// 	while ($donnees = $requete->fetch())
						// {
						// echo '<input type="checkbox" name="plugins[]" value="'.$donnees['id'].'">';
						// echo $donnees['nom']."\r\n";
						// }
						// $requete->closeCursor();




						require_once("./config/connexionBdd.php");

						 $requete = $bdd->query('SELECT * FROM cms_languages');

							while ($donnees = $requete->fetch())
						{
						//var_dump ($donnees);
						//affichage du nom du CMS
						echo '<h3>'.$donnees['nom'].'</h3>';
						// //echo '<br/>';

            //Sélection des plugins afin de les afficher
						//après le titre qui continent les cms
					$req2= $bdd->query('SELECT * FROM plugins WHERE plugins.id_cms_language = '.$donnees['id'].'');

					$plugins = $req2->fetchAll(PDO::FETCH_ASSOC);
							//  var_dump ($plugins);


								 foreach ($plugins as $Plugin_row ){
	 //on récupère la valeur de l index du //plugin pour le traitement
									 echo '<input type="checkbox" name="plugins[]"
									 value="'.$Plugin_row['id'].'">';
									 //print_r ($Plugin_row);
									 echo $Plugin_row['nom'].'<br/>';
								 }

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
