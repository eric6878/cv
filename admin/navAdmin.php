
<?php require '../connexion/connexion.php'; ?>

<?php include 'deconnexion.php'; ?>

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

?>


<nav>
	<ul>
		<li><a href="#">Accueil</a></li>
		<li><a href="utilisateur.php">Utilisateurs</a></li>
		<li><a href="competence.php">Compétences</a></li>
		<li><a href="experience.php">Expériences</a></li>
		<li><a href="formation.php">Formations</a></li>
		<li><a href="portfolio.php">Portfolio</a></li>
		<li><a href="loisir.php">Loisirs</a></li>
		<li><a href="formation.php">titres</a></li>
		<li><a href="../index.php?action=deconnexion">Déconnexion...</a></li>
	</ul>
</nav>

