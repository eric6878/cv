<?php require '../connexion/connexion.php'; ?>

<?php 

if(isset($_POST['competence'])){
	if($_POST['competence'] != ''){
		$competence = addslashes($_POST['competence']);
		
		$pdoCV -> exec("INSERT INTO competences(id_competence, competence) VALUES(NULL, '$competence')");
		header("location: competences.php");
		exit();
	}
}

if(isset($_GET['id_competence'])){
	$eraser = $_GET['id_competence'];
	$sql = "DELETE FROM competences WHERE id_competence = '$eraser'";
	$resultat = $pdoCV -> query($sql);
	/*header('Location: competences.php');*/
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Compétences numériques</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>
	
	<body>
		<header id="headerCompetences">
			<h1>Compétences numériques</h1>
		</header>

		<section id="sectionCompetences">
			<?php 
		
			$sql = $pdoCV -> query("SELECT * FROM competences");
			$sql -> execute();
			$nbr_competences = $sql -> rowCount();
		
		 	?>
			
			<p>Il y a <?php echo $nbr_competences; ?> compétences dans votre BDD.</p>
			<form action="competences.php" method="POST" id="formCompetences">
				<label>Ajouter une compétence numérique :</label><br />
				<input type="text" name="competence" />
				<input type="submit" value="valider" /></td>
			</form>	
			
			<table id="tabCompetences">
			 	<thead>
			 		<th>Compétences</th>
			 		<th>Modification</th>
			 		<th>Suppression</th>
			 	</thead>
			 	<tr>
			 		<?php while($ligne = $sql -> fetch()){ ?>
			 		<td>
			 		<?php echo $ligne['competence']; ?>
			 		</td>
			 		<td><a href="modification.php?id_competence=<?php echo $ligne['id_competence']; ?>">Modifier la compétence</a></td>
		 			<td><a href="competences.php?id_competence=<?php echo $ligne['id_competence']; ?>">Supprimer la compétence</a></td>
			 	</tr>
			 		<?php } ?>
			 </table>
		</section>
	</body>
</html>
