
<?php require '../connexion/connexion.php' ?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<title>MonSiteCV - Admin : Accueil</title>
	</head>
	
	<body>
		<header id="headerIndex">
				<h1>Espace administrateur du site CV</h1>
				
				<?php 
					$sql = $pdoCV -> query("SELECT * FROM utilisateurs");
					$resultat = $sql -> fetch();
					echo '<div class="">Bonjour ' . $resultat['prenom'] . ' ' . $resultat['nom'] . '<br><img src="../img/" alt="xyz">' . '</div>';
				 ?>

		</header>
		
		<section id="sectionIndex"></section>
		
		<footer id="footerIndex"></footer>
	
	</body>
</html>