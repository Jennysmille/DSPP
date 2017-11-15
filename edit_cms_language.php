<!DOCTYPE html>
<html>
	<head>
 <?php require_once("header_meta.php"); ?>
  <title>Ajout CMS/Language</title>
 </head>
 
  <body>
      <?php require_once("head.php"); 
	  
     require_once("./config/connexionBdd.php");

		$idCms = $_GET['id'];
		//var_dump($idCms);

		$requete = $bdd->prepare('SELECT * FROM cms_languages WHERE id = :id'); 
		
		
		$requete->bindParam(':id', $idCms);
		$requete->execute();
		//var_dump ($requete);

		$donnees = $requete->fetch(PDO::FETCH_ASSOC);
		//var_dump ($donnees);
		//echo $donnees['nom'];

?>
	  
	  <div class="row">
				<div class="container">
					<div class="col-sm-12">
	  	  <h1>Modifier un CMS/Language</h1>
		
  
		<form method="post" action="traitementUpdateCms.php" enctype="multipart/form-data">
				<input type="hidden" name="id_cms" id="id_cms" value="<?php echo $idCms; ?>"/><br/><br/>
							<div class="row">
								<div class="col-sm-12">
								<label>Nom du CMS/Language</label><br/>
								<input type="text" name="nom" id="nom" value="<?php echo $donnees['nom']; ?>"/><br/><br/>
								
								
							
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