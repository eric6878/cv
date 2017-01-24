<?php require '../connexion/connexion.php'; ?>

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

//Insertion

if(isset($_POST['titre'])){
	if($_POST['titre']!='' && $_POST['logo_titre']!=''){	
		$titre_portfolio = addslashes($_POST['titre_portfolio']);
		$img_portfolio = addslashes($_POST['img_portfolio']);
		$description_portfolio = addslashes($_POST['description_portfolio']);
		$pdoCV->exec(" INSERT INTO portfolio VALUES (NULL, '$titre_portfolio', '$img_portfolio', 'description_portfolio') ");		
		header("location: portfolio.php");
		exit();
	}
}

//Suppresion

if(isset($_GET['id_portfolio'])){
	$eraser = $_GET['id_portfolio'];
	$sql = " DELETE FROM portfolio WHERE id_portfolio = '$eraser' ";
	$pdoCV -> query($sql);
	header('location: portfolio.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Portfolio CV web <?= $_POST['prenom'] . $_POST['nom']; ?></title>
		<link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
	</head>
	
	<body>
		<header>
			<h1>Page Titres</h1>
		</header>

		<section>
			<?php 
		
			$sql = $pdoCV -> query("SELECT * FROM loisirs");
			$sql -> execute();
			$nbr_titre = $sql -> rowCount();
		
		 	?>
			
			<p>Il y a <?php echo $nbr_titre; ?> titre(s) dans votre BDD.</p>
			
			<form action="titre.php" method="POST">
				<label>Ajouter un titre :</label><br />
				<input type="text" name="titre_titre" />
				<input type="files" name="logo_titre" />
				<input type="submit" value="valider" />
			</form>	
			
			<table>
			 	<thead>
			 		<th>Titre</th>
			 		<th>logo</th>
			 		<th>Modification</th>
			 		<th>Suppression</th>
			 	</thead>
			 	<tr>
			 		<?php while($resultat = $sql -> fetch()){ ?>
			 		<td><?php echo $resultat['titre_titre']; ?></td>
			 		<td><?php echo $resultat['logo_titre']; ?></td>
			 		<td><a href="modifier_titre.php?modifier_titre=<?= $resultat['id_titre']; ?>">Modifier</a></td>
		 			<td><a href="titre.php?supprimer_titre=<?= $resultat['id_titre']; ?>">Supprimer</a></td>
			 	</tr>
			 		<?php } ?>
			 </table>
		</section>
	</body>
</html>

