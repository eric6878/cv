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

if(isset($_POST['portfolio'])){
	if($_POST['portfolio']!='' && $_POST['titre_portfolio']!='' && $_POST['img_portfolio']!='' && $_POST['description_loisir']){	
		$portfolio = addslashes($_POST['portfolio']);
		$pdoCV->exec(" INSERT INTO portfolio VALUES (NULL, '$portfolio' ) ");		
		header("location: competence.php");
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
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>
	
	<body>
		<header>
			<h1>Page : Loisirs</h1>
		</header>

		<section>
			<?php 
		
			$sql = $pdoCV -> query("SELECT * FROM loisirs");
			$sql -> execute();
			$nbr_competences = $sql -> rowCount();
		
		 	?>
			
			<p>Il y a <?php echo $nbr_competences; ?> compétences dans votre BDD.</p>
			
			<form action="loisir.php" method="POST">
				<label>Ajouter une compétence numérique :</label><br />
				<input type="text" name="loisir" />
				<input type="submit" value="valider" /></td>
			</form>	
			
			<table>
			 	<thead>
			 		<th>Loisirs</th>
			 		<th>Modification</th>
			 		<th>Suppression</th>
			 	</thead>
			 	<tr>
			 		<?php while($ligne = $sql -> fetch()){ ?>
			 		<td>
			 		<?php echo $ligne['competence']; ?>
			 		</td>
			 		<td><a href="modif_loisir.php?modif_loisir=<?= $ligne['id_loisir']; ?>">Modifier</a></td>
		 			<td><a href="loisir.php?id_competence=<?= $ligne['id_loisir']; ?>">Supprimer</a></td>
			 	</tr>
			 		<?php } ?>
			 </table>
		</section>
	</body>
</html>

