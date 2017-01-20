
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



<!-- MISE A JOUR D'UN LOISIR -->

<?php 

  if(isset($_POST['titre'])){
    $titre_titre = addslashes($_POST['titre_titre']);
  	$logo_titre = addslashes($_POST['logo_titre']);
  	$id_titre = $_POST['id_titre'];
  	$pdoCV -> exec(" UPDATE loisirs SET titre_titre = '$titre_loisir', logo_titre = '$logo_titre' WHERE id_titre = '$id_titre' ");

  	header("location: titre.php");
  		exit();
}

//récupération

	$id_loisir = $_GET['id_loisir'];
	$sql = $pdoCV -> query("SELECT * FROM loisirs WHERE id_loisir = '$id_loisir' ");
	$resultat = $sql -> fetch(); 
?>
   
<html lang="fr">
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier loisir CV web <?php /*echo $resultat['prenom'] . ' ' . $resultat['nom'];*/ ?></title>
    <script src="../ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    </head>

    <body>
        <header>
        	
          <h1> Page de modification Loisirs</h1>

          <?php include 'navAdmin.php'; ?>

        </header>

        <section>
           <form action="modif_loisir.php" method="POST">
	           <label>Loisir sélectionné :</label>
			   <input type="text" name="titre_titre" value="<?= $resultat['id_titre']; ?>" />
			   <input type="files" name="logo_titre" value="<?= $resultat['id_titre']; ?>" />           	  
			   <input hidden name="id_titre" value="<?= $resultat['id_loisir']; ?>" /> 			
			   <input type="submit" value="Mettre à jour" />
	          </form>    
         
        </section>

        <footer>
            <!-- faire le "include" du footer -->
        </footer>
	</body>
</html>