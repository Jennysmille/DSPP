<!DOCTYPE html>
<html>
	<head>
 <?php require_once("header_meta.php"); ?>
  <title>Ajout statut</title>
 </head>
	<body>
  
     <?php require_once("head.php"); ?>
		<div class="row">
			<div class="container">
				<div class="col-sm-12">
					<h1>Ajouter un statut</h1><br/>
					
					 
					<form method="post" action="traitement_statuts.php" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-12">
								
									
										<label>Statut</label><br/>
										<input type="texte" name="nom" id="nom" placeholder="Ex: Beta">
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