	<div class="container">
	<div class="row">
	   <div class="col-lg-6 col-md-6 navbar-left">
			 <?php
 			if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']);
 			 {

 			 ?><br>
 			<a href="deconnexion.php">Me déconnecter</a>
 			 <?php
 			 }
 			 ?>
		 </div>

		<div class="jumbotron text-center">
			<h1>GESTION SITES SITE</h1>
		</div>





	<div class="row">
		<div class="col-lg-12">
				<nav class="navbar">
					<ul class="nav nav-tabs nav-tabs-justified ">
					  <li><a href="http://localhost/igloo/index.php">Accueil</a></li>
					  <li><a href="http://localhost/igloo/listing_projects.php">Liste des projets</a></li>
					  <li><a href="http://localhost/igloo/listing_cms_language.php">Gestion des CMS</a></li>
					  <li><a href="http://localhost/igloo/listing_plugins.php">Gestion des plugins</a></li>
					  <li><a href="http://localhost/igloo/listing_statuts.php">Gestion des statuts</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
