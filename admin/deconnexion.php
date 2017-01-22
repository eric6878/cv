<?php require '../connexion/connexion.php'; ?>

<?php 

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
	unset($_SESSION);
	session_destroy();
	header ('location: ../index.php');
}

?>
	


