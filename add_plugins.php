<!DOCTYPE html>
<html>
	<head>
	<?php require_once("header_meta.php"); ?>
	<title>Ajout plugins</title>
	</head>
	<body>
      <?php require_once("head.php"); ?>


	<div class="container">
		<div class="row">
			<div class="col-sm-12">
					<h1>Ajouter un plugin</h1><br/><br/>


					<form method="post" action="traitementPlugins.php" enctype="multipart/form-data">

						<div class="row">
							<div class="col-sm-12">
								 <label>Nom de plugin</label><br/>
								 <input type="text" name="nom" id="nom" placeholder="Ex: Gravity"><br/><br/>



								<label>Quel CMS/Languague</label><br/>
								<select name="cms" id="cms">
								<?php
								require_once("./config/connexionBdd.php");

								$requete = $bdd->query('SELECT * FROM cms_languages');
								//$requete->execute();
									while ($donnees = $requete->fetch())
									{
									//echo $donnees['id'];
									//echo '</br>';
									//echo $donnees['nom'];

									echo '<option value='.$donnees['id'].'>'.$donnees['nom'].'</option>';

									}
								$requete->closeCursor();
								?>
								</select><br/><br/>


						<div class="row">
							<div class="col-sm-12">
							<button type="submit" class="btn btn-primary" value="Valider">Valider</button>
						</div>
						</div>
							</div>
						</div>
					</form>
			</div>
		</div>
	</div>
</body>
</html>
