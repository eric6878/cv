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

//mise à jour

	if(isset($_POST['titre_xp'])){

		$titre_xp = addslashes($_POST['titre_xp']);
		$sous_titre_xp = addslashes($_POST['sous_titre_xp']);
		$date_xp = addslashes($_POST['date_xp']);
    $description_xp = addslashes($_POST['description_xp']);

		$pdoCV -> exec("UPDATE experiences SET titre_xp = '$titre_xp', sous_titre_xp = '$sous_titre_xp', date_xp = '$date_xp', description_xp= '$description_xp' WHERE id_xp = '$id_xp' ");

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
    <title>Modifier une expérience CV web <?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    <script src="../ckeditor/ckeditor.js"></script>
    </head>

    <body>
        <header>
        	<h1>Page de modification des Expériences</h1>

          <?php include 'navAdmin.php'; ?>
        </header>
         
        <section>

        <form type="text" action="experience.php" method="POST">
        	<label>Expérience sélectionnée :</label>
   			<input type="text" name="titre_xp" value="<?= $resultat['titre_xp']; ?>" />
   			<input type="text" name="sous_titre_xp" value="<?= $resultat['sous_titre_xp']; ?>" />
   			<input type="text" name="date_xp" value="<?= $resultat['date_xp']; ?>" />
   			<textarea name="description_xp" id="editor1">
          <?= $resultat['description_xp']; ?>
        </textarea>
   			<script>
              /* Replace the textarea id="editor1" with a CKeditor instance, using default configuration. */
              CKEDITOR.replace( 'editor1' );
        </script>
   			<input hidden name="id_xp" value="<?= $resultat['id_xp']; ?>" /> 			
   			<input type="submit" value="Mise à jour" />
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












