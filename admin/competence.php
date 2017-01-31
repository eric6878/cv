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
if(isset($_POST['competence'])){
	if($_POST['competence']!=''){
		$competence = addslashes($_POST['competence']);
		
		$pdoCV->exec(" INSERT INTO competences VALUES (NULL, '$competence' ) ");
		header("location: competence.php");
		exit();
	}
}
//Suppression
if(isset($_GET['id_competence'])){
	$eraser = $_GET['id_competence'];
	$sql = "DELETE FROM competences WHERE id_competence = '$eraser'";
	$pdoCV -> query($sql);
	header('location: competence.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Compétences numériques CV web <?= $_POST['prenom'] . $_POST['nom']; ?></title>
		<!-- Custom Fonts -->
		<link href="../cssfrontbootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   		<link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<!-- Mon Style CSS -->
		<link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
	</head>
	
	<body>
		<header>
			<h1>Page des Compétences Numériques</h1>

			<?php include 'navAdmin.php'; ?>
		</header>

		<section>
			<?php 
		
			$sql = $pdoCV -> query("SELECT * FROM competences");
			$sql -> execute();
			$nbr_competences = $sql -> rowCount();
		
		 	?>
			
			<p>Il y a <?php echo $nbr_competences; ?> compétences dans votre BDD.</p>
			

				<form method="POST">
					<table>
						<thead>
							<th colspan="2">Ajouter une nouvelle compétence numérique :</th>
						</thead>
						<tbody>
							<tr>
								<td><input type="text" /></td>
							</tr>
							<tr>
								<td><input type="submit" value="valider" /></td>
							</tr>
						</tbody>		
					</table>
				</form>
			
			<table>
			 	<thead>
			 		<th>Compétences</th>
			 		<th>Modification</th>
			 		<th>Suppression</th>
			 	</thead>
			 	<tr>
			 		<?php while($ligne = $sql -> fetch()){ ?>
			 		<td><?php echo $ligne['competence']; ?></td>
			 		<td><a href="modif_competence.php?id_competence=<?= $ligne['id_competence']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td>
		 			<td><a href="competence.php?id_competence=<?= $ligne['id_competence']; ?>"><i class="fa fa-trash-o fa2"></i></a></td>
			 	</tr>
			 		<?php } ?>
			 </table>
		</section>

		<footer>
			<!-- faire le include du footer -- >
		</footer>
	</body>
</html>

