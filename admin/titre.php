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

if(isset($_POST['titre_titre'])){
	if($_POST['titre_titre']!='' && $_POST['categorie_titre']!=''){	
		$titre_titre = addslashes($_POST['titre_titre']);
		$categorie_titre = addslashes($_POST['categorie_titre']);
		$pdoCV->exec(" INSERT INTO titres VALUES (NULL, '$titre_titre', '$categorie_titre') ");		
		header("location: titre.php");
		exit();
	}
}

//Suppression

if(isset($_GET['id_titre'])){
	$eraser = $_GET['id_titre'];
	$sql = " DELETE FROM titres WHERE id_titre = '$eraser' ";
	$pdoCV -> query($sql);
	header('location: titre.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Titres CV web <?= $_POST['prenom'] . $_POST['nom']; ?></title>
		<!-- Custom Fonts -->
		<link href="../cssfrontbootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   		<link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<!-- Mon Style CSS -->
		<link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
	</head>
	
	<body>
		<header>
			<h1>Page des Titres</h1>
			<?php include 'navAdmin.php'; ?>
		</header>

		<section>
			
			<?php 
		
				$sql = $pdoCV -> query("SELECT * FROM titres");
				$sql -> execute();
				$nbr_titre = $sql -> rowCount();
		
		 	?>
			
			<p>Il y a <?php echo $nbr_titre; ?> titre(s) dans votre BDD.</p>
			
			<form method="POST">
				<table>
					<thead>
						<th colspan="2">Insérer un titre :</th>
					</thead>
					<tbody>
						<tr>
							<td><label>Titre</label></td>
							<td><input type="text" name="titre_titre" /></td>
						</tr>
						<tr>
							<td><label>Catégorie</label></td>
							<td><input type="text" name="categorie_titre" /></td>
							
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Valider" /></td>
						</tr>
					</tbody>
				</table>
			</form>	
			
			<table>
			 	<thead>
			 		<th>Titre</th>
			 		<th>Catégorie</th>
			 		<th>Modification</th>
			 		<th>Suppression</th>
			 	</thead>
			 	<tr>
			 		<?php while($resultat = $sql -> fetch()){ ?>
			 		<td><?php echo $resultat['titre_titre']; ?></td>
			 		<td><?php echo $resultat['categorie_titre']; ?></td>
			 		<td><a href="modif_titre.php?id_titre=<?= $resultat['id_titre']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td>
		 			<td><a href="titre.php?id_titre=<?= $resultat['id_titre']; ?>"><i class="fa fa-trash-o"></i></a></td>
			 	</tr>
			 		<?php } ?>
			 </table>
		</section>
	</body>
</html>

