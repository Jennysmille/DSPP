<!DOCTYPE html>
<html>
	<head>
 <?php require_once("header_meta.php"); ?>
  <title>Ajout CMS/Language</title>
 </head>
	<body>
     <?php require_once("head.php"); ?>
		 <div class="row">
				<div class="container">
					<div class="col-sm-12">
						<h1>Ajouter un CMS/Language</h1><br/><br/>
					
						<form method="post" action="traitement_cms.php" enctype="multipart/form-data">
							<div class="row">
								<div class="col-sm-12">
								<label>Nom du CMS/Language</label><br/>
								<input type="text" name="nom" id="nom" placeholder="Ex: Wordpress"><br/><br/>

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