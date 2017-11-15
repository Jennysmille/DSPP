<!DOCTYPE html>
<html>
	<head>
 <?php require_once("header_meta.php"); ?>
  <title>Modification de plugin</title>
 </head>
 
  <body>
      <?php require_once("head.php"); 
	  require_once("./config/connexionBdd.php");
	  
			$idPlugin = $_GET['id'];
			$requete = $bdd->prepare('SELECT p.id, p.nom, p.id_cms_language, cms_languages.nom nom_cms 
			FROM plugins p 
			INNER JOIN cms_languages
			ON p.id_cms_language = cms_languages.id
			WHERE p.id = :id'); 
				
			$requete->bindParam(':id', $idPlugin);
			$requete->execute();
			//var_dump ($requete);
			$donnees = $requete->fetch(PDO::FETCH_ASSOC);
			//var_dump ($donnees);
			//echo $donnees['nom'];
	  
	  
	  
	  ?>
     
	  
	  <div class="container">
		<div class="row">
			<div class="col-sm-12">
	  	  <h1>Modifier un plugin</h1>
		  
		  
						<form method="post" action="traitementUpdatePlugins.php" enctype="multipart/form-data">
				<input type="hidden" name="plugin_id" id="plugin_id" value="<?php echo $idPlugin; ?>"/><br/><br/>
				
						<div class="row">
							<div class="col-sm-12">
								 <label>Nom de plugin</label><br/> 
								 <input type="text" name="nom" id="nom" value="<?php echo $donnees['nom']; ?>"/><br/><br/>
								
							
  
								<label>Quel CMS/Languague</label><br/>
								<select name="cms" id="cms">
								
								<?php
								$requete = $bdd->query('SELECT * FROM cms_languages');
								while($cms_list = $requete->fetch())
								{
								?>	
								
								<option value="<?php echo $cms_list['id']; ?>" <?php if ($donnees['id_cms_language'] == $cms_list['id']) echo "selected"; ?> > <?php echo $cms_list['nom']; ?></option>	
								<?php
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