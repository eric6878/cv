<?php require '../connexion/connexion.php'; ?>


<?php 
//mise à jour
	if(isset($_POST['titre_formation'])){

		$titre_formation = addslashes($_POST['titre_formation']);
		$date_formation = addslashes($_POST['date_formation']);
    $description_formation = addslashes($_POST['description_formation']);
		$description_formation = addslashes($_POST['id_formation']);

		$pdoCV -> exec(" UPDATE formations SET titre_formation = '$titre_formation', date_formation = '$date_formation', description_formation= '$description_formation' WHERE id_formation = '$id_formation' ");

		header("location: formation.php");
		exit();
	}

//récupération
		$id_formation = $_GET['id_formation'];
		$sql = $pdoCV -> query(" SELECT * FROM formations WHERE id_formation = '$id_formation' ");
		$resultat = $sql -> fetch(); 

?>
 
<html lang="fr">
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier formation CV web <?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    <script src="../ckeditor/ckeditor.js"></script>
    </head>

    <body>
        <header>
        	<h1>Page de modification des formations</h1>

          <?php include 'navAdmin.php'; ?>
        </header>
         
        <section>

        <form type="text" action="formation.php" method="POST">
        	<label>Expérience sélectionnée :</label>
     			<input type="text" name="titre_formation" value="<?= $resultat['titre_formation']; ?>" />
          <input type="text" name="date_formation" value="<?= $resultat['date_formation']; ?>" />
     			<textarea name="description_formation" id="editor1"><?= $resultat['description_formation']; ?></textarea>
     			
          <script>
          /* Replace the textarea id="editor1" with a CKeditor instance, using default configuration. */
            CKEDITOR.replace( 'editor1' );

          </script>
     			
          <input hidden name="id_formation" value="<?= $resultat['id_formation']; ?>" /> 			
     			<input type="submit" value="Mettre à jour" />
        </form>
          
        <?php 
        	//include("admin_menu.php"); <!-- FAUT CREER LA PAGE MENU -->
        ?>   
        
        </section>

       <footer>
           <!-- faire le include du footer -->
       </footer>
	</body>
</html>





