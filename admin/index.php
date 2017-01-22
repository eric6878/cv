
<?php require '../connexion/connexion.php' ?>

<?php 

session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'Vous êtes connecté !'){
	$id_utilisateur = $_SESSION['id_utilisateur'];
	$prenom = $_SESSION['prenom'];
	$nom = $_SESSION['nom'];
}
else{
	header('location: ../index.php');
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
		<link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
	</head>
	
	<body>
		<header>
				<h1>Accueil Administration du Site CV Éric Coudert</h1>

				<?php include 'navAdmin.php'; ?>

		</header>
		
		 <p>Bonjour <b>Admin</b> <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?> </p>
		
		<section></section>
		
		<footer></footer>
	</body>
</html>
