<?php require '../connexion/connexion.php'; ?>


<?php 
//mise à jour
	if(isset($_POST['titre_xp'])){

		$titre_xp = addslashes($_POST['titre_xp']);
		$sous_titre_xp = addslashes($_POST['sous_titre_xp']);
		$date = addslashes($_POST['date']);
		$description = addslashes($_POST['description']);

		$pdoCV -> exec("UPDATE experiences SET titre_xp = '$titre_xp', sous_titre_xp = '$sous_titre_xp', date = '$date', description= '$description' WHERE id_xp = '$id_xp' ");

		header("location: experience.php");
		exit();
	}

//récupération
		$id_xp = $_GET['id_xp'];
		$sql = $pdoCV -> query("SELECT * FROM experiences WHERE id_xp = '$id_xp' ");
		$resultat = $sql -> fetch(); 

?>
 
<html lang="fr">
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier expérience CV web <?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>

    <body>
        <header id="headerXp">
        	<h1>Expériences : page de modification dans la BDD</h1>
        </header>
         
        <section id="sectionXp">

        <form type="text" action="experience.php" method="POST" id="formXp">
        	<label>Expérience sélectionnée :</label>
   			<input type="text" name="titre_xp" value="<?= $resultat['titre_xp']; ?>" />
   			<input type="text" name="sous_titre_xp" value="<?= $resultat['sous_titre_xp']; ?>" />
   			<input type="text" name="date" value="<?= $resultat['date']; ?>" />
   			<input type="text" name="description" value="<?= $resultat['description']; ?>" />
   			<input hidden name="id_xp" value="<?= $resultat['id_xp']; ?>" /> 			
   			<input type="submit" value="Mise à jour" />
        </form>
          
        <?php 
        	//include("admin_menu.php"); <!-- FAUT CREER LA PAGE MENU -->
        ?>   
        
        </section>

       <footer id="footerXp">
           <!-- faire le include du footer -->
       </footer>
	</body>
</html>












