<?php require '../connexion/connexion.php'; ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Mon Site CV - Admin : Accueil</title>
		<link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
	</head>
	
	<body>
		<header>
			<h1>Profil Admin du site CV Éric Coudert</h1>

			<?php include 'navAdmin.php'; ?>
			
			<p>Bienvenue admin éric coudert</p>

			
		</header>

		<div id="profil">

			<?php 
			
			$sql = $pdoCV -> query("SELECT * FROM utilisateurs");
			$resultat = $sql -> fetch();
			echo $resultat['prenom'] . ' ' . $resultat['nom'] . '<br />';
			echo $resultat['age'] . ' ans<br />';
			echo $resultat['sexe'] . ' ' .  $resultat['etat_civil'] . '<br />';			
			echo $resultat['adresse'] . '<br />';			
			echo $resultat['ville'] . ' ' . $resultat['code_postal'] . '<br />';
			echo $resultat['telephone'] . '<br />';
			echo $resultat['email'] . '<br />';		
			/*echo $resultat['pseudo'] . '<br />';
			echo $resultat['avatar'] . '<br />';*/
			
			 ?>
		
		</div>
	
	</body>
</html>