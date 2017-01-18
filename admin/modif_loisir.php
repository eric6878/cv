
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

  if(isset($_POST['loisir'])){
    $loisir = addslashes($_POST['loisir']);
  	$description_loisir = addslashes($_POST['description_loisir']);
  	$id_loisir = addslashes($_POST['id_loisir']);
  	$pdoCV -> exec(" UPDATE loisirs SET loisir = '$loisir' WHERE di_loisir = '$id_loisir' ");

  	header("location: loisir.php");
  		exit();
}

//récupération

	$id_loisir = $_GET['id_loisir'];
	$sql = $pdoCV -> query("SELECT * FROM loisirs WHERE id_loisir = '$id_loisir' ");
	$resultat = $sql -> fetch(); 

 	$sql = $pdoCV->query("SELECT * FROM loisirs");
	$resultat = $sql->fetch();
?>
   
<html lang="fr">
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier loisir CV web <?php /*echo $resultat['prenom'] . ' ' . $resultat['nom'];*/ ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>

    <body>
        <header>
        	<h1>Loisirs : page de modification</h1>
        </header>
            <!-- include "admin_menu.php"; -->
        <section>
          <form type="submit" action="modif_loisir.php" method="POST">
          	<label>Compétence sélectionnée :</label>
     			  <input type="text" name="loisir" value="<?= $resultat['id_loisir']; ?>" />
     			  <input hidden name="id_loisir" value="<?= $resultat['id_loisir']; ?>" /> 			
     			  <input type="submit" value="Mettre à jour" />
          </form>    
         
        </section>

        <footer>
            <!-- faire le "include" du footer -->
        </footer>
	</body>
</html>