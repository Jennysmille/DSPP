<!DOCTYPE html>
<html>
	<head>
 <?php require_once("header_meta.php"); ?>
  <title>Modification statut</title>
 </head>
 
  <body>
      <?php require_once("head.php"); 
	  
	       require_once("./config/connexionBdd.php");

			$idStatut = $_GET['id'];
			
			$requete = $bdd->prepare('SELECT * FROM statuts WHERE id = :id'); 
				//print_r($requete);					

				
			$requete->bindParam(':id', $idStatut);
			$requete->execute();
			//var_dump ($requete);
			$donnees = $requete->fetch(PDO::FETCH_ASSOC);
			//var_dump ($donnees);
			//echo $donnees['nom'];

?>
	  
	  
	     
	  <div class="row">
			<div class="container">
				<div class="col-sm-12">
	  	  <h1>Modifier un statut</h1>
		  
		  
					<form method="post" action="traitementUpdateStatuts.php" enctype="multipart/form-data">
				<input type="hidden" name="id_statut" id="id_statut" value="<?php echo $idStatut; ?>"/><br/><br/>
						<div class="row">
							<div class="col-sm-12">
								
									
										<label>Statut</label><br/>
										<input type="text" name="nom" id="nom" value="<?php echo $donnees['nom']; ?>"/><br/>
									<br/><br/>
							
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