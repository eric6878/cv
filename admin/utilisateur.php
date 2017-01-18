<?php require '../connexion/connexion.php'; ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>MonSiteCV - Admin : Accueil</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>
	
	<body>
		<header>
			<h1>Espace administratif du site CV</h1>
			<p>Bienvenue admin Eric coudert</p>
			<nav>
				<ul>
					<li><a href="#">Accueil</a></li>
					<li><a href="a_propos.php">Utilisateurs</a></li>
					<li><a href="competence.php">Compétences</a></li>
					<li><a href="experience.php">Expériences</a></li>
					<li><a href="formation.php">Formations</a></li>
					<li><a href="formation.php">Formations</a></li>
					<li><a href="loisir.php">Loisirs</a></li>
					<li><a href="connexion.php">Déconnexion</a></li>
				</ul>
			</nav>
		</header>

		<div>

			<?php 
			
			$sql = $pdoCV -> query("SELECT * FROM utilisateurs");
			$resultat = $sql -> fetch();
			echo '<div class="identite">';
			echo $resultat['prenom'] . ' ' . $resultat['nom'] . '<br />';
			echo $resultat['adresse'] . '<br />';
			echo $resultat['ville'] . '<br />';
			echo $resultat['code_postal'] . '<br />';
			echo $resultat['email'] . '<br />';
			echo $resultat['telephone'] . '<br />';
			echo $resultat['age'] . ' ans<br />';
			/*echo $resultat['mdp'] . '<br />';*/
			echo $resultat['sexe'] . '<br />';
			echo $resultat['etat_civil'] . '<br />';
			/*echo $resultat['pseudo'] . '<br />';
			echo $resultat['avatar'] . '<br />';*/
			echo '<img src="../img/" alt="" /></div>';
			
			 ?>
		</div>
	</body>
</html>