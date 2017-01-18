
<?php require '../connexion/connexion.php' ?>


<?php

// pour se connecter :

session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'Vous êtes connecté !'){
  $id_utilisateur = $_SESSION['id_utilisateur'];
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];
}
else{
  header('location: authentification.php');
}


// pour se deconnecter : 

if(isset($_GET['deconnexion'])){
  $_SESSION['connexion'] = '';
  $_SESSION['id_utilisateur'] = '';
  $_SESSION['prenom'] = '';
  $_SESSION['nom'] = '';

  unset($_SESSION['connexion']);
  session_destroy();
  header('location: ../index.php');
}

?>


 
<?php 

session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'Vous êtes connecté !'){
	$id_utilisateur = $_SESSION['id_utilisateur'];
	$prenom = $_SESSION['prenom'];
	$nom = $_SESSION['nom'];
}
else{
	header('location: authentification.php');
}


/* pour se deconnecter : */

if(isset($_GET['deconnexion'])){
	$_SESSION['connexion'] = '';
	$_SESSION['id_utilisateur'] = '';
	$_SESSION['prenom'] = '';
	$_SESSION['nom'] = '';

	unset($_SESSION['connexion']);
	session_destroy();
	header('location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<title>Site CV <?php echo $_SESSION['prenom'] . $_SESSION['nom']; ?>- Admin : Accueil</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>
	
	<body>
		<header>
				<h1>Espace administrateur du site CV</h1>
				<nav>
					<ul>
						<li><a href="utilisateur.php">Utilisateurs</a></li>
						<li><a href="experience.php">Expériences</a></li>
						<li><a href="competence.php">Compétences</a></li>
						<li><a href="formation.php">Formations</a></li>
						<li><a href="titre.php">Titres</a></li>
						<li><a href="loisir.php">Loisirs</a></li>
						<li><a href="../index.php?deconnexion=oui">Déconnexion</a></li>
					</ul>
				</nav>
		</header>
		
		 <p>Bonjour <b>admin</b> <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?> </p>
		
		<section></section>
		
		<footer></footer>
	</body>
</html>